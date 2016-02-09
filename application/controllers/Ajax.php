<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: nimzy
 * Date: 2/9/2016
 * Time: 1:35 PM
 */
class Ajax extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('user');
        $this->load->model('donation');
        $this->load->model('centres_model');
    }

    public function index(){
        $isAvailable = false;
        if(!isset($_POST['type'])){
            echo json_encode(array(
                'valid' => $isAvailable,
            ));
            exit;
        }

        switch($_POST['type']){
            case 'delete_donor':
                if($this->user->delete($_POST['object_id'])){
                    $isAvailable = true;
                }
                break;

            case 'delete_donation':
                if($this->donation->delete($_POST['object_id'])){
                    $isAvailable = true;
                }
                break;

            case 'delete_centre':
                if($this->centres_model->delete($_POST['object_id'])){
                    $isAvailable = true;
                }
                break;
        }

        echo json_encode(array(
            'valid' => $isAvailable,
        ));
    }

}