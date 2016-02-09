<?php

/**
 * Created by PhpStorm.
 * User: nimzy
 * Date: 2/9/2016
 * Time: 6:49 PM
 */
class Centres_model extends CI_Model
{

    public function add($data = array()){
        return $this->db->insert('centres',$data) ? true : false;
    }

    function delete($id){
        return $this->db->where('id',$id)->delete('centres') ? true : false;
    }//delete

    function getByID($id){
        return $this->db->where('id',$id)->get('centres')->result();
    }

    function edit($id,$data = array()){
        return $this->db->where('id',$id)->update('centres',$data) ? true : false;
    }

    function getCentres(){
        return $this->db->get('centres')->result();
    }
}