<?php
/*
 * Home page Settings
 * This controller is created for edit Home/landing page contents for Admin users.
 * @author : Poorvi Gandhi
 * @since : Nov 2016.
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('Custom_model');

        if (!$this->session->userdata('user_data')) {
            redirect(base_url() . 'admin/login');
        }

    }

    /*
     * This function is used to load ckeditor for page.
     * @author : Poorvi Gandhi
     * @since : Nov 2016
    */
    function home_page_settings()
    {
        $home_page_id = $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        $home_details = $this->Custom_model->fetch_data(HOME_PAGE_SETTINGS,
            array('*' , HOME_PAGE_SETTINGS_LANG.'.*'),
            array(),
            array(HOME_PAGE_SETTINGS_LANG => HOME_PAGE_SETTINGS_LANG.'.home_page_id='.HOME_PAGE_SETTINGS.'.id  AND '.HOME_PAGE_SETTINGS.'.id =1 AND '. HOME_PAGE_SETTINGS_LANG.'.language_id='.$selected_lang . '|left')
        );//echo '<pre>';print_r($home_details);

        $data['home_page_details'] = $home_details[0];

        $this->load->helper('custom_helper'); load_editor();//load ckeditor

        if($this->input->post('submit')){
            if ($this->input->post('welcome_txt_title') == "") {
                $this->session->set_userdata('tab_data', 'welcome_text');
                $this->session->set_flashdata('error_message', 'Please enter welcome text title.');
                redirect(base_url() . 'admin/settings/home_page_settings');
            }elseif ($this->input->post('best_offer_title') == "") {
                $this->session->set_userdata('tab_data', 'offers');
                $this->session->set_flashdata('error_message', 'Please enter best offer title.');
                redirect(base_url() . 'admin/settings/home_page_settings');
            }elseif ($this->input->post('toor_title') == "") {
                $this->session->set_userdata('tab_data', 'new_toors');
                $this->session->set_flashdata('error_message', 'Please enter toor title');
                redirect(base_url() . 'admin/settings/home_page_settings');
            }elseif ($this->input->post('why_choose_title') == "") {
                $this->session->set_userdata('tab_data', 'choose_us');
                $this->session->set_flashdata('error_message', 'Please enter why choose title.');
                redirect(base_url() . 'admin/settings/home_page_settings');
            }elseif ($this->input->post('portfolio_title') == "") {
                $this->session->set_userdata('tab_data', 'set_portfolio');
                $this->session->set_flashdata('error_message', 'Please enter portfolio title.');
                redirect(base_url() . 'admin/settings/home_page_settings');
            }elseif ($this->input->post('library_title') == "") {
                $this->session->set_userdata('tab_data', 'library');
                $this->session->set_flashdata('error_message', 'Please enter library title.');
                redirect(base_url() . 'admin/settings/home_page_settings');
            }elseif ($this->input->post('library_media') == "") {
                $this->session->set_userdata('tab_data', 'library');
                $this->session->set_flashdata('error_message', 'Library media(s) can not be empty.');
                redirect(base_url() . 'admin/settings/home_page_settings');
            } elseif ($this->input->post('partner_title') == "") {
                $this->session->set_userdata('tab_data', 'our_partners');
                $this->session->set_flashdata('error_message', 'Please enter partner title.');
                redirect(base_url() . 'admin/settings/home_page_settings');
            } elseif ($this->input->post('partner_media') == "") {
                $this->session->set_userdata('tab_data', 'our_partners');
                $this->session->set_flashdata('error_message', 'Partner logo(s) can not be empty.');
                redirect(base_url() . 'admin/settings/home_page_settings');
            }elseif ($this->input->post('ajmj_title') == "") {
                $this->session->set_userdata('tab_data', 'ajmj_club');
                $this->session->set_flashdata('error_message', 'Please enter AJMJ title.');
                redirect(base_url() . 'admin/settings/home_page_settings');
            }  else {
                $this->session->set_userdata('tab_data', '');
                $master_data = array();
                $master_data['toor_media'] = $this->input->post('toor_media');
                $master_data['library_media'] = $this->input->post('library_media');
                $master_data['partner_media'] = $this->input->post('partner_media');
                $master_data['ajmj_media'] = $this->input->post('ajmj_media');
                $master_data['modified_on'] = date('Y-m-d H:i:s');
                $master_data['created_by'] = $this->session->userdata['user_data']->id;//print_r($master_data);die;

                $details_data = $this->input->post();
                unset($details_data['toor_media']);unset($details_data['library_media']);unset($details_data['partner_media']);
                unset($details_data['ajmj_media']);unset($details_data['submit']);

                // save modified data to table
                $res = $this->Custom_model->edit_data($master_data, array('id'=>1), HOME_PAGE_SETTINGS);
                $res1 = $this->Custom_model->edit_data($details_data, array('id'=>$selected_lang, 'language_id' => $selected_lang), HOME_PAGE_SETTINGS_LANG);
                if ($res != FALSE && $res1 != FALSE) {
                    $this->session->set_flashdata('success_message', 'Home page setting updated successfully.');
                } else {
                    $this->session->set_flashdata('error_message', 'Please Try Again.');
                }
                redirect(base_url() . 'admin/settings/home_page_settings');
            }
        }

        $partials = array('content' => 'settings/home_page_settings', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    /* This function used to set some basic(global) settings for the site.
     * @author : Poorvi Gandhi
     * @since : 29-11-2016
    */
    function settings()
    {
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        $basic_settings = $this->Custom_model->fetch_data(BASIC_SETTINGS,
            array('*' , BASIC_SETTINGS_LANG.'.*'),
            array(),
            array(BASIC_SETTINGS_LANG => BASIC_SETTINGS_LANG.'.settings_id='.BASIC_SETTINGS.'.id  AND '.BASIC_SETTINGS.'.id =1 AND '. BASIC_SETTINGS_LANG.'.language_id='.$selected_lang . '|left')
        );

        $data['settings'] = $basic_settings[0];//echo '<pre>';print_r($data['settings']);die;

        //save data
        if($this->input->post('submit')){
            if ($this->input->post('site_address') == "") {
                $this->session->set_flashdata('error_message', 'Site Address should not be an empty.');
                redirect(base_url() . 'admin/settings/settings');
            }elseif ($this->input->post('site_email') == "") {
                $this->session->set_flashdata('error_message', 'Site Email should not be an empty.');
                redirect(base_url() . 'admin/settings/settings');
            }elseif ($this->input->post('site_contact_no') == "") {
                $this->session->set_flashdata('error_message', 'Site Contact No. should not be an empty');
                redirect(base_url() . 'admin/settings/settings');
            }  else {
                $master_data = $details_data = array();
                $master_data['site_email'] = $this->input->post('site_email');
                $master_data['site_contact_no'] = $this->input->post('site_contact_no');
                $master_data['created_on'] = date('Y-m-d H:i:s');

                $details_data['site_address'] = $this->input->post('site_address');
                // save modified data to table
                $res = $this->Custom_model->edit_data($master_data, array('id'=>1), BASIC_SETTINGS);
                $res1 = $this->Custom_model->edit_data($details_data, array('id'=>$selected_lang, 'language_id' => $selected_lang), BASIC_SETTINGS_LANG);
                if ($res != FALSE && $res1 != FALSE) {
                    $this->session->set_flashdata('success_message', 'Settings has been updated successfully.');
                } else {
                    $this->session->set_flashdata('error_message', 'Please Try Again.');
                }
                redirect(base_url() . 'admin/settings/settings');
            }
        }

        $partials = array('content' => 'settings/settings', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

}
