<?php

class Jobposition_model extends CI_Model
{
	
	public function add_position($post_position)
	{	
		
		if($post_position)
		{
			if($post_position['IsActive']==1)
					{
						$IsActive = true;
					} else {
						$IsActive = false;
					}
			 
			$position_data=array(
				//"JobpositionId"=>trim($post_position['JobpositionId']),
				"JobpositionName"=>trim($post_position['JobpositionName']),
				"IsActive"=>$IsActive,
				"CreatedBy" =>1,
				"CreatedOn" =>date('y-m-d H:i:s')
			);	
				
				$res=$this->db->insert('tblmstjobposition',$position_data);
				if($res)
				{
					// $log_data = array(
					// 	'UserId' =>trim($post_position['CreatedBy']),
					// 	'Module' => 'Userrole',
					// 	'Activity' =>'Add'
		
					// );
					// $log = $this->db->insert('tblactivitylog',$log_data);
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
	
	//list project status
	public function getlist_position()
	{
		$this->db->select('*');
		// $this->db->order_by('RoleName','asc');
		$result=$this->db->get('tblmstjobposition');
		
		$res=array();
		if($result->result())
		{
			$res=$result->result();
		}
		return $res;
	}
		
	
	//Delete UserList
	public function delete_position($Jobpositionid_id) 
	{
	
		if($Jobpositionid_id) 
		{
			
			$this->db->where('JobpositionId',$Jobpositionid_id['id']);
			$res = $this->db->delete('tblmstjobposition');
			
			if($res) {
				$log_data = array(
					'UserId' => trim($Jobpositionid_id['Userid']),
					'Module' => 'Userrole',
					'Activity' =>'Delete'
	
				);
				$log = $this->db->insert('tblactivitylog',$log_data);
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
	
	//Edit ProjectList
	 public function edit_position($post_position) {
		if($post_position['IsActive']==1)
					{
						$IsActive = true;
					} else {
						$IsActive = false;
					}
		if($post_position) 
		{
				$position_data = array(
				//"ProjectStatusId"=>$post_position['ProjectStatusId'],
				"JobpositionId"=>$post_position['JobpositionId'],
				"RoleName"=>$post_position['RoleName'],
				"IsActive"=>$IsActive,
				"UpdatedBy" =>trim($post_position['UpdatedBy']),
				'UpdatedOn' => date('y-m-d H:i:s')
			);
			
			$this->db->where('JobpositionId',trim($post_position['JobpositionId']));
			$res = $this->db->update('tblmstjobposition',$position_data);
			
			if($res) 
			{
				// $log_data = array(
				// 	'UserId' => trim($post_position['UpdatedBy']),
				// 	'Module' => 'Userrole',
				// 	'Activity' =>'Edit'
	
				// );
				// $log = $this->db->insert('tblactivitylog',$log_data);
				return true;
			} else
				{
				 return false;
			    }
		}
		else 
		{
			return false;
		}	
	
	}
	
	
	public function get_positiondata($Jobpositionid_id=Null)
	{
	  if($Jobpositionid_id)
	  {
		 $this->db->select('JobpositionId,RoleName,IsActive');
		 $this->db->where('JobpositionId',$Jobpositionid_id);
		 $result=$this->db->get('tblmstjobposition');
		 $company_data= array();
		 foreach($result->result() as $row)
		 {
			$company_data=$row;
			
		 }
		 return $company_data;
		 
	  }
	  else
	  {
		  return false;
	  }
	}
	
	
	
	
}