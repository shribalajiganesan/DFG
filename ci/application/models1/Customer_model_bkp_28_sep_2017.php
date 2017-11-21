<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->database();
    }

    function is_customer_exists($email='') {
        $this->db->select('*')
                 ->from('customers')
                 ->where('email',$email)
                 ->where('status',1);
        $query = $this->db->get(); 
        return $query->num_rows();
    }

    function add_customer($data = array()) {
        if(count($data) > 0){
            $result = $this->db->insert('customers', $data);
            return $result;
        } else {
            return 0;
        }
    }

    function customerByOwner($owner='',$search_key=''){
        if($owner != ''){
            $this->db->select('*');
            $this->db->from('customers');
            $this->db->where('created_by',$owner);
            $this->db->where('status',1);
            if($search_key != ''){
                $where = "(first_name LIKE '%".$search_key."%' OR last_name  LIKE '%".$search_key."%')";
                $this->db->where($where);
            }
            $query = $this->db->get(); 
            return $query->result_array();
        } else {
            return array();
        }
    }
    
} 