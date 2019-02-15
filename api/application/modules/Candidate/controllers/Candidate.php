<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Candidate extends CI_Controller {

	public function __construct()
	{ 
		parent::__construct();
		$this->load->model('Candidate_model');
	}
	
	//###################################### GET JOB TITLE LIST #######################################
	public function getJobTitleList()
	{
		$data=$this->Candidate_model->getJobTitleList();
		echo json_encode($data);
	}
	//###### END - GET JOB TITLE LIST #######

	//###################################### GET CANDIDATE INFORMATION #######################################
	public function getCandidateInfo() {				
		$post_candidateinfo = json_decode(trim(file_get_contents('php://input')), true);		
		if ($post_candidateinfo) {
			$data = $this->Candidate_model->getCandidateInfo($post_candidateinfo);
			if($data) {
				echo json_encode($data);
			} else {
				echo json_encode('fail');
			}									
		}	
	}
	//####### END - GET CANDIDATE INFORMATION #######

	//###################################### SET CANDIDATE INFORMATION #######################################
	public function setCandidateInfo()
	{
		$post_candidateinfo = json_decode(trim(file_get_contents('php://input')), true);
		if ($post_candidateinfo) {			
			$result = $this->Candidate_model->setCandidateInfo($post_candidateinfo);
			if($result) {
				echo json_encode($result);	
			}						
		}
	}
	//####### END - SET CANDIDATE INFORMATION #######

	//###################################### INSERT QUESTIONS #######################################
	public function insertQuestion()
	{
		$post_candidateinfo = json_decode(trim(file_get_contents('php://input')), true);
		if ($post_candidateinfo) {			
			$result = $this->Candidate_model->insertQuestion($post_candidateinfo);
			if($result) {
				echo json_encode($result);	
			}						
		}
	}
	//####### END - INSERT QUESTIONS #######


	
}
