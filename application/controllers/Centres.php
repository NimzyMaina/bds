<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: nimzy
 * Date: 2/9/2016
 * Time: 6:50 PM
 */
class Centres extends  CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('user');
        $this->load->model('centres_model');

        if(empty($this->session->userdata('is_logged_in'))){
            redirect('login');
        }
    }

    public function add(){
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('phone','Telephone','required');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[centres.email]');
        $this->form_validation->set_rules('address','Address','required');

        $centre = array(
            'name' => $this->input->post('name'),
            'phone' =>$this->input->post('phone'),
            'email'=> $this->input->post('email'),
            'address' => $this->input->post('address')
        );

        if($this->form_validation->run() == true){
            if($this->centres_model->add($centre)){
                $this->session->set_flashdata('success','Centre Successfully Added!!');
                redirect(current_url());
            }else{
                $this->session->set_flashdata('error','Centre Not Added!!');
                redirect(current_url());
            }
        }else{
            $this->load->view('templates/header');
            $this->load->view('add_centres');
            $this->load->view('templates/footer');
        }
    }

    public function edit($id){
        $data['id'] = $id;
        $data['centre'] = $this->centres_model->getById($id);
        $centre = array(
            'name' => $this->input->post('name'),
            'phone' =>$this->input->post('phone'),
            'email'=> $this->input->post('email'),
            'address' => $this->input->post('address')
        );

        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('phone','Telephone','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('address','Address','required');

        if($this->form_validation->run() == true){
            if($this->centres_model->edit($id,$centre)){
                $this->session->set_flashdata('success','Centre Successfully Edited!!');
                redirect(current_url());
            }else{
                $this->session->set_flashdata('error','Centre Not Edited!!');
                redirect(current_url());
            }
        }else{
            $this->load->view('templates/header',$data);
            $this->load->view('edit_centres');
            $this->load->view('templates/footer');
        }

    }

}