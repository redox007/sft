<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of media_model
 * 
 * @author SUCHANDAN
 */
class Media_model extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function insert_media($media) {
        $this->db->insert(TBL_MEDIA, $media);
        return $this->db->insert_id();
    }

    public function edit_media($media, $media_id) {
        $this->db->update(TBL_MEDIA, $media, array('id' => $media_id));
        return $this->db->affected_rows();
    }

    public function delete_media($media_id) {
        $this->db->delete(TBL_MEDIA, array('id' => $media_id));
        return $this->db->affected_rows();
    }

    public function list_media($s = '') {
        $this->db->from(TBL_MEDIA);
        if ($s) {
            $this->db->where('media_name', $s);
        }
        $result = $this->db->get();
        return $result->result_array();
    }

    public function list_media_by_id($ids = array()) {
        $this->db->from(TBL_MEDIA);

        $this->db->where_in('id', explode(',', $ids));

        $result = $this->db->get();
        return $result->result_array();
    }

}
