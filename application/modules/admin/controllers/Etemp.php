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
        $data = array();
        if ($id) {
            $data['action'] = 'edit_template';
        } else {
            $data['action'] = 'save_template';
        }

        if ($this->input->post('save_template')) {
            $id = $this->template_model->save_template($this->input->post('template'));
            redirect(base_url('admin/etemp/template/' . $id));
        } else if ($this->input->post('edit_template')) {
            $this->template_model->save_template($this->input->post('template'), $id);
            redirect(base_url('admin/etemp/template/' . $id));
        }
        if ($id) {
            $data['template'] = $this->template_model->get_tmplates($id);
        }

        $this->load->helper('custom_helper');
        load_editor(); //to load ckeditor.

        $partials = array('content' => 'template-manage/add-template', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

}
