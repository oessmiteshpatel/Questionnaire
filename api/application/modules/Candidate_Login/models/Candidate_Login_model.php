<?php

class Candidate_Login_model extends CI_Model {

	public function login($data) {
		
		$this->db->select('CandidateId,EmailAddress,AccessCode,StatusId');
		$this->db->from('tblcandidate');
		$this->db->where('EmailAddress',trim($data['EmailAddress']));
		$this->db->where('AccessCode',trim($data['AccessCode']));
		$this->db->where('StatusId !=',1);
		$this->db->limit(1);
		$query = $this->db->get();
		$res=$query->result();
		if ($query->num_rows() == 1) {			
			return $query->result();
		} else {
			return false;
		}
	}	
	
}
