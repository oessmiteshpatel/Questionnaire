<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepass extends MY_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Changepass_model');
	}
	
	
	public function changeuserpass()
		{
								
		$post_pass = json_decode(trim(file_get_contents('php://input')), true);		
		if ($post_pass)
			{					
				$result = $this->Changepass_model->change_pass($post_pass);
				if($result)
				{
					echo json_encode('success');
				}
				else
				{					
					echo json_encode("Code duplicate");
				}
										
		}
	}	
	

	
}
