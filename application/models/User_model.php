<?php
class User_model extends CI_model{
 
 
 
public function register_user($user,$image,$email){
 
 
$this->db->insert('user', $user);
$data=$this->db->simple_query("UPDATE user SET user_picture='".$image."' WHERE user_email = '" .$email."'");
$data=$this->db->simple_query("UPDATE userlog SET dp='".$image."' WHERE user_name = '" .$user['user_name']."'");
 
}

 
public function login_user($email,$pass){
 
  $this->db->select('*');
  $this->db->from('user');
  $this->db->where('user_email',$email);
  $this->db->where('user_password',$pass);
 
  if($query=$this->db->get())
  {
      $data =  $query->row_array();
      //echo $this->db->last_query();exit;
      return $data;
  }
  else{
    return false;
  }
 
 
}

public function getfaq()
{
  $this->db->select("*");

  $this->db->from('faq');

  $query = $this->db->get();

  return $query->result();
}
public function getContentSecond()
{
  $this->db->select("*");

  $this->db->from('website_content_second');

  $query = $this->db->get();

  return $query->result();
}
public function getImages()
{
  $this->db->select("*");

  $this->db->from('our_work');

  $query = $this->db->get();

  return $query->result();
}
public function getTeam()
{
  $this->db->select("*");

  $this->db->from('team');

  $query = $this->db->get();

  return $query->result();
}
public function getAddress()
{
  $this->db->select("*");

  $this->db->from('address');

  $query = $this->db->get();

  return $query->result();
}
public function getAbout()
{
  $this->db->select("*");

  $this->db->from('about');

  $query = $this->db->get();

  return $query->result();
}
public function getBanner()
{
  $this->db->select("*");

  $this->db->from('website_banner');

  $query = $this->db->get();

  return $query->result();
}
public function getContent()
{
  $this->db->select("*");

  $this->db->from('website_content');

  $query = $this->db->get();

  return $query->result();
}

public function user_check($email,$pass){
 
  $this->db->select('*');
  $this->db->from('user');
  $this->db->where('user_email',$email);
  $this->db->where('user_password',$pass);
  $query=$this->db->get();
 
  if($query->num_rows()>0){
    return true;
  }else{
    return false;
  }
 
}
public function email_check($email){
 
  $this->db->select('*');
  $this->db->from('user');
  $this->db->where('user_email',$email);
  $query=$this->db->get();
 
  if($query->num_rows()>0){
    return true;
  }else{
    return false;
  }
 
}
public function getPlan()
{
  $this->db->select("*");

  $this->db->from('plan_desc');

  $query = $this->db->get();

  return $query->result();
}

public function getPlanfromid($planid)
{
  $this->db->where('plan_id', $planid);
    $query = $this->db->get('plan_desc');
    if($query->num_rows() > 0){
      return $query->row_array();
    }else{
      return false;
    }
}

public function change_password($email,$pass){

//$this->db->set('user_password', $pass);
//$this->db->where('user_email', $email);
//$this->db->update('user');

  $data=$this->db->simple_query("UPDATE user SET user_password='".$pass."' WHERE user_email = '" .$email."'");
 
  if($data){
    return true;
  }else{
    return false;
  } 
}
} 
?>