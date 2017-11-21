<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->database();
    }

    function all_products() {
        $this->db->select('*')
                 ->from('products')
                 ->where('is_deleted',0);
        $query = $this->db->get(); 
        return $query->result_array();
    }

    function get_product($id='') {
        $this->db->select('*')
                 ->from('products')
                 ->where('id',$id)
                 ->where('is_deleted',0);
        $query = $this->db->get(); 
        return $query->row_array();
    }
    
} 