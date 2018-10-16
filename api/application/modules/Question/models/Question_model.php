<?php

class Question_model extends CI_Model
 {

	public function add_Question($post_Question) {
			
		if($post_Question) {
			
			if($post_Question['IsActive']==1)
			{
				$IsActive = true;
			} else {
				$IsActive = false;
			}
			if(isset($post_Question['Ans']))
			{
				$Ans = $post_Question['Ans'];
			} else {
				$Ans = '';
			}
			$Question_data = array(

				'Ans' => trim($Ans),
				"IsActive"=>$IsActive
			
			);
			
			$res = $this->db->insert('tblquestans',$Question_data);
			
			if($res) {
				// $log_data = array(
				// 	'UserId' => trim($post_Question['CreatedBy']),
				// 	'Module' => 'Country',
				// 	'Activity' =>'Add'
	
				// );
				// $log = $this->db->insert('tblactivitylog',$log_data);
				return true;
			} else {
				return false;
			}
	
		} else {
			return false;
		}
	}
	
	// public function getlist_Country() {
	
	// 	//$this->db->select('*');
	// 	$this->db->select('co.CountryId,co.CountryName,co.CountryAbbreviation,co.PhonePrefix,co.IsActive,(SELECT COUNT(u.UserId) FROM tbluser as u WHERE u.CountryId=co.CountryId) as isdisabled');
	// 	$this->db->order_by('co.CountryName','asc');
	// 	$result = $this->db->get('tblmstcountry co');
	// 	$res = array();
	// 	if($result->result()) {
	// 		$res = $result->result();
	// 	}
	// 	return $res;
		
	// }
	
	
	// public function get_Countrydata($Country_Id = NULL)
	// {
		
	// 	if($Country_Id) {
			
	// 		$this->db->select('CountryId,CountryName,CountryAbbreviation,PhonePrefix,IsActive');
	// 		$this->db->where('CountryId',$Country_Id);
	// 		$result = $this->db->get('tblmstcountry');
			
	// 		$Question_data = array();
	// 		foreach($result->result() as $row) {
	// 			$Question_data = $row;
	// 		}
	// 		return $Question_data;
			
	// 	} else {
	// 		return false;
	// 	}
	// }
	
	
	// public function edit_Country($post_Question) {
	
	// 	if($post_Question) {
	// 		 if($post_Question['IsActive']==1)
	// 				{
	// 					$IsActive = true;
	// 				} else {
	// 					$IsActive = false;
	// 				}
	// 				$Question_data = array(
	// 			'CountryName' => trim($post_Question['CountryName']),
	// 			'CountryAbbreviation' => trim($post_Question['CountryAbbreviation']),
	// 			'PhonePrefix' => trim($post_Question['PhonePrefix']),
	// 			"IsActive"=>$IsActive,
	// 			"UpdatedBy" =>  trim($post_Question['UpdatedBy']),
	// 			'UpdatedOn' => date('y-m-d H:i:s')
			
	// 		);
			
	// 		$this->db->where('CountryId',$post_Question['CountryId']);
	// 		$res = $this->db->update('tblmstcountry',$Question_data);
			
	// 		if($res) {
	// 			$log_data = array(
	// 				'UserId' =>  trim($post_Question['UpdatedBy']),
	// 				'Module' => 'Country',
	// 				'Activity' =>'Update'
	
	// 			);
	// 			$log = $this->db->insert('tblactivitylog',$log_data);
	// 			return true;
	// 		} else {
	// 			return false;
	// 		}
	// 	} else {
	// 		return false;
	// 	}	
	
	// }
	
	
	// public function delete_Country($post_Question) {
	
	// 	if($post_Question) {
			
	// 		$this->db->where('CountryId',$post_Question['id']);
	// 		$res = $this->db->delete('tblmstcountry');
			
	// 		if($res) {
	// 			$log_data = array(
	// 				'UserId' => trim($post_Question['Userid']),
	// 				'Module' => 'Country',
	// 				'Activity' =>'Delete'

	// 			);
	// 			$log = $this->db->insert('tblactivitylog',$log_data);
	// 			return true;
	// 		} else {
	// 			return false;
	// 		}
	// 	} else {
	// 		return false;
	// 	}
		
	// }
	
}
