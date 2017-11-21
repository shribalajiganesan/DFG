<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->database();
    }

    function save_order($data, $contents = false)
    {   
        if (isset($data['id']))
        {
            $this->db->where('id', $data['id']);
            $this->db->update('orders', $data);
            $id = $data['id'];
            
            // we don't need the actual order number for an update
            $order_id = $id;
        }
        else
        {
            $this->db->insert('orders', $data);
            $id = $this->db->insert_id();
            
            //create a unique order number
            //unix time stamp + unique id of the order just submitted.
            $order  = array('order_number'=> date('U').$id);
            
            //update the order with this order id
            $this->db->where('id', $id);
            $this->db->update('orders', $order);
                        
            //return the order id we generated
            //$order_number = $order['order_number'];
            $order_id = $id;
        }
        
        //if there are items being submitted with this order add them now
        /*if($contents)
        {
            // clear existing order items
            $this->db->where('order_id', $id)->delete('order_items');
            // update order items
            foreach($contents as $item)
            {
                $save               = array();
                $save['contents']   = $item;
                
                $item               = unserialize($item);
                $save['product_id'] = $item['id'];
                $save['quantity']   = $item['quantity'];
                $save['order_id']   = $id;
                $this->db->insert('order_items', $save);
            }
        }*/
        
        return $order_id;

    }

    function save_licence($user_id='',$count = 0) {
        if($user_id != '' && $count > 0) {
            for($i=0; $i<$count; $i++){
                $data['user_id'] = $user_id;
                $data['licence'] = $this->getToken(16);
                $data['product'] = '';

                $this->db->insert('licences', $data);
                $id = $this->db->insert_id();
            }
        }
    }

    function getToken($length){
         $token = "";
         $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
         //$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
         $codeAlphabet.= "0123456789";
         $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[rand(0, $max-1)];
        }

        return $token;
    }

    function ordersByUser($user_id=''){
        if($user_id){
            $this->db->select('*')
                    ->from('orders')
                    ->where('user_id',$user_id)
                    ->order_by('ordered_on','DESC');
            $query = $this->db->get(); 
            return $query->result_array();
        } else {
            return array();
        }
    }
} 