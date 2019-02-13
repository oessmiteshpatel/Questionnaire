<?php

class Auditlog_model extends CI_Model
{
	
	public function getActivitylog()
	{
			$this->db->select('ta.UserID,ta.Module,ta.Activity,ta.CreatedOn');
			$result = $this->db->get('tblactivitylog as ta');
			$res=array();
			if($result->result())
			{
				$res=$result->result();
			}
			return $res;
	
	}





	


	
	
	
	

	
	
}