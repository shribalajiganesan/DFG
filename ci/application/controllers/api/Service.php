<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Service extends REST_Controller {

    private $tbl_prefix = 'os_';

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        //$this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        //$this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->load->model('User_model','user');
        
        /*if (null == $this->input->server('PHP_AUTH_USER') && null == $this->input->server('PHP_AUTH_PW'))
        {
           header('HTTP/1.0 401 Unauthorized');
           header('HTTP/1.1 401 Unauthorized');
           header('WWW-Authenticate: Basic realm="My Realm"');
           echo 'You must login to use this service'; // User sees this if hit cancel
           die();
        }*/
    }

    public function index_get(){
        echo 'Service Initiated'; //$this->tbl_prefix;
        //$this->user->allUserTypes();
    }

    public function register_post()
    {
        
        $data['first_name']     = $this->post('first_name');
        $data['last_name']      = $this->post('last_name');
        $data['email']          = $this->post('email');
        $data['phone']          = $this->post('phone');
        $data['password']       = ($this->post('password') != 'undefined' || $this->post('password') != '')?sha1($this->post('password')):'';
        $data['created_on']     = date('Y-m-d H:i:s');
        $data['user_type']      = 1;
        $data['status']         = 1;
        if($data['first_name'] == '') {
            $result['status'] = false;
            $result['msg'] = 'Provide First Name';
            $result['data'] = array();
        } else if($data['last_name'] == '') {
            $result['status'] = false;
            $result['msg'] = 'Provide Last Name';
            $result['data'] = array();
        } else if($data['email'] == '') {
            $result['status'] = false;
            $result['msg'] = 'Provide Email Id';
            $result['data'] = array();
        } else if($data['phone'] == '') {
            $result['status'] = false;
            $result['msg'] = 'Provide Phone';
            $result['data'] = array();
        } else if($data['password'] == '') {
            $result['status'] = false;
            $result['msg'] = 'Provide Password';
            $result['data'] = array();
        } else if($this->user->isEmailExists($data['email'])){
            $result['status'] = false;
            $result['msg'] = 'User already exists';
            $result['data'] = array();
        } else {
            if($user_id = $this->user->addUser($data)){
                $data = array();
                $data['user_id'] = $user_id;
                $data['otp_value'] = rand(111111,999999);
                $data['purpose'] = 'Sign Up';
                $data['created_on'] = date('Y-m-d H:i:s');
                $data['is_active'] = 1;
                if($OTP_id = $this->user->addOTP($data)){
                    //code for send sms to user
                    //
                    $result['status'] = true;
                    $result['msg'] = 'Registration Successful';
                    $result['data']['user'] = $this->user->userById($user_id);
                    $result['data']['otp'] = $this->user->OTPById($OTP_id);
                }
            } else {
                $result['status'] = false;
                $result['msg'] = 'Registration process failed';
                $result['data'] = array();
            }
        }
        $this->response($result,200);   
    }

    public function login_post(){
        $email                  =  $this->post('email');
        $password               =  $this->post('password');
        //$data['device_id']      =  $this->post('device_id');
        //$data['device_gcm_key'] =  $this->post('device_gcm_key');
        $data['last_login']     =  date('Y-m-d H:i:s');
        if($email && $password){
            $user = $this->user->checkLogin($email,sha1($password),$data);
            if(count($user)>0){
                $result['status'] = true;
                $result['msg'] = 'Login successful';
                $result['data'] = $user;    
            } else {
                $result['status'] = false;
                $result['msg'] = 'Login failed';
                $result['data'] = array();    
            }
        } else {
            $result['status'] = false;
            $result['msg'] = 'Provide email id and password';
            $result['data'] = array();
        }
        $this->response($result,200); 
    }

    public function profile_get(){
        $user_id    =  $this->get('user_id');
        if($user_id){
            $user = $this->user->userById($user_id);
            if(count($user)>0){
                $result['status'] = true;
                $result['msg'] = 'User Found';
                $result['data'] = $user;
            } else {
                $result['status'] = false;
                $result['msg'] = 'User not found';
                $result['data'] = array();
            }    
        } else {
            $result['status'] = false;
            $result['msg'] = 'Provide user id';
            $result['data'] = array();
        }
        $this->response($result,200); 
    }

}
