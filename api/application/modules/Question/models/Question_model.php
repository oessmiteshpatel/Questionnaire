<?php

class Question_model extends CI_Model
 {

	// ###################################### ADD QUESTION ######################################
	public function addQuestion($post_Question) {			
		if($post_Question) {
			$Question=$post_Question['Question'];
			$Placeholder=$post_Question['Placeholder'];
			$AnswerTypeId = trim($Question['AnswerTypeId']);
			if($Question['IsActive']==1) {
				$IsActive = true;
			} else {
				$IsActive = false;
			}

			//Add Question
			$Question_data = array(
				'QuestionText' => trim($Question['QuestionText']),
				'AnswerTypeId' => $AnswerTypeId,
				"IsActive"=>$IsActive				
			);			
			$question_add = $this->db->insert('tblquestion',$Question_data);
			
			if($question_add) {
				$QuestionId = $this->db->insert_id();					

				foreach($Placeholder as $placeholder){						
					if($AnswerTypeId == 1){
						//Add Options
						$Options_data = array(
							'QuestionId' => trim($QuestionId),
							'OptionValue' => trim($placeholder['Placeholder']),
							"IsActive"=>1					
						);					
						$res = $this->db->insert('tblquestionoptions',$Options_data);
					} else if ($AnswerTypeId == 2 OR $AnswerTypeId == 3 ){
						//Add Placeholders
						$Placeholder_data = array(
							'QuestionId' => trim($QuestionId),
							'PlaceholderText' => trim($placeholder['Placeholder']),
							"IsActive"=>1					
						);					
						$res = $this->db->insert('tblmstplaceholder',$Placeholder_data);
					}					
				}
				return true;			
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	// ###################################### END - ADD QUESTION ######################################	

	// ###################################### UPDATE QUESTION ######################################
	public function updateQuestion($post_Question) {		
		if($post_Question) {
			$Question=$post_Question['Question'];
			if($Question['IsActive']==1) {
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			//Update Question
			$Question_data = array(
				'QuestionText' => trim($Question['QuestionText']),
				'AnswerTypeId' => trim($Question['AnswerTypeId']),
				"IsActive"=>$IsActive				
			);	
			$this->db->where('QuestionId',trim($Question['QuestionId']));		
			$question_update = $this->db->update('tblquestion',$Question_data);
			if($question_update){
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	// ###################################### UPDATE QUESTION ######################################	

	//###################################### GET ANSWER TYPE FOR DROPDOWN #######################################
	public function getAnswerTypeList() {
		$this->db->select('tmc.Value as AnswerTypeId,tmc.DisplayText as AnswerType');		
		$this->db->where('IsActive',1);
		$this->db->where('Key','AnswerType');
		$result=$this->db->get('tblmstconfiguration tmc');		
		$res=array();
		if($result->result()) {
			$res=$result->result();
		}
		return $res;
	}
	//###################################### END - GET ANSWER TYPE FOR DROPDOWN #######################################

	//###################################### DELETE QUESTION #######################################
	public function deleteQuestion($QuestionId) {	
		if($QuestionId) {			
			$this->db->where('QuestionId',$QuestionId);
			$res = $this->db->delete('tblquestion');
			if($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}		
	}
	//###################################### END - DELETE QUESTION #######################################

	//###################################### GET QUESTION BY ID #######################################
	public function getQuestionById($QuestionId=Null) {
	  if($QuestionId) {
		 $this->db->select('tq.QuestionId, tq.QuestionText, tq.AnswerTypeId, tq.IsActive');
		 $this->db->where('tq.QuestionId',$QuestionId);
		 $result=$this->db->get('tblquestion tq');
		 $question_data= array();
		 foreach($result->result() as $row) {
			$question_data=$row;			
		 }
		 return $question_data;		 
	  } else {
		  return false;
	  }
	}
	//###################################### END - GET QUESTION BY ID #######################################

	//###################################### GET PLACEHOLDER BY ID #######################################
	public function getPlaceholderById($QuestionId=Null) {
		if($QuestionId) {

			//Get Answer Type Id
			$this->db->select('tq.AnswerTypeId');
			$this->db->where('tq.QuestionId',$QuestionId);
			$AnswerType = $this->db->get('tblquestion tq');
			$AnswerTypeId=$AnswerType->result()[0]->AnswerTypeId;

			if($AnswerTypeId == 1) {
				//Get Options
				$this->db->select('tqo.OptionValue as Placeholder');
				$this->db->where('tqo.QuestionId',$QuestionId);
				$Placeholder_row = $this->db->get('tblquestionoptions tqo');
				$Placeholder_data = array();
				foreach($Placeholder_row->result() as $row) {
					array_push($Placeholder_data,$row);			
				}
			} else if ($AnswerTypeId == 2 OR $AnswerTypeId == 3) {
				//Get Placeholders
				$this->db->select('tmp.PlaceholderText as Placeholder');
				$this->db->where('tmp.QuestionId',$QuestionId);
				$Placeholder_row = $this->db->get('tblmstplaceholder tmp');
				$Placeholder_data = array();
				foreach($Placeholder_row->result() as $row) {	
					array_push($Placeholder_data,$row);	
				}				
			}	
			return $Placeholder_data;				 
		} else {
			return false;
		}
	  }
	//###################################### END - GET PLACEHOLDER BY ID #######################################

	//###################################### GET ALL QUESTIONS #######################################
	public function getAllQuestion() {
		$this->db->select('tq.QuestionId,tq.QuestionText,tq.AnswerTypeId,tmc.DisplayText as AnswerType,tq.IsActive,(SELECT COUNT(tqa.QuestionnaireAnswerId) FROM tblquestionnaireanswer as tqa WHERE tqa.QuestionId=tq.QuestionId) as isdisabled');
		$this->db->join('tblmstconfiguration tmc','tmc.Value = tq.AnswerTypeId', 'left');
		$this->db->where('tmc.Key','AnswerType');
		$result=$this->db->get('tblquestion tq');		
		$question_data=array();
		if($result->result()) {
			$question_data=$result->result();
		}
		return $question_data;
	}
	//###################################### END - GET ALL QUESTIONS #######################################


	
	
}
