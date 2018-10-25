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
				"JobPositionName"=>trim($post_position['JobPositionName']),
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
		
	
	//Delete Position
	public function delete_position($position_id) 
	{
   
	   if($position_id) 
	   {
		   
		   $this->db->where('JobpositionId',$position_id);
		   $res = $this->db->delete('tblmstjobposition');
		   
		   if($res) {
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


	// public function delete_position($position_id) 
	// {
	
	// 	if($position_id) 
	// 	{
			
	// 		$this->db->where('JobpositionId',$position_id['id']);
	// 		$res = $this->db->delete('tblmstjobposition');
			
	// 		if($res) {
	// 			$log_data = array(
	// 				'UserId' => trim($position_id['Userid']),
	// 				'Module' => 'Userrole',
	// 				'Activity' =>'Delete'
	
	// 			);
	// 			$log = $this->db->insert('tblactivitylog',$log_data);
	// 			return true;
	// 		} else {
	// 			return false;
	// 		}
	// 	} 
	// 	else 
	// 	{
	// 		return false;
	// 	}
		
	// }
	
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
				"JobPositionName"=>$post_position['JobPositionName'],
				//"JobpositionId"=>$post_position['JobpositionId'],
				//"RoleName"=>$post_position['RoleName'],
				"IsActive"=>$IsActive,
				"UpdatedBy" =>1,
				'UpdatedOn' => date('y-m-d H:i:s')
			);
			
			$this->db->where('JobPositionId',trim($post_position['JobPositionId']));
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
	
	
	public function get_positiondata($position_id=Null)
	{
	  if($position_id)
	  {
		 $this->db->select('*');
		 $this->db->where('JobPositionId',$position_id);
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