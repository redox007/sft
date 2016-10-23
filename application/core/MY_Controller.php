<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Controller
 * @property CI_Loader $load Loader
 * @property CI_Input $input Input
 * @property CI_Output $output output
 * @author SUCHANDAN
 */
class MY_Controller extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('table');
    }

}
