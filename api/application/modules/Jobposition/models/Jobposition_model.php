<?php

class Jobposition_model extends CI_Model
{
	public function addJobPosition($post_position)
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
				"JobPositionName"=>trim($post_position['JobPositionName']),
				"IsActive"=>$IsActive,
				"CreatedBy" => trim($post_position['CreatedBy']),
				"CreatedOn" =>date('y-m-d H:i:s')
			);	
				
				$res=$this->db->insert('tblmstjobposition',$position_data);
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
	
		//list of job position
		public function getAllJobPosition()
		{
				$this->db->select('tblpos.JobPositionId,tblpos.JobPositionName,tblpos.IsActive,(SELECT COUNT(can.CandidateId) FROM tblcandidate as can WHERE can.JobPositionId=tblpos.JobPositionId) as isdisabled');
				// $this->db->order_by('RoleName','asc');
				$result=$this->db->get('tblmstjobposition tblpos');
				
				$res=array();
				if($result->result())
				{
					$res=$result->result();
				}
				return $res;
		}
		
	
		//Delete Position
		public function deleteJobPosition($position_id) 
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
	
	//Edit Jobposition List
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
				"IsActive"=>$IsActive,
				"UpdatedBy" => trim($post_position['UpdatedBy']),
				"UpdatedOn" =>date('y-m-d H:i:s')
			);
			
			$this->db->where('JobPositionId',trim($post_position['JobPositionId']));
			$res = $this->db->update('tblmstjobposition',$position_data);
			
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