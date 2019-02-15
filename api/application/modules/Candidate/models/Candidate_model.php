<?php

class Candidate_model extends CI_Model
{
	
	//###################################### GET JOB TITLE LIST #######################################
	public function getJobTitleList()
	{
		$this->db->select('JobTitleId, JobTitle');		
		$this->db->where('IsActive',1);
		$this->db->order_by('JobTitle','asc');
		$result=$this->db->get('tblmstjobtitle');		
		$res=array();
		if($result->result())
		{
			$res=$result->result();
		}
		return $res;
	}
	//####### END GET JOB TITLE LIST #######

	//###################################### GET CANDIDATE INFORMATION #######################################
	public function getCandidateInfo($post_candidateinfo) {
        if($post_candidateinfo) {
			$this->db->select('tc.CandidateId,tc.FirstName,tc.LastName,tc.EmailAddress,tc.PhoneNumber,tc.JobTitleId,tmjt.JobTitle,tc.GenderId,tmc.DisplayText as Gender,tc.StatusId, tc.CreatedOn');
			$this->db->join('tblmstconfiguration tmc','tmc.Value = tc.GenderId');	
			$this->db->join('tblmstjobtitle tmjt','tmjt.JobTitleId = tc.JobTitleId');
			$this->db->where('tc.CandidateId',trim($post_candidateinfo['CandidateId']));			
			$this->db->where('tmc.Key','Gender');
			$this->db->limit(1);
			$this->db->from('tblcandidate tc');
			$result= $this->db->get();
			$CandidateInfo = array();
			foreach($result->result() as $row){
				$CandidateInfo = $row;
          	}
          	return $CandidateInfo;
        } else {
            return false;
        }	
    }
	//####### END GET CANDIDATE INFORMATION #######


	//###################################### SET CANDIDATE INFORMATION #######################################
	public function setCandidateInfo($post_candidateinfo) {
        if($post_candidateinfo) {

        	$candidateinfo_data = array(
				'FirstName' => trim($post_candidateinfo['FirstName']),
				'LastName' => trim($post_candidateinfo['LastName']),
				'EmailAddress' => trim($post_candidateinfo['EmailAddress']),
				'PhoneNumber' => trim($post_candidateinfo['PhoneNumber']),
				'JobTitleId' => trim($post_candidateinfo['JobTitleId']),
				'GenderId' => trim($post_candidateinfo['GenderId']),
			);
			$this->db->where('CandidateId',$post_candidateinfo['CandidateId']);
			$result = $this->db->update('tblcandidate',$candidateinfo_data);
          	return $result;
        } else {
            return false;
        }	
    }
	//####### END SET CANDIDATE INFORMATION #######

	//###################################### INSERT QUESTIONS #######################################
	public function insertQuestion($post_candidateinfo) {
		try {
			if($post_candidateinfo) {

				$CandidateId = trim($post_candidateinfo['CandidateId']);
				
				//select all questions
				$this->db->select('QuestionId,QuestionText,AnswerTypeId,IsActive');
				$this->db->where('IsActive=',1);
				$question=$this->db->get('tblquestion');

				$res = array();

				//fetch all question's placeholder & store in one array
				foreach($question->result() as $row) {
					$AnswerType = $row->AnswerTypeId;
					$QuestionId = $row->QuestionId;
					if($AnswerType == 1) { //MCQ
						$question_placeholder = array( 0 => array ('CandidateId' => $CandidateId, 'QuestionId' => $QuestionId, 'PlaceholderId' => '', 'AnswerText' => ''));
					} else if($AnswerType == 2 OR $AnswerType == 3) { //Textbox
						$this->db->select('"'.$CandidateId.'" as CandidateId,QuestionId,PlaceholderId,"" as AnswerText');
						$this->db->where('QuestionId', $QuestionId);
						$result = $this->db->get('tblmstplaceholder');
						$child=$result->result();
						$question_placeholder = json_decode(json_encode($child), true);;
					}				
					array_push($res,$question_placeholder);
				}

				//fetch data from above array & insert data into QuestionnaireAnswer Table 
				for ($i = 0; $i < sizeof($res); $i++){
					for ($j = 0; $j < sizeof($res[$i]); $j++){						
						$question_data = array(
							'CandidateId' => $res[$i][$j]['CandidateId'],
							'QuestionId' => $res[$i][$j]['QuestionId'],
							'PlaceholderId' => $res[$i][$j]['PlaceholderId'],
							'AnswerText' => $res[$i][$j]['AnswerText']
						);
						$insert = $this->db->insert('tblquestionnaireanswer',$question_data);
					}
				}

				$status_data = array(
					'StatusId' => 2
				);
				$this->db->where('CandidateId',$CandidateId);
				$status = $this->db->update('tblcandidate',$status_data);
				if($status) {					
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		}catch(Exception $e){
			trigger_error($e->getMessage(), E_USER_ERROR);
			return false;
		}	
	}
	//####### END INSERT QUESTIONS #######


	
}