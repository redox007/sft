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
                        $Itinerary = $this->input->post('Itinerary');
                        if(!empty($Itinerary)){
                            foreach ($Itinerary as $key=>$val){
                                $ins_intinerary['day_number'] = $key+1;
                                $ins_intinerary['language_id'] = $selected_lang;
                                $ins_intinerary['welness_id'] = $res;
                                $ins_intinerary['description'] = $val;
                                $inner = $this->Custom_model->insert_data($ins_intinerary, ITINERARY);
                            }
                        }
                        $this->session->set_flashdata('success_message', 'Wellness added successfully.');
                        redirect(base_url() . 'admin/master/list_wellness_plus');
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

    //**************** CMS section **************//

    function list_cms(){
        $add_condition = array();

        if($this->input->post('filtor') == 'pages'){
           $add_condition = array(CMS_PAGE.'.page_parent'=>0);
        }elseif($this->input->post('filtor') == 'posts'){
           $add_condition = array(CMS_PAGE.'.page_parent not like' => '0');
        }else{
            $add_condition = array();
        }//print_r($add_condition);

        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        /* Pagination Code Start */
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'admin/master/list_cms/';
        /* Row Count Code */
        $config['total_rows'] = $this->Custom_model->row_count(CMS_PAGE, array(CMS_PAGE . '.id'), $add_condition );
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

        $data['cms_list'] = $this->Custom_model->fetch_data(CMS_PAGE,
                array(CMS_PAGE.'.*', CMS_LANG.'.title', CMS_LANG.'.cms_page_id', CMS_LANG.'.language_id'),
                $add_condition,
                array(CMS_LANG => CMS_LANG.'.cms_page_id='.CMS_PAGE.'.id AND '.CMS_LANG.'.language_id='.$selected_lang. '| inner'),
                $search='',//CMS_LANG.'language_id'.$selected_lang,
                $order = CMS_PAGE . '.id',
                $by = 'desc',
                $page_number,
                $config['per_page'],
                $group_by = '',
                $having = '',
                $start = $page_number,
                $end = ''
        );//echo '<pre>';print_r($data['cms_list']);

        $partials = array('content' => 'list_cms', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function add_cms(){

        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        //fetch added page name from the cms table for template parent selection.
        $data['page_name'] = $this->Custom_model->fetch_data(CMS_PAGE,
                array(CMS_PAGE .'.id', CMS_PAGE.'.page_name'),
                array(CMS_PAGE.'.status' => '1'),
                array(),
                $search = '',
                $order = CMS_PAGE . '.id',
                $by = 'desc'
        );

        $this->load_editor();//load ckeditor.

        //slug url settings
        $config = array(
            'field' => 'slug',
            'title' => 'title',
            'table' => 'sft_cms_page',
            'id' => 'id',
            'replacement' => 'dash'
        );
        $this->load->library('slug', $config);//echo 'aaaaa-'.$slug = $this->slug->create_uri('esdf sdfsdf');

        if($this->input->post('submit')){
            if ($this->input->post('page_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter page name.');
                redirect(base_url() . 'admin/master/add_cms');
            }elseif ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter title');
                redirect(base_url() . 'admin/master/edit_cms');
            }elseif ($this->input->post('media_ids') == "") {
                $this->session->set_flashdata('error_message', 'Please select media which suitable to given title.');
                redirect(base_url() . 'admin/master/list_cms');
            }   else {
                $slug = $this->slug->create_uri($this->input->post('page_name'));// create slug url.
                $ins_data['page_name']   = $this->input->post('page_name');
                $ins_data['media_id'] = $this->input->post('media_ids');
                $ins_data['slug'] = $slug;
                $ins_data['page_parent']   = $this->input->post('page_parent');
                $ins_data['page_template'] = $this->input->post('page_template');
                $ins_data['sort_order']   = $this->input->post('sort_order');
                $ins_data['created_by'] = $this->session->userdata['user_data']->id;//print_r($ins_data);die;

                // add data to cms master table
                $res = $this->Custom_model->insert_data($ins_data, CMS_PAGE);
                if ($res != FALSE) {
                    $ins_inner['cms_page_id']  = $res;
                    $ins_inner['title']   = $this->input->post('title');
                    $ins_inner['content'] = $this->input->post('content');
                    $ins_inner['language_id'] = $selected_lang;
                    $inner = $this->Custom_model->insert_data($ins_inner, CMS_LANG);
                    if($inner!=FALSE){
                        $this->session->set_flashdata('success_message', 'CMS page added successfully.');
                        redirect(base_url() . 'admin/master/list_cms');
                    }else{
                        $this->Custom_model->delete_row(CMS_PAGE, array('id'=>$res));
                        $this->session->set_flashdata('error_message', 'Please try again.');
                        redirect(base_url() . 'admin/master/add_cms');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Please try again.');
                    redirect(base_url() . 'admin/master/add_cms');
                }
            }
        }

        $partials = array('content' => 'add_cms', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }
    function edit_cms($id=NULL){
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        //fetch added page name from the cms table for template parent selection.
        $data['page_name'] = $this->Custom_model->fetch_data(CMS_PAGE,
                array(CMS_PAGE .'.id', CMS_PAGE.'.page_name'),
                array(CMS_PAGE.'.status' => '1'),
                array(),
                $search = '',
                $order = CMS_PAGE . '.id',
                $by = 'desc'
        );

        $this->load_editor();//load ckeditor

        //check page is exist or not.
        $cms_id = $id;//decode_url($id);
        $chk_cms_exist = $this->Custom_model->row_present_check(CMS_PAGE, array('id'=>$cms_id));
        if($chk_cms_exist==false){
            redirect(base_url() . 'admin/master/list_cms');
        }

        $cms_details = $this->Custom_model->fetch_data(CMS_PAGE,
            array(CMS_PAGE.'.id',CMS_PAGE.'.slug',CMS_PAGE.'.page_name',CMS_PAGE.'.page_parent',CMS_PAGE.'.page_template', CMS_PAGE.'.sort_order',
                 CMS_LANG.'.id as cms_lang_row_id', CMS_LANG.'.cms_page_id', CMS_LANG.'.title', CMS_LANG.'.content', CMS_PAGE.'.media_id',),
            array(),
            array(CMS_LANG => CMS_LANG.'.cms_page_id='.CMS_PAGE.'.id  AND '.CMS_PAGE.'.id ='.$cms_id .' AND '. CMS_LANG.'.language_id='.$selected_lang . '|left')
        );//echo '<pre>';print_r($cms_details);

        if(!empty($cms_details)){// page is available at master table, language wise child page is not added onto the child table.
            foreach($cms_details as $details){
                if($details->id == $cms_id)
                {
                    $data['cms_details'] = $details;
                    break;
                }
            }
        }

        //slug url settings
        $config = array(
            'field' => 'slug',
            'title' => 'title',
            'table' => 'sft_cms_page',
            'id' => 'id',
            'replacement' => 'dash'
        );
        $this->load->library('slug', $config);

        if($this->input->post('submit')){
            if ($this->input->post('page_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter page name.');
                redirect(base_url() . 'admin/master/edit_cms');
            }elseif ($this->input->post('slug') == "") {
                $this->session->set_flashdata('error_message', 'Please enter slug.');
                redirect(base_url() . 'admin/master/edit_cms');
            }elseif ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter title');
                redirect(base_url() . 'admin/master/edit_cms');
            }elseif ($this->input->post('media_ids') == "") {
                $this->session->set_flashdata('error_message', 'Please select media which suitable to given title.');
                redirect(base_url() . 'admin/master/edit_cms');
            }   else {
                //$cms_page_id = $data['cms_details']->id;
                $slug = $this->slug->create_uri($this->input->post('slug'), $cms_id);// create slug url.
                $ins_data['page_name']   = $this->input->post('page_name');
                $ins_data['media_id'] = $this->input->post('media_ids');
                $ins_data['slug'] = $slug;
                $ins_data['page_parent']   = $this->input->post('page_parent');
                $ins_data['page_template'] = $this->input->post('page_template');
                $ins_data['sort_order'] = $this->input->post('sort_order');
                $ins_data['created_by'] = $this->session->userdata['user_data']->id;//print_r($ins_data);die;

                // save modified data to cms master table
                $res = $this->Custom_model->edit_data($ins_data, array('id'=>$cms_id), CMS_PAGE);

                $chk_row = $this->Custom_model->row_present_check(CMS_LANG, array('cms_page_id' => $cms_id, 'language_id' => $selected_lang));
                if ($chk_row == FALSE) {
                    $inner_data['cms_page_id'] = $cms_id;
                    $inner_data['title'] = $this->input->post('title');
                    $inner_data['content'] = $this->input->post('content');
                    $inner_data['language_id'] = $selected_lang;//print_r($inner_data);die;
                    //add new row for different lang.
                    $res1 = $this->Custom_model->insert_data($inner_data, CMS_LANG);
                    $this->session->set_flashdata('success_message', 'CMS page updated successfully.');
                    redirect(base_url() . 'admin/master/list_cms');
                } else {
                    $cms_lang_id = $data['cms_details']->cms_lang_row_id;
                    $inner_data['title'] = $this->input->post('title');
                    $inner_data['content'] = $this->input->post('content');//print_r($inner_data);die;
                    //save modified data to details table.
                    $res1 = $this->Custom_model->edit_data($inner_data, array('id'=>$cms_lang_id), CMS_LANG);
                    $this->session->set_flashdata('success_message', 'CMS page updated successfully.');
                    redirect(base_url() . 'admin/master/list_cms');
                }
            }
        }

        $partials = array('content' => 'edit_cms', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function home_page_settings()
    {
        $home_page_id = $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        $this->load_editor();//load ckeditor

        $home_details = $this->Custom_model->fetch_data(HOME_PAGE_SETTINGS,
            array('*' , HOME_PAGE_SETTINGS_LANG.'.*'),
            array(),
            array(HOME_PAGE_SETTINGS_LANG => HOME_PAGE_SETTINGS_LANG.'.home_page_id='.HOME_PAGE_SETTINGS.'.id  AND '.HOME_PAGE_SETTINGS.'.id =1 AND '. HOME_PAGE_SETTINGS_LANG.'.language_id='.$selected_lang . '|left')
        );//echo '<pre>';print_r($home_details);

        $data['home_page_details'] = $home_details[0];

        if($this->input->post('submit')){
            if ($this->input->post('welcome_txt_title') == "") {
                $this->session->set_userdata('tab_data', 'welcome_text');
                $this->session->set_flashdata('error_message', 'Please enter welcome text title.');
                redirect(base_url() . 'admin/master/home_page_settings');
            }elseif ($this->input->post('best_offer_title') == "") {
                $this->session->set_userdata('tab_data', 'offers');
                $this->session->set_flashdata('error_message', 'Please enter best offer title.');
                redirect(base_url() . 'admin/master/home_page_settings');
            }elseif ($this->input->post('toor_title') == "") {
                $this->session->set_userdata('tab_data', 'new_toors');
                $this->session->set_flashdata('error_message', 'Please enter toor title');
                redirect(base_url() . 'admin/master/home_page_settings');
            }elseif ($this->input->post('why_choose_title') == "") {
                $this->session->set_userdata('tab_data', 'choose_us');
                $this->session->set_flashdata('error_message', 'Please enter why choose title.');
                redirect(base_url() . 'admin/master/home_page_settings');
            }elseif ($this->input->post('portfolio_title') == "") {
                $this->session->set_userdata('tab_data', 'set_portfolio');
                $this->session->set_flashdata('error_message', 'Please enter portfolio title.');
                redirect(base_url() . 'admin/master/home_page_settings');
            }elseif ($this->input->post('library_title') == "") {
                $this->session->set_userdata('tab_data', 'library');
                $this->session->set_flashdata('error_message', 'Please enter library title.');
                redirect(base_url() . 'admin/master/home_page_settings');
            } elseif ($this->input->post('partner_title') == "") {
                $this->session->set_userdata('tab_data', 'our_partners');
                $this->session->set_flashdata('error_message', 'Please enter partner title.');
                redirect(base_url() . 'admin/master/home_page_settings');
            }elseif ($this->input->post('ajmj_title') == "") {
                $this->session->set_userdata('tab_data', 'ajmj_club');
                $this->session->set_flashdata('error_message', 'Please enter AJMJ title.');
                redirect(base_url() . 'admin/master/home_page_settings');
            }  else {
                $this->session->set_userdata('tab_data', '');
                $master_data = array();
                $master_data['toor_media'] = $this->input->post('toor_media');
                $master_data['library_media'] = $this->input->post('library_media');
                //$master_data['partner_media'] = $this->input->post('partner_media');
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
                redirect(base_url() . 'admin/master/home_page_settings');
            }
        }

        $partials = array('content' => 'home_page_settings', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }
    //**************** end CMS section **************//


    function edit_wellness_plus($wellness_id=NULL){

        $data['wellness_type'] = $this->Custom_model->fetch_data(WELLNESS_TYPE, array('id', 'wellness_type'), array(), array());
        $data['partner'] = $this->Custom_model->fetch_data(PARTNER, array('id', 'partner_name'), array(), array());
        $data['countries'] = $this->Custom_model->fetch_data(COUNTRY, array('id', 'code'), array(), array());
        $selected_lang = ($this->session->userdata('language')) ? $this->session->userdata('language') : 1;
        $data['selected_lang'] = $selected_lang;
        $id= decode_url($wellness_id);
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

        $data['itinerary']=$this->Custom_model->fetch_data(ITINERARY,
                array('*'),
                array(
                    'welness_id'=>$id,
                    'language_id'=>$selected_lang
                    ));

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
                $ins_data['no_of_day'] = $this->input->post('no_of_day');
                $ins_data['price'] = $this->input->post('price');
                //$ins_data['code'] = $this->Custom_model->generateRandomString(8);
                $this->Custom_model->edit_data($ins_data, array('id'=>$id), WELLNESS);



                    $ins_inner['wellness_name_lang'] = $this->input->post('wellness_name_lang');
                    $ins_inner['short_description'] = $this->input->post('short_description');
                    $ins_inner['description'] = $this->input->post('description');

                    $this->Custom_model->edit_data($ins_inner, array('welness_id'=>$id,'language_id'=>$selected_lang), WELLNESS_LANG);


                        $Itinerary = $this->input->post('Itinerary');
                        if(!empty($Itinerary)){
                            $this->Custom_model->delete_row(ITINERARY, array('welness_id' => $id,'language_id'=>$selected_lang));
                            foreach ($Itinerary as $key=>$val){
                                $ins_intinerary['day_number'] = $key+1;
                                $ins_intinerary['language_id'] = $selected_lang;
                                $ins_intinerary['welness_id'] = $id;
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
}
