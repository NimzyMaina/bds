<?php  defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: nimzy
 * Date: 2/9/2016
 * Time: 1:53 PM
 */
class Donations extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('user');
        $this->load->model('donation');

        if(empty($this->session->userdata('is_logged_in'))){
            redirect('login');
        }
    }

    public function add(){
        $data['donors'] = $this->user->get_donors();
//        echo "<pre>";
//        var_dump($data['donors']);
//        exit;
        $this->form_validation->set_rules('donor_id','Donor Name','callback_combo_check');
        $this->form_validation->set_rules('quantity','Quantity','required|numeric');
        $this->form_validation->set_rules('nxt_appointment','Next Appointment','required');

        $temp = date('Y-m-d',strtotime($this->input->post('nxt_appointment')));

        $donation = array(
            'donor_id' => $this->input->post('donor_id'),
            'quantity' => $this->input->post('quantity'),
            'nxt_appointment' => $temp,
            'date' => date('Y-m-d'),
            'status' => 'Processing');

        if($this->form_validation->run() == true){
            //print_r($donation);exit;
            if($this->donation->add($donation)){
             $this->session->set_flashdata('success','Donation Successfully Added!!');
                redirect(current_url());
            }else{
                $this->session->set_flashdata('error','Donation Was Not Added!!');
                redirect(current_url());
            }
        }else{
            $this->load->view('templates/header',$data);
            $this->load->view('add_donation',$data);
            $this->load->view('templates/footer');
        }

    }

    function combo_check($str)
    {
        if ($str == '-SELECT-')
        {
            $this->form_validation->set_message('combo_check', 'Valid %s Name is required');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function edit($id){
        $data['id'] = $id;
        $data['donors'] = $this->user->get_donors();
        $data['donation'] = $this->donation->getByID($id);
        $data['donor'] = $this->user->getByID($data['donation'][0]->donor_id);

//        echo "<pre>";
//        var_dump($data['donors']);
//        exit;
        $this->form_validation->set_rules('donor_id','Donor Name','callback_combo_check');
        $this->form_validation->set_rules('quantity','Quantity','required|numeric');
        $this->form_validation->set_rules('nxt_appointment','Next Appointment','required');

        $temp = date('Y-m-d',strtotime($this->input->post('nxt_appointment')));
        $temp2 = date('Y-m-d',strtotime($this->input->post('date')));
        $temp3 = date('Y-m-d',strtotime($this->input->post('expiry')));


        $donation = array(
            'donor_id' => $this->input->post('donor_id'),
            'quantity' => $this->input->post('quantity'),
            'nxt_appointment' => $temp,
            'date' => $temp2,
            'status' => $this->input->post('status'),
            'expiry' => $temp3);

        if($this->form_validation->run() == true){
           // print_r($donation);exit;
            if($this->donation->edit($id,$donation)){
                $this->session->set_flashdata('success','Donation Successfully Edited!!');
                redirect(current_url());
            }else{
                $this->session->set_flashdata('error','Donation Was Not Edited!!');
                redirect(current_url());
            }
        }else{
            $this->load->view('templates/header',$data);
            $this->load->view('edit_donation',$data);
            $this->load->view('templates/footer');
        }

    }

}