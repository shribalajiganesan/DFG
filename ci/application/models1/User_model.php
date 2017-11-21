<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->database();
    }

    public function allUserTypes(){

    	$this->db->select('*')
    			 ->from('user_types');
    			 
        $query = $this->db->get();
        return $query->result_array();
    }

    public function isEmailExists($email) {

        $this->db->select('*')
                ->from('users')
                ->where('password !=', '')
                ->where('email',$email)
                ->where('user_type',1);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function isMobileExists($mobile) {

        $this->db->select('*')
                ->from('tbl_users')
                ->where('password !=', '')
                ->where('fb_id','')
                ->where('gp_id','')
                ->where('mobile_no',$mobile);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function addUser($data){

        if($this->db->insert('users',$data)){
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    public function updateUser($id,$data){

        $this->db->where('id', $id);
        $result = $this->db->update('users', $data);
        if($result){
            return $result;
        } else {
            return 0;
        }
    }

    public function addOTP($data){

        if($this->db->insert('user_otps',$data)){
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }

    public function userById($id){

        $this->db->select('*')
                 ->from('users')
                 ->where('id',$id);
                 
        $query = $this->db->get();
        return $query->row_array();
    }

    public function OTPById($id){

        $this->db->select('*')
                 ->from('user_otps')
                 ->where('otp_id',$id);
                 
        $query = $this->db->get();
        return $query->row_array();
    }

    public function checkLogin($email,$password,$data){

        $this->db->select('*')
                ->from('users')
                ->where('email',$email)
                ->where('password',$password)
                ->where('user_type',1)
                ->where('status',1);
        $query = $this->db->get();
        $result = $query->row_array();
        if(count($result)>0){
            $this->db->where('id', $result['id']);
            $this->db->update('users', $data); 
            return $this->userById($result['id']);
        } else {
            return array();
        }
    }

    public function licenceByUser($user_id='') {
        $this->db->select('*')
                ->from('licences')
                ->where('user_id',$user_id)
                ->where('is_deleted',0)
                ->order_by('id','asc');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
} 