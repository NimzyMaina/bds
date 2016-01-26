<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donor extends CI_Controller {

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

public function index($id){
	$data['donor'] = $this->user->getByID($id);

	$this->form_validation->set_rules('fname','First Name','required');
		$this->form_validation->set_rules('lname','Last Name','required');
		$this->form_validation->set_rules('phone','Phone','required');
		$this->form_validation->set_rules('blood_grp','Blood Group','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		

		if($this->form_validation->run()){
			$data = array(
			'fname' => $this->input->post('fname'),
			'lname' => $this->input->post('lname'),
			'phone' =>$this->input->post('phone'),
			'email' => $this->input->post('email'),
			'password' => sha1($this->input->post('password')),
			'role' => 'donor',
			'blood_grp' => $this->input->post('blood_grp')); 

			if($this->user->update($id,$data)){
			$this->session->set_flashdata('success', 'Donor was Successfully Updated');
			 redirect(current_url());
		}else{
		$this->session->set_flashdata('error', 'Donor Could Not be Updated');
			$this->load->view('templates/header');
			$this->load->view('update');
			$this->load->view('templates/footer');
		}
		}else{
			$this->load->view('templates/header');
			$this->load->view('update',$data);
			$this->load->view('templates/footer');
		}

}
}