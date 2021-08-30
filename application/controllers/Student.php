<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
    
    public $categoriesNames = array("1"=>"Sanitation", "2"=>"Crowd Management", "3"=>"Health", "4"=>"Environment", "5"=>"Digital Solutions");
    public $ideaStaus = array("0" => "Yet to Submit Idea", "1" => "Idea successfully submitted.", "2" => "Evulation Process GoingOn", "3" => "Selected in Round - 1", "4" => "Rejected in Round - 1", "5" => "Selected in Round - 2", "6" => "Rejected in Round - 2", "7" => "Selected in Round - 3", "8" => "Rejected in Round - 3", "9" => "Winner");
    public $ideaStausColor = array("0" => "sky-blue", "1" => "royal-blue", "2" => "orange", "3" => "green", "4" => "red", "5" => "green", "6" => "red", "7" => "green", "8" => "red", "9" => "violet");
    
	function index(){
		$this->login();
	}

	function login(){
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
	   	$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run() == FALSE) 	
	    {
			$data['page_title'] = "Student Login";
			$data['action'] = 'student/login';
			$this->student_template->show('student/login',$data);
	    }else{
			$mobile = $this->input->post('mobile');  
            $password = $this->input->post('password');  
	    	$result = $this->data_model->login($mobile, md5($password));
			if($result){
				$sess_array = array(
					'id' => $result->id,
					'student_name' => $result->student_name,
					'mobile' => $result->mobile,
					'team_name' => $result->team_name,
				);
				$this->session->set_userdata('logged_in', $sess_array);
			    redirect(base_url() . 'student/dashboard');
			}else{
				$this->session->set_flashdata('message', 'Invalid Username and Password');
				redirect(base_url() . 'student/login'); 
			}
	   }
	}

	function check_database($password){
		//Field validation succeeded.  Validate against database
		$mobile = $this->input->post('mobile');
		
   		//query the database
   		$result = $this->data_model->login($mobile, md5($password));
   		if($result)
   		{
     	  $sess_array = array();
     	  foreach($result as $row)
          {
       		$sess_array = array(
				'id' => $row->id,
         		'student_name' => $row->student_name
       		);
       	   $this->session->set_userdata('logged_in', $sess_array);
          }
          return TRUE;
		}
   		else
   		{
     		$this->form_validation->set_message('check_database', 'Invalid username or password');
     		return false;
   		}
 	}

	 function dashboard(){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['student_name'] = $session_data['student_name'];
		 $data['team_name'] = $session_data['team_name'];
		 $data['page_title'] = "Dashboard";
		 $data['ideaStaus'] = $this->ideaStaus;
		 $data['ideaStausColor'] = $this->ideaStausColor;
		 
		 $data['Idea'] = $this->data_model->getDetailsbyfield($data['id'], 'student_id', 'ideas')->row();
		 
		 $this->student_template->show('student/dashboard',$data);
	   }else{
	    redirect('student', 'refresh');
	   }
	 }
	 
	 function learning(){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['student_name'] = $session_data['student_name'];
		 $data['team_name'] = $session_data['team_name'];
		 $data['page_title'] = "Learning";
		 
		 $data['details'] = $this->data_model->getDetailsbyfield('1', 'status', 'learning')->result();
		 
		 $this->student_template->show('student/learning',$data);
	   }else{
	    redirect('student', 'refresh');
	   }
	 }
	 
	 function ideas(){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['student_name'] = $session_data['student_name'];
		 $data['team_name'] = $session_data['team_name'];
		 $data['page_title'] = "Ideas";
		 
		 $data['categoriesNames'] = $this->categoriesNames;
		 $data['ideaStaus'] = $this->ideaStaus;
		 $data['ideaStausColor'] = $this->ideaStausColor;
		 
		 $data['Idea'] = $this->data_model->getDetailsbyfield($data['id'], 'student_id', 'ideas')->row();
		 if($data['Idea']){
		     $data['details'] = $this->data_model->getDetailsbyfield($data['id'], 'id', 'students')->row();
		 }
		 
		 $this->student_template->show('student/ideas',$data);
	   }else{
	    redirect('student', 'refresh');
	   }
	 }
	 
	 function submitIdea($category){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['student_name'] = $session_data['student_name'];
		 $data['team_name'] = $session_data['team_name'];
		 $data['page_title'] = $this->categoriesNames[$category]." - Submit Idea";
		 $data['action'] = 'student/submitIdea/'.$category;
// 		 print_r($this->categoriesNames);

         $Idea_check = $this->data_model->getDetailsSelectField('count(id) as cnt', 'student_id', $data['id'], 'ideas')->row();
         if($Idea_check->cnt){
             redirect('student/ideas');
         }else{
             $this->form_validation->set_rules('ques1', 'above', 'trim|required');
    		 $this->form_validation->set_rules('ques2', 'above', 'trim|required');
    		 $this->form_validation->set_rules('ques3', 'above', 'trim|required');
    		 $this->form_validation->set_rules('ques4', 'above', 'trim|required');
    		 $this->form_validation->set_rules('ques5', 'above', 'trim|required');
    		 $this->form_validation->set_rules('ques6', 'above', 'trim|required');
    		 if ($this->form_validation->run() === FALSE){
    			$this->student_template->show('student/submit_idea',$data);
    		 }else{
    		    $insertData = array('student_id' => $data['id'],
    		                        'category_id' => $category,
                                    'ques1' => $this->input->post('ques1'),
    								'ques2' => $this->input->post('ques2'),
    								'ques3' => $this->input->post('ques3'),
    								'ques4' => $this->input->post('ques4'),
    								'ques5' => $this->input->post('ques5'),
    								'ques6' => $this->input->post('ques6'),
    								'status' => '1',
    								'submitted_date' => date('Y-m-d H:i:s')
    							);
    		    $result = $this->data_model->insertDetails('ideas', $insertData);  
    		    
    		    redirect('student/ideas');	    
    		 }    
         }
		 
		 
	   }else{
	    redirect('student', 'refresh');
	   }
	 }
	 
	 function my_team(){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['student_name'] = $session_data['student_name'];
		 $data['team_name'] = $session_data['team_name'];
		 $data['page_title'] = $data['team_name'].' Team';
		 
		 $data['details'] = $this->data_model->getDetailsSelectField('*', 'team_id', $data['id'], 'teams')->result();
		 
		 $this->student_template->show('student/my_team',$data);
	   }else{
	    redirect('student', 'refresh');
	   }
	 }
	 
	 function new_member(){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['student_name'] = $session_data['student_name'];
		 $data['team_name'] = $session_data['team_name'];
		 $data['page_title'] = "Add New Member";
		 $data['action'] = 'student/new_member';
		 
		 $this->form_validation->set_rules('member_name', 'Name', 'trim|required');
		 $this->form_validation->set_rules('member_mobile', 'Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]|callback_mobile_check');
		 $this->form_validation->set_rules('member_email', 'Email', 'trim|required|valid_email|callback_email_check');
		 if ($this->form_validation->run() === FALSE){
		     
			$this->student_template->show('student/new_member',$data);
		 }else{
		     
		    $insertData = array('team_id' => $data['id'],
                                'member_name' => $this->input->post('member_name'),
								'member_mobile' => $this->input->post('member_mobile'),
								'member_email' => $this->input->post('member_email'),
								'created_on' => date('Y-m-d H:i:s')
							);
		    $result = $this->data_model->insertDetails('teams', $insertData);  
		    
		    if ($result) {
        		    $this->session->set_flashdata('message', 'Team member details added successfully..!!');
        		    $this->session->set_flashdata('status', 'alert-success');
        	}else {
        		    $this->session->set_flashdata('message', 'Oops..!! Something went wrong. Please try again later..!!');
        		    $this->session->set_flashdata('status', 'alert-danger');
			}
			redirect('student/my_team');
		 }
		 
	   }else{
	    redirect('student', 'refresh');
	   }
	 }
	 
	 function edit_member($member_id){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['student_name'] = $session_data['student_name'];
		 $data['team_name'] = $session_data['team_name'];
		 $data['page_title'] = "Edit Member Details";
		 $data['action'] = 'student/edit_member/'.$member_id;
		 
		 $this->form_validation->set_rules('member_name', 'Name', 'trim|required');
		 $this->form_validation->set_rules('member_mobile', 'Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]|callback_mobile_check');
		 $this->form_validation->set_rules('member_email', 'Email', 'trim|required|valid_email');
		 if ($this->form_validation->run() === FALSE){
		    $data['details'] = $this->data_model->getDetails('teams', $member_id)->row();
			$this->student_template->show('student/edit_member',$data);
		 }else{
		     
		    $updateData = array('member_name' => $this->input->post('member_name'),
								'member_mobile' => $this->input->post('member_mobile'),
								'member_email' => $this->input->post('member_email'),
								'created_on' => date('Y-m-d H:i:s')
							);
		    $result = $this->data_model->updateDetails($member_id, $updateData, 'teams');  
		    
		    if ($result) {
        		    $this->session->set_flashdata('message', 'Team member details updated successfully..!!');
        		    $this->session->set_flashdata('status', 'alert-success');
        	}else {
        		    $this->session->set_flashdata('message', 'Oops..!! Something went wrong. Please try again later..!!');
        		    $this->session->set_flashdata('status', 'alert-danger');
			}
			redirect('student/my_team');
		 }
		 
	   }else{
	    redirect('student', 'refresh');
	   }
	 }
	 
	 function mobile_check($mobile){
	     
	     $students_check = $this->data_model->getDetailsSelectField('count(id) as cnt', 'mobile', $mobile, 'students')->row();
	     $teams_check = $this->data_model->getDetailsSelectField('count(id) as cnt', 'member_mobile', $mobile, 'teams')->row();
	     if($students_check->cnt == 0 && $teams_check->cnt == 0){
	         return TRUE;
	     } else {
	        $this->form_validation->set_message('mobile_check', 'Mobile number is already registered.');
    	    return FALSE;
        }
	 }
	 
	 function email_check($email){
	     
	     $students_check = $this->data_model->getDetailsSelectField('count(id) as cnt', 'email', $email, 'students')->row();
	     $teams_check = $this->data_model->getDetailsSelectField('count(id) as cnt', 'member_email', $email, 'teams')->row();
	     if($students_check->cnt == 0 && $teams_check->cnt == 0){
	         return TRUE;
	     } else {
	        $this->form_validation->set_message('email_check', 'Email ID is already registered.');
    	    return FALSE;
        }
	 }
	 
	 function my_profile(){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['student_name'] = $session_data['student_name'];
		 $data['team_name'] = $session_data['team_name'];
		 $data['page_title'] = "My Profile";
		 
		 $data['details'] = $this->data_model->getDetails('students', $data['id'])->row();
// 		 $data['details'] = $this->data_model->getDetails('students', $data['details']->college_id)->row();
		 
		 $this->student_template->show('student/my_profile',$data);
	   }else{
	    redirect('student', 'refresh');
	   }
	 }
 
	public function register()
	{
		$data['page_title'] = "Registration";
		$data['action'] = 'student/register';
		$data['statesList'] = array(' ' => "Select State")+$this->getUniqueStates();
		
		$data['programOptions'] = array(' ' => "Select Program")+$this->globals->programs();
		$data['levelOptions'] = array(' ' => "Select Level")+$this->globals->levels();

		$this->form_validation->set_rules('state', 'State', 'required');
		$this->form_validation->set_rules('district', 'District', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('program', 'Program', 'required');
		$this->form_validation->set_rules('college', 'College', 'required|min_length[5]');
		if ($this->form_validation->run() === FALSE){
			$this->student_template->show('student/registration',$data);
		}else{

			$state = $this->input->post('state');
			$district = $this->input->post('district');
			$city = $this->input->post('city');
			$level = $this->input->post('level');
			$program = $this->input->post('program');
			$college = $this->input->post('college');
			$combineData = $state.','.$district.','.$city.','.$level.','.$program.','.$college;
			$encryptedCollege = base64_encode($this->encrypt->encode($combineData));
			redirect('student/proceed/'.$encryptedCollege);

		}
	}

	public function proceed($encryptedCollege)
	{
		
		$data['page_title'] = "Registration";
		$data['action'] = 'student/proceed/'.$encryptedCollege;
		$this->form_validation->set_rules('student_name', 'Student Name', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]|callback_mobile_check');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('team_name', 'Team Name', 'trim|required|is_unique[students.team_name]');
		if ($this->form_validation->run() === FALSE){
			$this->student_template->show('student/proceed',$data);
		}else{

			$combineData = $this->encrypt->decode(base64_decode($encryptedCollege));
			$splitData = explode(",",$combineData);
			
			$student_name = $this->input->post('student_name');
			$mobile = $this->input->post('mobile');
			$email = $this->input->post('email');
			$team_name = $this->input->post('team_name');

			// CHECK MOBILE, EMAIL, TEAM_NAME
			$mobile_check = $this->data_model->getDetailsSelectField('count(id) as cnt', 'mobile', $mobile, 'students')->row();
			if(!$mobile_check->cnt){
				$email_check = $this->data_model->getDetailsSelectField('count(id) as cnt', 'email', $email, 'students')->row();	
				if(!$email_check->cnt){
						$team_check = $this->data_model->getDetailsSelectField('count(id) as cnt', 'team_name', $team_name, 'students')->row();		
						if(!$team_check->cnt){
							// INSERT 
							$insertData = array('student_name' => $this->input->post('student_name'),
										'mobile' => $this->input->post('mobile'),
										'password' => md5($this->input->post('password')),
										'email' => $this->input->post('email'),
										'team_name' => $this->input->post('team_name'),
										'state' => $splitData[0],
										'district' => $splitData[1],
										'city' => $splitData[2],
										'level' => $splitData[3],
										'program' => $splitData[4],
										'college' => $splitData[5],
										'reg_date' => date('Y-m-d H:i:s'),
										'status' => '1'
									);

							$result = $this->data_model->insertDetails('students', $insertData);
							if($result){
								$status = '1';
							}else{
								$status = '2';
							}

						}else{
							$status = "team_name";			
						}
				}else{
					$status = "email";	
				}
			}else{
				$status = "mobile";
			} 			
			
			$encryptedStatus = base64_encode($this->encrypt->encode($status));
		  	redirect('student/complete/'.$encryptedStatus, 'refresh');

		}
	}

	public function complete($encryptedStatus){
		$data['page_title'] = "Registration";
		$data['status'] = $this->encrypt->decode(base64_decode($encryptedStatus));
		$this->student_template->show('student/complete',$data);
	}

	public function getUniqueStates()
	{
		$statesList = $this->data_model->getUniqueStates()->result();
		$result = array();
		foreach($statesList as $statesList1){
			$result[$statesList1->state] = $statesList1->state;
		}
		return $result;
	}

	public function districtList()
	{
		$state = $this->input->post('state');
		$districtList = $this->data_model->getUniqueDistrict($state)->result();
		$result[] = '<option value=" ">Select District</option>';
		foreach($districtList as $districtList1){
			$result[] = '<option value="'.$districtList1->district.'">'.$districtList1->district.'</option>';
		}
		print_r($result);
	}

	public function cityList()
	{
		$state = $this->input->post('state');
		$district = $this->input->post('district');
		$cityList = $this->data_model->getUniqueCity($state, $district)->result();
		$result[] = '<option value=" ">Select City</option>';
		foreach($cityList as $cityList1){
			$result[] = '<option value="'.$cityList1->city.'">'.$cityList1->city.'</option>';
		}
		print_r($result);
	}

	public function levelList()
	{
		$state = $this->input->post('state');
		$district = $this->input->post('district');
		$city = $this->input->post('city');
		$levelList = $this->data_model->getUniqueLevels($state, $district, $city)->result();
		$result[] = '<option value=" ">Select Level</option>';
		foreach($levelList as $levelList1){
			$result[] = '<option value="'.$levelList1->level.'">'.$levelList1->level.'</option>';
		}
		print_r($result);
	}

	public function programList()
	{
		$state = $this->input->post('state');
		$district = $this->input->post('district');
		$city = $this->input->post('city');
		$level = $this->input->post('level');

		$programList = $this->data_model->getUniqueProgrms($state, $district, $city, $level)->result();
		$result[] = '<option value=" ">Select Program</option>';
		foreach($programList as $programList1){
			$result[] = '<option value="'.$programList1->program.'">'.$programList1->program.'</option>';
		}
		print_r($result);
	}

	public function collegesList()
	{
		$state = $this->input->post('state');
		$district = $this->input->post('district');
		$city = $this->input->post('city');
		$level = $this->input->post('level');
		$program = $this->input->post('program');

		$collegesList = $this->data_model->getUniqueColleges($state, $district, $city, $level, $program)->result();
		$result[] = '<option value=" ">Select College</option>';
		foreach($collegesList as $collegesList1){
			$result[] = '<option value="'.$collegesList1->id.'">'.$collegesList1->college_name.'</option>';
		}
		print_r($result);
	}

	function logout()
	{
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('student', 'refresh');
	}

}