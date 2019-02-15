<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auditlog extends CI_Controller {

	public function __construct()
	{ 
		parent::__construct();
		$this->load->model('Auditlog_model');
		$this->output->cache(3);
	}
	
	

	/* ######### GET ACTIVITY LOG ########## */
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
	

	/* ######### GET EMAIL LOG ########## */
	public function getEmailLog()
	{
			$data=$this->Auditlog_model->getEmailLog();
			if($data)
			{
				echo json_encode($data);
			}
			else
			{
				return false;
			}
	}
	/* ######### GET LOGIN LOG ########## */
	public function getLoginLog()
	{
			$data=$this->Auditlog_model->getLoginLog();
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
