<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends MY_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('Custom_model');
        if (!$this->session->userdata('user_data')) {
            redirect(base_url() . 'admin/login');
        }

    }

    //**************** welness type **************//

    function list_wellness_type() {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/master/list_wellness_type/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(WELLNESS_TYPE, array(WELLNESS_TYPE . '.id'), array());

        $config['use_page_numbers'] = TRUE;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '<li>';
        $config['per_page'] = 20;
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="disabled"><a href="javascript:void(0)">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        //print_r($config);die;
        $this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links();
        $page_number = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $page_number = ($page_number != 0) ? $page_number - 1 : $page_number;
        /* Pagination Code End */


        $data['wellness_type'] = $this->Custom_model->fetch_data(WELLNESS_TYPE, array(
            WELLNESS_TYPE . '.*',
            WELLNESS_TYPE_LANG . '.wellness_type_id',
            WELLNESS_TYPE_LANG . '.type_name',
            WELLNESS_TYPE_LANG . '.language_id'
                ), array(), array(WELLNESS_TYPE_LANG => WELLNESS_TYPE_LANG . '.wellness_type_id=' . WELLNESS_TYPE . '.id AND ' . WELLNESS_TYPE_LANG . '.language_id=' . $selected_lang), $search = '', $order = WELLNESS_TYPE . '.id', $by = 'desc', $page_number, $config['per_page'], $group_by = '', $having = '', $start = $page_number, $end = ''
        );



        $partials = array('content' => 'list_wellness_type', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function add_wellnes_type() {
        $data = array();
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        if ($this->input->post('submit')) {

            if ($this->input->post('wellness_type') == "") {
                $this->session->set_flashdata('error_message', 'Please enter wellness type');
                redirect(base_url() . 'admin/master/add_wellnes_type');
            } else if ($this->input->post('type_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter wellness name');
                redirect(base_url() . 'admin/master/add_wellnes_type');
            } else {
                $ins_data['created_on'] = date('Y-m-d H:i:s');
                $ins_data['wellness_type'] = $this->input->post('wellness_type');
                $ins_data['wellness_image'] = $this->input->post('media_ids');
                $res = $this->Custom_model->insert_data($ins_data, WELLNESS_TYPE);
                if ($res != FALSE) {
                    $ins_inner['wellness_type_id'] = $res;
                    $ins_inner['type_name'] = $this->input->post('type_name');
                    $ins_inner['language_id'] = $selected_lang;
                    $inner = $this->Custom_model->insert_data($ins_inner, WELLNESS_TYPE_LANG);
                    if ($inner != FALSE) {
                        $this->session->set_flashdata('success_message', 'Wellness type added successfully.');
                        redirect(base_url() . 'admin/master/list_wellness_type');
                    } else {
                        $this->Custom_model->delete_row(WELLNESS_TYPE, array('id' => $res));
                        $this->session->set_flashdata('error_message', 'Please try again.');
                        redirect(base_url() . 'admin/master/add_wellnes_type');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Please try again.');
                    redirect(base_url() . 'admin/master/add_wellnes_type');
                }
            }
        }

        $partials = array('content' => 'add_wellnes_type', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function edit_wellness_type($id = NULL) {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        $wellness_id = decode_url($id);
        $chk_wellness = $this->Custom_model->row_present_check(WELLNESS_TYPE, array('id' => $wellness_id));
        if ($chk_wellness == false) {
            redirect(base_url() . 'admin/master/list_wellness_type');
        }

        $wellness_details = $this->Custom_model->fetch_data(WELLNESS_TYPE, array(
            WELLNESS_TYPE . '.*',
            WELLNESS_TYPE_LANG . '.wellness_type_id',
            WELLNESS_TYPE_LANG . '.type_name',
            WELLNESS_TYPE_LANG . '.language_id'
                ), array(WELLNESS_TYPE . '.id' => $wellness_id), array(WELLNESS_TYPE_LANG => WELLNESS_TYPE . '.id=' . WELLNESS_TYPE_LANG . '.wellness_type_id AND ' . WELLNESS_TYPE_LANG . '.language_id=' . $selected_lang . '|left')
        );



        $data['wellness_details'] = $wellness_details[0];




        if ($this->input->post('submit')) {
            if ($this->input->post('type_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter wellness type');
                redirect(base_url() . 'admin/master/edit_wellness_type');
            } else {

                //insert image to welness type//
                $ins_type['wellness_type'] = $this->input->post('wellness_type');
                $ins_type['wellness_image'] = $this->input->post('media_ids');
                $this->Custom_model->edit_data($ins_type, array('id' => $wellness_id), WELLNESS_TYPE);

                $chk_row = $this->Custom_model->row_present_check(WELLNESS_TYPE_LANG, array('wellness_type_id' => $wellness_id, 'language_id' => $selected_lang));
                if ($chk_row == FALSE) {
                    $ins_inner['wellness_type_id'] = $wellness_id;
                    $ins_inner['type_name'] = $this->input->post('type_name');
                    $ins_inner['language_id'] = $selected_lang;
                    $inner = $this->Custom_model->insert_data($ins_inner, WELLNESS_TYPE_LANG);
                    $this->session->set_flashdata('success_message', 'Wellness updated successfully.');
                    redirect(base_url() . 'admin/master/list_wellness_type');
                } else {
                    $ins_data['type_name'] = $this->input->post('type_name');
                    //$ins_data['short_description'] = $this->input->post('short_description');
                    $res = $this->Custom_model->edit_data($ins_data, array('wellness_type_id' => $wellness_id, 'language_id' => $selected_lang), WELLNESS_TYPE_LANG);

                    $this->session->set_flashdata('success_message', 'Wellness updated successfully.');
                    redirect(base_url() . 'admin/master/list_wellness_type');
                }
            }
        }

        $partials = array('content' => 'edit_wellness_type', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    //**************** end welness type **************//
    //************ country ****************//


    function list_countries() {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/master/list_countries/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(COUNTRY, array(COUNTRY . '.id'), array());

        $config['use_page_numbers'] = TRUE;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '<li>';
        $config['per_page'] = 20;
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="disabled"><a href="javascript:void(0)">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        //print_r($config);die;
        $this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links();
        $page_number = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $page_number = ($page_number != 0) ? $page_number - 1 : $page_number;
        /* Pagination Code End */


        $data['countries'] = $this->Custom_model->fetch_data(COUNTRY, array(
            COUNTRY . '.*',
            COUNTRY_LANG . '.country_id',
            COUNTRY_LANG . '.country_name',
            COUNTRY_LANG . '.language_id'
                ), array(), array(COUNTRY_LANG => COUNTRY_LANG . '.country_id=' . COUNTRY . '.id AND ' . COUNTRY_LANG . '.language_id=' . $selected_lang), $search = '', $order = COUNTRY . '.id', $by = 'desc', $page_number, $config['per_page'], $group_by = '', $having = '', $start = $page_number, $end = ''
        );



        $partials = array('content' => 'list_countries', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function add_countries() {
        $data = array();
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        if ($this->input->post('submit')) {

            if ($this->input->post('code') == "") {
                $this->session->set_flashdata('error_message', 'Please enter country code');
                redirect(base_url() . 'admin/master/add_countries');
            } else if ($this->input->post('country_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter country name');
                redirect(base_url() . 'admin/master/add_countries');
            } else {

                $ins_data['code'] = $this->input->post('code');

                $res = $this->Custom_model->insert_data($ins_data, COUNTRY);
                if ($res != FALSE) {
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['country_id'] = $res;
                    $ins_inner['country_name'] = $this->input->post('country_name');

                    $inner = $this->Custom_model->insert_data($ins_inner, COUNTRY_LANG);
                    if ($inner != FALSE) {
                        $this->session->set_flashdata('success_message', 'Country added successfully.');
                        redirect(base_url() . 'admin/master/list_countries');
                    } else {
                        $this->Custom_model->delete_row(COUNTRY, array('id' => $res));
                        $this->session->set_flashdata('error_message', 'Please try again.');
                        redirect(base_url() . 'admin/master/add_countries');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Please try again.');
                    redirect(base_url() . 'admin/master/add_countries');
                }
            }
        }

        $partials = array('content' => 'add_countries', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function edit_countries($id = NULL) {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        $country_id = decode_url($id);
        $chk_country = $this->Custom_model->row_present_check(COUNTRY, array('id' => $country_id));
        if ($chk_country == false) {
            redirect(base_url() . 'admin/master/list_countries');
        }

        $country_details = $this->Custom_model->fetch_data(COUNTRY, array(
            COUNTRY . '.*',
            COUNTRY_LANG . '.language_id',
            COUNTRY_LANG . '.country_id',
            COUNTRY_LANG . '.country_name'
                ), array(COUNTRY . '.id' => $country_id), array(COUNTRY_LANG => COUNTRY . '.id=' . COUNTRY_LANG . '.country_id AND ' . COUNTRY_LANG . '.language_id=' . $selected_lang . '|left')
        );

        $data['country_details'] = $country_details[0];

        if ($this->input->post('submit')) {
            if ($this->input->post('code') == "") {
                $this->session->set_flashdata('error_message', 'Please enter country code');
                redirect(base_url() . 'admin/master/edit_countries');
            } else if ($this->input->post('country_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter country name');
                redirect(base_url() . 'admin/master/edit_countries');
            } else {

                //insert image to welness type//
                $ins_type['code'] = $this->input->post('code');
                $this->Custom_model->edit_data($ins_type, array('id' => $country_id), COUNTRY);

                $chk_row = $this->Custom_model->row_present_check(COUNTRY_LANG, array('country_id' => $country_id, 'language_id' => $selected_lang));
                if ($chk_row == FALSE) {
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['country_id'] = $country_id;
                    $ins_inner['country_name'] = $this->input->post('country_name');
                    $inner = $this->Custom_model->insert_data($ins_inner, COUNTRY_LANG);
                    $this->session->set_flashdata('success_message', 'Country updated successfully.');
                    redirect(base_url() . 'admin/master/list_countries');
                } else {
                    $ins_data['country_name'] = $this->input->post('country_name');
                    //$ins_data['short_description'] = $this->input->post('short_description');
                    $res = $this->Custom_model->edit_data($ins_data, array('country_id' => $country_id, 'language_id' => $selected_lang), COUNTRY_LANG);

                    $this->session->set_flashdata('success_message', 'Country updated successfully.');
                    redirect(base_url() . 'admin/master/list_countries');
                }
            }
        }

        $partials = array('content' => 'edit_countries', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    //*********** end country ************//
    //********  manage partner  **********//
    function list_partner() {
        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/master/list_partner/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(PARTNER, array(PARTNER . '.id'), array());

        $config['use_page_numbers'] = TRUE;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '<li>';
        $config['per_page'] = 20;
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="disabled"><a href="javascript:void(0)">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        //print_r($config);die;
        $this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links();
        $page_number = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $page_number = ($page_number != 0) ? $page_number - 1 : $page_number;
        /* Pagination Code End */


        $data['partners'] = $this->Custom_model->fetch_data(PARTNER, array(
            PARTNER . '.*',
            WELLNESS_TYPE . '.wellness_type',
            COUNTRY . '.code',
                ), array(), array(
            WELLNESS_TYPE => WELLNESS_TYPE . '.id=' . PARTNER . '.wellness_type_id',
            COUNTRY => COUNTRY . '.id=' . PARTNER . '.country_id'
                ), $search = '', $order = PARTNER . '.id', $by = 'desc', $page_number, $config['per_page'], $group_by = '', $having = '', $start = $page_number, $end = ''
        );



        $partials = array('content' => 'list_partner', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function add_partner() {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['wellness_type'] = $this->Custom_model->fetch_data(WELLNESS_TYPE, array('id', 'wellness_type'), array(), array());
        $data['country'] = $this->Custom_model->fetch_data(COUNTRY, array('id', 'code'), array(), array());
        $data['continent'] = $this->Custom_model->fetch_data(CONTINENT, array('id', 'continent_name'), array(), array());

        if ($this->input->post('submit')) {
            if ($this->input->post('partner_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter partner name');
                redirect(base_url() . 'admin/master/add_partner');
            } else if ($this->input->post('wellness_type_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select wellness type');
                redirect(base_url() . 'admin/master/add_partner');
            } else if ($this->input->post('country_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select country');
                redirect(base_url() . 'admin/master/add_partner');
            } else if ($this->input->post('continent_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select continent');
                redirect(base_url() . 'admin/master/add_partner');
            }else {
                $ins_data['partner_logo'] = $this->input->post('media_ids');
                $ins_data['partner_name'] = $this->input->post('partner_name');
                $ins_data['wellness_type_id'] = $this->input->post('wellness_type_id');
                $ins_data['country_id'] = $this->input->post('country_id');
                $ins_data['continent_id'] = $this->input->post('continent_id'); 
                $ins_data['banner'] = $this->input->post('banner'); 
                $ins_data['media_id'] = $this->input->post('media'); 
                $ins_data['status'] = 1;
                $res = $this->Custom_model->insert_data($ins_data, PARTNER);
                if ($res != false) {
                    
                    $this->session->set_flashdata('success_message', 'Partner added successfully.');
                    redirect(base_url() . 'admin/master/list_partner');
                } else {
                    $this->session->set_flashdata('error_message', 'Please try again.');
                    redirect(base_url() . 'admin/master/add_partner');
                }
            }
        }

        $partials = array('content' => 'add_partner', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }
    
    function view_partner($id = NULL){
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang']=$selected_lang;
         $data['wellness_type'] = $this->Custom_model->fetch_data(WELLNESS_TYPE, array('id', 'wellness_type'), array(), array());
        $data['country'] = $this->Custom_model->fetch_data(COUNTRY, array('id', 'code'), array(), array());
        $data['continent'] = $this->Custom_model->fetch_data(CONTINENT, array('id', 'continent_name'), array(), array());
        $partner_id = decode_url($id);
        $data['partner_id']=$partner_id;
        $chk_partner = $this->Custom_model->row_present_check(PARTNER, array('id' => $partner_id));
        if ($chk_partner == false) {
            redirect(base_url() . 'admin/master/list_partner');
        }
        
        //list program //
        $get_type = $this->Custom_model->fetch_data(PARTNER,array('wellness_type_id'),array('id'=>$partner_id));
         $data['wellness_plus'] = $this->Custom_model->fetch_data(WELLNESS, array(
            WELLNESS . '.*',
            PARTNER.'.partner_name',
                ),
                array(WELLNESS.'.type'=>$get_type[0]->wellness_type_id,'partner_id'=>$partner_id),
                array(
            PARTNER => PARTNER . '.id=' . WELLNESS . '.partner_id'),
                $search = '', $order = WELLNESS . '.id', $by = 'desc');
        //end list program // 
        
        
      //fetch room list // 
        
       $rooms =  $this->Custom_model->fetch_data(ROOM,
                array(ROOM.'.*',ROOM_LANG.'.room_name',ROOM_LANG.'.language_id'),
                array(ROOM.'.partner_id'=>$partner_id),
                array(ROOM_LANG=>ROOM_LANG.'.room_id='.ROOM.'.id AND '.ROOM_LANG.'.language_id='.$selected_lang)
                );
        
        $data['rooms']= $rooms;
         if ($this->input->post('submit')) {
            if ($this->input->post('partner_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter partner name');
                redirect(base_url() . 'admin/master/view_partner');
            } else {
                $ins_data['partner_logo'] = $this->input->post('media_ids');
                $ins_data['partner_name'] = $this->input->post('partner_name');
                $ins_data['wellness_type_id'] = $this->input->post('wellness_type_id');
                $ins_data['country_id'] = $this->input->post('country_id');
                $ins_data['continent_id'] = $this->input->post('continent_id');
                $ins_data['status'] = 1;
                $res = $this->Custom_model->edit_data($ins_data, array('id' => $partner_id), PARTNER);

                $this->session->set_flashdata('success_message', 'Partner updated successfully.');
                redirect(base_url() . 'admin/master/list_partner');
            }
        }
        
        
        $partner_data = $this->Custom_model->fetch_data(PARTNER_AWARD,array('*'),array('language_id'=>$selected_lang,'partner_id'=>$partner_id));
        
        
        $data['partner_data'] = $partner_data;
        if ($this->input->post('submit_award')) {
            if ($this->input->post('award') == "") {
                $this->session->set_flashdata('error_message', 'Please enter partner name');
                redirect(base_url() . 'admin/master/view_partner');
            } else {
                    if(!empty($partner_data)){
                        $this->Custom_model->delete_row(PARTNER_AWARD, array('language_id'=>$selected_lang,'partner_id'=>$partner_id));
                    }
                    $awards = $this->input->post('award');  
                    if(!empty($awards)){
                        foreach($awards as $item){
                            $award_ins['language_id'] = $selected_lang;                
                            $award_ins['partner_id'] = $partner_id;
                            $award_ins['award'] = $item;
                            $this->Custom_model->insert_data($award_ins, PARTNER_AWARD);
                        }
                    }

                $this->session->set_flashdata('success_message', 'Award Added successfully.');
                redirect(base_url() . 'admin/master/view_partner');
            }
        }
        
        
        $partner_details = $this->Custom_model->fetch_data(PARTNER, array('*'), array('id' => $partner_id));
        $data['partner_details'] = $partner_details[0];
        $partials = array('content' => 'view_partner', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }
    
    function edit_partner($id = NULL) {
        $data['wellness_type'] = $this->Custom_model->fetch_data(WELLNESS_TYPE, array('id', 'wellness_type'), array(), array());
        $data['country'] = $this->Custom_model->fetch_data(COUNTRY, array('id', 'code'), array(), array());
        $data['continent'] = $this->Custom_model->fetch_data(CONTINENT, array('id', 'continent_name'), array(), array());
        $partner_id = decode_url($id);
        $chk_partner = $this->Custom_model->row_present_check(PARTNER, array('id' => $partner_id));
        if ($chk_partner == false) {
            redirect(base_url() . 'admin/master/list_partner');
        }

        $partner_details = $this->Custom_model->fetch_data(PARTNER, array('*'), array('id' => $partner_id));
        $data['partner_details'] = $partner_details[0];

        if ($this->input->post('submit')) {
            if ($this->input->post('partner_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter partner name');
                redirect(base_url() . 'admin/master/edit_partner');
            } else {
                $ins_data['partner_logo'] = $this->input->post('media_ids');
                $ins_data['partner_name'] = $this->input->post('partner_name');
                $ins_data['wellness_type_id'] = $this->input->post('wellness_type_id');
                $ins_data['country_id'] = $this->input->post('country_id');
                $ins_data['continent_id'] = $this->input->post('continent_id');
                $ins_data['banner'] = $this->input->post('banner'); 
                $ins_data['media_id'] = $this->input->post('media'); 
                $ins_data['status'] = 1;
                $res = $this->Custom_model->edit_data($ins_data, array('id' => $partner_id), PARTNER);

                $this->session->set_flashdata('success_message', 'Partner updated successfully.');
                redirect(base_url() . 'admin/master/list_partner');
            }
        }

        $partials = array('content' => 'edit_partner', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    //*************** end manage partner ****************//
    //**************** welness type **************//

    function list_wellness_program() {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/master/list_wellness_program/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(WELLNESS_PROGRAM, array(WELLNESS_PROGRAM . '.id'), array());

        $config['use_page_numbers'] = TRUE;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '<li>';
        $config['per_page'] = 20;
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="disabled"><a href="javascript:void(0)">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        //print_r($config);die;
        $this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links();
        $page_number = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $page_number = ($page_number != 0) ? $page_number - 1 : $page_number;
        /* Pagination Code End */


        $data['wellness_program'] = $this->Custom_model->fetch_data(WELLNESS_PROGRAM, array(
            WELLNESS_PROGRAM . '.*',
            WELLNESS_PROGRAM_LANG . '.wellness_program_id',
            WELLNESS_PROGRAM_LANG . '.program_name',
            WELLNESS_PROGRAM_LANG . '.language_id',
            WELLNESS_TYPE . '.wellness_type'
                ), array(), array(
            WELLNESS_PROGRAM_LANG => WELLNESS_PROGRAM_LANG . '.wellness_program_id=' . WELLNESS_PROGRAM . '.id AND ' . WELLNESS_PROGRAM_LANG . '.language_id=' . $selected_lang,
            WELLNESS_TYPE => WELLNESS_TYPE . '.id=' . WELLNESS_PROGRAM . '.wellness_type_id'), $search = '', $order = WELLNESS_PROGRAM . '.id', $by = 'desc', $page_number, $config['per_page'], $group_by = '', $having = '', $start = $page_number, $end = ''
        );



        $partials = array('content' => 'list_wellness_program', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function add_wellnes_program() {
        $data['wellness_type'] = $this->Custom_model->fetch_data(WELLNESS_TYPE, array('id', 'wellness_type'), array(), array());
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        if ($this->input->post('submit')) {
            if ($this->input->post('program') == "") {
                $this->session->set_flashdata('error_message', 'Please enter wellness program');
                redirect(base_url() . 'admin/master/add_wellnes_program');
            } else if ($this->input->post('program_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter wellness program name');
                redirect(base_url() . 'admin/master/add_wellnes_program');
            } else {
                $ins_data['program'] = $this->input->post('program');
                $ins_data['wellness_type_id'] = $this->input->post('wellness_type_id');
                $ins_data['created_on'] = date('Y-m-d H:i:s');
                $res = $this->Custom_model->insert_data($ins_data, WELLNESS_PROGRAM);
                if ($res != FALSE) {
                    $ins_inner['wellness_program_id'] = $res;
                    $ins_inner['program_name'] = $this->input->post('program_name');
                    $ins_inner['short_description'] = $this->input->post('description');
                    $ins_inner['media_id'] = $this->input->post('media_ids');
                    $ins_inner['language_id'] = $selected_lang;
                    $inner = $this->Custom_model->insert_data($ins_inner, WELLNESS_PROGRAM_LANG);
                    if ($inner != FALSE) {
                        $this->session->set_flashdata('success_message', 'Wellness program added successfully.');
                        redirect(base_url() . 'admin/master/list_wellness_program');
                    } else {
                        $this->Custom_model->delete_row(WELLNESS_PROGRAM, array('id' => $res));
                        $this->session->set_flashdata('error_message', 'Please try again.');
                        redirect(base_url() . 'admin/master/add_wellnes_program');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Please try again.');
                    redirect(base_url() . 'admin/master/add_wellnes_program');
                }
            }
        }

        $partials = array('content' => 'add_wellnes_program', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function edit_wellness_program($id = NULL) {
        $data['wellness_type'] = $this->Custom_model->fetch_data(WELLNESS_TYPE, array('id', 'wellness_type'), array(), array());
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        $program_id = decode_url($id);
        $chk_wellness = $this->Custom_model->row_present_check(WELLNESS_PROGRAM, array('id' => $program_id));
        if ($chk_wellness == false) {
            redirect(base_url() . 'admin/master/list_wellness_program');
        }

        $wellness_details = $this->Custom_model->fetch_data(WELLNESS_PROGRAM, array(
            WELLNESS_PROGRAM . '.*',
            WELLNESS_PROGRAM_LANG . '.wellness_program_id',
            WELLNESS_PROGRAM_LANG . '.program_name',
            WELLNESS_PROGRAM_LANG . '.short_description',
            WELLNESS_PROGRAM_LANG . '.media_id',
            WELLNESS_PROGRAM_LANG . '.language_id',
            WELLNESS_TYPE . '.wellness_type'
                ), array(WELLNESS_PROGRAM . '.id' => $program_id),
                array(
                    WELLNESS_PROGRAM_LANG => WELLNESS_PROGRAM_LANG . '.wellness_program_id=' . WELLNESS_PROGRAM . '.id AND '.WELLNESS_PROGRAM_LANG.'.language_id='.$selected_lang.'|left',
                    WELLNESS_TYPE=>WELLNESS_TYPE.'.id='.WELLNESS_PROGRAM.'.wellness_type_id'
                    )
        );
        $data['wellness_details'] = $wellness_details[0];

        if ($this->input->post('submit')) {
            if ($this->input->post('program') == "") {
                $this->session->set_flashdata('error_message', 'Please enter wellness program');
                redirect(base_url() . 'admin/master/edit_wellness_program');
            } else if ($this->input->post('program_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter wellness program name');
                redirect(base_url() . 'admin/master/edit_wellness_program');
            } else {

                //insert image to welness program//
                $ins_type['program'] = $this->input->post('program');
                $ins_type['wellness_type_id'] = $this->input->post('wellness_type_id');

                $this->Custom_model->edit_data($ins_type, array('id' => $program_id), WELLNESS_PROGRAM);

                $chk_row = $this->Custom_model->row_present_check(WELLNESS_PROGRAM_LANG, array('wellness_program_id' => $program_id, 'language_id' => $selected_lang));
                if ($chk_row == FALSE) {
                    $ins_inner['wellness_program_id'] = $program_id;
                    $ins_inner['program_name'] = $this->input->post('program_name');
                    $ins_inner['short_description'] = $this->input->post('description');
                    $ins_inner['media_id'] = $this->input->post('media_ids');
                    $ins_inner['language_id'] = $selected_lang;
                    $inner = $this->Custom_model->insert_data($ins_inner, WELLNESS_PROGRAM_LANG);
                    $this->session->set_flashdata('success_message', 'Wellness program updated successfully.');
                    redirect(base_url() . 'admin/master/list_wellness_program');
                } else {
                    $ins_data['program_name'] = $this->input->post('program_name');
                    $ins_data['short_description'] = $this->input->post('description');
                    $ins_data['media_id'] = $this->input->post('media_ids');

                    $res = $this->Custom_model->edit_data($ins_data, array('wellness_program_id' => $program_id, 'language_id' => $selected_lang), WELLNESS_PROGRAM_LANG);
                    $this->session->set_flashdata('success_message', 'Wellness program updated successfully.');
                    redirect(base_url() . 'admin/master/edit_wellness_program');
                }
            }
        }

        $partials = array('content' => 'edit_wellness_program', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    //**************** end welness type **************//

    function add_wellnes_plus($partner_id =NULL) {
        $data['wellness_type'] = $this->Custom_model->fetch_data(WELLNESS_TYPE, array('id', 'wellness_type'), array(), array());
        $data['partner'] = $this->Custom_model->fetch_data(PARTNER, array('id', 'partner_name'), array(), array());
        $data['countries'] = $this->Custom_model->fetch_data(COUNTRY, array('id', 'code'), array(), array());
        $data['programs'] = $this->Custom_model->fetch_data(WELLNESS_PROGRAM, array('id', 'program'), array(), array());
        
        
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        
        $data['partner_id']=  decode_url($partner_id);
        
        $data['rooms'] = $this->Custom_model->fetch_data(ROOM, array('id', 'room_type'), array('partner_id'=>decode_url($partner_id)), array());
        
         $this->load_editor();//load ckeditor.
         
        if ($this->input->post('submit')) {
           
            if ($this->input->post('wellness_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter wellness name');
                redirect(base_url() . 'admin/master/add_wellnes_plus');
            }else if ($this->input->post('type') == "") {
                $this->session->set_flashdata('error_message', 'Please select wellness type');
                redirect(base_url() . 'admin/master/add_wellnes_plus');
            } else if ($this->input->post('partner_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select partner');
                redirect(base_url() . 'admin/master/add_wellnes_plus');
            } else if ($this->input->post('no_of_day') == "") {
                $this->session->set_flashdata('error_message', 'Please enter number of day');
                redirect(base_url() . 'admin/master/add_wellnes_plus');
            }else if ($this->input->post('price') == "") {
                $this->session->set_flashdata('error_message', 'Please enter price');
                redirect(base_url() . 'admin/master/add_wellnes_plus');
            }else {
                $ins_data['wellness_name'] = $this->input->post('wellness_name');
                $ins_data['type'] = $this->input->post('type');
                $ins_data['partner_id'] = $this->input->post('partner_id');
                $ins_data['program_id'] = $this->input->post('program_id');
                $ins_data['room_id'] = $this->input->post('room_id');                
                $ins_data['no_of_day'] = $this->input->post('no_of_day');
                $ins_data['price'] = $this->input->post('price');
                $ins_data['code'] = $this->Custom_model->generateRandomString(8);
                
                if (!empty($_FILES['pdf'])) {
                    $img_url = $_FILES['pdf']['name'];
                    $file_info = pathinfo($img_url);
                    $filename = $file_info['filename'] . "_" . time() . "." . $file_info['extension'];
                    $ext = $file_info['extension'];
                    $uploads_dir = $_SERVER['DOCUMENT_ROOT'] .'/uploads/pdf/'.$filename;
                    if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $uploads_dir)) {
                         $ins_data['pdf'] = $filename;
                    } 
                }
                                
                $res = $this->Custom_model->insert_data($ins_data, WELLNESS);
                if ($res != FALSE) {
                    //ad media //
                    
                    if($this->input->post('media_ids')!=""){
                       $media_name =  explode(",", $this->input->post('media_ids'));
                       
                       if(!empty($media_name)){
                           foreach($media_name as $media){
                                $media_insert['wellness_id'] = $res;
                                $media_insert['media_id'] = $media;
                                $this->Custom_model->insert_data($media_insert, WELLNESS_IMAGE);
                           }
                       }
                    }
                    
                    
                    
                    
                    $ins_inner['welness_id'] = $res;
                    $ins_inner['wellness_name_lang'] = $this->input->post('wellness_name_lang');
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['short_description'] = $this->input->post('short_description');
                    $ins_inner['description'] = $this->input->post('description');
                    $inner = $this->Custom_model->insert_data($ins_inner, WELLNESS_LANG);
                    if ($inner != FALSE) {
                        $Itinerary = $this->input->post('Itinerary');
                        $Itinerary_title = $this->input->post('Itinerary_title');                                                
                        if(!empty($Itinerary)){
                            foreach ($Itinerary as $key=>$val){
                                $ins_intinerary['day_number'] = $key+1;
                                $ins_intinerary['language_id'] = $selected_lang;
                                $ins_intinerary['welness_id'] = $res;                                
                                $ins_intinerary['wellness_title'] = isset($Itinerary_title[$key])?$Itinerary_title[$key]:"";
                                $ins_intinerary['description'] = $val;
                                $inner = $this->Custom_model->insert_data($ins_intinerary, ITINERARY);
                            }
                        }
                        $this->session->set_flashdata('success_message', 'Wellness added successfully.');
                        redirect(base_url() . 'admin/master/list_partner');
                    } else {
                        $this->Custom_model->delete_row(WELLNESS, array('id' => $res));
                        $this->session->set_flashdata('error_message', 'Please try again.');
                        redirect(base_url() . 'admin/master/add_wellnes_plus');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Please try again.');
                    redirect(base_url() . 'admin/master/add_wellnes_plus');
                }
            }
        }

        $partials = array('content' => 'add_wellnes_plus', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function list_wellness_plus() {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/master/list_wellness_plus/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(WELLNESS, array(WELLNESS . '.id'), array(WELLNESS.'.type'=>1));

        $config['use_page_numbers'] = TRUE;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '<li>';
        $config['per_page'] = 20;
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="disabled"><a href="javascript:void(0)">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        //print_r($config);die;
        $this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links();
        $page_number = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $page_number = ($page_number != 0) ? $page_number - 1 : $page_number;
        /* Pagination Code End */


        $data['wellness_plus'] = $this->Custom_model->fetch_data(WELLNESS, array(
            WELLNESS . '.*',
            PARTNER.'.partner_name',
                ),
                array(WELLNESS.'.type'=>1),
                array(
            PARTNER => PARTNER . '.id=' . WELLNESS . '.partner_id'),
                $search = '', $order = WELLNESS . '.id', $by = 'desc', $page_number, $config['per_page'], $group_by = '', $having = '', $start = $page_number, $end = ''
        );



        $partials = array('content' => 'list_wellness_plus', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }
    
    function edit_wellness_plus($partner_id =NULL,$wellness_id=NULL){

        $data['wellness_type'] = $this->Custom_model->fetch_data(WELLNESS_TYPE, array('id', 'wellness_type'), array(), array());
        $data['partner'] = $this->Custom_model->fetch_data(PARTNER, array('id', 'partner_name'), array(), array());
        $data['countries'] = $this->Custom_model->fetch_data(COUNTRY, array('id', 'code'), array(), array());
        $data['programs'] = $this->Custom_model->fetch_data(WELLNESS_PROGRAM, array('id', 'program'), array(), array());
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        $partner_id= decode_url($partner_id);
        $data['partner_id']=$partner_id;
        $id= decode_url($wellness_id);
        
        $data['rooms'] = $this->Custom_model->fetch_data(ROOM, array('id', 'room_type'), array('partner_id'=>decode_url($partner_id)), array());
        
        $chk_welless = $this->Custom_model->row_present_check(WELLNESS, array('id'=>$id));
        if($chk_welless==FALSE){
            redirect(base_url() . 'admin/master/list_wellness_plus');
        }

        $wellness_details = $this->Custom_model->fetch_data(WELLNESS,
                array(
                    WELLNESS.'.*',
                    WELLNESS_LANG.'.wellness_name_lang',
                    WELLNESS_LANG.'.short_description',
                    WELLNESS_LANG.'.description'
                    ),
                array(WELLNESS.'.id'=>$id),
                array(WELLNESS_LANG=>WELLNESS_LANG.'.welness_id='.WELLNESS.'.id AND '.WELLNESS_LANG.'.language_id='.$selected_lang));
        $data['wellness_details']=$wellness_details[0];
        
        
        $wellness_media = $this->Custom_model->fetch_data(WELLNESS_IMAGE,array('media_id'),array('wellness_id'=>$id));
        $media ="";
        if(!empty($wellness_media)){
            foreach($wellness_media  as $m){
                $media .=$m->media_id.",";
            }
            
            $media = substr($media,0,-1);
        }
        $data['media'] = $media;
        
        $data['itinerary']=$this->Custom_model->fetch_data(ITINERARY,
                array('*'),
                array(
                    'welness_id'=>$id,
                    'language_id'=>$selected_lang
                    ));
        $this->load_editor();//load ckeditor.
          if ($this->input->post('submit')) {

            if ($this->input->post('wellness_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter wellness name');
                redirect(base_url() . 'admin/master/add_wellnes_plus');
            }else if ($this->input->post('type') == "") {
                $this->session->set_flashdata('error_message', 'Please select wellness type');
                redirect(base_url() . 'admin/master/add_wellnes_plus');
            } else if ($this->input->post('partner_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select partner');
                redirect(base_url() . 'admin/master/add_wellnes_plus');
            } else if ($this->input->post('no_of_day') == "") {
                $this->session->set_flashdata('error_message', 'Please enter number of day');
                redirect(base_url() . 'admin/master/add_wellnes_plus');
            }else if ($this->input->post('price') == "") {
                $this->session->set_flashdata('error_message', 'Please enter price');
                redirect(base_url() . 'admin/master/add_wellnes_plus');
            }else {
                $ins_data['wellness_name'] = $this->input->post('wellness_name');
                $ins_data['type'] = $this->input->post('type');
                $ins_data['partner_id'] = $this->input->post('partner_id');
                $ins_data['program_id'] = $this->input->post('program_id');
                $ins_data['room_id'] = $this->input->post('room_id');
                $ins_data['no_of_day'] = $this->input->post('no_of_day');
                $ins_data['price'] = $this->input->post('price');
                //$ins_data['code'] = $this->Custom_model->generateRandomString(8);
                
                if (!empty($_FILES['pdf'])) { 
                   
                    $img_url = $_FILES['pdf']['name'];
                    $file_info = pathinfo($img_url);
                    $filename = $file_info['filename'] . "_" . time() . "." . $file_info['extension'];
                    $ext = $file_info['extension'];
                    $uploads_dir = $_SERVER['DOCUMENT_ROOT'] .'/uploads/pdf/'.$filename;
                    if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $uploads_dir)) {
                        
                         //if pdf exit remove from folder//
                        if($wellness_details[0]->pdf!=""){
                            if (!file_exists('uploads/pdf/'.$wellness_details[0]->pdf)) {
                                unlink('uploads/pdf/'.$wellness_details[0]->pdf);      
                            }
                        }
                        
                         $ins_data['pdf'] = $filename;
                    } 
                }
                
                $this->Custom_model->edit_data($ins_data, array('id'=>$id), WELLNESS);

                    
                
                if($this->input->post('media_ids')!=""){
                        
                       $this->Custom_model->delete_row(WELLNESS_IMAGE, array('wellness_id'=>$id)); 
                       $media_name =  explode(",", $this->input->post('media_ids'));
                       
                       if(!empty($media_name)){
                           foreach($media_name as $media){
                                $media_insert['wellness_id'] = $id;
                                $media_insert['media_id'] = $media;
                                $this->Custom_model->insert_data($media_insert, WELLNESS_IMAGE);
                           }
                       }
                    }
                    

                    $ins_inner['wellness_name_lang'] = $this->input->post('wellness_name_lang');
                    $ins_inner['short_description'] = $this->input->post('short_description');
                    $ins_inner['description'] = $this->input->post('description');

                    $this->Custom_model->edit_data($ins_inner, array('welness_id'=>$id,'language_id'=>$selected_lang), WELLNESS_LANG);


                        $Itinerary = $this->input->post('Itinerary');
                        $Itinerary_title = $this->input->post('Itinerary_title');      
                        
                        if(!empty($Itinerary)){
                            $this->Custom_model->delete_row(ITINERARY, array('welness_id' => $id,'language_id'=>$selected_lang));
                            
                            foreach ($Itinerary as $key=>$val){
                                $ins_intinerary['day_number'] = $key+1;
                                $ins_intinerary['language_id'] = $selected_lang;
                                $ins_intinerary['welness_id'] = $id;
                                $ins_intinerary['wellness_title'] = isset($Itinerary_title[$key])?$Itinerary_title[$key]:"";
                                $ins_intinerary['description'] = $val;
                                $inner = $this->Custom_model->insert_data($ins_intinerary, ITINERARY);
                            }
                        }
                        $this->session->set_flashdata('success_message', 'Wellness update successfully.');
                        redirect(base_url() . 'admin/master/list_wellness_plus');


            }
        }


        $partials = array('content' => 'edit_wellness_plus', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }
    
    
    
    function load_editor()
    {
        //code for ckeditor start
        $this->load->library('ckeditor');

        $this->ckeditor->basePath = base_url().'assets/ckeditor/';
        $this->ckeditor->config['toolbar'] = array(
                array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList')
                                                    );//'Full';
        $this->ckeditor->config['language'] = 'en';//$this->ckeditor->config['width'] = '530px';
        $this->ckeditor->config['height'] = '200px';
        $this->ckeditor->config['resize_enabled'] = false;
        //code end ckeditor
    }

 
    
     //************ continent ****************//


    function list_continents() {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/master/list_continents/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(CONTINENT, array(), array());

        $config['use_page_numbers'] = TRUE;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '<li>';
        $config['per_page'] = 20;
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="disabled"><a href="javascript:void(0)">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        //print_r($config);die;
        $this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links();
        $page_number = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $page_number = ($page_number != 0) ? $page_number - 1 : $page_number;
        /* Pagination Code End */


        $data['continents'] = $this->Custom_model->fetch_data(CONTINENT, array(
            CONTINENT . '.*',
            CONTINENT_LANG . '.continent',            
            CONTINENT_LANG . '.language_id'
                ), array(), array(CONTINENT_LANG => CONTINENT_LANG . '.continent_id=' . CONTINENT . '.id AND ' . CONTINENT_LANG . '.language_id=' . $selected_lang), $search = '', $order = CONTINENT . '.id', $by = 'desc', $page_number, $config['per_page'], $group_by = '', $having = '', $start = $page_number, $end = ''
        );



        $partials = array('content' => 'list_continents', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function add_continents() {
        $data = array();
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        if ($this->input->post('submit')) {

            if ($this->input->post('continent_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter continent name');
                redirect(base_url() . 'admin/master/add_continents');
            } else if ($this->input->post('continent') == "") {
                $this->session->set_flashdata('error_message', 'Please enter continent ');
                redirect(base_url() . 'admin/master/add_countries');
            } else {

                $ins_data['continent_name'] = $this->input->post('continent_name');

                $res = $this->Custom_model->insert_data($ins_data, CONTINENT);
                if ($res != FALSE) {
                    $ins_inner['continent_id'] = $res;
                    $ins_inner['language_id'] = $selected_lang;                    
                    $ins_inner['continent'] = $this->input->post('continent');
                    $ins_inner['short_description'] = $this->input->post('description');
                    $ins_inner['media_id'] = $this->input->post('media_ids');

                    $inner = $this->Custom_model->insert_data($ins_inner, CONTINENT_LANG);
                    if ($inner != FALSE) {
                        $this->session->set_flashdata('success_message', 'Continent added successfully.');
                        redirect(base_url() . 'admin/master/list_continents');
                    } else {
                        $this->Custom_model->delete_row(COUNTRY, array('id' => $res));
                        $this->session->set_flashdata('error_message', 'Please try again.');
                        redirect(base_url() . 'admin/master/add_continents');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Please try again.');
                    redirect(base_url() . 'admin/master/add_continents');
                }
            }
        }

        $partials = array('content' => 'add_continents', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function edit_continents($id = NULL) {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        $continent_id = decode_url($id);
        $chk_continent = $this->Custom_model->row_present_check(CONTINENT, array('id' => $continent_id));
        if ($chk_continent == false) {
            redirect(base_url() . 'admin/master/list_continents');
        }

        $continent_details = $this->Custom_model->fetch_data(CONTINENT, array(
            CONTINENT . '.*',
            CONTINENT_LANG . '.language_id',
            CONTINENT_LANG . '.continent',
            CONTINENT_LANG . '.short_description',
            CONTINENT_LANG . '.media_id'
                ), array(CONTINENT . '.id' => $continent_id), array(CONTINENT_LANG => CONTINENT . '.id=' . CONTINENT_LANG . '.continent_id AND ' . CONTINENT_LANG . '.language_id=' . $selected_lang . '|left')
        );

        $data['continent_details'] = $continent_details[0];

        if ($this->input->post('submit')) {
             if ($this->input->post('continent_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter continent name');
                redirect(base_url() . 'admin/master/add_continents');
            } else if ($this->input->post('continent') == "") {
                $this->session->set_flashdata('error_message', 'Please enter continent ');
                redirect(base_url() . 'admin/master/add_countries');
            } else {

                //insert image to welness type//
                $ins_type['continent_name'] = $this->input->post('continent_name');
                $this->Custom_model->edit_data($ins_type, array('id' => $continent_id), CONTINENT);

                $chk_row = $this->Custom_model->row_present_check(CONTINENT_LANG, array('continent_id' => $continent_id, 'language_id' => $selected_lang));
                if ($chk_row == FALSE) {
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['continent_id'] = $continent_id;
                    $ins_inner['continent'] = $this->input->post('continent');
                    $ins_inner['short_description'] = $this->input->post('description');
                    $ins_inner['media_id'] = $this->input->post('media_ids');
                    $inner = $this->Custom_model->insert_data($ins_inner, CONTINENT_LANG);
                    $this->session->set_flashdata('success_message', 'Continent updated successfully.');
                    redirect(base_url() . 'admin/master/list_continents');
                } else {
                    $ins_data['continent'] = $this->input->post('continent');
                    $ins_data['short_description'] = $this->input->post('description');
                    $ins_data['media_id'] = $this->input->post('media_ids');
                    
                    $res = $this->Custom_model->edit_data($ins_data, array('continent_id' => $continent_id, 'language_id' => $selected_lang), CONTINENT_LANG);

                    $this->session->set_flashdata('success_message', 'Continent updated successfully.');
                    redirect(base_url() . 'admin/master/list_continents');
                }
            }
        }

        $partials = array('content' => 'edit_continents', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    //*********** end continent ************//
    function best_of_best(){        
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        if($selected_lang==1){
            $fields=array(
                AWARD.'.id',
                AWARD.'.name_in_english as award',
                PARTNER.'.partner_name',
                AWARD_PARTNER.'.partner_id'
                );
        }else{
            $fields=array(
                AWARD.'.id',
                AWARD.'.name_in_vietnamese as award',
                PARTNER.'.partner_name',
                AWARD_PARTNER.'.partner_id'
                );
        }
        
        $data['awards']= $this->Custom_model->fetch_data(AWARD,
                $fields,
                array('type'=>1),
                array(
                    AWARD_PARTNER=>AWARD_PARTNER.'.award_id='.AWARD.'.id',
                    PARTNER=>PARTNER.'.id='.AWARD_PARTNER.'.partner_id'));   
        
        
        $data['all_partner'] = $this->Custom_model->fetch_data(PARTNER,array('*'),array(),array());
                
        
        $partials = array('content' => 'best_of_best', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }
    
    
    function edit_best_of_best($id=NULL){
        $award_id= decode_url($id);
        $chk_award = $this->Custom_model->row_present_check(AWARD, array('id'=>$award_id));
        if($chk_award==FALSE){
            redirect(base_url() . 'admin/master/best_of_best');
        }
        
        $data['awards'] =  $this->Custom_model->fetch_data(PARTNER,
                array(PARTNER.'.*',AWARD_PARTNER.'.partner_id'),
                array(),
                array(
                    AWARD_PARTNER=>AWARD_PARTNER.'.partner_id='.PARTNER.'.id AND '.AWARD_PARTNER.'.award_id='.$chk_award,
                    ));
        if ($this->input->post('submit')) {
             if ($this->input->post('partner_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select partner name');
                redirect(base_url() . 'admin/master/edit_best_of_best');
            }else {
                $partner_id = $this->input->post('partner_id');
                $chk_partner = $this->Custom_model->row_present_check(AWARD_PARTNER, array('award_id'=>$award_id));
                if($chk_partner==FALSE){  //insert
                    $this->Custom_model->insert_data(array('award_id'=>$award_id,'partner_id'=>$partner_id), AWARD_PARTNER);
                }else{ //edit
                    $this->Custom_model->edit_data(array('partner_id'=>$partner_id), array('award_id'=>$award_id), AWARD_PARTNER);
                }
                $this->session->set_flashdata('success_message', 'Partner Added successfully');
                redirect(base_url() . 'admin/master/best_of_best');
            }
        }
        $partials = array('content' => 'edit_best_of_best', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

     function best_of_region(){        
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        if($selected_lang==1){
            $fields=array(
                AWARD.'.id',
                AWARD.'.name_in_english as award',
                PARTNER.'.partner_name',
                AWARD_PARTNER.'.partner_id'
                );
        }else{
            $fields=array(
                AWARD.'.id',
                AWARD.'.name_in_vietnamese as award',
                PARTNER.'.partner_name',
                AWARD_PARTNER.'.partner_id'
                );
        }
        
        $data['awards']= $this->Custom_model->fetch_data(AWARD,
                $fields,
                array('type'=>2),
                array(
                    AWARD_PARTNER=>AWARD_PARTNER.'.award_id='.AWARD.'.id',
                    PARTNER=>PARTNER.'.id='.AWARD_PARTNER.'.partner_id'));   
        
        
        $data['all_partner'] = $this->Custom_model->fetch_data(PARTNER,array('*'),array(),array());
                
        
        $partials = array('content' => 'best_of_region', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }
    
    
    function edit_best_of_region($id=NULL){
        $award_id= decode_url($id);
        $chk_award = $this->Custom_model->row_present_check(AWARD, array('id'=>$award_id));
        if($chk_award==FALSE){
            redirect(base_url() . 'admin/master/best_of_region');
        }
        
        $data['awards'] =  $this->Custom_model->fetch_data(PARTNER,
                array(PARTNER.'.*',AWARD_PARTNER.'.partner_id'),
                array(),
                array(
                    AWARD_PARTNER=>AWARD_PARTNER.'.partner_id='.PARTNER.'.id AND '.AWARD_PARTNER.'.award_id='.$chk_award,
                    ));
        if ($this->input->post('submit')) {
             if ($this->input->post('partner_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select partner name');
                redirect(base_url() . 'admin/master/edit_best_of_region');
            }else {
                $partner_id = $this->input->post('partner_id');
                $chk_partner = $this->Custom_model->row_present_check(AWARD_PARTNER, array('award_id'=>$award_id));
                if($chk_partner==FALSE){  //insert
                    $this->Custom_model->insert_data(array('award_id'=>$award_id,'partner_id'=>$partner_id), AWARD_PARTNER);
                }else{ //edit
                    $this->Custom_model->edit_data(array('partner_id'=>$partner_id), array('award_id'=>$award_id), AWARD_PARTNER);
                }
                $this->session->set_flashdata('success_message', 'Partner Added successfully');
                redirect(base_url() . 'admin/master/best_of_region');
            }
        }
        $partials = array('content' => 'edit_best_of_region', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    
    
    
    
    
     //**************** room **************//

  

    function add_room($partner_id = NULL) {
        $partner_id = decode_url($partner_id);
        $chk_partner_id = $this->Custom_model->row_present_check(PARTNER, array('id'=>$partner_id));
        if($chk_partner_id==FALSE){
            redirect(base_url().'admin/master/list_partner');
        }
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        
        if ($this->input->post('submit')) {
                
            
            if ($this->input->post('room_type') == "") {
                $this->session->set_flashdata('error_message', 'Please enter room type');
                redirect(base_url() . 'admin/master/add_room');
            } else if ($this->input->post('room_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter room type');
                redirect(base_url() . 'admin/master/add_room');
            } else {
               
                $ins_data['partner_id'] = $partner_id;
                $ins_data['room_type'] = $this->input->post('room_type');
                
                $res = $this->Custom_model->insert_data($ins_data, ROOM);
                if ($res != FALSE) {
                    $ins_inner['room_id'] = $res;                    
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['room_name'] = $this->input->post('room_name');
                    $inner = $this->Custom_model->insert_data($ins_inner, ROOM_LANG);
                    if ($inner != FALSE) {
                        //add room media
                    if($this->input->post('media_ids')!=""){
                       $media_name =  explode(",", $this->input->post('media_ids'));
                       
                       if(!empty($media_name)){
                           foreach($media_name as $media){
                               
                               $chk_media = $this->Custom_model->row_present_check(ROOM_IMAGE, array('room_id'=>$res,'media_id'=>$media));
                               if($chk_media==FALSE){
                                $media_insert['room_id'] = $res;
                                $media_insert['media_id'] = $media;
                                $this->Custom_model->insert_data($media_insert, ROOM_IMAGE);
                               }
                           }
                       }
                    }
                    
                        
                        $this->session->set_flashdata('success_message', 'Room added successfully.');
                        redirect(base_url() . 'admin/master/list_partner');
                    } else {                       
                        $this->session->set_flashdata('error_message', 'Please try again.');
                        redirect(base_url() . 'admin/master/add_room');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Please try again.');
                    redirect(base_url() . 'admin/master/add_room');
                }
            }
        }

        $partials = array('content' => 'add_room', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function edit_room($parner_id=NULL,$room_id = NULL) {
        $partner_id = decode_url($parner_id);
        $room_id = decode_url($room_id);
        $chk_partner_id = $this->Custom_model->row_present_check(PARTNER, array('id'=>$partner_id));
        if($chk_partner_id==FALSE){
            redirect(base_url().'admin/master/list_partner');
        }
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        
        //********fetch room details ********//
        $room_details=$this->Custom_model->fetch_data(ROOM,
                array(ROOM.'.*',ROOM_LANG.'.language_id',ROOM_LANG.'.room_name'),
                array(ROOM.'.id'=>$room_id,ROOM.'.partner_id'=>$partner_id),
                array(ROOM_LANG=>ROOM_LANG.'.room_id='.ROOM.'.id AND '.ROOM_LANG.'.language_id='.$selected_lang));
        $data['room_details']= $room_details[0];
        $room_images = $this->Custom_model->fetch_data(ROOM_IMAGE,
                array('*'),
                array(ROOM_IMAGE.'.room_id'=>$room_id),
                array()
                );
        $media ="";
        if(!empty($room_images)){
            foreach($room_images  as $m){
                $media .=$m->media_id.",";
            }
            
            $media = substr($media,0,-1);
        }
        $data['room_images'] = $media;
        
        
        
        if ($this->input->post('submit')) {                            
            if ($this->input->post('room_type') == "") {
                $this->session->set_flashdata('error_message', 'Please enter room type');
                redirect(base_url() . 'admin/master/add_room');
            } else if ($this->input->post('room_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter room type');
                redirect(base_url() . 'admin/master/add_room');
            } else {
               
            
                $ins_data['room_type'] = $this->input->post('room_type');
                $this->Custom_model->edit_data($ins_data, array('id'=>$room_id), ROOM);
                
                $chk= $this->Custom_model->row_present_check(ROOM_LANG, array('room_id'=>$room_id,'language_id'=>$selected_lang));
                 if( $chk==FALSE){                   
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['room_name'] = $this->input->post('room_name');
                    $inner = $this->Custom_model->insert_data($ins_inner, ROOM_LANG);
                 }else{
                      $ins_lang['room_name'] = $this->input->post('room_name');
                    $this->Custom_model->edit_data($ins_lang, array('room_id'=>$room_id,'language_id'=>$selected_lang), ROOM_LANG);
                 }
                   
                        //add room media
                    if($this->input->post('media_ids')!=""){
                       $media_name =  explode(",", $this->input->post('media_ids'));
                       
                       if(!empty($media_name)){
                           foreach($media_name as $media){
                               
                               $chk_media = $this->Custom_model->row_present_check(ROOM_IMAGE, array('room_id'=>$res,'media_id'=>$media));
                               if($chk_media==FALSE){
                                $media_insert['room_id'] = $room_id;
                                $media_insert['media_id'] = $media;
                                $this->Custom_model->insert_data($media_insert, ROOM_IMAGE);
                               }
                           }
                       }
                    }
                    
                        
                        $this->session->set_flashdata('success_message', 'Room added successfully.');
                        redirect(base_url() . 'admin/master/list_partner');
               
            }
        }

        $partials = array('content' => 'edit_room', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    //**************** end room **************//
    
     //********* enquery ***********//
    

    function list_enquery() {
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/master/list_enquery/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(ENQUERY, array(), array());

        $config['use_page_numbers'] = TRUE;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '<li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '<li>';
        $config['per_page'] = 20;
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="disabled"><a href="javascript:void(0)">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        //print_r($config);die;
        $this->pagination->initialize($config);
        $data['page_link'] = $this->pagination->create_links();
        $page_number = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $page_number = ($page_number != 0) ? $page_number - 1 : $page_number;
        /* Pagination Code End */


        $data['enquiries'] = $this->Custom_model->fetch_data(ENQUERY, array(
            ENQUERY . '.*'           
                ), array(), array(), $search = '', $order = ENQUERY . '.id', $by = 'desc', $page_number, $config['per_page'], $group_by = '', $having = '', $start = $page_number, $end = ''
        );



        $partials = array('content' => 'list_enquery', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }
    
    function view_enquiry($id){
        $id = decode_url($id);
        $chk_enq = $this->Custom_model->row_present_check(ENQUERY, array('id'=>$id));
        if($chk_enq==FALSE){
            redirect(base_url() . 'admin/master/list_enquery');
        }
        $this->Custom_model->edit_data(array('is_read'=>1), array('id'=>$id), ENQUERY);
        
        $enquiry_data = $this->Custom_model->fetch_data(ENQUERY,
                array(
                    ENQUERY.'.*',
                    WELLNESS_TYPE.'.wellness_type as wellness',
                    ROOM.'.room_type as type'
                    ),
                array(ENQUERY.'.id'=>$id),
                array(
                    WELLNESS_TYPE=>WELLNESS_TYPE.'.id='.ENQUERY.'.wellness_type',
                    ROOM=>ROOM.'.id='.ENQUERY.'.type_of_room'));
        $data['enquiry_data'] =$enquiry_data[0];
        
        $partials = array('content' => 'view_enquiry', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }
  
    //********* end enquery ***********//
    
}
