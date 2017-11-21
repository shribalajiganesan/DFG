<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    
    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->library(array('curl'));
    }

    public function index() {
        $data['products'] = $this->common_model->sql('select * from oc_product, oc_product_description where oc_product.product_id = 41 and oc_product_description.product_id = 41');        
        $this->load->view('home', $data);
    }
    
    function send_license(){
        $url = 'http://dfg.e4buzz.com/license_server/index.php/api/add_license';
//        $fields = json_decode('{"app_id":"LICAPPIDWEB", "customer_id":"1", "no_seat":"10", "start_date":"2017-06-27", "end_date":"2018-06-26"}', TRUE);
        $fields = json_decode('{"app_id":"1", "customer_id":"1", "no_seat":"10", "start_date":"2017-06-27", "end_date":"2017-07-26"}', TRUE);
        
        $this->curl->create($url);
        $this->curl->post(json_encode($fields));
        $this->curl->http_header("Authorization", '');
        $this->curl->http_header('Content-Type', 'application/json');

        $res = $this->curl->execute();
        if (!$res) {
            
        }
    }

}
