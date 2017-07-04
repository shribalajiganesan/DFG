<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_Model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
     function insert($table, $data) {
        $this->db->insert($table, $data);
        if ($this->db->insert_id()) {
            return $insert_id = $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    function delete($table, $where) {
        if (isset($where) && $where != "") {
            if (isset($where) && is_array($where)) {
                $this->db->where($where);
            }
        }
        $this->db->delete($table);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function select($table, $select, $where = FALSE, $order_by = FALSE, $limit = FALSE, $where_or = FALSE) {
        $this->db->select($select);
        $this->db->from($table);
        if (isset($where) && is_array($where)) {
            $this->db->where($where);
        }
        if (isset($where_or) && is_array($where_or)) {
            $this->db->where($where);
        }
        if (isset($order_by) && $order_by != "") {
            $this->db->order_by($order_by);
        }
        if (isset($limit) && $limit != "") {
            $this->db->limit($limit);
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $options = $query->result_array();
            return $options;
        } else {
            return false;
        }
    }

    function update($table, $data, $where) {
        if (isset($where) && is_array($where)) {
            $this->db->where($where);
        }
        $this->db->update($table, $data);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows > 0) {
            return 1;
        } else {
            return false;
        }
    }

    function join($table, $select, $join, $where = FALSE, $order_by = FALSE, $limit = false, $where_or = FALSE) {
        $this->db->select($select);
        $this->db->from($table);
        if (isset($join) && $join != "") {
            foreach ($join as $value) {
                $direction = "left";
                if (isset($value['join_type']) && $value['join_type'] != "") {
                    $direction = $value['join_type'];
                }
                $this->db->join($value['table'], $value['join_string'], $direction);
            }
        }
        if (isset($where) && is_array($where) && !empty($where)) {
            $this->db->where($where);
        }
        if (isset($where_or) && is_array($where_or) && !empty($where)) {
            $this->db->or_where($where_or);
        }

        if (isset($order_by) && $order_by != "") {
            $this->db->order_by($order_by);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $options = $query->result_array();
            return $options;
        } else {
            return false;
        }
    }

    public function normal_query($sql) {
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $options = $query->result_array();

            return $options;
        } else {
            return false;
        }
    }
    
    
}