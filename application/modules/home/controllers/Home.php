<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Custom_model');
    }

  function index(){
        $data['hide_search']=true;
        $partials = array('content' => 'home_content','banner'=>'home_banner');
        $this->template->load('home_template', $partials,$data);
      
  }
  
  function wellness_concepts(){
       $data=array();
       $partials = array('content' => 'wellness_concepts','banner'=>'home_banner');
       $this->template->load('home_template', $partials,$data);
  }
  function wellness_destinations(){
       $data=array();
       $partials = array('content' => 'wellness_destinations','banner'=>'home_banner');
       $this->template->load('home_template', $partials,$data);
  }
  function wellness_programs(){
       $data=array();
       $partials = array('content' => 'wellness_programs','banner'=>'home_banner');
       $this->template->load('home_template', $partials,$data);
  }
   function wellness_programs_day(){
       $data=array();
       $partials = array('content' => 'wellness_programs_day','banner'=>'home_banner');
       $this->template->load('home_template', $partials,$data);
  }
}
