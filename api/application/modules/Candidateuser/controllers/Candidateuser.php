<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Candidateuser extends CI_Controller {

	public function __construct()
	{ 
		parent::__construct();
		$this->load->model('Candidateuser_model');
	}
	
	public function addUser()
	{  
		$post_user = json_decode(trim(file_get_contents('php://input')), true);
		if ($post_user) 
			{
				// if($post_user['CandidateId']>0)
				// {
				// 	$result = $this->Candidateuser_model->edit_user($post_user);
				// 	if($result)
				// 	{
				// 		echo json_encode($post_user);	
				// 	}	
				// }
				// else
				// {
					
					$result = $this->Candidateuser_model->add_user($post_user); 
			
					if($result)
					{
						echo json_encode($post_user); 
						
					}	
				// }
					
			}
	}


	public function getAllCandidate()
	{
			$data=$this->Candidateuser_model->getlist_user();
			echo json_encode($data);
	}


	// public function getAllQuestion()
	// {
	// 		$data=$this->Candidateuser_model->getlist_question();
	// 		echo json_encode($data);
	// }



	//Delete UserList
	
	public function deleteCandidate() {
		$post_user = json_decode(trim(file_get_contents('php://input')), true);		
		if ($post_user)
		 {
			if($post_user['id'] > 0){
				$result = $this->Candidateuser_model->delete_candidate($post_user);
				if($result) {	
					echo json_encode("Delete successfully");
					}
		 	}
		
			
		} 
			
	}


	//get userId edit
	public function getById($Candidate_Id=null)
	{	
		if(!empty($Candidate_Id))
		{
			$data=[];
			$data['Users']=$this->Candidateuser_model->getCandidate($Candidate_Id);
			$data['QuestionAnswer']=$this->Candidateuser_model->get_userdata($Candidate_Id);
			//print_r($data); die;
			echo json_encode($data);
		}
	}


	public function getAllDefaultData()
	{
		//$data="";
		$data['jobpositon']=$this->Candidateuser_model->getlist_jobpositon();
		$data['question']=$this->Candidateuser_model->getlist_question();
		echo json_encode($data);
	}


	
}
