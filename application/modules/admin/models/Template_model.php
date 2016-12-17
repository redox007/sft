<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Template_model
 *
 * @author SUCHANDAN
 */
class Template_model extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    function get_tmplates($id = NULL) {
        if (!$id) {
            return $this->db->get(TBL_TEMPLATE)->result();
        } else {
            return $this->db->get_where(TBL_TEMPLATE, array('id' => $id))->row();
        }
    }

    function save_template($template = array(), $id = NULL) {
        if ($id) {
            return $this->db->update(TBL_TEMPLATE, $template, array('id' => $id));
        }
        $template['created_on'] = date('Y-m-d');
        $this->db->insert(TBL_TEMPLATE, $template);
        return $this->db->insert_id();
    }

}
