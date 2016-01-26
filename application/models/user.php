<?php 
Class User extends CI_Model
{
 function login($email, $password) {
   $this -> db -> select('id, email, fname ,lname, role, password');
   $this -> db -> from('user');
   $this -> db -> where('email', $email);
   $this -> db -> where('password', sha1($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

		   if($query -> num_rows() == 1){
		     $results = $query->result();
		     foreach($results as $result){

		     	$session_data['full_name'] = $result->fname.' '.$result->lname;
		     	$session_data['role'] = $result->role;
		     	$this->session->set_userdata('is_logged_in',$session_data);
		     }
		     return true; 
		   }
		   else
		   {
		     return false;
		   }
 	}//login

 function register ($data){
 	if($this->db->insert('user',$data)){
 		return true;
 	}
 	return false;
 }//register

function getDonors(){
	return $this->db->where('role','donor')->get('user')->result();
}

function getByID($id){
 return $this->db->where('id',$id)->get('user')->result();
}

function update ($id,$data){
 	if($this->db->where('id',$id)->update('user',$data)){
 		return true;
 	}
 	return false;
 }//update

}//class