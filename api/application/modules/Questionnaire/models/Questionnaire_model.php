<?php

class Questionnaire_model extends CI_Model
{
	
	//###################################### GET QUESTIONS #######################################
	public function getQuestion($post_candidateInfo) {
		try{
            if($post_candidateInfo) {            
                
                $CandidateId = trim($post_candidateInfo['CandidateId']);

                //select all questions
                $this->db->select('tqa.QuestionId, tq.QuestionText, tq.AnswerTypeId, tqa.AnswerText as objAnswer');
                $this->db->join('tblquestion tq','tq.QuestionId = tqa.QuestionId', 'left');
                $this->db->group_by('tqa.QuestionId');
                $this->db->where('tqa.CandidateId', $CandidateId);
                $question = $this->db->get('tblquestionnaireanswer tqa');
                $res = array();

                //fetch all question's placeholder & store in one array
                foreach($question->result() as $row) {
                    $QuestionId = $row->QuestionId; 
                    $AnswerTypeId = $row->AnswerTypeId;
                    if($AnswerTypeId == 3 OR $AnswerTypeId == 2){
                        $this->db->select('tqa.CandidateId,tqa.QuestionId, tmph.PlaceholderText, tqa.PlaceholderId, tqa.AnswerText');
                        $this->db->join('tblmstplaceholder tmph','tmph.PlaceholderId = tqa.PlaceholderId', 'left');
                        $this->db->where('tqa.QuestionId', $QuestionId);
                        $this->db->where('tqa.CandidateId', $CandidateId);
                        $result = $this->db->get('tblquestionnaireanswer tqa');
                    } else if($AnswerTypeId == 1){
                        $this->db->select('tqo.OptionValue,tqa.AnswerText');
                        $this->db->join('tblquestionnaireanswer tqa','tqa.QuestionId = tqo.QuestionId', 'left');
                        $this->db->where('tqo.QuestionId', $QuestionId);
                        $this->db->where('tqa.CandidateId', $CandidateId);
                        $result = $this->db->get('tblquestionoptions tqo');
                    }
                    $row->child=$result->result();                   
                    array_push($res,$row);
                }               
                return $res; 
            } else {
                return false;
            }
		}catch(Exception $e) {
			trigger_error($e->getMessage(), E_USER_ERROR);
			return false;
		}	
    }
    //####### END - GET QUESTIONS #######
    
    //###################################### SET ANSWER #######################################
	public function setAnswer($post_questionAnswer) {

        if($post_questionAnswer) {

            $CandidateId = $post_questionAnswer['CandidateId'];
            $QuestionAnswer = $post_questionAnswer['Answer'];           
            $QuestionId = $QuestionAnswer['QuestionId'];
            $AnswerTypeId = $QuestionAnswer['AnswerTypeId'];

            if($AnswerTypeId == 2 OR $AnswerTypeId == 3){
                foreach($QuestionAnswer['child'] as $child){
                    $PlaceholderId = $child['PlaceholderId'];
                    $AnswerText = trim($child['AnswerText']);
                    $answer_data = array(
                        'AnswerText' => $AnswerText
                    );
                    $this->db->where('CandidateId',$CandidateId);
                    $this->db->where('QuestionId',$QuestionId);
                    $this->db->where('PlaceholderId',$PlaceholderId);
                    $result = $this->db->update('tblquestionnaireanswer',$answer_data);
                }
                return true;
            } else if($AnswerTypeId == 1){
                
                $ObjAnswer = trim($post_questionAnswer['ObjAnswer']);

                $answer_data = array(
                    'AnswerText' => $ObjAnswer
                );
                $this->db->where('CandidateId',$CandidateId);
                $this->db->where('QuestionId',$QuestionId);
                $result = $this->db->update('tblquestionnaireanswer',$answer_data);

                return true;
            }
        	
          	
        } else {
            return false;
        }	
    }
    //####### END - SET ANSWER #######
    
    //###################################### SUBMIT QUESTIONNAIRE FORM #######################################
	public function questionnaireSubmit($post_questionnaire) {

        if($post_questionnaire) {             
            $CandidateId = $post_questionnaire['CandidateId'];
            $questionnaire_data = array(
                'StatusId' => 1
            );
            $this->db->where('CandidateId',$CandidateId);
            $result = $this->db->update('tblcandidate',$questionnaire_data); 
            if($result){
                return true;
            }else{
                return false;
            }     	
        } else {
            return false;
        }	
    }
	//####### END - SUBMIT QUESTIONNAIRE FORM #######
	
}