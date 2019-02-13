<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auditlog extends CI_Controller {

	public function __construct()
	{ 
		parent::__construct();
		$this->load->model('Auditlog_model');
	}
	
	

	/* ######### GET ACTIVITYLOG ########## */
	public function getActivitylog()
	{
			$data=$this->Auditlog_model->getActivitylog();
			if($data)
			{
				echo json_encode($data);
			}
			else
			{
				return false;
			}
	}
	
	
	


	
}
