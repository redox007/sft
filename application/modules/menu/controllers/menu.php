<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu
 *
 * @author SUCHANDAN
 */
class Menu extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('menu_model');
    }
    
    public function index(){
        $data['menu'] = $this->menu_model->get_menu();
        $this->load->view('menu_view',$data);
    }

    //put your code here
}
