<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends MY_Controller {

    function __construct() {
        parent::__construct();
         
    }
    function index(){        
        $this->session->unset_userdata('user_data');
        echo $this->session->userdata('user_data');
        if(!$this->session->userdata('user_data')){
             redirect(base_url() . 'admin/login');
        }
    }
}

