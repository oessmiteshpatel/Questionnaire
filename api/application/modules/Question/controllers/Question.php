<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {


	public function __construct() {
	
		parent::__construct();
		
		$this->load->model('Question_model');
		
	}
	
		
	
	public function add() {
		
		$post_Question = json_decode(trim(file_get_contents('php://input')), true);		

		if ($post_Question) {
			// if($post_Question['QuestionId'] > 0){
			// 	$result = $this->Question_model->edit_Question($post_Question);
			// 	if($result) {
			// 		echo json_encode($post_Question);	
			// 	}	
			// } else {
				$result = $this->Question_model->add_Question($post_Question);
				if($result) {
					echo json_encode($post_Question);	
				}	
			}							
		//}
		
	}

	
	public function addQuestion()
	{  
		$post_question = json_decode(trim(file_get_contents('php://input')), true);
		if ($post_question) 
			{
				if($post_question['QuestionId']>0)
				{
					$result = $this->Question_model->edit_question($post_question);
					if($result)
					{
						echo json_encode($post_question);	
					}	
				}
				else
				{
					
					$result = $this->Question_model->add_questions($post_question); 
					if($result)
					{
						echo json_encode($post_question);	
					}	

				}
			
			}
	}


	
	public function getAllDefaultData()
	{
		//$data="";
		$data['quetypeans']=$this->Question_model->getlist_QuestionType();
		//$data['question']=$this->Question_model->getlist_question();
		echo json_encode($data);
	}


	
	
}
