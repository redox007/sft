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

    /*
    * This function is used to load ckeditor for admin use.
    * @author : Poorvi Gandhi
    * @since : Nov 2016
    * @version : 4.6.0//ckeditor
    */
    function load_editor()
    {
        $CI = get_instance();
        $CI->load->library('ckeditor');

        $CI->ckeditor->basePath = base_url().'assets/ckeditor/';

        $CI->ckeditor->config['toolbar'] = array(array('Source'),
                                                 array('Cut','Copy','Paste','PasteText','PasteFromWord', '-', 'Undo','Redo'),
                                                 array( 'Find', 'Replace', 'SelectAll', 'Scayt'),
                                                 array('Link', 'Unlink', 'Anchor'),
                                                 array('Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat'),
                                                 array('NumberedList','BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'),
                                                 array('JustifyLeft','JustifyCenter', 'JustifyRight'),
                                                 array( 'Styles', 'Format', 'Font', 'FontSize'),
                                                 array( 'TextColor','BGColor')
                                                );
        $CI->ckeditor->config['language'] = 'en';//$this->ckeditor->config['width'] = '530px';
        $CI->ckeditor->config['height'] = '200px';
        $CI->ckeditor->config['resize_enabled'] = false;
        $CI->ckeditor->config['skin'] = 'Moono Color';
        $CI->ckeditor->config['removePlugins'] = 'elementspath';
    }