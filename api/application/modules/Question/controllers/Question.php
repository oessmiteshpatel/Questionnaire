<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {


		public function __construct() {
			parent::__construct();
			$this->load->model('Question_model');
		}

		/*############# ADD QUESTION ################ */
		public function addQuestion() {
		
			$post_Question = json_decode(trim(file_get_contents('php://input')), true);		
			$qa=$post_Question['question'];  
		
			if ($post_Question) {
				if($qa['QuestionId'] > 0){
					$result = $this->Question_model->edit_Question($post_Question);
					if($result) {
						echo json_encode($post_Question);	
					}	
				} else {
					$result = $this->Question_model->addQuestion($post_Question);
					if($result) {
						echo json_encode($post_Question);	
					}	
				}							
			}
			
		}

		/*############# GET QUESTION  LIST ################ */
		public function getAllQuestion()
		{
				$data=$this->Question_model->getlist_question();
				echo json_encode($data);
		}
		public function delete($question_id = NULL) 
		{
				if(!empty($question_id)) {

				$result = $this->Question_model->delete_question($question_id);			
				if($result) {
					echo json_encode("Delete successfully");	
				}	
			} 
		}

		/*############# EDIT FROM USER ID  ################ */
		public function getById($question_id=null)
		{	
			if(!empty($question_id))
			{
				$data=[];
				$data['questionType']=$this->Question_model->get_questiondata($question_id);
				$data['answerType']=$this->Question_model->get_questiondatatypeans($question_id);
				echo json_encode($data);
			}
		}


		/*############# GET QUESTION TYPE  ################ */
		public function getAllDefaultData()
		{
			$data['quetypeans']=$this->Question_model->getlist_QuestionType();
			if($data['quetypeans'])
			{
				echo json_encode($data);
			}
			else
			{
				return false;
			}
		}
		/*############# GET QUESTION TYPE  END ################ */


	
	
}
