<?php

/**
 * Created by PhpStorm.
 * User: nimzy
 * Date: 2/9/2016
 * Time: 1:58 PM
 */
class Donation extends CI_Model
{

    public function getDonations($id = null){
            $this->db->select('donations.*,fname,lname,blood_grp')
            ->from('donations')
            ->join('user', 'donations.donor_id = user.id');
        if($id){
            $this->db->where('donor_id',$id);
        }

        return $query = $this->db->get()->result();
    }

    public function add($data = array()){
        $donor = $this->db->where('id',$data['donor_id'])->get('user')->result();
        $grp =$donor[0]->blood_grp;//get blood group
        $blood = $this->db->select("$grp")->get('blood')->result();
        $num = $blood[0]->$grp; //get number of bags
        $num+=$data['quantity']; //increment quantity
        $this->db->update('blood',array($grp => $num)); //update

        return $this->db->insert('donations',$data) ? true : false;
    }

    function delete($id){
        return $this->db->where('id',$id)->delete('donations') ? true : false;
    }//delete

    function getByID($id){
        return $this->db->where('id',$id)->get('donations')->result();
    }

    function edit($id,$data = array()){
        return $this->db->where('id',$id)->update('donations',$data) ? true : false;
    }

    function getChart(){
       return $blood = $this->db->get('blood')->result();



    }

}