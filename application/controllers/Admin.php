<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public $categoriesNames = array("1"=>"Sanitation", "2"=>"Crowd Management", "3"=>"Health", "4"=>"Environment", "5"=>"Digital Solutions");
    public $ideaStaus = array("0" => "Yet to Submit Idea", "1" => "Idea successfully submitted.", "2" => "Evulation Process GoingOn", "3" => "Selected in Round - 1", "4" => "Rejected in Round - 1", "5" => "Selected in Round - 2", "6" => "Rejected in Round - 2", "7" => "Selected in Round - 3", "8" => "Rejected in Round - 3", "9" => "Winner");
    public $ideaStausColor = array("0" => "sky-blue", "1" => "royal-blue", "2" => "orange", "3" => "green", "4" => "red", "5" => "green", "6" => "red", "7" => "green", "8" => "red", "9" => "violet");
    
    
	function index(){
	    $this->form_validation->set_rules('username', 'Username', 'trim|required');
	   	$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run() == FALSE) 	
	    {
			$data['page_title'] = "Admin Login";
			$data['action'] = 'admin';
			$this->login_template->show('admin/login',$data);
	    }else{
			$username = $this->input->post('username');
            $password = $this->input->post('password');
	    	$result = $this->data_model->adminLogin($username, md5($password));
			if($result){
				$sess_array = array(
					'id' => $result->id,
					'username' => $result->username
				);
				$this->session->set_userdata('logged_in', $sess_array);
			    redirect(base_url() . 'admin/dashboard');
			}else{
				$this->session->set_flashdata('message', 'Invalid Username and Password');
				redirect(base_url() . 'admin'); 
			}
	   }
	}

	 function dashboard(){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Dashboard";
		 $data['menu_active'] = "dashboard";
		 $data['categoriesNames'] = $this->categoriesNames;
		 $categories = $this->data_model->categoryCount()->result();
		 $categoriesArray = array();
		 foreach($categories as $categories1){
		     $categoriesArray[$categories1->category_id] = $categories1->cnt;
		 }
		 $data['categoryCount'] = $categoriesArray; 
		 
		 $this->admin_template->show('admin/dashboard',$data);
	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 function students(){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Students";
		 $data['menu_active'] = "students";                                          
		 
		 $data['programOptions'] = array('all' => "All Program")+$this->globals->programs();
		 $data['levelOptions'] = array('all' => "All Level")+$this->globals->levels();
		 $data['statesList'] = array('all' => "All States")+$this->uniqueStates();
		 
		 $this->admin_template->show('admin/students',$data);
	   }else{
	    redirect('admin/logout', 'refresh');                                                                                              
	   }
	 }

    
    function getStudentsList(){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Students";
		 $data['menu_active'] = "students";                                          
		 
		 $state = $this->input->post('state');    
	     $district = $this->input->post('district');
		 $city =  $this->input->post('city');
		 $level = $this->input->post('level');
		 $program = $this->input->post('program');
		 
		 
		 $details = $this->data_model->getStudentsList($state, $district, $city, $level, $program)->result();
		 
		 if($details){
		     $return = null;
		        $table_setup = array ('table_open'=> '<table class="table table-hover tx-14 tx-nowrap mg-b-0 pl-10" id="js_dataTable">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
				                        array('data' =>'S.No', 'style'=>'width:5%;'),
				                        array('data' =>'Student Name','style'=>'width:20%;'),
				                        array('data' =>'Mobile','style'=>'width:15%;'),
				                        array('data' =>'Email','style'=>'width:15%;'),
				                        array('data' =>'Team Name','style'=>'width:15%;'),
				                        array('data' =>'State','style'=>'width:15%;'),
				                        array('data' =>'District','style'=>'width:15%;'),
				                        array('data' =>'City','style'=>'width:15%;'),
				                        array('data' =>'Level','style'=>'width:15%;'),
				                        array('data' =>'Program','style'=>'width:15%;'),
				                        array('data' =>'College','style'=>'width:15%;')
				                        );
			    $i=1;
			    foreach($details as $details1){
			        $this->table->add_row($i++,
				                  $details1->student_name,
				                  $details1->mobile,
				                  $details1->email,
				                  anchor('admin/team_details/'.$details1->id, $details1->team_name,'class="text-danger"'),
				                  $details1->state,
				                  $details1->district,
				                  $details1->city,
				                  $details1->level,
				                  $details1->program,
				                  $details1->college
				              );
			    }
			$return = '<div class="table-responsive">'.$this->table->generate().'</div>';    
		 }else{
		     $return = "<h5 class='text-center text-muted mt-5'>Students not yet registered.</h5>";
		 }
		 
		 print_r($return);
		 
	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 function getStudentsListDownload(){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Students";
		 $data['menu_active'] = "students";                                          
		 
		 $state = $this->input->post('state');    
	     $district = $this->input->post('district');
		 $city =  $this->input->post('city');
		 $level = $this->input->post('level');
		 $program = $this->input->post('program');
		 
		 
		 $details = $this->data_model->getStudentsList($state, $district, $city, $level, $program)->result();
		 
		 if($details){
		     $return = null;
		        $table_setup = array ('table_open'=> '<table class="table table-hover tx-14 tx-nowrap mg-b-0 pl-10" id="js_dataTable">');
				$this->table->set_template($table_setup);
				$this->table->set_heading(
				                        array('data' =>'S.No', 'style'=>'width:5%;'),
				                        array('data' =>'Student Name','style'=>'width:20%;'),
				                        array('data' =>'Mobile','style'=>'width:15%;'),
				                        array('data' =>'Email','style'=>'width:15%;'),
				                        array('data' =>'Team Name','style'=>'width:15%;'),
				                        array('data' =>'State','style'=>'width:15%;'),
				                        array('data' =>'District','style'=>'width:15%;'),
				                        array('data' =>'City','style'=>'width:15%;'),
				                        array('data' =>'Level','style'=>'width:15%;'),
				                        array('data' =>'Program','style'=>'width:15%;'),
				                        array('data' =>'College','style'=>'width:15%;')
				                        );
			    $i=1;
			    foreach($details as $details1){
			        $this->table->add_row($i++,
				                  $details1->student_name,
				                  $details1->mobile,
				                  $details1->email,
				                  anchor('admin/team_details/'.$details1->id, $details1->team_name,'class="text-danger"'),
				                  $details1->state,
				                  $details1->district,
				                  $details1->city,
				                  $details1->level,
				                  $details1->program,
				                  $details1->college
				              );
			    }
			$table = $this->table->generate();    
		 }else{
		    $table = "<h5 class='text-center text-muted mt-5'>Students not yet registered.</h5>";
		 }
		 
		 
		 $response =  array(
                        'op' => 'ok',
                        'file' => "data:application/vnd.ms-excel;base64,".base64_encode($table)
                    );
            die(json_encode($response));
		 
	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 function team_details($id){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Students";
		 $data['menu_active'] = "students";
		 
		 $data['details'] = $this->data_model->getDetails('students', $id)->row();
		 $data['team_members'] = $this->data_model->getDetailsbyfield($id, 'team_id', 'teams')->result();
		 
		 $this->admin_template->show('admin/team_details',$data);
	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 
	 function search($mobile = null){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Students";
		 $data['menu_active'] = "students";
		 
         if($mobile){
            $data['details'] = $this->data_model->getDetailsbyfield($mobile, 'mobile', 'students')->row();
		    $data['team_members'] = $this->data_model->getDetailsbyfield($data['details']->id, 'team_id', 'teams')->result();    
         }else{
            $data['details'] = null; 
            $data['team_members'] = null;
         }
         
		 $this->admin_template->show('admin/team_details',$data);
		 
	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 function ideas(){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Ideas";
		 $data['menu_active'] = "ideas";
		 
		 $data['categoriesNames'] = $this->categoriesNames;
		 $data['ideaStaus'] = $this->ideaStaus;
		 $data['ideaStausColor'] = $this->ideaStausColor;
		 
		 $data['details'] = $this->data_model->getIdeas(null)->result();
		 
		 $this->admin_template->show('admin/ideas',$data);
	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 function ideaDetails($id){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Ideas";
		 $data['menu_active'] = "ideas";
		 
		 $data['categoriesNames'] = $this->categoriesNames;
		 $data['ideaStaus'] = $this->ideaStaus;
		 $data['ideaStausColor'] = $this->ideaStausColor;
		 
		 $data['details'] = $this->data_model->getIdeas($id)->row();
		 
		 $this->admin_template->show('admin/idea_details',$data);
	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 
	 function learning(){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Learning";
		 $data['menu_active'] = "learning";
		 
		 $data['details'] = $this->data_model->getDetails('learning',null)->result();
		 
// 		 $data['team_members'] = $this->data_model->getDetailsbyfield($id, 'team_id', 'teams')->result();
		 
		 $this->admin_template->show('admin/learning',$data);
	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 
	 function addLearning(){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Learning";
		 $data['menu_active'] = "learning";
		 
		 $data['action'] = "admin/addLearning";
		 
		 $this->form_validation->set_rules('title', 'Title', 'required');
    	 $this->form_validation->set_rules('url', 'URL', 'required');
    	
    	 if ($this->form_validation->run() === FALSE){
           $this->admin_template->show('admin/add_learning',$data);
		 }else{
		    $title = $this->input->post('title');
			$url = $this->input->post('url');
			
			 $insertData = array('title' => $this->input->post('title'),
								'url' => $this->input->post('url'),
								'status' => '1',
								'created_by' => $data['username'],
								'created_on' => date('Y-m-d H:i:s')
							);
		    $result = $this->data_model->insertDetails('learning', $insertData);  
		    if ($result) {
    			$this->session->set_flashdata('message', 'Learning details added successfully..!!');
    			$this->session->set_flashdata('status', 'alert-success');
            }else {
                $this->session->set_flashdata('message', 'Oops..!! Something went wrong. Please try again later..!!');
            	$this->session->set_flashdata('status', 'alert-warning');
    		} 
    
    		redirect('admin/learning');
			
		 }

	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 function learningSatus($id, $status){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Learning";
		 $data['menu_active'] = "learning";
		 
		    $updateData = array('status' => $status);
		    $result = $this->data_model->updateDetails($id, $updateData, 'learning');  
		    
		    if ($result) {
    			$this->session->set_flashdata('message', 'Learning status updated successfully..!!');
    			$this->session->set_flashdata('status', 'alert-success');
            }else {
                $this->session->set_flashdata('message', 'Oops..!! Something went wrong. Please try again later..!!');
            	$this->session->set_flashdata('status', 'alert-warning');
    		} 
    
    		redirect('admin/learning');
			 

	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 function deleteLearning($id){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Learning";
		 $data['menu_active'] = "learning";
		 
		    $result = $this->data_model->delDetails('learning', $id);  
		    
		    if ($result) {
    			$this->session->set_flashdata('message', 'Learning details deleted successfully..!!');
    			$this->session->set_flashdata('status', 'alert-success');
            }else {
                $this->session->set_flashdata('message', 'Oops..!! Something went wrong. Please try again later..!!');
            	$this->session->set_flashdata('status', 'alert-warning');
    		} 
    
    		redirect('admin/learning');
			 

	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 function evaluators(){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Evaluators";
		 $data['menu_active'] = "evaluators";
		 
		 $data['details'] = $this->data_model->getDetails('evaluators',null)->result();
		 
		 $this->admin_template->show('admin/evaluators',$data);
	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 function addEvaluator(){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Evaluators";
		 $data['menu_active'] = "evaluators";
		 
		 $data['action'] = "admin/addEvaluator";
		 
		 $this->form_validation->set_rules('username', 'Username', 'required|is_unique[evaluators.username]');
    	 $this->form_validation->set_rules('name', 'Evaluator Name', 'required');
    	 $this->form_validation->set_rules('mobile', 'Mobile', 'trim|regex_match[/^[0-9]{10}$/]');
		 $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
// 		 $this->form_validation->set_rules('categories', 'Categories', 'required|callback_check_categories');
    	 
    	 if ($this->form_validation->run() === FALSE){
           $this->admin_template->show('admin/add_evaluator',$data);
		 }else{
		     $categories = $this->input->post('categories');
		     $categoriesList = implode(",",$categories);
		     $insertData = array('username' => $this->input->post('username'),
								'name' => $this->input->post('name'),
								'password' => md5("INDIA"),
								'mobile' => $this->input->post('mobile'),
								'email' => $this->input->post('email'),
								'categories' => $categoriesList,
								'status' => '1'
							);
							
		    $result = $this->data_model->insertDetails('evaluators', $insertData);  
		    if ($result) {
    			$this->session->set_flashdata('message', 'Evaluator details added successfully..!!');
    			$this->session->set_flashdata('status', 'alert-success');
            }else {
                $this->session->set_flashdata('message', 'Oops..!! Something went wrong. Please try again later..!!');
            	$this->session->set_flashdata('status', 'alert-warning');
    		} 
    
    		redirect('admin/evaluators');
			
		 }

	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 function check_categories($categories){
	    if(!empty($categories)) {
	        $this->form_validation->set_message('Categories', 'Mobile number is already registered.');
			return TRUE;
		} else {
			$this->form_validation->set_message('Categories', 'Select atleast one category.');
			return FALSE;
		}
	 }
	 
	 function generateUsername() {
	    $name = $this->input->post('name');
        $pattern = " ";
        
        // $firstPart = strstr(strtolower($name), $pattern, true);
        // $secondPart = substr(strstr(strtolower($name), $pattern, false), 0,3);
        // $nrRand = rand(0, 100);
        if($name){
            $username = "e.".substr(str_replace(' ','',strtolower($name)), 0);    
        }else{
            $username = null;
        }
        
        echo $username;
    }

	 function evaluatorSatus($id, $status){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Evaluators";
		 $data['menu_active'] = "evaluators";
		 
		    $updateData = array('status' => $status);
		    $result = $this->data_model->updateDetails($id, $updateData, 'evaluators');  
		    
		    if ($result) {
    			$this->session->set_flashdata('message', 'Evaluators status updated successfully..!!');
    			$this->session->set_flashdata('status', 'alert-success');
            }else {
                $this->session->set_flashdata('message', 'Oops..!! Something went wrong. Please try again later..!!');
            	$this->session->set_flashdata('status', 'alert-warning');
    		} 
    
    		redirect('admin/evaluators');
			 

	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 function resetEvaluator($id){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Evaluators";
		 $data['menu_active'] = "evaluators";
		 
		    $updateData = array('password' => md5("INDIA"));
		    $result = $this->data_model->updateDetails($id, $updateData, 'evaluators');  
		    
		    if ($result) {
    			$this->session->set_flashdata('message', 'Evaluators password reset successfully..!!');
    			$this->session->set_flashdata('status', 'alert-success');
            }else {
                $this->session->set_flashdata('message', 'Oops..!! Something went wrong. Please try again later..!!');
            	$this->session->set_flashdata('status', 'alert-warning');
    		} 
    
    		redirect('admin/evaluators');
			 

	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 function deleteEvaluator($id){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Learning";
		 $data['menu_active'] = "learning";
		 
		    $result = $this->data_model->delDetails('evaluators', $id);  
		    
		    if ($result) {
    			$this->session->set_flashdata('message', 'Evaluator details deleted successfully..!!');
    			$this->session->set_flashdata('status', 'alert-success');
            }else {
                $this->session->set_flashdata('message', 'Oops..!! Something went wrong. Please try again later..!!');
            	$this->session->set_flashdata('status', 'alert-warning');
    		} 
    
    		redirect('admin/evaluators');
			 

	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 
	 function users(){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Users";
		 $data['menu_active'] = "users";
		 
		 $data['details'] = $this->data_model->getDetails('users',null)->result();
		 
		 $this->admin_template->show('admin/users',$data);
	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 function addUser(){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Users";
		 $data['menu_active'] = "users";
		 
		 $data['action'] = "admin/adduser";
		 
		 $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
    	 
    	 if ($this->form_validation->run() === FALSE){
           $this->admin_template->show('admin/add_user',$data);
		 }else{
		     $insertData = array('username' => $this->input->post('username'),
								'password' => md5("INDIA"),
								'status' => '1'
							);
							
		    $result = $this->data_model->insertDetails('users', $insertData);  
		    if ($result) {
    			$this->session->set_flashdata('message', 'User details added successfully..!!');
    			$this->session->set_flashdata('status', 'alert-success');
            }else {
                $this->session->set_flashdata('message', 'Oops..!! Something went wrong. Please try again later..!!');
            	$this->session->set_flashdata('status', 'alert-warning');
    		} 
    
    		redirect('admin/users');
			
		 }

	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 function userSatus($id, $status){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Users";
		 $data['menu_active'] = "users";
		 
		    $updateData = array('status' => $status);
		    $result = $this->data_model->updateDetails($id, $updateData, 'users');  
		    
		    if ($result) {
    			$this->session->set_flashdata('message', 'Users status updated successfully..!!');
    			$this->session->set_flashdata('status', 'alert-success');
            }else {
                $this->session->set_flashdata('message', 'Oops..!! Something went wrong. Please try again later..!!');
            	$this->session->set_flashdata('status', 'alert-warning');
    		} 
    
    		redirect('admin/users');
			 

	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 function resetUser($id){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Users";
		 $data['menu_active'] = "useres";
		 
		    $updateData = array('password' => md5("INDIA"));
		    $result = $this->data_model->updateDetails($id, $updateData, 'users');  
		    if ($result) {
    			$this->session->set_flashdata('message', 'User password reset successfully..!!');
    			$this->session->set_flashdata('status', 'alert-success');
            }else {
                $this->session->set_flashdata('message', 'Oops..!! Something went wrong. Please try again later..!!');
            	$this->session->set_flashdata('status', 'alert-warning');
    		} 
    
    		redirect('admin/users');
			 

	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	 
	 function deleteUser($id){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['page_title'] = "Users";
		 $data['menu_active'] = "users";
		 
		    $result = $this->data_model->delDetails('users', $id);  
		    
		    if ($result) {
    			$this->session->set_flashdata('message', 'User details deleted successfully..!!');
    			$this->session->set_flashdata('status', 'alert-success');
            }else {
                $this->session->set_flashdata('message', 'Oops..!! Something went wrong. Please try again later..!!');
            	$this->session->set_flashdata('status', 'alert-warning');
    		} 
    
    		redirect('admin/users');
			 

	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }
	 
	public function uniqueStates()
	{
		$statesList = $this->data_model->uniqueStates()->result();
		$result = array();
		foreach($statesList as $statesList1){
			$result[$statesList1->state] = $statesList1->state;
		}
		return $result;
	}

	public function districtList($choose)
	{
		$state = $this->input->post('state');
		$districtList = $this->data_model->uniqueDistrict($state)->result();
		if($choose == "S"){
		    $result[] = '<option value=" ">Select District</option>';    
		}
		if($choose == "A"){
		    $result[] = '<option value="all">All Districts</option>';    
		}
		foreach($districtList as $districtList1){
			$result[] = '<option value="'.$districtList1->district.'">'.$districtList1->district.'</option>';
		}
		print_r($result);
	}

	public function cityList($choose)
	{
		$state = $this->input->post('state');
		$district = $this->input->post('district');
		$cityList = $this->data_model->uniqueCity($state, $district)->result();
		if($choose == "S"){
		    $result[] = '<option value=" ">Select City</option>';    
		}
		if($choose == "A"){
		    $result[] = '<option value="all">All City</option>';    
		}
		foreach($cityList as $cityList1){
			$result[] = '<option value="'.$cityList1->city.'">'.$cityList1->city.'</option>';
		}
		print_r($result);
	}
	
	function page_404(){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 
		 $this->login_template->show('admin/page_404',$data);
	   }else{
	    redirect('admin/logout', 'refresh');
	   }
	 }

	function logout()
	{
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('admin', 'refresh');
	}

}
