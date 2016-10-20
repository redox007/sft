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
        if($this->input->post('submit')){
            if ($this->input->post('partner_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter partner name');
                redirect(base_url() . 'admin/master/add_partner');
            }  else {
                $ins_data['partner_name'] = $this->input->post('partner_name');
               
                $res = $this->Custom_model->insert_data($ins_data, PARTNER);
                if ($res != false) {
                    $this->session->set_flashdata('success_message', 'Partner added successfully.');
                    redirect(base_url() . 'admin/master/list_partner');
                } else {
                    $this->session->set_flashdata('error_message', 'Please try again.');
                    redirect(base_url() . 'admin/master/add_partner');
                }
            }
        }
        
        $partials = array('content' => 'add_partner', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }
    function edit_partner($id=NULL){
        $data=array();
        $partials = array('content' => 'edit_partner', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }
   

}
