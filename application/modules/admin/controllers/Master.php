<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends MY_Controller {

    function __construct() {
        
        parent::__construct();
        $this->load->model('Custom_model');
        if (!$this->session->userdata('user_data')) {
            redirect(base_url() . 'admin/login');
        }
    }
    
    function list_partner(){
        $data=array();
        $partials = array('content' => 'list_partner', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);    
    }
    
    function add_partner(){
        $data=array();
        $partials = array('content' => 'add_partner', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }
    function edit_partner($id=NULL){
        $data=array();
        $partials = array('content' => 'edit_partner', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }
   

}
