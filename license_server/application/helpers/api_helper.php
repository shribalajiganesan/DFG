<?php
if (!defined('BASEPATH'))
   exit('No direct script access allowed');
if (!function_exists('apiresponce')) {

   function apiresponce($status, $status_custom_msg, $responce) {
       $data = array();
       if ($status == '1') {
           $status_msg = 'Sucess';
       } else {
           $status_msg = 'Error';
       }

       $data['responseCode'] = $status;
       $data['responseStatus'] = $status_msg;
       $data['responseMessage'] = $status_custom_msg;
       $data['response'] = $responce;
       return $data;
   }

}