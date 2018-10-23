<?php

class Question_model extends CI_Model
 {

	public function add_Question($post_Question) {
			
		if($post_Question) 
		{
			
			$Question_data = array(

				'QuestionName' => trim($post_Question['QuestionName']),
				'AnswerTypeId' => trim($post_Question['AnswerTypeId']),
				// 'QuestionId' => trim($post_question['QuestionId']),
				// 'QLabel' => trim($post_question['QLabel']),
				// 'QValue' => trim($post_question['QValue']),
				"IsActive"=>1
			
			);
			
			$res = $this->db->insert('tblquestion',$Question_data);
			
			if($res)
			{
				$questionId = $this->db->insert_id();
					if(isset($post_Question['QValue']) && !empty($post_Question['QValue']))
					{
						$QValue = trim($post_Question['QValue']);
					}
					else
					{
						$QValue = null;
					}
				$Question_data2 = array(

					'QuestionId' => trim($questionId),
					'QLabel' => trim($post_Question['QLabel']),
					'QValue' =>$QValue,
					"IsActive"=>1
				
				);
				
				$res2 = $this->db->insert('tblquestionanswer',$Question_data2);
				
				if($res2)
				{
					return true;;
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
		else
		{
			return false;
		}
	}

	


	public function getlist_QuestionType()
	{
		$this->db->select('AnswerTypeId,AnswerName,DisplayText,IsActive');
		
		$this->db->where('IsActive=',1);
		//$this->db->order_by('AnswerName','asc');
		$result=$this->db->get('tblmstanswertype');
		
		$res=array();
		if($result->result())
		{
			$res=$result->result();
		}
		return $res;
	}


	 public function delete_question($question_id) 
	 {
	
		if($question_id) 
		{
			
			$this->db->where('QuestionId',$question_id);
			$res = $this->db->delete('tblquestion');
			
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


	public function get_questiondata($question_id=Null)
	{
	  if($question_id)
	  {
		 $this->db->select('que.QuestionId,que.QuestionName,que.AnswerTypeId,qtype.AnswerName');
		 $this->db->join('tblmstanswertype qtype','qtype.AnswerTypeId = que.AnswerTypeId', 'left');
		 $this->db->where('QuestionId',$question_id);
		 $result=$this->db->get('tblquestion que');
		 $question_data= array();
		 foreach($result->result() as $row)
		 {
			$question_data=$row;
			
		 }
		 return $question_data;
		 
	  }
	  else
	  {
		  return false;
	  }
	}


	public function getlist_question()
	{
		$this->db->select('que.QuestionId,que.QuestionName,que.AnswerTypeId,que.IsActive,qtype.AnswerName');
		$this->db->join('tblmstanswertype qtype','qtype.AnswerTypeId = que.AnswerTypeId', 'left');
		$result=$this->db->get('tblquestion que');
		
		$res=array();
		if($result->result())
		{
			$res=$result->result();
		}
		return $res;
	}


	
	
}
