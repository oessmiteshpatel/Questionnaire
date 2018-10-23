<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {


	public function __construct() {
	
		parent::__construct();
		
		$this->load->model('Question_model');
		
	}
	
		
	
	public function add() {
		
		$post_Question = json_decode(trim(file_get_contents('php://input')), true);		
		$qa=$post_Question['question'];  
	 
		if ($post_Question) {
			if($qa['QuestionId'] > 0){
				$result = $this->Question_model->edit_Question($post_Question);
				if($result) {
					echo json_encode($post_Question);	
				}	
			} else {
				$result = $this->Question_model->add_Question($post_Question);
				if($result) {
					echo json_encode($post_Question);	
				}	
			}							
		}
		
	}


	public function getAllQuestion()
	{
			$data=$this->Question_model->getlist_question();
			echo json_encode($data);
	}

	
	// public function delete() {
	// 	$question_id = json_decode(trim(file_get_contents('php://input')), true);		

	// 	if ($question_id) {
	// 		if($question_id> 0){
	// 			$result = $this->Question_model->delete_question($question_id);
	// 			if($result) {
					
	// 				echo json_encode("Delete successfully");
	// 				}
	// 			}
		
			
	// 	} 
			
	// }

	public function delete($question_id = NULL) 
	{

		if(!empty($question_id)) {

			$result = $this->Question_model->delete_question($question_id);			
			if($result) {
				echo json_encode("Delete successfully");	
			}	
			
		} 
			
	}


		//get userId edit
		public function getById($question_id=null)
		{	
			
			if(!empty($question_id))
			{
				$data=[];
				//$data=$this->Question_model->get_questiondata($question_id);
				$data['quetype']=$this->Question_model->get_questiondata($question_id);
				$data['typeans']=$this->Question_model->get_questiondatatypeans($question_id);
				echo json_encode($data);
			}
		}


	
	public function getAllDefaultData()
	{
		//$data="";
		$data['quetypeans']=$this->Question_model->getlist_QuestionType();
		//$data['questions']=$this->Question_model->getlist_question();
		echo json_encode($data);
	}


	
	
}
