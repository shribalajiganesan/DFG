<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

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

		$this->load->library(array('session','encryption','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->model('Order_model','order');
		$this->load->model('User_model','user');
	}
	public function index()
	{
		if(count($this->session->userdata('User')) >0) {
			$user = $this->session->userdata('User');
			$data['orders'] = $this->order->ordersByUser($user['id']);
			$this->load->view('orders/index',$data);
		} else {
			redirect('/');
		}
	}

	public function download(){
		if(count($this->session->userdata('User')) >0) {
			$user = $this->session->userdata('User');
			$data['orders'] = $this->order->ordersByUser($user['id']);
			$this->load->view('orders/download',$data);
		} else {
			redirect('/');
		}
	}
}
