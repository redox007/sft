<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function fetch_data($table_name, $field = array('*'), $where = '', $joining = '', $search = '', $order = '', $by = '', $page_number = '', $item_per_page = '', $group_by = '', $having = '', $start = '', $end = '') {

        $this->db->select($field);
        if (!empty($where)) {
            foreach ($where as $key => $where_list) {
                if (strpos($where_list, ",") == true) {
                    $wh_list = explode(",", $where_list);
                    $this->db->where_in($key, $wh_list);
                } else {
                    $this->db->where($key, $where_list);
                }
            }
        }


        if (!empty($search) && is_array($search)) {
            foreach ($search as $key => $search_list) {
                if ($search_list != "") {
                    $this->db->or_like($key, $search_list);
                }
            }
        }



        if (!empty($joining) || !empty($joining) && is_array($search)) {
            foreach ($joining as $key => $join_list) {
                if (strpos($join_list, "|") == true) {
                    $join = explode("|", $join_list);
                    $this->db->join($key, $join[0], $join[1]);
                } else {
                    $this->db->join($key, $join_list, 'left');
                }
            }
        }

        if ($page_number !== "" && $item_per_page != "") {
            //$this->db->order_by($order,$by);

            $start_point = $item_per_page * $page_number;
            $this->db->limit($item_per_page, $start_point);
        }
        if ($order != "" && $by != "") {
            $this->db->order_by($order, $by);
        }

        if (!empty($group_by)) {
            $this->db->group_by($group_by);
        }

        if (!empty($having)) {

            foreach ($having as $key => $having_list) {

                $this->db->having($key, $having_list);
            }
        }

        if (!empty($end)) {

            $this->db->limit($end, $start);
        }

        $query = $this->db->get($table_name);
        //echo $this->db->last_query();
        //exit;

        $arr = array();

        if ($query->num_rows() > 0) {
            return $query->result_object();
        } else {
            return $arr;
        }
    }

    public function edit_data($data, $where, $table_name) {

        if (!empty($where)) {
            foreach ($where as $key => $where_list) {

                if (strpos($where_list, ",") == true) {

                    $wh_list = explode(",", $where_list);
                    $this->db->where_in($key, $wh_list);
                } else {
                    $this->db->where($key, $where_list);
                }
            }
        }

        $rs = $this->db->update($table_name, $data);

        return $rs;
    }

    public function insert_data($data, $table_name) {
        $this->db->insert($table_name, $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function row_present_check($table_name, $where) {
        if (!empty($where)) {
            foreach ($where as $key => $where_list) {
                $this->db->where($key, $where_list);
            }
        }
        $query = $this->db->get($table_name);
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function row_count($table_name, $field, $where, $joining = '', $having = '', $search = '', $group_by = '') {


        $this->db->select($field);
        if (!empty($where)) {
            foreach ($where as $key => $where_list) {
                if (strpos($where_list, ",") == true) {
                    $wh_list = explode(",", $where_list);
                    $this->db->where_in($key, $wh_list);
                } else {
                    $this->db->where($key, $where_list);
                }
            }
        }
        if (!empty($joining) || !empty($joining) && is_array($joining)) {
            foreach ($joining as $key => $join_list) {
                if (strpos($join_list, "|") == true) {
                    $join = explode("|", $join_list);
                    $this->db->join($key, $join[0], $join[1]);
                } else {
                    $this->db->join($key, $join_list, 'left');
                }
            }
        }

        if (!empty($having)) {
            foreach ($having as $key => $having_list) {
                $this->db->having($key, $having_list);
            }
        }

        if (!empty($search) && is_array($search)) {
            foreach ($search as $key => $search_list) {
                if ($search_list != "") {
                    $this->db->or_like($key, $search_list);
                }
            }
        }
        if (!empty($group_by)) {
            $this->db->group_by($group_by);
        }

        $query = $this->db->get($table_name);
        // echo $this->db->last_query();exit;
        return $query->num_rows();
    }

    function delete_row($table_name, $where) {

        if ($table_name != "" && !empty($where)) {

            //$this->db->where_in($field,$wherein);
            foreach ($where as $key => $list) {
                $this->db->where($key, $list);
            }
            $this->db->delete($table_name);
            $effected_row = $this->db->affected_rows();
            return $effected_row;
        } else {
            return false;
        }
    }
    
    function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        //$characters = '0123456789';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
    }
    
    
    function get_home_data($item_no, $user_no) {
        $query = $this->get_multiple_result("call item_details(" . $item_no . "," . $user_no . ")");
        return $query;
    }
    
    function get_multiple_result($query) {
        $k = 0;
        $arr_results_sets = array();


        if (mysqli_multi_query($this->db->conn_id, $query)) {

            do {
                $result = mysqli_store_result($this->db->conn_id);

                //print_r($result);
                if ($result) {
                    $l = 0;
                    while ($row = $result->fetch_object()) {
                        //print_r($row);
                        $arr_results_sets[$k][$l] = $row;
                        $l++;
                    }
                }
                $k++;
            } while (mysqli_more_results($this->db->conn_id) && mysqli_next_result($this->db->conn_id));
        }

        return $arr_results_sets;
    }
?>