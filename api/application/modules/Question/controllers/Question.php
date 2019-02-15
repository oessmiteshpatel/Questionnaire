<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {


		public function __construct() {
			parent::__construct();
			$this->load->model('Question_model');
		}

		// ###################################### SET QUESTION ######################################
		public function setQuestion() {		
			$post_Question = json_decode(trim(file_get_contents('php://input')), true);		
			$Question=$post_Question['Question']; 		
			if ($post_Question) {
				if($Question['QuestionId'] > 0){
					$result = $this->Question_model->updateQuestion($post_Question);
					if($result) {
						echo json_encode($result);	
					}	
				} else {
					$result = $this->Question_model->addQuestion($post_Question);
					if($result) {
						echo json_encode($post_Question);	
					}	
				}							
			}			
		}
		// ###################################### END - SET QUESTION ######################################

		// ###################################### GET ALL QUESTIONS #######################################
		public function getAllQuestion()
		{
				$question_data=$this->Question_model->getAllQuestion();
				echo json_encode($question_data);
		}
		// ###################################### END - GET ALL QUESTIONS #######################################

		// ###################################### DELETE QUESTION #######################################
		public function deleteQuestion($QuestionId = NULL) {
			if(!empty($QuestionId)) {
				$result = $this->Question_model->deleteQuestion($QuestionId);			
				if($result) {
					echo json_encode("Delete successfully");	
				}	
			} 
		}
		// ###################################### END - DELETE QUESTION #######################################

		// ###################################### FETCH ANSWER TYPE FOR DROPDOWN #######################################
		public function getAnswerTypeList() {
			$data=$this->Question_model->getAnswerTypeList();
			if($data) {
				echo json_encode($data);
			} else {
				return false;
			}
		}
		// ###################################### END - FETCH ANSWER TYPE FOR DROPDOWN #######################################

		// ###################################### GET QUESTION BY ID ######################################
		public function getQuestionById($QuestionId=null) {	
			if(!empty($QuestionId)) {
				$data=[];
				$data['Question']=$this->Question_model->getQuestionById($QuestionId);
				$data['Placeholder']=$this->Question_model->getPlaceholderById($QuestionId);
				echo json_encode($data);
			}
		}
		// ###################################### END - GET QUESTION BY ID ######################################



	
	
}
