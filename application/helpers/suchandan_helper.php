<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function debug($data) {
    echo "<pre>";
    print_r($data);
    echo '</pre>';
}

function __debug($data) {
    die(debug($data));
}

function get_email_template($name) {
    $CI = &get_instance();
    $CI->load->module("Etemp");
    return $CI->etemp->get_template($name);
}
