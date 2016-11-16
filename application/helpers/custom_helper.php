<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function get_all_language(){                
    $CI =& get_instance();
    $CI->load->model('Custom_model');
    return $language = $CI->Custom_model->fetch_data(LANGUAGE,array('*'),array());
    
    
}