<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 *@property CI_DB_query_builder $db DBCLASS
 * @author SUCHANDAN
 */
class User_model extends CI_Model {
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    public function get_users() {
        return $this->db->get('sft_users')->get_rows();
    }
}
