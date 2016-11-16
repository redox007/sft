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

        $data['wellness_type'] = $this->Custom_model->fetch_data(WELLNESS_TYPE, array('id', 'wellness_type'), array(), array());
        $data['country'] = $this->Custom_model->fetch_data(COUNTRY, array('id', 'code'), array(), array());

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
            } else {
                $ins_data['partner_logo'] = $this->input->post('media_ids');
                $ins_data['partner_name'] = $this->input->post('partner_name');
                $ins_data['wellness_type_id'] = $this->input->post('wellness_type_id');
                $ins_data['country_id'] = $this->input->post('country_id');
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

    function edit_partner($id = NULL) {
        $data['wellness_type'] = $this->Custom_model->fetch_data(WELLNESS_TYPE, array('id', 'wellness_type'), array(), array());
        $data['country'] = $this->Custom_model->fetch_data(COUNTRY, array('id', 'code'), array(), array());
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
                    //$ins_inner['short_description'] = $this->input->post('short_description');
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
                    $ins_inner['language_id'] = $selected_lang;
                    $inner = $this->Custom_model->insert_data($ins_inner, WELLNESS_PROGRAM_LANG);
                    $this->session->set_flashdata('success_message', 'Wellness program updated successfully.');
                    redirect(base_url() . 'admin/master/list_wellness_program');
                } else {
                    $ins_data['program_name'] = $this->input->post('program_name');

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
    
    function add_wellnes_plus() {
        $data['wellness_type'] = $this->Custom_model->fetch_data(WELLNESS_TYPE, array('id', 'wellness_type'), array(), array()); 
        $data['partner'] = $this->Custom_model->fetch_data(PARTNER, array('id', 'partner_name'), array(), array()); 
        $data['countries'] = $this->Custom_model->fetch_data(COUNTRY, array('id', 'code'), array(), array()); 
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        
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
            } else if ($this->input->post('country_id') == "") {
                $this->session->set_flashdata('error_message', 'Please select country');
                redirect(base_url() . 'admin/master/add_wellnes_plus');
            }else if ($this->input->post('no_of_day') == "") {
                $this->session->set_flashdata('error_message', 'Please enter number of day');
                redirect(base_url() . 'admin/master/add_wellnes_plus');
            }else if ($this->input->post('price') == "") {
                $this->session->set_flashdata('error_message', 'Please enter price');
                redirect(base_url() . 'admin/master/add_wellnes_plus');
            }else {
                $ins_data['wellness_name'] = $this->input->post('wellness_name');
                $ins_data['type'] = $this->input->post('type');
                $ins_data['partner_id'] = $this->input->post('partner_id');
                $ins_data['country_id'] = $this->input->post('country_id');
                $ins_data['no_of_day'] = $this->input->post('no_of_day');
                $ins_data['price'] = $this->input->post('price');
                $ins_data['code'] = $this->Custom_model->generateRandomString(8);
                
                $res = $this->Custom_model->insert_data($ins_data, WELLNESS);
                if ($res != FALSE) {
                    $ins_inner['welness_id'] = $res;
                    $ins_inner['wellness_name_lang'] = $this->input->post('wellness_name_lang');                    
                    $ins_inner['language_id'] = $selected_lang;
                    $ins_inner['short_description'] = $this->input->post('short_description'); 
                    $ins_inner['description'] = $this->input->post('description'); 
                    $inner = $this->Custom_model->insert_data($ins_inner, WELLNESS_LANG);
                    if ($inner != FALSE) {
                        $this->session->set_flashdata('success_message', 'Wellness added successfully.');
                        redirect(base_url() . 'admin/master/list_wellnes_plus');
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
    
}
