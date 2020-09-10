<?php  
 class Main_model extends CI_Model  
 {  
      function can_login($username, $password)  
      {  
           $login_status=1;
           $this->db->where('name', $username);  
           $this->db->where('password', $password);
        //   $this->db->where('login_status',$login_status);
           $query = $this->db->get('userlog');  
           //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;       
           }  
      }
 }  