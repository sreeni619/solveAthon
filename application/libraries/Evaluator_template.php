<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Evaluator_template {
    function show($view, $data = array())
    {
        // Get current CI Instance
        $CI = & get_instance();
 
        // Load template views
        $CI->load->view('evaluator/template/header', $data);
        $CI->load->view($view, $data);
        $CI->load->view('evaluator/template/footer', $data);
    }
}
 
/* End of file Template.php */