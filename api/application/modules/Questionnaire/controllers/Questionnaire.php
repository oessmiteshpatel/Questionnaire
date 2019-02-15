<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Questionnaire extends CI_Controller {

	public function __construct()
	{ 
		parent::__construct();
		$this->load->model('Questionnaire_model');
	}
	
	//###################################### GET QUESTIONS #######################################
	public function getQuestion() {
		$post_candidateInfo = json_decode(trim(file_get_contents('php://input')), true);
		if ($post_candidateInfo) {
			$data = $this->Questionnaire_model->getQuestion($post_candidateInfo);
			echo json_encode($data);
		}
    }
	//###### END - GET QUESTIONS #######

	//###################################### SET ANSWER #######################################
	public function setAnswer() {
		$post_questionAnswer = json_decode(trim(file_get_contents('php://input')), true);
		if ($post_questionAnswer) {			
			$result = $this->Questionnaire_model->setAnswer($post_questionAnswer);
			if($result) {
				echo json_encode($result);	
			}						
		}
	}
	//####### END - SET ANSWER #######

	//###################################### SUBMIT QUESTIONNAIRE FORM #######################################
	public function questionnaireSubmit() {
		$post_questionnaire = json_decode(trim(file_get_contents('php://input')), true);
		if ($post_questionnaire) {			
			$result = $this->Questionnaire_model->questionnaireSubmit($post_questionnaire);
			if($result) {
				echo json_encode($result);	
			}						
		}
	}
	//####### END - SUBMIT QUESTIONNAIRE FORM #######

		
}
