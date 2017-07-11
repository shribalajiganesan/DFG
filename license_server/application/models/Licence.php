<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Licence extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function checklicence_id($key) {
        $this->db->select('id');
        $this->db->from('license');
        $this->db->where('licence_identity', $key);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /* checklic
     * 
     * Param $app :: Application Unique Id
     * Param $lic :: Lic unique id
     * Response :: boolian true or false
     */

    function checklic($app, $lic) {
        $this->db->select('license.id');
        $this->db->from('license');
        $this->db->join('app', 'license.app_id = app.id');
        $this->db->where('license.licence_identity', $lic);
        $this->db->where('app.app_id', $app);
        $this->db->where('app.status', 1);
        $this->db->where('license.status', 1);
        $this->db->where('license.start_date < ', date('Y-m-d H:i:s', strtotime('today')));
        $this->db->where('license.end_date > ', date('Y-m-d H:i:s', strtotime('today')));
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /* checklic
     * 
     * Param $email :: User email to check alreay has
     * Response :: boolian true or false
     */

    function checkuserexiest($email) {
        $this->db->select('seat_allowcation.s_id');
        $this->db->from('seat_allowcation');
        $this->db->where('seat_allowcation.s_email', $email);
//        $this->db->where('seat_allowcation.s_mac != ', $mac);
        $this->db->where('seat_allowcation.s_end_dt >= ', date('Y-m-d H:i:s', strtotime('now')));

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /* checkseat_id
     * 
     * Param $key ::unique key
     * Response :: boolian true or false
     */

    function checkseat_id($key) {
        $this->db->select('s_id');
        $this->db->from('seat_allowcation');
        $this->db->where('s_identity', $key);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
