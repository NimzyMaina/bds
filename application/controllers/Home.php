<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
    public $role = '';
    public $user_id = '';
public function __construct(){
	parent::__construct();
	$this->load->model('home_model');
	$this->load->model('centres_model');
	$this->load->model('user');
	$this->load->model('donation');

    $data = $this->session->userdata('is_logged_in');
    $this->role = $data['role'];
    $this->user_id = $data['user_id'];

    if(empty($this->session->userdata('is_logged_in'))){
        redirect('login');
    }
    //print_r($this->session->userdata('is_logged_in'));exit;
}

public function index(){
    if($this->role == 'donor'){
        redirect('basic');
    }

    $temp = $this->donation->getChart();
    $cup = array();
    $labels = array();
    $ar = 0;
    foreach ($temp[0] as $item => $value){
         $ar += $value;
        array_push($cup,$value);
        array_push($labels,$item);
    }
    $i = 0;
    $ar--;
    array_shift($cup);
    array_shift($labels);
    $data['labels2'] = $labels;
    foreach($labels as $val){
        $p = number_format($cup[$i]/$ar*100);
        $labels[$i] = $val." ". $p .'%';
        $i++;
    }
    //echo $ar;
    $data['values'] = $cup;
    $data['labels'] = $labels;

	$this->load->view('templates/header',$data);
	$this->load->view('dashboard');
	$this->load->view('templates/footer');
}

public function donors(){
    if($this->role == 'donor'){
        redirect('basic');
    }

	$data['donors'] = $this->user->getDonors();
	$this->load->view('templates/header',$data);
	$this->load->view('donors');
	$this->load->view('templates/footer');
}

	public function donations(){
		//echo '<pre>';
        if($this->role != 'admin'){
		$data['donations'] = $this->donation->getDonations($this->user_id);
        }else{
            $data['donations'] = $this->donation->getDonations();
        }
        $data['role'] = $this->role;
		//var_dump($data['donations']);exit;
		$this->load->view('templates/header',$data);
		$this->load->view('donations');
		$this->load->view('templates/footer');
	}

	public function centres(){

        if($this->role == 'donor'){
            redirect('basic');
        }
		$data['centres'] = $this->centres_model->getCentres();

        $this->load->view('templates/header',$data);
        $this->load->view('centres');
        $this->load->view('templates/footer');
	}

    public function basic(){
        $data['appointment'] = $this->user->getAppointment($this->user_id);


        $this->load->view('templates/header',$data);
        $this->load->view('basic');
        $this->load->view('templates/footer');
    }


}