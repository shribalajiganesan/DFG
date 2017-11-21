<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();

		$this->load->library(array('session','encryption'));
		$this->load->helper(array('url','form'));
		$this->load->model('Customer_model','customer');
	}
	public function index()
	{
		//echo $this->config->item('table_prefix');
		$this->load->view('home/index');
	}

	public function add(){
		if($this->input->post()){
			$user = $this->session->userdata('User');
			$data = array('first_name'=> trim($this->input->post('fname')),
						'last_name' => trim($this->input->post('lname')),
						'email' => trim($this->input->post('email')),
						'phone' => trim($this->input->post('phone')),
						'created_on' => date('Y-m-d H:i:s'),
						'created_by' => $user['id'],
						'status' => 1
					);
			if($this->customer->is_customer_exists($data['email'])){
				echo 'customer exists';
			} else {
				if($this->customer->add_customer($data)){
					echo 'success';
				} else {
					echo 'failed';
				}
			}
		} else {
			echo 'failed';
		}
		exit;
	}

	public function list_by_owner(){
		$user = $this->session->userdata('User');
		if($this->input->post()){
			$customers = $this->customer->customerByOwner($user['id'],$this->input->post('key'));
		} else {
			$customers = $this->customer->customerByOwner($user['id']);
		}
		
		if(count($customers) > 0) { 
          foreach($customers as $customer) { 
           echo '<li data-customer="'. $customer['id'].'">
            <div class="userl-item">'.$customer['first_name'].' '.$customer['last_name'].'
              <div class="userl-item-right"> <span class="badge">4</span> <span class="badge">4</span> </div>
            </div>
          </li>';
      		}
      	} else {
      		echo '';
      	}
      	exit;
	}
}
