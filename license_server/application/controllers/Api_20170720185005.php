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

    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->model(array('common_model', 'licence'));
    }

    function add_license_post() {
        $data = file_get_contents("php://input");
        $data = json_decode($data, TRUE);
        $i = 0;
        $data['licence_identity'] = $this->genrate_unique_licence_id();

        $result = $this->common_model->insert('license', $data);
        if ($result) {
            $res['status'] = 'Success';
            $res['data'] = $data + array('license_id' => $result);
            $this->response($res, REST_Controller::HTTP_OK);
        } else {
            $res['status'] = 'Failure';
            $res['data'] = 'License not created!';
            $this->response($res, REST_Controller::HTTP_OK);
        }
    }

    /* genrate_unique_licence_id
     * to check the licence table and genarate the unique id each time
     * 
     * output unique identity for licence
     */

    public function genrate_unique_licence_id() {
        $i = 0;
        $alpha = 4;
        $spl = 3;
        $num = 9;
        do {
            $ranstring = $this->genarate_randstring($alpha, $spl, $num);
        } while ($res = $this->licence->checklicence_id($ranstring));

        return $ranstring;
    }

    public function genarate_randstring($alph, $spl, $num) {
        $code = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $alph); // code alphabat
        $code.= substr(str_shuffle("!@#$^&*_+"), 0, $spl); // code spl
        $code.= substr(str_shuffle("0123456789"), 0, $num); //code numaric

        return $code;
    }

    /* set allowcation 
     *  will check the seat awailablity and assign to the users
     * 
     *  input user info and the licence as array
     */

    public function seat_allowcation_post() {
        $data = file_get_contents("php://input");
        $data = json_decode($data, TRUE);

        $checklicres = $this->licence->checklic($data['app_id'], $data['lic_id']);
        if ($checklicres) { //valid licence
            //check already have a runing id
            $checkalreadyhaving = $this->licence->checkuserexiest($data['email'], $data['CPUId'], $data['MotherBoardId'], $data['DiskId']);
            if ($checkalreadyhaving) {
                $seatinfo = $this->common_model->select('seat_allowcation', 's_identity as seat_id,s_end_dt as expire_on', array('s_id' => $checkalreadyhaving));
                $seatinfo[0]['interval'] = $data['intraval'];
                $res['status'] = 'Success';
                $res['data'] = 'Already Logged in with this device';
                $this->response(apiresponce(1, $res['data'], $seatinfo[0]), REST_Controller::HTTP_OK);
            } else {
                $checkuserexiestres = $this->licence->checkuserexiest($data['email'], $data['CPUId'], $data['MotherBoardId'], $data['DiskId'], 1);
                if ($checkuserexiestres) { 
                    //already Logged in with another device
                    $res['status'] = 'Failure';
                    $res['data'] = 'Already Logged in with Other Device';
                    $this->response(apiresponce(0, $res['data'], $res), REST_Controller::HTTP_OK);
                } else { 
                    // valid user for proceed the licence
                    $insert = array(
                        's_identity' => $this->genrate_unique_seat_id(),
                        's_email' => $data['email'],
                        's_app' => $data['app_id'],
                        's_lic' => $data['lic_id'],
//                    's_ip' => $data['ip_address'],
                        's_mac' => $data['mac'],
                        'cpu_id' => $data['CPUId'],
                        'mothor_brd_id' => $data['MotherBoardId'],
                        'disk_id' => $data['DiskId'],
                        's_added_dt' => date('Y-m-d H:i:s', strtotime('now')),
                        's_end_dt' => date('Y-m-d H:i:s', strtotime('now +' . $data['intraval'] . 'Min')),
                    );
                    $insertres = $this->common_model->insert('seat_allowcation', $insert);
                    $seatinfo = $this->common_model->select('seat_allowcation', 's_identity as seat_id,s_end_dt as expire_on', array('s_id' => $insertres));
                    if ($seatinfo) {
                        $seatinfo[0]['interval'] = $data['intraval'];
                        $res['status'] = 'Success';
                        $res['data'] = 'License Added';
                        $this->response(apiresponce(1, $res['data'], $seatinfo[0]), REST_Controller::HTTP_OK);
                    } else {
                        $res['status'] = 'Failure';
                        $res['data'] = 'Some thing went wrong';
                        $this->response(apiresponce(1, $res['data'], $res), REST_Controller::HTTP_OK);
                    }
                }
            }
        } else {
            //invalid licence
            $res['status'] = 'Failure';
            $res['data'] = 'License Removed or Expired';
            $this->response(apiresponce(0, $res['data'], $res), REST_Controller::HTTP_OK);
        }
    }

    /* genrate_unique_seat_id
     * to check the seat table and genarate the unique id each time
     * 
     * output unique identity for seat
     */

    public function genrate_unique_seat_id() {
        $i = 0;
        $alpha = 5;
        $spl = 3;
        $num = 10;
        do {
            $ranstring = $this->genarate_randstring($alpha, $spl, $num);
        } while ($res = $this->licence->checkseat_id($ranstring));

        return $ranstring;
    }

}
