<?php

class Candidateuser_model extends CI_Model
{
	
	public function add_user($post_user)
	{	
		$candidatevalue=$post_user['candidatevalue'];
		$questionvalue=$post_user['questionvalue'];
		if($candidatevalue['CandidateId']==0)
		{
			if($candidatevalue['IsActive']==1)
			{
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			$user_data=array(
			"CandidateName"=>trim($candidatevalue['CandidateName']),
			"CandidateEmail"=>trim($candidatevalue['CandidateEmail']),
			"PhoneNumber"=>trim($candidatevalue['PhoneNumber']),
			"JobPositionId"=>trim($candidatevalue['JobPositionId']),
			"IsActive"=>$IsActive,
			"CreatedBy"=>1,
			"CreatedOn"=>date('y-m-d H:i:s')
				
			);	
				
				$res=$this->db->insert('tblcandidate',$user_data);
				
				if($res)
				{
					$candidateId = $this->db->insert_id();
			
					foreach($questionvalue as $que){
						$child = $que['child'];
						
						if($que['AnswerTypeId']==1){
							foreach($child as $ans){
								
							$cans_data1=array(
								"CandidateId"=>$candidateId,
								"QuestionId"=>trim($ans['QuestionId']),
								"QAnswerId"=>trim($ans['QAnswerId']),
								"CAnswer"=>trim($ans['CAnswer1']),
								"IsActive"=>1,
								"CreatedBy"=>1,
								"CreatedOn"=>date('y-m-d H:i:s')
								);	
									
								$res1=$this->db->insert('tblcandidateanswer',$cans_data1);
							}
						} else {
							foreach($child as $ans){
								
								$cans_data1=array(
									"CandidateId"=>$candidateId,
									"QuestionId"=>trim($ans['QuestionId']),
									"QAnswerId"=>trim($ans['QAnswerId']),
									"CAnswer"=>trim($ans['CAnswer']),
									"IsActive"=>1,
									"CreatedBy"=>1,
									"CreatedOn"=>date('y-m-d H:i:s')
									);	
										
									$res1=$this->db->insert('tblcandidateanswer',$cans_data1);
								}
						}
					}
					
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


	public function edit_user($post_user) 
	 {
		if($post_user) 
		{
			$candidatevalue=$post_user['candidatevalue'];
					$user_data=array(
						// "CandidateName"=>trim($post_user['CandidateName']),
						// "CandidateEmail"=>trim($post_user['CandidateEmail']),
						// "PhoneNumber"=>trim($post_user['PhoneNumber']),
						// "JobPositionId"=>trim($post_user['JobPositionId']),		
						//"CandidateHrForm"=>trim($candidatevalue['CandidateHrForm']),
						"CandidateHrForm"=>str_replace(" ", "_", trim($candidatevalue['CandidateHrForm'])),
					//	"IsActive"=>$IsActive,
						"CreatedBy"=>1,
						"CreatedOn"=>date('y-m-d H:i:s')
							
						);	
			
		
			$this->db->where('CandidateId',trim($candidatevalue['CandidateId']));

			$res = $this->db->update('tblcandidate',$user_data);
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

	public function getlist_user()
	{
			$this->db->select('can.CandidateId,can.CandidateName,can.CandidateEmail,can.PhoneNumber,can.IsActive,can.CandidateHrForm,job.JobPositionName');
			$this->db->join('tblmstjobposition job','job.JobPositionId = can.JobPositionId', 'left');
			$this->db->order_by('CandidateName','asc');
			//$this->db->where('Status',3);
			$result = $this->db->get('tblcandidate can');
	
			$res=array();
			if($result->result())
			{
				$res=$result->result();
			}
			return $res;
	
	}


	public function delete_candidate($post_user) 
	{
	
		if($post_user) 
		{		
			$this->db->where('CandidateId',$post_user['id']);
			$res = $this->db->delete('tblcandidate');	
		} 
		else 
		{
			return false;
		}
		
	}


	public function get_userdata($Candidate_Id=Null)
	{
	  if($Candidate_Id)
	  {
		$this->db->select('QuestionId,QuestionName,AnswerTypeId,IsActive');
		
		$this->db->where('IsActive=',1);
		$result=$this->db->get('tblquestion');
		
		$res=array();
		foreach($result->result() as $row)
		{

			$this->db->select('canswer.CAnswerId,canswer.CandidateId,qans.QLabel,canswer.QuestionId,canswer.QAnswerId,canswer.CAnswer');
			$this->db->join('tblquestionanswer qans','qans.QAnswerId = canswer.QAnswerId', 'left');
		
			$this->db->where('canswer.QuestionId',$row->QuestionId);
			$this->db->where('canswer.CandidateId',$Candidate_Id);
			//$this->db->group_by('canswer.CAnswerId');
			$result1=$this->db->get('tblcandidateanswer canswer');
		
			if($result1->num_rows()>0){
				$row->child=$result1->result();
				array_push($res,$row);
			}
			
		}
		return $res;
		// return $user_data;
		 
	  }
	  else
	  {
		  return false;
	  }
	}
	public function getCandidate($Candidate_Id=Null)
	{
	  if($Candidate_Id)
	  {
		$this->db->select('c.CandidateName,c.CandidateEmail,c.PhoneNumber,c.CreatedOn,jp.JobPositionName');
		$this->db->join('tblmstjobposition jp','jp.JobPositionId = c.JobPositionId', 'left');
		$this->db->where('c.IsActive=',1);
		$this->db->where('c.CandidateId=',$Candidate_Id);
		$result0=$this->db->get('tblcandidate c');
		foreach($result0->result() as $row)
			{
				$res=$row;
			}
		
		return $res;
		 
	  }
	  else
	  {
		  return false;
	  }
	} 

	public function getlist_jobpositon()
	{
		$this->db->select('*');
		
		$this->db->where('IsActive=',1);
		$this->db->order_by('JobPositionName','asc');
		$result=$this->db->get('tblmstjobposition');
		
		$res=array();
		if($result->result())
		{
			$res=$result->result();
		}
		return $res;
	}

	
public function getlist_question()
	{
		$this->db->select('QuestionId,QuestionName,AnswerTypeId,IsActive');
		
		$this->db->where('IsActive=',1);
		//$this->db->order_by('JobPositionName','asc');
		$result=$this->db->get('tblquestion');
		
		$res=array();
		foreach($result->result() as $row)
		{
			$this->db->select('QuestionId,QAnswerId,QLabel,QValue,"" as CAnswer,"" as CAnswer1');
			$this->db->where('QuestionId',$row->QuestionId);
			$result1=$this->db->get('tblquestionanswer');
			//$res=$row;
			$row->child=$result1->result();
			array_push($res,$row);
		}
		print_r($res);
		//return $res;
		
	}

	
	
	

	
	
}