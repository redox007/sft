<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Custom_model');
    }

  function index(){
      
        $partials = array('content' => 'home_content','banner'=>'home_banner');
        $this->template->load('home_template', $partials);
      
  }
}
