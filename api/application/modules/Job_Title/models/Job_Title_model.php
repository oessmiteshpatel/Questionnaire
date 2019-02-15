<?php

class Job_Title_model extends CI_Model
{
	//###################################### ADD JOB-TITLE #######################################
	public function addJobTitle($post_title) {		
		if($post_title) {
			if($post_title['IsActive']==1) {
				$IsActive = true;
			} else {
				$IsActive = false;
			}			 
			$title_data=array(
				"JobTitle"=>trim($post_title['JobTitle']),
				"IsActive"=>$IsActive,
				"CreatedBy" => trim($post_title['CreatedBy']),
				"CreatedOn" =>date('y-m-d H:i:s')
			);				
			$res=$this->db->insert('tblmstjobtitle',$title_data);
			if($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	//###################################### END - ADD JOB-TITLE #######################################

	//###################################### UPDATE JOB-TITLE #######################################
	public function updateJobTitle($post_title) {
		if($post_title['IsActive']==1) {
			$IsActive = true;
		} else {
			$IsActive = false;
		}
		if($post_title) {
			$title_data = array(
				"JobTitle"=>$post_title['JobTitle'],
				"IsActive"=>$IsActive,
				"UpdatedBy" => trim($post_title['UpdatedBy']),
				"UpdatedOn" =>date('y-m-d H:i:s')
			);			
			$this->db->where('JobTitleId',trim($post_title['JobTitleId']));
			$res = $this->db->update('tblmstjobtitle',$title_data);			
			if($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}		
	}
	//###################################### END - UPDATE JOB-TITLE #######################################

	//###################################### GET JOB-TITLE BY ID #######################################
	public function getJobTitleById($JobTitleId=Null) {
		if($JobTitleId) {
			$this->db->select('tmjt.JobTitleId,tmjt.JobTitle,tmjt.IsActive');
			$this->db->where('tmjt.JobTitleId',$JobTitleId);
			$result=$this->db->get('tblmstjobtitle tmjt');
			$title_data= array();
			foreach($result->result() as $row) {
				$title_data=$row;
			}
			return $title_data;
		} else {
			return false;
		}
	}
	//###################################### END - GET JOB-TITLE BY ID #######################################

	//###################################### GET ALL JOB-TITLE #######################################
	public function getAllJobTitle() {
		$this->db->select('tmjt.JobTitleId,tmjt.JobTitle,tmjt.IsActive,(SELECT COUNT(tc.CandidateId) FROM tblcandidate as tc WHERE tc.JobTitleId=tmjt.JobTitleId) as isdisabled');
		$result=$this->db->get('tblmstjobtitle tmjt');
		$title_data= array();
		if($result->result()) {
			$title_data = $result->result();
		}
		return $title_data;
	}
	//###################################### END - GET ALL JOB-TITLE #######################################	

	//###################################### DELETE JOB-TITLE #######################################
	public function deleteJobTitle($JobTitleId) {
		if($JobTitleId) {
			$this->db->where('JobTitleId',$JobTitleId);
			$res = $this->db->delete('tblmstjobtitle');			
			if($res) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}	
	}
	//###################################### END - DELETE JOB-TITLE #######################################	
}