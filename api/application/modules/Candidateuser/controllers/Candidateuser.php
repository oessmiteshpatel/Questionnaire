<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Candidateuser extends CI_Controller {

	public function __construct()
	{ 
		parent::__construct();
		$this->load->model('Candidateuser_model');
	}
	
	public function addUser()
	{  
		$post_user = json_decode(trim(file_get_contents('php://input')), true);
		if ($post_user) 
			{
				$candidatevalue=$post_user['candidatevalue'];
				if($candidatevalue['CandidateId']>0)
				{
					$result = $this->Candidateuser_model->edit_user($post_user);
					if($result)
					{
						echo json_encode($post_user);	
					}	
				}
				else
				{
					$result = $this->Candidateuser_model->add_user($post_user); 
					if($result)
					{
						echo json_encode($post_user); 
						
					}	
				}
					
			}
	}
	/* ######### UPLOAD FILE START ########## */
	public function uploadFile($CandidateId)
	{
		if($_FILES)
		{
			$this->db->select('can.CandidateId,job.JobPositionName');
			$this->db->join('tblmstjobposition job','job.JobPositionId = can.JobPositionId', 'left');
			$this->db->where('can.CandidateId',$CandidateId);
			$result = $this->db->get('tblcandidate can');	
			$positionName = $result->result()[0]->JobPositionName;

			if(isset($_FILES['favicon']) && !empty($_FILES['favicon']))
			{	
				$dirname=str_replace(' ','_',$positionName);
				$directoryname="../src/assets/candidate/".$dirname."/";

				if(!is_dir($directoryname)){
					mkdir($directoryname, 0755, true);
					}

				$target_dir=$directoryname;
				$newfilename= str_replace(" ", "_", basename($_FILES["favicon"]["name"]));
				$target_file = $target_dir . $newfilename;
				move_uploaded_file($_FILES["favicon"]["tmp_name"], $target_file);
				
			}
			echo json_encode('success');
		}
	}

	/* ######### GET ALL CANDIDATE START ########## */
	public function getAllCandidate()
	{
			$data=$this->Candidateuser_model->getlist_user();
			if($data)
			{
				echo json_encode($data);
			}
			else
			{
				return false;
			}
	}
	/* ######### DELETE CANDIDATE START ########## */
	public function deleteCandidate() {
		$post_user = json_decode(trim(file_get_contents('php://input')), true);		
		if ($post_user)
		 {
			if($post_user['id'] > 0){
				$result = $this->Candidateuser_model->delete_candidate($post_user);
				if($result) {	
					echo json_encode("Delete successfully");
					}
		 	}
		} 
			
	}
	/* ######### GET BY ID START ########## */
	public function getById($Candidate_Id=null)
	{	
		if(!empty($Candidate_Id))
		{
			$data=[];
			$data['Users']=$this->Candidateuser_model->getCandidate($Candidate_Id);
			$data['QuestionAnswer']=$this->Candidateuser_model->get_userdata($Candidate_Id);
			//print_r($data); die;
			if($data['Users'] && $data['QuestionAnswer'])
			{
				echo json_encode($data);
			}
			else
			{
				return false;
			}
			
		}
	}

	/* ######### GETDEFAULT DATA START ########## */
	public function getAllDefaultData()
	{
		$data['jobpositon']=$this->Candidateuser_model->getJobPositionList();
		$data['question']=$this->Candidateuser_model->getQuestionList();

		echo json_encode($data);
	}

	/* ######### INVITE CANDIDATE START ########## */
	public function inviteCandidate()
	{  
		$data = json_decode(trim(file_get_contents('php://input')), true);
		if ($data) 
			{
				/*#######  GENERATE CODE  ########*/
				$chars = "0123456789";
				$AccessCode = "";
				for ($i = 0; $i < 6; $i++) {
					$AccessCode .= $chars[mt_rand(0, strlen($chars)-1)];
				}	

				$data['AccessCode']= $AccessCode;

				/*#######  PASS DATA TO MODEL  ########*/
				$result = $this->Candidateuser_model->inviteCandidate($data); 
				if($result)
				{
					$CandidateId=$result;
					$this->db->select('tu.EmailAddress');
					$this->db->where('tu.CandidateId',$CandidateId);
					$data = $this->db->get('tblcandidate as tu');

					foreach($data->result() as $row) {
						$EmailAddress = $row->EmailAddress;
					}
					
					$config['protocol'] = SMTP_PROTOCOL;
					$config['smtp_host'] = SMTP_HOST;
					$config['smtp_port'] = SMTP_PORT;
					$config['smtp_user'] = SMTP_EMAIL;
					$config['smtp_pass'] = SMTP_PASSWORD;  //sender's password
					$config['mailtype'] = 'html';
					$config['charset'] = 'iso-8859-1';
					$config['newline']="\r\n";
					$config['wordwrap'] = 'TRUE';

				/*#######  EMAIL TEMPLATE START  ########*/
				$loginpath = BASE_URL.'/login/';
				$subject = 'OpenEyes Software Soluations - Invitation';
				$message = '
					<table border="0" cellpadding="0" cellspacing="0" style="border:1px solid #333333; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto; width:600px">
						<tbody>
							<tr>
								<td style="background-color:#fff; background:#fff; padding:10px 10px 5px 10px; text-align:center"><img alt="" style="width:130px" src="https://devbyopeneyes.com/emailer_images/oess.png" /></td>
							</tr>
							<tr>
								<td style="border-width:0; padding:20px 10px 10px 10px; text-align:center">
								

								<p style="color:#000; font-size: 18px; line-height: 18px; font-weight: bold; padding: 0; margin: 0 0 10px;">Find your login credential for 	Questionnaire below:</p>

								<table border="0" cellpadding="0" cellspacing="0" style="margin:20px 0; width:100%; color:#000000; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto;">
									<tbody>
										<tr>
											<td style="padding:5px; text-align:right; width:35%">Login Id</td>
											<td style="padding:5px; text-align:center; width:4%">:</td>
											<td style="padding:5px; text-align:left; width:48%">'.$EmailAddress.'</td>
										</tr>
										<tr>
											<td style="padding:5px; text-align:right; width:35%">Password</td>
											<td style="padding:5px; text-align:center; width:4%">:</td>
											<td style="padding:5px; text-align:left; width:48%">'.$AccessCode.'</td>
										</tr>
									</tbody>
								</table>
								<p style="color:#000; font-size: 14px; line-height:20px; padding: 0; margin:20px 0 0;">Use the button below to access your account:</p>
								</td>
							</tr>
							<tr>
								<td style="border-width:0; padding:0; text-align:center; vertical-align:middle">
								<table border="0" cellpadding="0" cellspacing="0" style="border:0; font-family:Arial,Helvetica,sans-serif; font-size:15px; line-height:22px; margin:0 auto">
									<tbody>
										<tr>
											<td style="background-color:#0061AF; background:#0061AF; border-radius:4px; border-width:0; clear:both; color:#ffffff; font-size:14px; line-height:13px; opacity:1; padding:10px; text-align:center; text-decoration:none; width:130px"><a href="'.$loginpath.'" style="color:#fff; text-decoration:none;">Login to Account</a></td>
										</tr>
									</tbody>
								</table>
								</td>
							</tr>
							<tr>
								<td style="border-width:0; padding:20px 10px 10px 10px; text-align:center; vertical-align:middle">
									<p style="color:#777; font-size: 12px; line-height:20px; padding: 0; margin: 0 0 10px; text-align: left;">If you&rsquo;re having trouble with the button above, copy and paste the URL below into your web browser. <a href="'.$loginpath.'" style="cursor:pointer;">click here</a></p>
								</td>
							</tr>
							<tr>
								<td style="background-color:#a6ce39; background:#a6ce39; border-top:1px solid #cccccc; color:#000; font-size:13px; padding:7px; text-align:center">Copyright &copy; 2019 OpenEyes Software Solutions</td>
							</tr>
						</tbody>
					</table>
					';
				/*#######  EMAIL TEMPLATE END  ########*/

				$this->email->initialize($config); 
				$this->email->from(FROM_EMAIL,FROM_USER);
				$this->email->to($EmailAddress);
				$this->email->subject($subject);
				$this->email->message($message);

				if($this->email->send())
				{
					$email_log = array(
						'From' => SMTP_EMAIL,
						'To' => $EmailAddress,
						'Subject' => $subject,
						'MessageBody' => $message,
					);
					$res = $this->db->insert('tblemaillog',$email_log);
					echo json_encode("success");
				}		
				else
				{
					return false;
				}	
			}
	}
	else
	{
		return false;
	}
	

	}
	/* ######### INVITE CANDIDATE END ########## */


	/* ######### INVITED  CANDIDATE LIST ########## */
	public function invitedCandidateList()
	{
			$data=$this->Candidateuser_model->invitedCandidateList();
			if($data)
			{
				echo json_encode($data);
			}
			else
			{
				return false;
			}
	}

	/* ######### REVOKE  CANDIDATE ########## */
	public function revokeCandidate()
	{
		$postdata = json_decode(trim(file_get_contents('php://input')), true);		

		if($postdata)
		{
			$data=$this->Candidateuser_model->revokeCandidate($postdata);
			if($data)
			{
				echo json_encode($data);
			}
			else
			{
				return false;
			}
		}
			
	}
	/* ######### REVOKE  CANDIDATE  END ########## */


	/* ######### REINVITE  CANDIDATE START ########## */
	public function reInviteCandidate()
	{
		$postdata = json_decode(trim(file_get_contents('php://input')), true);		

		if($postdata)
		{
			$data=$this->Candidateuser_model->reInviteCandidate($postdata);
			if($data)
			{
				echo json_encode($data);
			}
			else
			{
				return false;
			}
		}
			
	}
	/* ######### REINVITE  CANDIDATE  END ########## */

	
}
