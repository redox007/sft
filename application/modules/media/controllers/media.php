<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of media
 * @property Media_model $media_model MediaModel
 * @author SUCHANDAN
 */
class Media extends MY_Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('media_model');
        $this->output->set_header('Access-Control-Allow-Origin: *');
        $this->load->config('media');
        $this->media_sizes = $this->config->item('media_sizes');
    }

    public function index() {
        $data = array();
        $data['medias'] = $this->list_media();
//        generate_media_url();
        $partials = array('content' => 'media_views', 'left_menu' => 'left_menu', 'header' => 'header');
        $this->template->load('template', $partials, $data);
    }

    public function upload() {
        $type = 1;
        $media_used_type = 1;
        $this->load->library('upload', $this->set_upload_config());
//        if (!empty($_FILES['userFiles']['name'])) {
//            $filesCount = count($_FILES['userFiles']['name']);
//            for ($i = 0; $i < $filesCount; $i++) {
//                $_FILES['file']['name'] = $_FILES['files']['name'][$i];
//                $_FILES['file']['type'] = $_FILES['files']['type'][$i];
//                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
//                $_FILES['file']['error'] = $_FILES['files']['error'][$i];
//                $_FILES['file']['size'] = $_FILES['files']['size'][$i];
//            }
//        }
        $_FILES['file']['name'] = $_FILES['files']['name'][0];
        $_FILES['file']['type'] = $_FILES['files']['type'][0];
        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][0];
        $_FILES['file']['error'] = $_FILES['files']['error'][0];
        $_FILES['file']['size'] = $_FILES['files']['size'][0];

        if (!$this->upload->do_upload('file')) {
            $data = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data(), 'error' => false);
            $media = array(
                'url' => UPLOAD_PATH . '/medias',
                'type' => $type,
                'size' => $data['upload_data']['file_size'] * 1024,
                'media_name' => $data['upload_data']['file_name'],
                'raw_name' => $data['upload_data']['raw_name'],
                'file_path' => $data['upload_data']['file_path'],
                'extension' => $data['upload_data']['file_ext'],
                'media_used_type' => $media_used_type,
                'created_on' => date('Y-m-d H:i:s'),
                'modified_on' => date('Y-m-d H:i:s'),
            );
            $media_id = $this->media_model->insert_media($media);
            $data['resize_data'] = $this->resize($data['upload_data']['full_path'], $data['upload_data']['raw_name'], $data['upload_data']['file_ext'], $data['upload_data']['file_path']);
            $data['media'] = $this->load->view('media_list', array('medias' => array($media)), true);
            $data['media_id'] = $media_id;
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    private function resize($path, $name, $ext, $folder) {

        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;

        $this->load->library('image_lib');

        $error = array();
        foreach ($this->media_sizes as $size) {

            $config['width'] = $size[0];
            $config['height'] = $size[1];
            $config['new_image'] = $folder . $name . '-' . $config['width'] . 'x' . $config['height'] . $ext;

            $this->image_lib->clear();
            $this->image_lib->initialize($config);
            if (!$this->image_lib->resize()) {
                $error[] = $this->image_lib->display_errors();
            }
        }
        return $error;
    }

    private function set_upload_config() {
        $config['upload_path'] = './uploads/medias';
        $config['allowed_types'] = '*';
        $config['max_size'] = 100000;
        $config['file_name'] = 'media_' . time() . rand(10000, 99999);
//        $config['max_width'] = 1024;
//        $config['max_height'] = 768;
        return $config;
    }

    public function add_media() {
        $media = $this->input->post_get('media');
        $media_id = $this->media_model->insert_media($media);
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('media_id' => $media_id)));
    }

    public function list_media() {
        $s = $this->input->post_get('s');
        $list = $this->media_model->list_media($s);
        return $list;
    }

}
