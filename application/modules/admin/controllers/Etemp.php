<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Etemp
 * @property Template_model $template_model template_model
 * @author SUCHANDAN
 */
class Etemp extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('template_model');
    }

    public function index() {
        $data = array();
        $data['templates'] = $this->template_model->get_tmplates();
        $partials = array('content' => 'template-manage/list_template', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    function template($id = '') {
        if ($id) {
            $id = decode_url($id);
        }
        $data = array();
        if ($id) {
            $data['action'] = 'edit_template';
        } else {
            $data['action'] = 'save_template';
        }

        if ($id) {
            $data['template'] = $this->template_model->get_tmplates($id);
        }

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $template = $this->input->post('template');
        $this->form_validation->set_rules('template[name]', 'Name', 'required');
        $this->form_validation->set_rules('template[content]', 'Content', 'required');
        $this->form_validation->set_rules('template[mailto]', 'Mailto', 'required');
        $this->form_validation->set_rules('template[subject]', 'Subject', 'required');

        if ($this->input->post('save_template')) {
            if ($this->form_validation->run()) {
                $id = $this->template_model->save_template($template);
                redirect(base_url('admin/etemp/template/' . $id));
            } else {
                $data['template'] = (object) $template;
            }
        } else if ($this->input->post('edit_template')) {
            if ($this->form_validation->run()) {
                $this->template_model->save_template($template, $id);
                redirect(base_url('admin/etemp/template/' . encode_url($id)));
            } else {
                $data['template'] = (object) $template;
            }
        }

        $this->load->helper('custom_helper');
        load_editor(); //to load ckeditor.

        $partials = array('content' => 'template-manage/add-template', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    public function get_template($name) {
        return $this->template_model->get_tmplates($name);
    }

    public function mail_template($name, $data, $toemail = '') {
        $template = $this->get_template($name);
        $search = array_keys($data);
        //'[first_name]', '[last_name]', '[email]', '[phone]', '[message]', '[others]'
        $replace = array_values($data);
        $mail_body = str_replace($search, $search, $template);
        $email = $this->db->get(TBL_BASIC_SETTINGS)->row();
        if ($email) {
            $email = $email->site_email;
        }
        $email = $email ? $email : $template->mailto;
        if ($toemail) {
            $email = $toemail;
        }
        $this->load->library('email');

        $this->email->from('your@example.com', 'Your Name');
        $this->email->to('someone@example.com');
        $this->email->cc('another@another-example.com');
        $this->email->bcc('them@their-example.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $this->email->send();
    }

}
