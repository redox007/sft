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
        $CI->ckeditor->config['skin'] = 'moono-lisa';
        $CI->ckeditor->config['removePlugins'] = 'elementspath';
    }

    /* This function is used to grab video id from youtube embeded code
     * $embeded_code : embeded YouYube code
     * @author : Poorvi Gandhi
     * @since : 09th dec 2016
     */
    function get_youtube_video_id($embeded_code)
    {
        if($embeded_code == '')
            return false;

        $pattern = '/embed\/([\w+\-+]+)[\"\?]/';
        preg_match($pattern, $embeded_code, $matches);
        return @$matches[1];
    }

    /* This function is used to get youtube video thumb from youtube embeded code
     * $embeded_code : embeded YouYube code
     * $thumb_name : type of thumb. [check list of thumb at https://www.sitepoint.com/youtube-video-thumbnail-urls/]
     * @author : Poorvi Gandhi
     * @since : 09th dec 2016
     */
    function youtube_video_thumb($embeded_code, $thumb_name='hqdefault.jpg')
    {
        $img_src = '';
        $video_id = get_youtube_video_id($embeded_code);
        if($video_id != ''){
            $video_url = "https://img.youtube.com/vi/".$video_id."/".$thumb_name;
            $check_img_exist = get_headers($video_url);
            $returned_res = '';
            if(!empty($check_img_exist)){
                $returned_res = $check_img_exist[0];
            }
            if(strpos($returned_res, '200') ){
                $img_src = $video_url;
            }
        }
        return $img_src;
    }