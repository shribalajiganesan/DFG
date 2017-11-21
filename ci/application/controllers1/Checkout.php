<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

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

		$this->load->library(array('session','encryption','cart','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->model('Order_model','order');
		$this->load->model('User_model','user');
	}
	public function index()
	{
		echo 1; exit;
		//echo $this->config->item('table_prefix');
		//$this->load->view('home/index');
	}

	public function add_to_cart(){
		if($this->input->post()){
			$data = array(
				'id'      => $this->encryption->decrypt($this->input->post('id')),
		        'qty'     => 1,
		        'price'   => 66.00,
		        'name'    => 'Plan 66'
		    );
			if(count($this->cart->contents()) > 0){
				foreach($this->cart->contents() as $items){
					if($items['id'] == $data['id']) {
						$data = array();
						$data = array(
						        'rowid' => $items['rowid'],
						        'qty'   => ($items['qty'] + 1)
						);
						$this->cart->update($data);
					}
					else {
						$this->cart->insert($data);
					}
				}
			} else {
				$this->cart->insert($data);
			}
			if(count($this->session->userdata('User')) >0) {
				$order_data['existing_user'] = $this->session->userdata('User');
	            $order_data['new_user'] = '';
	            $order_data['items'] = $this->cart->contents();
	            $this->session->set_userdata('order_data',$order_data);
				redirect(base_url('checkout/payment'));
			} else {
				redirect('checkout/authenticate');
			}
		} else {
			redirect('/');
		}
	}

	public function authenticate() {
		$this->load->view('checkout/authenticate');
	}

	public function checkout_register(){

		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules(
		        'u_email', 'Email Id',
		        'trim|required|valid_email|is_unique[users.email]',
		        array(
		                'required'      => 'You have not provided %s.',
		                'is_unique'     => 'This %s already exists. Please login to proceed.'
		        )
		);
		$this->form_validation->set_rules('pass', 'Password', 'required');
		$this->form_validation->set_rules('cpass', 'Confirm Password', 'required|matches[pass]');

		if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('checkout/authenticate');
            //redirect(base_url('/#login-register'));
            //echo 1; exit;
        }
        else
        {
            //$this->load->view('formsuccess');
            //print_r($this->input->post()); exit;
            $data['first_name'] = $this->input->post('first_name');
            $data['last_name'] = $this->input->post('last_name');
            $data['email'] = $this->input->post('u_email');
            $data['phone'] = $this->input->post('u_phone');
            $data['password'] = sha1($this->input->post('pass'));
            $data['created_on'] = date('Y-m-d H:i:s');
            $data['user_type'] = 1;
            $order_data['existing_user'] = '';
            $order_data['new_user'] = $data;
            $order_data['items'] = $this->cart->contents();
            $this->session->set_userdata('order_data',$order_data);
            redirect(base_url('checkout/payment'));
            /*if($id = $this->user->addUser($data)) {
            	$user_data = array('id'=> $user['id']);
            	$this->session->set_userdata('CheckoutUser',$user_data);
            	$this->session->set_flashdata('success','Registration Successful.');
            	redirect(base_url('checkout/payment'));
            } else {
            	$this->session->set_flashdata('error','Registration Failed. Please, try again later.');
            	redirect(base_url('checkout/authenticate'));
            }*/
        }
	}

	public function checkout_login() {

		$this->form_validation->set_rules(
		        'username', 'Email Id',
		        'trim|required|valid_email',
		        array(
		                'required'      => 'You have not provided %s.',
		                'valid_email'     => 'This %s in not a valid email'
		        )
		);
		$this->form_validation->set_rules('pass', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('checkout/authenticate');
        }
        else
        {
            $email = $this->input->post('username');
            $password = sha1($this->input->post('pass'));
            $data['last_login'] = date('Y-m-d H:i:s');
            $user = $this->user->checkLogin($email,$password,$data);
            if(count($user) > 0) {
            	$user_data = array('id'=> $user['id'], 'name'=> $user['first_name'].' '.$user['last_name'], 'email'=> $user['email'], 'last_login'=> $user['last_login']);
            	$this->session->set_userdata('User',$user_data);
            	$order_data['existing_user'] = $user_data;
	            $order_data['new_user'] = '';
	            $order_data['items'] = $this->cart->contents();
	            $this->session->set_userdata('order_data',$order_data);
	            redirect(base_url('checkout/payment'));
            	/*$this->session->set_userdata('User',$user_data);
            	$this->session->set_flashdata('success','Login Successful.');
            	redirect(base_url('checkout/payment'));*/
            } else {
            	$this->session->set_flashdata('error','Login Failed. Please, provide correct email id and password.');
            	redirect(base_url('checkout/authenticate'));
            }
        }
	}

	public function payment() {
		if($this->cart->total_items() > 0 && count($this->session->userdata('order_data')) >0){

			$sess_data = $this->session->userdata('order_data');
			$order_data = array();
			foreach($sess_data['items'] as $item) {
        		$order_data = array(//'user_id'=>$user_id,
        							'ordered_on' => date('Y-m-d H:i:s'),
        							'order_status' =>'order placed',
        							'payment_status' => 'success',
        							//'payment_details' => json_encode($payment_data),
        							'item_id' => $item['id'],
        							'item_name' => $item['name'],
        							'item_qty' => $item['qty'],
        							'total_price' => $item['subtotal'],
        							'order_details' => json_encode($item));
        	}			
        	//print_r($order_data); exit;
			echo '<!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="paypal_form"> -->
				<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="paypal_form">
				    <input type="hidden" name="cmd" value="_xclick">
				    <input type="hidden" name="business" value="websalvia@gmail.com">
				    <input type="hidden" name="item_name" value="'.$order_data['item_name'].'">
				    <input type="hidden" name="item_number" value="'.$order_data['item_qty'].'">
				    <input type="hidden" name="amount" value="'.$order_data['total_price'].'">
				    <input type="hidden" name="no_shipping" value="0">
				    <input type="hidden" name="no_note" value="1">
				    <input type="hidden" name="currency_code" value="USD">
				    <input type="hidden" name="lc" value="AU">
				    <input type="hidden" name="bn" value="PP-BuyNowBF">
				    <input type="hidden" name="return" value="'.base_url('checkout/payment_success').'">
				    <input type="hidden" name="cancel_return" value="'.base_url('checkout/payment_failed').'" />
				</form>
				<script> document.getElementById("paypal_form").submit(); </script>';
			exit;
			/*$this->form_validation->set_rules('card_holder_name', 'Card Holder Name', 'trim|required');
			$this->form_validation->set_rules('card_number', 'Card Number', 'trim|required');
			$this->form_validation->set_rules('card_type', 'Card Type', 'trim|required');
			$this->form_validation->set_rules('exp_month', 'Exp Month', 'trim|required');
			$this->form_validation->set_rules('exp_year', 'Card Year', 'trim|required');
			$this->form_validation->set_rules('cvv', 'Card CVV', 'trim|required');

			if ($this->form_validation->run() == FALSE)
	        {
	            $this->load->view('checkout/payment');
	            //redirect(base_url('/#login-register'));
	            //echo 1; exit;
	        }
	        else
	        {
	        	$sess_data = $this->session->userdata('order_data');
	        	//print_r(count($sess_data['new_user'])); exit;
	        	$user_id = '';
	        	if($sess_data['new_user'] != '' && count($sess_data['new_user']) > 0){
	        		$data_user = $sess_data['new_user'];
	        		$user_id = $this->user->addUser($data_user);

	        		$data['last_login'] = date('Y-m-d H:i:s');
	        		$user = $this->user->updateUser($user_id,$data);
	        		$user_data = array('id'=> $user_id, 'name'=> $data_user['first_name'].' '.$data_user['last_name'], 'email'=> $data_user['email'], 'last_login'=> '');
            		$this->session->set_userdata('User',$user_data);

	        	} else if(count($sess_data['existing_user']) > 0) {
	        		$user_id = $sess_data['existing_user']['id'];
	        	}

	        	$order_data = array();

	        	$payment_data['card_holder_name'] 	= $this->input->post('card_holder_name');
	        	$payment_data['card_number'] 		= $this->input->post('card_number');
	        	$payment_data['card_type'] 			= $this->input->post('card_type');
	        	$payment_data['exp_month'] 			= $this->input->post('exp_month');
	        	$payment_data['exp_year'] 			= $this->input->post('exp_year');
	        	$payment_data['cvv'] 				= $this->input->post('cvv');

	        	

	        	foreach($sess_data['items'] as $item) {
	        		$order_data = array('user_id'=>$user_id,
	        							'ordered_on' => date('Y-m-d H:i:s'),
	        							'order_status' =>'order placed',
	        							'payment_status' => 'success',
	        							'payment_details' => json_encode($payment_data),
	        							'item_id' => $item['id'],
	        							'item_name' => $item['name'],
	        							'item_qty' => $item['qty'],
	        							'total_price' => $item['subtotal'],
	        							'order_details' => json_encode($item));
	        	}
	        	
	        	$order_id = $this->order->save_order($order_data);
	        	$licence = $this->order->save_licence($user_id,5);

	        	$this->session->unset_userdata('order_data');
	        	$this->cart->destroy();

	        	redirect(base_url('checkout/order_placed'));
	        }*/
			
		} else {
			redirect(base_url('/'));
		}
	}

	public function payment_success(){
		if($this->cart->total_items() > 0 && count($this->session->userdata('order_data')) >0 && isset($_GET) && count($_GET) > 0){
			$sess_data = $this->session->userdata('order_data');
        	//print_r(count($sess_data['new_user'])); exit;
        	$user_id = '';
        	if($sess_data['new_user'] != '' && count($sess_data['new_user']) > 0){
        		$data_user = $sess_data['new_user'];
        		$user_id = $this->user->addUser($data_user);

        		$data['last_login'] = date('Y-m-d H:i:s');
        		$user = $this->user->updateUser($user_id,$data);
        		$user_data = array('id'=> $user_id, 'name'=> $data_user['first_name'].' '.$data_user['last_name'], 'email'=> $data_user['email'], 'last_login'=> '');
        		$this->session->set_userdata('User',$user_data);

        	} else if(count($sess_data['existing_user']) > 0) {
        		$user_id = $sess_data['existing_user']['id'];
        	}

        	$order_data = array();

        	$payment_data = $_GET;
        	/*$payment_data['card_holder_name'] 	= $this->input->post('card_holder_name');
        	$payment_data['card_number'] 		= $this->input->post('card_number');
        	$payment_data['card_type'] 			= $this->input->post('card_type');
        	$payment_data['exp_month'] 			= $this->input->post('exp_month');
        	$payment_data['exp_year'] 			= $this->input->post('exp_year');
        	$payment_data['cvv'] 				= $this->input->post('cvv');*/

        	

        	foreach($sess_data['items'] as $item) {
        		$order_data = array('user_id'=>$user_id,
        							'ordered_on' => date('Y-m-d H:i:s'),
        							'order_status' =>'order placed',
        							'payment_status' => $payment_data['st'],
        							'payment_details' => json_encode($payment_data),
        							'item_id' => $item['id'],
        							'item_name' => $item['name'],
        							'item_qty' => $item['qty'],
        							'total_price' => $item['subtotal'],
        							'order_details' => json_encode($item));
        	}
        	$order_id = $this->order->save_order($order_data);
        	$licence = $this->order->save_licence($user_id,5);

        	$this->session->unset_userdata('order_data');
        	$this->cart->destroy();

        	redirect(base_url('checkout/order_placed'));
		} else {
			redirect(base_url('/'));
		}

	}

	public function payment_failed(){
		$this->session->unset_userdata('order_data');
	    $this->cart->destroy();
	    redirect(base_url('/'));
	}

	public function order_placed(){
		//$this->load->view('checkout/order_placed');
		//echo count($this->session->userdata('User')); exit;
		if(count($this->session->userdata('User') > 0)) {
			$this->load->view('checkout/order_placed');
		} else {
			redirect(base_url('/'));
		}
	}

	public function empty_cart(){
		$this->cart->destroy(); exit;
	}
}
