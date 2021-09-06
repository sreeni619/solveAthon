<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluator extends CI_Controller {

    public $categoriesNames = array("1"=>"Sanitation", "2"=>"Crowd Management", "3"=>"Health", "4"=>"Environment", "5"=>"Digital Solutions");
    public $ideaStaus = array("0" => "Yet to Submit Idea", "1" => "Idea successfully submitted.", "2" => "Evulation Process GoingOn", "3" => "Selected in Round - 1", "4" => "Rejected in Round - 1", "5" => "Selected in Round - 2", "6" => "Rejected in Round - 2", "7" => "Selected in Round - 3", "8" => "Rejected in Round - 3", "9" => "Winner");
    public $ideaStausColor = array("0" => "sky-blue", "1" => "royal-blue", "2" => "orange", "3" => "green", "4" => "red", "5" => "green", "6" => "red", "7" => "green", "8" => "red", "9" => "violet");
    
    
	function index(){
	    $this->form_validation->set_rules('username', 'Username', 'trim|required');
	   	$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run() == FALSE) 	
	    {
			$data['page_title'] = "Evaluator Login";
			$data['action'] = 'evaluator';
			$this->login_template->show('evaluator/login',$data);
	    }else{
			$username = $this->input->post('username');
            $password = $this->input->post('password');
	    	$result = $this->data_model->evaluatorLogin($username, md5($password));
	    	if($result){
				$sess_array = array(
					'id' => $result->id,
					'username' => $result->username,
					'name' => $result->name
				);
				$this->session->set_userdata('logged_in', $sess_array);
			    redirect(base_url() . 'evaluator/dashboard');
			}else{
				$this->session->set_flashdata('message', 'Invalid Username and Password');
				redirect(base_url() . 'evaluator'); 
			}
	   }
	}

	 function dashboard(){
	   if($this->session->userdata('logged_in'))
	   {
		 $session_data = $this->session->userdata('logged_in');
		 $data['id'] = $session_data['id'];
		 $data['username'] = $session_data['username'];
		 $data['username'] = $session_data['name'];
		 $data['page_title'] = "Dashboard";
		 $data['menu_active'] = "dashboard";

		 $data['categoriesNames'] = $this->categoriesNames;
		 $data['ideaStaus'] = $this->ideaStaus;
		 $data['ideaStausColor'] = $this->ideaStausColor;
		 
		 $id = 1;
		 $data['Idea'] = $this->data_model->getIdeas($id)->row();
		 $data['details'] = $this->data_model->getDetailsbyfield($data['Idea']->id, 'id', 'students')->row();

		 $this->evaluator_template->show('evaluator/dashboard',$data);
	   }else{
	    redirect('evaluator/logout', 'refresh');
	   }
	 }
	 
	  
	function logout()
	{
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   redirect('evaluator', 'refresh');
	}

}
