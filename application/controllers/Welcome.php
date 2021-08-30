<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
	    $data['categoriesData'] = $this->data_model->categoryCount()->result();
	    $this->load->view('welcome',$data);
	}
	
	public function categoriesCount(){
	    $categoriesData = $this->data_model->categoryCount()->result();
	   // $cd =  array();
	   // foreach($categoriesData as $categoriesData1){
	   //     $cd[$categoriesData1->category_id] = $categoriesData1->cnt;
	   //    // $categoriesData1->cnt;
	   //    // array_push($cd, $categoriesData1->cnt);
	   // }
	    print_r(json_encode($categoriesData));
	}
}
