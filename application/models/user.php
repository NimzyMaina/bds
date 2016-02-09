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
                 $session_data['user_id'] = $result->id;
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

	function delete($id){
        if($this->db->where('id',$id)->delete('user')){
            return true;
        }
        return false;
    }//delete

    function get_donors()
    {
        $this->db->select('id,fname,lname');
        $this->db->from('user');
        $this->db->where('role','donor');
        $query = $this->db->get();
        $result = $query->result();

        //array to store department id & department name
        $dept_id = array('-SELECT-');
        $dept_name = array('-SELECT-');

        for ($i = 0; $i < count($result); $i++)
        {
            array_push($dept_id, $result[$i]->id);
            array_push($dept_name, $result[$i]->fname.' '.$result[$i]->lname);
        }
        return $department_result = array_combine($dept_id, $dept_name);
    }

    function getAppointment($id){

        //echo
        $sql = "SELECT max(`nxt_appointment`) AS next
                    from donations
                    where `donor_id` = $id";

       $stmt =  $this->db->query($sql);


        return $query = $stmt->result();
    }

}//class