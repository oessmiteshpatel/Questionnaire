<?php

class Auditlog_model extends CI_Model
{
	
	public function getActivitylog()
	{
			$this->db->select('ta.UserId,ta.Module,ta.Activity,ta.CreatedOn,tu.FirstName,tu.LastName');
			$this->db->join('tbluser as tu','ta.UserId = tu.UserId', 'left');
			$result = $this->db->get('tblactivitylog ta');
			$res=array();
			if($result->result())
			{
				$res=$result->result();
			}
			return $res;
	
	}

	
	public function getEmailLog()
	{
			$this->db->select('tmg.From,tmg.To,tmg.Subject,tmg.CreatedOn');
			$result = $this->db->get('tblemaillog tmg');
			$res=array();
			if($result->result())
			{
				$res=$result->result();
			}
			return $res;
	
	}

	public function getLoginLog()
	{
			$this->db->select('tlg.UserId,tlg.LoginType,tlg.UserAgent,tlg.IPAddress,tlg.CreatedOn,tu.EmailAddress');
			$this->db->join('tbluser as tu','tlg.UserId = tu.UserId','left');
			$result = $this->db->get('tblloginlog tlg');
			$res=array();
			if($result->result())
			{
				$res=$result->result();
			}
			return $res;
	
	}





	


	
	
	
	

	
	
}