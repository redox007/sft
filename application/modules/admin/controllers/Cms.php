<?php
/*
 * Content Management System[CMS]
 * This controller is created for add,edit and list CMS Pages for Admin users.
 * @author : Poorvi Gandhi
 * @since : Nov 2016.
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends MY_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model('Custom_model');
        if (!$this->session->userdata('user_data')) {
            redirect(base_url() . 'admin/login');
        }

    }

    /*
     * This function is used to list all cms pages.
     * @author : Poorvi Gandhi
     * @since : Nov 2016
    */
    function list_cms()
    {
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
        $config['base_url'] = base_url() . 'admin/cms/list_cms/';
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

        $partials = array('content' => 'cms/list_cms', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    /*
     * This function is used to add new cms page.
     * @author : Poorvi Gandhi
     * @since : Nov 2016
    */
    function add_cms()
    {
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

        $this->load->helper('custom_helper');load_editor();//to load ckeditor.

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
                redirect(base_url() . 'admin/cms/add_cms');
            }elseif ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter title');
                redirect(base_url() . 'admin/cms/add_cms');
            }elseif ($this->input->post('media_ids') == "") {
                $this->session->set_flashdata('error_message', 'Please select media which suitable to given title.');
                redirect(base_url() . 'admin/cms/add_cms');
            }   else {
                $slug = $this->slug->create_uri($this->input->post('page_name'));// create slug url.
                $ins_data['page_name']   = $this->input->post('page_name');
                $ins_data['media_id'] = $this->input->post('media_ids');
                $ins_data['slug'] = $slug;
                $ins_data['page_parent']   = $this->input->post('page_parent');
                $ins_data['page_template'] = $this->input->post('page_template');
                $ins_data['sort_order']   = $this->input->post('sort_order');
                $ins_data['created_by'] = $this->session->userdata['user_data']->id;//print_r($ins_data);die;

                // add data to cms cms table
                $res = $this->Custom_model->insert_data($ins_data, CMS_PAGE);
                if ($res != FALSE) {
                    $ins_inner['cms_page_id']  = $res;
                    $ins_inner['title']   = $this->input->post('title');
                    $ins_inner['content'] = $this->input->post('content');
                    $ins_inner['language_id'] = $selected_lang;
                    $inner = $this->Custom_model->insert_data($ins_inner, CMS_LANG);
                    if($inner!=FALSE){
                        $this->session->set_flashdata('success_message', 'CMS page added successfully.');
                        redirect(base_url() . 'admin/cms/list_cms');
                    }else{
                        $this->Custom_model->delete_row(CMS_PAGE, array('id'=>$res));
                        $this->session->set_flashdata('error_message', 'Please try again.');
                        redirect(base_url() . 'admin/cms/add_cms');
                    }
                } else {
                    $this->session->set_flashdata('error_message', 'Please try again.');
                    redirect(base_url() . 'admin/cms/add_cms');
                }
            }
        }

        $partials = array('content' => 'cms/add_cms', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    /*
     * This function is used to edit cms page.
     * $id : cms page id.
     * @author : Poorvi Gandhi
     * @since : Nov 2016
    */
    function edit_cms($id)
    {
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

        $this->load->helper('custom_helper');load_editor();//to load ckeditor.

        //check page is exist or not.
        $cms_id = decode_url($id);
        $chk_cms_exist = $this->Custom_model->row_present_check(CMS_PAGE, array('id'=>$cms_id));
        if($chk_cms_exist==false){
            redirect(base_url() . 'admin/cms/list_cms');
        }

        $cms_details = $this->Custom_model->fetch_data(CMS_PAGE,
            array(CMS_PAGE.'.id',CMS_PAGE.'.slug',CMS_PAGE.'.page_name',CMS_PAGE.'.page_parent',CMS_PAGE.'.page_template', CMS_PAGE.'.sort_order',
                 CMS_LANG.'.id as cms_lang_row_id', CMS_LANG.'.cms_page_id', CMS_LANG.'.title', CMS_LANG.'.content', CMS_PAGE.'.media_id',),
            array(),
            array(CMS_LANG => CMS_LANG.'.cms_page_id='.CMS_PAGE.'.id  AND '.CMS_PAGE.'.id ='.$cms_id .' AND '. CMS_LANG.'.language_id='.$selected_lang . '|left')
        );//echo '<pre>';print_r($cms_details);

        if(!empty($cms_details)){// page is available at cms table, language wise child page is not added onto the child table.
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
                redirect(base_url() . 'admin/cms/edit_cms/'.encode_url($cms_id));
            }elseif ($this->input->post('slug') == "") {
                $this->session->set_flashdata('error_message', 'Please enter slug.');
                redirect(base_url() . 'admin/cms/edit_cms/'.encode_url($cms_id));
            }elseif ($this->input->post('title') == "") {
                $this->session->set_flashdata('error_message', 'Please enter title');
                redirect(base_url() . 'admin/cms/edit_cms/'.encode_url($cms_id));
            }  else {
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
                    redirect(base_url() . 'admin/cms/list_cms');
                } else {
                    $cms_lang_id = $data['cms_details']->cms_lang_row_id;
                    $inner_data['title'] = $this->input->post('title');
                    $inner_data['content'] = $this->input->post('content');//print_r($inner_data);die;
                    //save modified data to details table.
                    $res1 = $this->Custom_model->edit_data($inner_data, array('id'=>$cms_lang_id), CMS_LANG);
                    $this->session->set_flashdata('success_message', 'CMS page updated successfully.');
                    redirect(base_url() . 'admin/cms/list_cms');
                }
            }
        }

        $partials = array('content' => 'cms/edit_cms', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }
}
