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
    //********  manage partner  **********//
    function list_partner(){        
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


        $data['partners'] = $this->Custom_model->fetch_data(PARTNER, array('*'), array(), array(), $search = '', $order = PARTNER . '.id', $by = 'desc', $page_number, $config['per_page'], $group_by = '', $having = '', $start = $page_number, $end = ''
        );

        
        
        $partials = array('content' => 'list_partner', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);    
    }
    
    function add_partner(){
        $data=array();
        if($this->input->post('submit')){
            if ($this->input->post('partner_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter partner name');
                redirect(base_url() . 'admin/master/add_partner');
            }  else {
                $ins_data['partner_logo'] = $this->input->post('media_ids');
                $ins_data['partner_name'] = $this->input->post('partner_name');
                $ins_data['status']=1;
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
    function edit_partner($id=NULL){
        $data=array();
        $partner_id = decode_url($id);
        $chk_partner = $this->Custom_model->row_present_check(PARTNER, array('id'=>$partner_id));
        if($chk_partner==false){
             redirect(base_url() . 'admin/master/list_partner');
        }
        
        $partner_details = $this->Custom_model->fetch_data(PARTNER,array('*'),array('id'=>$partner_id));
        $data['partner_details'] = $partner_details[0];
        
        if($this->input->post('submit')){
            if ($this->input->post('partner_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter partner name');
                redirect(base_url() . 'admin/master/edit_partner');
            }  else {
                $ins_data['partner_logo'] = $this->input->post('media_ids');
                $ins_data['partner_name'] = $this->input->post('partner_name');
                $ins_data['status']=1;
                $res = $this->Custom_model->edit_data($ins_data,array('id'=>$partner_id), PARTNER);
               
                    $this->session->set_flashdata('success_message', 'Partner updated successfully.');
                    redirect(base_url() . 'admin/master/list_partner');
                
            }
        }
        
        $partials = array('content' => 'edit_partner', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }
    
    
    //*************** end manage partner ****************//
    
    //**************** welness type **************//
    
     function list_wellness_type(){                     
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;                  
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


        $data['wellness_type'] = $this->Custom_model->fetch_data(WELLNESS_TYPE, 
                array('*'), 
                array(WELLNESS_TYPE_LANG.'.language_id'=>$selected_lang), 
                array(WELLNESS_TYPE_LANG => WELLNESS_TYPE_LANG.'.wellness_type_id='.WELLNESS_TYPE.'.id AND '.WELLNESS_TYPE_LANG.'.language_id='.$selected_lang),                 
                $search = '', 
                $order = WELLNESS_TYPE . '.id', 
                $by = 'desc', 
                $page_number, 
                $config['per_page'], 
                $group_by = '', 
                $having = '', 
                $start = $page_number, 
                $end = ''
        );

        
        
        $partials = array('content' => 'list_wellness_type', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);    
    }
    
    function add_wellnes_type(){
        $data=array();
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        if($this->input->post('submit')){
            if ($this->input->post('type_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter wellness type');
                redirect(base_url() . 'admin/master/add_wellnes_type');
            }  else {
                $ins_data['created_on'] = date('Y-m-d H:i:s');               
                $res = $this->Custom_model->insert_data($ins_data, WELLNESS_TYPE);                                                                
                if ($res != FALSE) {
                    $ins_inner['wellness_type_id']  = $res;
                    $ins_inner['type_name']         = $this->input->post('type_name');
                    $ins_inner['short_description'] = $this->input->post('short_description');
                    $ins_inner['language_id']       = $selected_lang;
                    $inner = $this->Custom_model->insert_data($ins_inner, WELLNESS_TYPE_LANG);  
                    if($inner!=FALSE){
                        $this->session->set_flashdata('success_message', 'Wellness type added successfully.');
                        redirect(base_url() . 'admin/master/list_wellness_type');
                    }else{
                        $this->Custom_model->delete_row(WELLNESS_TYPE, array('id'=>$res));
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
    function edit_wellness_type($id=NULL){
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;        
        $wellness_id = decode_url($id);
        $chk_wellness = $this->Custom_model->row_present_check(WELLNESS_TYPE_LANG, array('id'=>$wellness_id,'language_id'=>$selected_lang));
        if($chk_wellness==false){
             redirect(base_url() . 'admin/master/list_wellness_type');
        }
        
        $wellness_details = $this->Custom_model->fetch_data(WELLNESS_TYPE_LANG,
                array(                          
                    WELLNESS_TYPE_LANG.'.type_name',
                    WELLNESS_TYPE_LANG.'.short_description'
                    ),
                array(WELLNESS_TYPE_LANG.'.id'=>$wellness_id,WELLNESS_TYPE_LANG.'.language_id'=>$selected_lang),
                array()
                );
        $data['wellness_details'] = $wellness_details[0];
        
        if($this->input->post('submit')){
            if ($this->input->post('type_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter wellness type');
                redirect(base_url() . 'admin/master/edit_wellness_type');
            }  else {
                $ins_data['type_name'] = $this->input->post('type_name');
                $ins_data['short_description'] = $this->input->post('short_description');
               
                $res = $this->Custom_model->edit_data($ins_data,array('id'=>$wellness_id,'language_id'=>$selected_lang), WELLNESS_TYPE_LANG);
               
                    $this->session->set_flashdata('success_message', 'Wellness updated successfully.');
                    redirect(base_url() . 'admin/master/list_wellness_type');
                
            }
        }
        
        $partials = array('content' => 'edit_wellness_type', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }
   
     //**************** end welness type **************//
    
    
    
    //**************** welness type **************//
    
     function list_wellness_program(){                     
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;                  
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


        $data['wellness_program'] = $this->Custom_model->fetch_data(WELLNESS_PROGRAM, 
                array('*'), 
                array(), 
                array(WELLNESS_PROGRAM_LANG => WELLNESS_PROGRAM_LANG.'.wellness_program_id='.WELLNESS_PROGRAM.'.id AND '.WELLNESS_PROGRAM_LANG.'.language_id='.$selected_lang),                 
                $search = '', 
                $order = WELLNESS_PROGRAM . '.id', 
                $by = 'desc', 
                $page_number, 
                $config['per_page'], 
                $group_by = '', 
                $having = '', 
                $start = $page_number, 
                $end = ''
        );

        
        
        $partials = array('content' => 'list_wellness_program', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);    
    }
    
    function add_wellnes_program(){
        $data=array();
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        if($this->input->post('submit')){
            if ($this->input->post('program_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter wellness program');
                redirect(base_url() . 'admin/master/list_wellness_program');
            }  else {
                $ins_data['created_on'] = date('Y-m-d H:i:s');               
                $res = $this->Custom_model->insert_data($ins_data, WELLNESS_PROGRAM);                                                                
                if ($res != FALSE) {
                    $ins_inner['wellness_program_id']  = $res;
                    $ins_inner['program_name']         = $this->input->post('program_name');
                    $ins_inner['short_description'] = $this->input->post('short_description');
                    $ins_inner['language_id']       = $selected_lang;
                    $inner = $this->Custom_model->insert_data($ins_inner, WELLNESS_PROGRAM_LANG);  
                    if($inner!=FALSE){
                        $this->session->set_flashdata('success_message', 'Wellness program added successfully.');
                        redirect(base_url() . 'admin/master/list_wellness_program');
                    }else{
                        $this->Custom_model->delete_row(WELLNESS_PROGRAM, array('id'=>$res));
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
    function edit_wellness_program($id=NULL){
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        
        $program_id = decode_url($id);
        $chk_wellness = $this->Custom_model->row_present_check(WELLNESS_PROGRAM_LANG, array('id'=>$program_id,'language_id'=>$selected_lang));
        if($chk_wellness==false){
             redirect(base_url() . 'admin/master/list_wellness_program');
        }
       
        $wellness_details = $this->Custom_model->fetch_data(WELLNESS_PROGRAM_LANG,
                array(
                                     
                    WELLNESS_PROGRAM_LANG.'.program_name',
                    WELLNESS_PROGRAM_LANG.'.short_description'
                    ),
                array(WELLNESS_PROGRAM_LANG.'.id'=>$program_id,WELLNESS_PROGRAM_LANG.'.language_id'=>$selected_lang),
                array()
                );
        $data['wellness_details'] = $wellness_details[0];
        
        if($this->input->post('submit')){
            if ($this->input->post('program_name') == "") {
                $this->session->set_flashdata('error_message', 'Please enter wellness program');
                redirect(base_url() . 'admin/master/edit_wellness_program');
            }  else {
                $ins_data['program_name'] = $this->input->post('program_name');
                $ins_data['short_description'] = $this->input->post('short_description');
               
                $res = $this->Custom_model->edit_data($ins_data,array('id'=>$program_id,'language_id'=>$selected_lang), WELLNESS_PROGRAM_LANG);
               
                    $this->session->set_flashdata('success_message', 'Wellness program updated successfully.');
                    redirect(base_url() . 'admin/master/edit_wellness_program');
                
            }
        }
        
        $partials = array('content' => 'edit_wellness_program', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }
   
     //**************** end welness type **************//
    
    
    

}
