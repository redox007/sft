<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of menu_moel
 *
 * @author SUCHANDAN
 */
class menu_model extends CI_Model{
    
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function get_menu() {
        return [
            [
                'name' => "Users"
            ],
            [
                'name' => "Home"
            ],
        ];
    }
}
