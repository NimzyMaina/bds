<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
public function __construct(){
	parent::__construct();
	$this->load->model('user');
}

	public function index(){
		//print_r($_POST);exit;
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		if($this->form_validation->run()){
			if($this->user->login($email,$password)){
			redirect('home');
		}else{
			$this->session->set_flashdata('error', 'Invalid E-mail or password');
			$this->load->view('login');
		}
		}else{
			$this->load->view('login');
		}
	}

	public function register(){
		$this->form_validation->set_rules('fname','First Name','required');
		$this->form_validation->set_rules('lname','Last Name','required');
		$this->form_validation->set_rules('phone','Phone','required');
		$this->form_validation->set_rules('blood_grp','Blood Group','required');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('confirm','Confirm Password','required|matches[password]');

		$data = array(
			'fname' => $this->input->post('fname'),
			'lname' => $this->input->post('lname'),
			'phone' =>$this->input->post('phone'),
			'email' => $this->input->post('email'),
			'password' => sha1($this->input->post('password')),
			'role' => 'donor',
			'blood_grp' => $this->input->post('blood_grp'));

		if($this->form_validation->run()){
			if($this->user->register($data)){
			$this->session->set_flashdata('success', 'Donor was Successfully Created');
			 redirect(current_url());
		}else{
		$this->session->set_flashdata('error', 'Donor Could Not be Registered');
			$this->load->view('register');	
		}
		}else{
			$this->load->view('register');
		}
	}

	public function logout(){
		$this->session->unset_userdata('is_logged_in');
		$this->session->sess_destroy();
		redirect('login');
	}
}
