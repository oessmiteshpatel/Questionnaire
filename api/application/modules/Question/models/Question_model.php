<?php

class Question_model extends CI_Model
 {

	/*############# ADD QUESTION ################ */
	public function addQuestion($post_Question) {
			
		if($post_Question) 
		{
			$questiontype=$post_Question['question'];
			$questionlabel=$post_Question['question1'];

			if($questiontype['IsActive']==1)
					{
						$IsActive = true;
					} else {
						$IsActive = false;
					}
			$Question_data = array(

				'QuestionName' => trim($questiontype['QuestionName']),
				'AnswerTypeId' => trim($questiontype['AnswerTypeId']),
				// 'QuestionId' => trim($post_question['QuestionId']),
				// 'QLabel' => trim($post_question['QLabel']),
				// 'QValue' => trim($post_question['QValue']),
				"IsActive"=>$IsActive,
				'CreatedBy' => trim($questiontype['CreatedBy']),
				"CreatedOn" =>date('y-m-d H:i:s')
				
			);
			
			$res = $this->db->insert('tblquestion',$Question_data);
			
			if($res)
			{
				$questionId = $this->db->insert_id();
					

				foreach($questionlabel as $question)
				{		if(isset($question['QValue']) && !empty($question['QValue']))
					{
						$QValue = trim($question['QValue']);
					}
					else
					{
						$QValue = null;
					}
						$Question_data2 = array(

							'QuestionId' => trim($questionId),
							'QLabel' => trim($question['QLabel']),
							'QValue' =>$QValue,
							"IsActive"=>1
						
						);
						
						$res2 = $this->db->insert('tblquestionanswer',$Question_data2);
				}
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
	/*############# ADD QUESTION  END ################ */
	

	/*############# EDIT QUESTION  START ################ */
	public function edit_Question($post_Question) {
		
		if($post_Question) 
		{
			$questiontype=$post_Question['question'];
			$questionlabel=$post_Question['question1'];
			if($questiontype['IsActive']==1)
					{
						$IsActive = true;
					} else {
						$IsActive = false;
					}
			$Question_data =array
					(
						'QuestionName' => trim($questiontype['QuestionName']),
						'AnswerTypeId' => trim($questiontype['AnswerTypeId']),
						'IsActive'=>$IsActive,
						 'UpdatedBy' => trim($questiontype['UpdatedBy']),
						 'UpdatedOn' =>date('y-m-d H:i:s')
					);
		
					$this->db->where('QuestionId',trim($questiontype['QuestionId']));
					$res1 = $this->db->update('tblquestion',$Question_data);

			// $this->db->where('QuestionId',$questiontype['QuestionId']);
			// $res = $this->db->delete('tblquestion');
			$this->db->where('QuestionId',$questiontype['QuestionId']);
			$res = $this->db->delete('tblquestionanswer');
			if($res)
			{
					foreach($questionlabel as $question)
					{		
						if(isset($question['QValue']) && !empty($question['QValue']))
						{
						$QValue = trim($question['QValue']);
						}
						else
						{
							$QValue = null;
						}
						$Question_data2 = array(

							'QuestionId' => trim($questiontype['QuestionId']),
							'QLabel' => trim($question['QLabel']),
							'QValue' =>$QValue,
							"IsActive"=>1
						
						);

						$res2 = $this->db->insert('tblquestionanswer',$Question_data2);
				}

			}else
			{
				return false;
			}
			
		} 
		else
		{
			return false;
		}
	}
	/*############# EDIT QUESTION  END ################ */


	

	/*############# GET QUESTION TYPE ################ */
	public function getlist_QuestionType()
	{
		$this->db->select('AnswerTypeId,AnswerName,DisplayText,IsActive');
		
		$this->db->where('IsActive=',1);
		$result=$this->db->get('tblmstanswertype');
		
		$res=array();
		if($result->result())
		{
			$res=$result->result();
		}
		return $res;
	}
	/*############# GET QUESTION TYPE END ################ */


	/*############# DELETE QUESTION START ################ */
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
	/*############# DELETE QUESTION END ################ */

	public function get_questiondatatypeans($question_id=Null)
	{
		if($question_id) {
			
			$this->db->select('QAnswerId,QuestionId,QLabel,QValue');
			$this->db->where('QuestionId',$question_id);
			$result = $this->db->get('tblquestionanswer');
			
			$res = array();
			if($result->result()) {
				$res = $result->result();
			}
			return $res;
			
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
		 $this->db->select('que.QuestionId,que.QuestionName,que.AnswerTypeId,qtype.AnswerName,qanstype.QLabel,qanstype.QValue,que.IsActive');
		 $this->db->join('tblmstanswertype qtype','qtype.AnswerTypeId = que.AnswerTypeId', 'left');
		 $this->db->join('tblquestionanswer qanstype','qanstype.QuestionId = que.QuestionId', 'left');
		 $this->db->where('que.QuestionId',$question_id);
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
		$this->db->select('que.QuestionId,que.QuestionName,que.AnswerTypeId,que.IsActive,qtype.AnswerName,(SELECT COUNT(can.CAnswerId) FROM tblcandidateanswer as can WHERE can.QuestionId=que.QuestionId) as isdisabled');
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
