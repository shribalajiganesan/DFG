<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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

		$this->load->library(array('session','form_validation','encryption','cart'));
		$this->load->helper(array('url','form'));
		$this->load->model('User_model','user');
		$this->load->model('Customer_model','customer');
	}
	public function index()
	{
		//echo $this->config->item('table_prefix');
		
		//$this->load->view('home/index');
		echo 1; exit;
	}

	public function register(){

		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules(
		        'u_email', 'Email Id',
		        'trim|required|valid_email|is_unique[users.email]',
		        array(
		                'required'      => 'You have not provided %s.',
		                'is_unique'     => 'This %s already exists.'
		        )
		);
		$this->form_validation->set_rules('pass', 'Password', 'required');
		$this->form_validation->set_rules('cpass', 'Confirm Password', 'required|matches[pass]');

		if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('home/index');
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
            if($this->user->addUser($data)) {
            	$this->session->set_flashdata('success','Registration Successful.');
            	redirect(base_url('/#login-register'));
            } else {
            	$this->session->set_flashdata('error','Registration Failed. Please, try again later.');
            	redirect(base_url('/#login-register'));
            }
        }
	}

	public function login() {

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
            $this->load->view('home/index');
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
            	$this->session->set_flashdata('success','Login Successful.');
            	redirect(base_url('/users/licence_manager'));
            } else {
            	$this->session->set_flashdata('error','Login Failed. Please, provide correct email id and password.');
            	redirect(base_url('/#login-register'));
            }
        }
	}

	public function licence_manager() {
		if(count($this->session->userdata('User')) >0) {
			$user = $this->session->userdata('User');
			$data['licences'] = $this->user->licenceByUser($user['id']);
			$data['customers'] = $this->customer->customerByOwner($user['id']);
			$this->load->view('licencemanager/licence_manager',$data);
		} else {
			redirect('/');
		}
		
	}

	public function edit_profile(){
		if(count($this->session->userdata('User')) >0) {
			$sess_data = $this->session->userdata('User');
			$data['user'] = $this->user->userById($sess_data['id']);

			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
			if ($this->input->post('pass') != '' || $this->input->post('cpass') != '')
			{
				$this->form_validation->set_rules('pass', 'Password', 'required');
				$this->form_validation->set_rules('cpass', 'Confirm Password', 'required|matches[pass]');
			}

			if ($this->form_validation->run() == FALSE)
	        {
	            $this->load->view('users/edit_profile',$data);
	        }
	        else
	        {
	        	$id = $this->encryption->decrypt($this->input->post('id'));

				$update['first_name'] = $this->input->post('first_name');
	            $update['last_name'] = $this->input->post('last_name');
	            $update['phone'] = $this->input->post('phone');
	            if ($this->input->post('pass') != '' || $this->input->post('cpass') != '')
				{
	            	$update['password'] = sha1($this->input->post('pass'));
	            }
	            $update['modified_on'] = date('Y-m-d H:i:s');

	            $result = $this->user->updateUser($id,$update);
	            if($result){
	            	$this->session->set_flashdata('success','Profile updated Successfully.');
	            	redirect(base_url('users/edit_profile'));
	            } else {
	            	$this->session->set_flashdata('error','Profile update failed. Please try again later.');
	            	redirect(base_url('users/edit_profile'));
	            }
	            
	        }
		} else {
			redirect('/');
		}
		//$this->load->view('users/edit_profile',$data);
	}

	public function myaccount(){
		if(count($this->session->userdata('User')) >0) {
			$sess_data = $this->session->userdata('User');
			$data['user'] = $this->user->userById($sess_data['id']);
			$data['orders'] = array();
		} else {
			redirect('/');
		}
		$this->load->view('users/myaccount',$data);
	}

	public function Logout()
    {
    	$this->cart->destroy();
        $this->session->sess_destroy();
        $this->session->set_flashdata('success','You have Successfuly Logout.');
        redirect('/');
    }
}