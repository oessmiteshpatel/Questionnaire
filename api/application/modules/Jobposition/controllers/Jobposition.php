<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobposition extends CI_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jobposition_model');
	}
	
	
	public function addPosition()
	{
		$post_position = json_decode(trim(file_get_contents('php://input')), true);
		if ($post_position) 
			{
				if($post_position['JobpositionId']>0)
				{
					$result = $this->Jobposition_model->edit_position($post_position);
					if($result)
					{
						echo json_encode($post_position);	
					}	
				}
				else
				{
					
					$result = $this->Jobposition_model->add_position($post_position); 
					if($result)
					{
						echo json_encode($post_position);	
					}	

				}
					
			}
	}
	
	
	//Delete UserList

	
	public function delete() {
		$role_id = json_decode(trim(file_get_contents('php://input')), true);		

		if ($role_id) {
			if($role_id['id'] > 0){
				$result = $this->Jobposition_model->delete_position($role_id);
				if($result) {
					
					echo json_encode("Delete successfully");
				}
				}
		
			
		} 
			
	}
	
	
	//get userId edit
	public function getById($role_id=null)
	{	
		
		if(!empty($role_id))
		{
			$data=[];
			$data=$this->Jobposition_model->get_positiondata($role_id);
			echo json_encode($data);
		}
	}
	

	public function getAll()
	{
		//$data="";
		
		$data=$this->Jobposition_model->getlist_position();
		
		echo json_encode($data);
	}
	
	
}
