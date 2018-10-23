<?php

class Register_model extends CI_Model
{
	
	

	public function getStateList($country_id = NULL) {
		
		if($country_id) {
			
			$this->db->select('StateId,StateName');
			$this->db->where('CountryId',$country_id);
			$this->db->order_by('StateName','asc');
			$this->db->where('IsActive=',1);
			$result = $this->db->get('tblmststate');
			
			$res = array();
			if($result->result()) {
				$res = $result->result();
			}
			return $res;
			
		} else {
			return false;
		}
	}

	public function add_user($post_user)
	{	
		if($post_user)
		{
			if($post_user['IsActive']==1)
			{
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			$user_data=array(
			"RoleId"=>trim($post_user['RoleId']),
			"CountryId"=>trim($post_user['CountryId']),
			"StateId"=>trim($post_user['StateId']),
			"FirstName"=>trim($post_user['FirstName']),
			"LastName"=>trim($post_user['LastName']),
			 
			"EmailAddress"=>trim($post_user['EmailAddress']),
		//	"Password"=>trim($post_user['Password']),
			"Address1"=>trim($post_user['Address1']),
			
			"PhoneNumber"=>trim($post_user['PhoneNumber']),
			"Status"=>3,
			"IsActive"=>$IsActive,
			"CreatedBy"=>1,
			"CreatedOn"=>date('y-m-d H:i:s')
			//"UpdatedBy"=>1
				
			);	
				
				$res=$this->db->insert('tbluser',$user_data);
				if($res)
				{
					return true;
				}
				else
				{
					return false;
				}
		}
		else
		{
				return false;
		}
	}


	public function getlist_user()
	{
			$this->db->select('us.UserId,us.RoleId,us.FirstName,us.LastName,us.EmailAddress,us.PhoneNumber,us.Status,role.RoleName');
			$this->db->join('tblmstuserrole role','role.RoleId = us.RoleId', 'left');
			$this->db->order_by('us.FirstName','asc');
			$this->db->where('us.Status',3);
			$result = $this->db->get('tbluser us');


			// $this->db->select('us.UserId,us.RoleId,us.CompanyId,us.FirstName,us.LastName,us.EmailAddress,us.PhoneNumber,us.Status,cp.Name,role.RoleName,dep.DepartmentName');
			// $this->db->join('tblcompany cp','cp.CompanyId = us.CompanyId', 'left');
			// $this->db->join('tblmstdepartment dep','dep.DepartmentId = us.DepartmentId', 'left');
			//  $this->db->join('tblmstuserrole role','role.RoleId = us.RoleId', 'left');
			// $this->db->order_by('us.UserId','asc');
			// $this->db->order_by('FirstName','asc');
			// $this->db->where('Status',3);
			// $this->db->where('role.RoleId!=',5);
			// $result = $this->db->get('tbluser us');			
			$res=array();
			if($result->result())
			{
				$res=$result->result();
			}
			return $res;
	
	}

	
	//Delete UserList
	public function delete_user($post_user) 
	{
	
		if($post_user) 
		{		
			$this->db->where('UserId',$post_user['id']);
			$res = $this->db->delete('tbluser');
			if($res) {
				// $log_data = array(
				// 	'UserId' =>  trim($post_user['id']),
				// 	'Module' => 'Register User',
				// 	'Activity' =>'Delete'
	
				// );
				// $log = $this->db->insert('tblactivitylog',$log_data);
				return true;
			} else {
				return false;
			}	
		} 
		else 
		{
			return false;
		}
		
	}
	
	//Edit UserList
	 public function edit_user($post_user) 
	 {
		if($post_user) 
		{
			if($post_user['IsActive']==1)
					{
						$IsActive = true;
					} else {
						$IsActive = false;
					}
				$user_data = array(
				"RoleId"=>trim($post_user['RoleId']),
				
				"CountryId"=>trim($post_user['CountryId']),
				"StateId"=>trim($post_user['StateId']),
				"FirstName"=>trim($post_user['FirstName']),
				"LastName"=>trim($post_user['LastName']),
				
				"EmailAddress"=>trim($post_user['EmailAddress']),
				//"Password"=>trim($post_user['Password']),
				"Address1"=>trim($post_user['Address1']),
				
				"PhoneNumber"=>trim($post_user['PhoneNumber']),
				
				"IsActive"=>$IsActive,
				"UpdatedBy" =>1,
				"UpdatedOn"=> date('y-m-d H:i:s')
			  );
			
		
			$this->db->where('UserId',trim($post_user['UserId']));
			$res = $this->db->update('tbluser',$user_data);
			if($res) {
				// $log_data = array(
				// 	'UserId' => trim($post_user['UpdatedBy']),
				// 	'Module' => 'Register User',
				// 	'Activity' =>'Edit'
	
				// );
				// $log = $this->db->insert('tblactivitylog',$log_data);
				return true;
			} else {
				return false;
			}
		
		}
		else 
		{
			return false;
		}	
	
	}
	
	
	public function get_userdata($User_Id=Null)
	{
	  if($User_Id)
	  {
		$this->db->select('*');
		$this->db->where('UserId',$User_Id);
		$result=$this->db->get('tbluser');
		$user_data= array();
		foreach($result->result() as $row)
		{
		   $user_data=$row;
		   
		}
		return $user_data;
		 
	  }
	  else
	  {
		  return false;
	  }
	}
	
	
	//List state
	function getlist_state()
	{
		$this->db->select('*');
		$this->db->order_by('StateName','asc');
		$this->db->where('IsActive=',1);
		$result=$this->db->get('tblmststate');
		
		$res=array();
		if($result->result())
		{
			$res=$result->result();
		}
		return $res;
	}
	
	function getlist_company()
	{
		$this->db->select('*');
		$this->db->where('IsActive=',1);
		$this->db->order_by('Name','asc');
		$result=$this->db->get('tblcompany');
		
		$res=array();
		if($result->result())
		{
			$res=$result->result();
		}
		return $res;
	}

	public function getlist_department()
	{
		$this->db->select('*');
		
		$this->db->where('IsActive=',1);
		$this->db->order_by('DepartmentName','asc');
		$result=$this->db->get('tblmstdepartment');
		
		$res=array();
		if($result->result())
		{
			$res=$result->result();
		}
		return $res;
	}

	

	//list user role
	public function getlist_userrole()
	{
		$this->db->select('RoleId,RoleName');
		$this->db->where('RoleId!=','5');
		$this->db->where('RoleId!=','1');
		$this->db->order_by('RoleName','asc');
		$this->db->where('IsActive=',1);
		$result=$this->db->get('tblmstuserrole');
		
		$res=array();
		if($result->result())
		{
			$res=$result->result();
		}
		return $res;
	}
	
	public function getlist_country() {
	
		$this->db->select('*');
		$this->db->order_by('CountryName','asc');
		$this->db->where('IsActive=',1);
		$result = $this->db->get('tblmstcountry');
		$res = array();
		if($result->result()) {
			$res = $result->result();
		}
		return $res;
		
	}
	
	
}