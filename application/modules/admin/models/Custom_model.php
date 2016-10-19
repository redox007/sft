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
    
    
     function edit_data($data, $where, $table_name) {

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

}

?>