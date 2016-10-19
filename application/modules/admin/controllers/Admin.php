<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Custom_model');
    }

    public function index() {
        if (!$this->session->userdata('user_data')) {
            redirect(base_url() . 'admin/login');
        }
        $data=array();
        $partials = array('content' => 'dashboard', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }
   
   public function login() {
         if ($this->session->userdata('user_data')) {
            redirect(base_url() . 'admin');
        }
        if ($this->input->post('submit')) {

            $user_name = $this->input->post('userName');
            $password = md5($this->input->post('password'));
            if ($user_name == "") {
                $this->session->set_flashdata('err_msg', 'Please enter User Name');
                redirect(base_url() . 'login');
            } else if ($password == "") {
                $this->session->set_flashdata('err_msg', 'Please enter password');
                redirect(base_url() . 'login');
            } else {
                $chk_data = $this->Custom_model->fetch_data(ADMIN, $field = array('*'), $where = array(
                    'user_name' => $user_name,
                    'user_pass' => $password
                ));
                if (empty($chk_data)) {
                    $this->session->set_flashdata('err_msg', 'Wrong username or password');
                    redirect(base_url() . 'login');
                } else {
                    $edit_data['last_login'] = date('Y-m-d H:i:s');
                    $this->Custom_model->edit_data($edit_data, array('user_name' => $user_name,'user_pass' => $password), ADMIN);
                    $this->session->set_userdata('user_data', $chk_data[0]);
                    redirect(base_url() . 'admin/');
                }
            }
        }
        $this->load->view('login');
    }

}
