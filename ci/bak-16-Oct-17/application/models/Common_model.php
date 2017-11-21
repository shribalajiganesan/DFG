<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 *
 * This model used to contract service managing  purpose
 * @package	Codeigniter
 */
class Common_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    function sql($sql){
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}