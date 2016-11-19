<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function get_all_language(){
    $CI =& get_instance();
    $CI->load->model('Custom_model');
    return $language = $CI->Custom_model->fetch_data(LANGUAGE,array('*'),array());


}

function get_admin_username($id)
{
    $CI =& get_instance();
    $CI->load->model('Custom_model');
    return $user_name = $CI->Custom_model->fetch_data(ADMIN, array('user_name'), array('id' => $id));
}