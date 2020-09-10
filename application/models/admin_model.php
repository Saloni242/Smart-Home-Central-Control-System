<?php
class admin_model extends CI_model{

public function email_check($email,$password){
 
  $this->db->select('*');
  $this->db->from('admin');
  $this->db->where('admin_email',$email);
   $this->db->where('admin_password',$password);

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
public function admin_check($email,$pass){
 
  $this->db->select('*');
  $this->db->from('admin');
  $this->db->where('admin_email',$email);
  $this->db->where('admin_password',$pass);
  $query=$this->db->get();
 
  if($query->num_rows()>0){
    return true;
  }else{
    return false;
  }
 
}

public function register_faq($que,$ans){
 
 
$this->db->simple_query("INSERT into faq(faq_question,faq_answer) VALUES ('".$que."','".$ans."')");

 
}
public function register_address($loc,$phone,$add,$email,$add_id){
 
 
$data=$this->db->simple_query("UPDATE address SET locn='".$loc."' , phone='".$phone."'' , add='".$add." ', admin_email='".$email."' WHERE add_id = " .$add_id."");
 //$this->db->simple_query("UPDATE plan_desc SET Title='".$title."' , Description='".$desc."' , Month=".$month." , Price=".$price." , Device_count=".$device_cnt." WHERE plan_id = " .$planid."");
 if($data){
    return true;
  }else{
    return false;
  }


 
}

public function update_image($image){
 
 
$data=$this->db->simple_query("UPDATE admin SET admin_picture='".$image."' WHERE admin_id =1");
 //$this->db->simple_query("UPDATE plan_desc SET Title='".$title."' , Description='".$desc."' , Month=".$month." , Price=".$price." , Device_count=".$device_cnt." WHERE plan_id = " .$planid."");
 if($data){
    return true;
  }else{
    return false;
  }


 
}
public function fetch_data($query)
 {
  $this->db->select("*");
  $this->db->from("transaction");
  if($query != '')
  {
   $this->db->like('t_id', $query);
   $this->db->or_like('user_email', $query);
   $this->db->or_like('plan', $query);
   $this->db->or_like('amount', $query);
   $this->db->or_like('updated_at', $query);
  }
  $this->db->order_by('t_id', 'DESC');
  return $this->db->get();
 }

public function pass_change($email,$password){
 
 
$data=$this->db->simple_query("UPDATE admin SET admin_password='".$password."' WHERE admin_email ='".$email."'");
 //$this->db->simple_query("UPDATE plan_desc SET Title='".$title."' , Description='".$desc."' , Month=".$month." , Price=".$price." , Device_count=".$device_cnt." WHERE plan_id = " .$planid."");
 if($data){
    return true;
  }else{
    return false;
  }


 
}


public function plan_check($planid){
 
  $this->db->select('*');
  $this->db->from('plan_desc');
  $this->db->where('plan_id',$planid);
  $query=$this->db->get();
 
  if($query->num_rows()>0){
    return true;
  }else{
    return false;
  }
 
}

public function complain_check($cid){
 
  $this->db->select('*');
  $this->db->from('contact_us');
  $this->db->where('cid',$cid);
  $query=$this->db->get();
 
  if($query->num_rows()>0){
    return true;
  }else{
    return false;
  }
 
}

public function user_check($userid){
 
  $this->db->select('*');
  $this->db->from('user');
  $this->db->where('user_id',$userid);
  $query=$this->db->get();
 
  if($query->num_rows()>0){
    return true;
  }else{
    return false;
  }
 
}

public function member_check($userid){
 
  $this->db->select('*');
  $this->db->from('team');
  $this->db->where('member_id',$userid);
  $query=$this->db->get();
 
  if($query->num_rows()>0){
    return true;
  }else{
    return false;
  }
 
}
public function work_check($userid){
 
  $this->db->select('*');
  $this->db->from('our_work');
  $this->db->where('img_id',$userid);
  $query=$this->db->get();
 
  if($query->num_rows()>0){
    return true;
  }else{
    return false;
  }
 
}
public function getComplain()
{
  $this->db->select("*");

  $this->db->from('contact_us');

  $query = $this->db->get();

  return $query->result();
}
public function getPayment()
{
  $this->db->select("*");

  $this->db->from('transaction');

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

public function getAdmin()
{
  $this->db->select("*");

  $this->db->from('admin');

  $query = $this->db->get();

  return $query->result();
}
public function getMembers()
{
  $this->db->select("*");

  $this->db->from('team');

  $query = $this->db->get();

  return $query->result();
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
public function getImagefromid($planid)
{
  $this->db->where('img_id', $planid);
    $query = $this->db->get('our_work');
    if($query->num_rows() > 0){
      return $query->row_array();
    }else{
      return false;
    }
}
public function getUserfromid($userid)
{
	$this->db->where('user_id', $userid);
		$query = $this->db->get('user');
		if($query->num_rows() > 0){
			return $query->row_array();
		}else{
			return false;
		}
}

public function getMemberfromid($userid)
{
  $this->db->where('member_id', $userid);
    $query = $this->db->get('team');
    if($query->num_rows() > 0){
      return $query->row_array();
    }else{
      return false;
    }
}

public function getUser()
{
	$this->db->select("*");

	$this->db->from('user');

	$query = $this->db->get();

	return $query->result();
}
public function getUserlog($userid)
{
  $this->db->select("*");
  $this->db->from('userlog');
  $this->db->where('user_id', $userid);
    $query = $this->db->get();
    return $query->result();
}
public function getMember()
{
  $this->db->select("*");

  $this->db->from('team');

  $query = $this->db->get();

  return $query->result();
}

public function update_plan($planid,$title,$desc,$month,$price,$device_cnt){

  $data=$this->db->simple_query("UPDATE plan_desc SET Title='".$title."' , Description='".$desc."' , Month=".$month." , Price=".$price." , Device_count=".$device_cnt." WHERE plan_id = " .$planid."");
 
  if($data){
    return true;
  }else{
    return false;
  }
 
}

public function add_plan($plan){
 
 
$this->db->insert('plan_desc', $plan);
 
}

public function delete_plan($planid){
	$data=$this->db->simple_query("DELETE from plan_desc WHERE plan_id = " .$planid."");
 
  if($data){
    return true;
  }else{
    return false;
  }

}

public function delete_complain($cid){
  $data=$this->db->simple_query("DELETE from contact_us WHERE cid = " .$cid."");
 
  if($data){
    return true;
  }else{
    return false;
  }

}

public function add_user($user,$email,$image){
 
 
$this->db->insert('user', $user);
$data=$this->db->simple_query("UPDATE user SET user_picture='".$image."' WHERE user_email = '" .$email."'");
 
}

public function add_member($user,$id,$image){
 
 
$this->db->insert('team', $user);
$data=$this->db->simple_query("UPDATE team SET member_image='".$image."' WHERE member_id = " .$id."");
 
}


public function update_user($user_id,$user_name, $user_email,$user_password,$user_age,$user_mobile,$user_country, $user_state,$user_picture){

  $data=$this->db->simple_query("UPDATE user SET user_password='".$user_password."', user_name='".$user_name."', user_mobile='".$user_mobile."', user_email='".$user_email."', user_age=".$user_age." , user_picture='".$user_picture."' , user_country='".$user_country."' , user_state='".$user_state."' WHERE user_id = " .$user_id."");
 
  if($data){
    return true;
  }else{
    return false;
  }
 
}

public function delete_user($userid){
	$data=$this->db->simple_query("DELETE from user WHERE user_id = " .$userid."");
 
  if($data){
    return true;
  }else{
    return false;
  }

}
public function delete_member($userid){
  $data=$this->db->simple_query("DELETE from team WHERE member_id = " .$userid."");
 
  if($data){
    return true;
  }else{
    return false;
  }

}
public function change_password($email,$pass){

//$this->db->set('user_password', $pass);
//$this->db->where('user_email', $email);
//$this->db->update('user');

  $data=$this->db->simple_query("UPDATE admin SET admin_password='".$pass."' WHERE admin_email = '" .$email."'");
 
  if($data){
    return true;
  }else{
    return false;
  }
 
}


}
 
 
?>