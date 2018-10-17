s<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {


	public function __construct() {
	
		parent::__construct();
		
		$this->load->model('Question_model');
		
	}
	
	// public function getAll() {
		
	// 	//$data="";
		
	// 	$data=$this->Question_model->getlist_Country();
		
	// 	echo json_encode($data);
				
	// }
	
	
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
	
	// public function getById($Country_Id = NULL) {
		
	// 	if (!empty($Country_Id)) {
	// 		$data = [];		
	// 		$data = $this->Question_model->get_Countrydata($Country_Id);
	// 		echo json_encode($data);			
	// 	}
	// }	
	

		
	// public function delete() {
	// 	$post_Question = json_decode(trim(file_get_contents('php://input')), true);		

	// 	if ($post_Question) {
	// 		if($post_Question['id'] > 0){
	// 			$result = $this->Question_model->delete_Country($post_Question);
	// 			if($result) {
					
	// 				echo json_encode("Delete successfully");
	// 			}
	// 			}
		
			
	// 	} 
			
	// }

	public function getAllDefaultData()
	{
		//$data="";
		$data['quetypeans']=$this->Question_model->getlist_QuestionType();
		//$data['question']=$this->Question_model->getlist_question();
		echo json_encode($data);
	}


	
	
}
