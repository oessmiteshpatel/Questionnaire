<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_Title extends CI_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Job_Title_model');
	}
	
	//###################################### ADD/UPDATE JOB-TITLE #######################################
	public function setJobTitle() {  
		$post_title = json_decode(trim(file_get_contents('php://input')), true);
		if ($post_title) {
			if($post_title['JobTitleId']>0) {
				$result = $this->Job_Title_model->updateJobTitle($post_title);
				if($result)	{
					echo json_encode($post_title);	
				}	
			} else {
				$result = $this->Job_Title_model->addJobTitle($post_title); 
				if($result) {
					echo json_encode($post_title);	
				}	
			}
		}
	}
	//###################################### END - ADD/UPDATE JOB-TITLE #######################################

	//###################################### GET JOB-TITLE BY ID #######################################
	public function getJobTitleById($JobTitleId=null) {	
		if(!empty($JobTitleId)) {
			$title_data=[];
			$title_data=$this->Job_Title_model->getJobTitleById($JobTitleId);
			echo json_encode($title_data);
		}
	}
	//###################################### END - GET JOB-TITLE BY ID #######################################

	//###################################### GET ALL JOB-TITLE #######################################
	public function getAllJobTitle() {
		$title_data=$this->Job_Title_model->getAllJobTitle();
		if($title_data) {
			echo json_encode($title_data);	
		} else {
			return false;
		}
	}
	//###################################### END - GET ALL JOB-TITLE #######################################
	
	//###################################### DELETE JOB-TITLE #######################################
	public function deleteJobTitle($JobTitleId = NULL) {
		if(!empty($JobTitleId)) {
			$result = $this->Job_Title_model->deleteJobTitle($JobTitleId);			
			if($result) {
				echo json_encode("Delete successfully");	
			}	
		} 			
	}
	//###################################### END - DELETE JOB-TITLE #######################################	

}
