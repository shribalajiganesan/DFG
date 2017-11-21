<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

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
class Api extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('common_model');
    }
    
    function add_license_post(){
        $data = file_get_contents("php://input");
        $data = json_decode($data, TRUE);
        
        $result = $this->common_model->insert('license', $data);
        if($result){
            $res['status'] = 'Success';
            $res['data'] = $data + array('license_id' => $result);
            $this->response($res, REST_Controller::HTTP_OK);
        } else {
            $res['status'] = 'Failure';
            $res['data'] = 'License not created!';
            $this->response($res, REST_Controller::HTTP_OK);
        }
    }

}
