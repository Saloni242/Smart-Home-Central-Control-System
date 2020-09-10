<?php
 
class admin extends CI_Controller {
 
public function __construct(){
 
        parent::__construct();
  	  	$this->load->helper('url');
  	  	$this->load->model('admin_model');
        $this->load->library('session');
        $this->load->helper('form');
        ob_start();

 
}
public function index()
{
	
	$this->load->view("login_admin.php");
  
}

public function logout()
{
	  $this->load->driver('cache');
    $this->session->sess_destroy();
    $this->cache->clean();
    ob_clean();
	  $this->load->view("logout_admin.php");
  
}
public function header()
{

	$this->load->view("header.php");
  
}
public function login_view(){

	  $password=$this->input->post('admin_password');
    $email = $this->input->post("admin_email");

    $newdata = array( 
   'admin_email'  => $this->input->post("admin_email"), 
   'admin_password' => $this->input->post('admin_password'), 
   'logged_in' => TRUE
);  

    $this->session->set_userdata($newdata);

  	$this->load->helper(array('form'));
  	$this->load->library('form_validation');
  	$this->form_validation->set_rules('admin_email', 'Email', 'required|valid_email'); 
    $this->form_validation->set_rules('admin_password', 'Password', 'required|min_length[4]'); 
     $admin=array(
      
      'admin_email'=>$this->input->post('admin_email'),
      'admin_password'=>$this->input->post('admin_password')
        );

      $email_exist = $this->admin_model->email_check($admin['admin_email'],$admin['admin_password']);

    if ($this->form_validation->run()==FALSE||!$email_exist) { 
           $this->session->set_flashdata('error_msg', 'Enter all fields correctly to login.'); 
            redirect('admin/index');
     } 

     else
     {
     		redirect('admin/welcome_admin');
     }
 
	$this->load->view("login_admin.php");
 
}

public function valid_email()
{
   $admin=array(
      
      'admin_email'=>$this->input->post('admin_email'),
      'admin_password'=>$this->input->post('admin_password')
        );
   		$email = $this->input->post("admin_email");
        $email_exist = $this->admin_model->email_check($admin['admin_email'],$admin['admin_password']);
        if ($email_exist) {
            $response = "true";
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($response));
            return $response;
        } else {
            $response = "An account with this email not exists";
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode($response));
            return $response;
        }
}
public function welcome_admin()
{
	$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else
    {
        #user Logged in
        //$this->load->view("viewname",$data);
        $this->data['admin'] = $this->admin_model->getAdmin(); 

		$this->load->view("welcome_admin",$this->data);
    }
	
}
public function complain()
{

	  $logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
        
      	$this->data['complains'] = $this->admin_model->getComplain();
      	$this->data['admin']=$this->admin_model->getAdmin();
      	$this->load->view('complain', $this->data); 
	  }
}

public function fetch()
 {
  $output = '';
  $query = '';
  $this->load->model('admin_model');
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }
  $data = $this->admin_model->fetch_data($query);
  $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
      <tr>
       <th>Transaction ID</th>
       <th>User Email</th>
       <th>Plan</th>
       <th>Amount</th>
       <th>Paid On</th>
       <th>Transaction Updated at</th>
      </tr>
  ';
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
    $output .= '
      <tr>
       <td>'.$row->t_id.'</td>
       <td>'.$row->user_email.'</td>
       <td>'.$row->plan.'</td>
       <td>'.$row->amount.'  INR</td>
       <td>'.$row->created_at.'</td>
       <td>'.$row->updated_at.'</td>
      </tr>
    ';
   }
  }
  else
  {
   $output .= '<tr>
       <td colspan="5">No Data Found</td>
      </tr>';
  }
  $output .= '</table>';
  echo $output;
 }

public function payment()
{

    $logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
        
        $this->data['payment'] = $this->admin_model->getPayment();
        $this->data['admin']=$this->admin_model->getAdmin();
        $this->load->view('pay_history', $this->data); 
    }
}
public function admin_manage()
{
	$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
	$this->data['admin'] = $this->admin_model->getAdmin();
	$this->load->view("admin_manage.php",$this->data);
}
}
public function editor_faq()
{

$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
    	$this->data['admin'] = $this->admin_model->getAdmin();
  $this->load->view("editor_faq.php",$this->data);
}
  
}
public function editoraddfaq()
{
  $que=$this->input->post('parameter');
  $ans=$this->input->post('parameter2');
  $this->admin_model->register_faq($que,$ans);
  
}
public function editor_address()
{

	$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
    	$this->data['admin'] = $this->admin_model->getAdmin();
  $this->load->view("editor_address.php",$this->data);
}
  
}
public function editor_work()
{

  $logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
      $this->data['admin'] = $this->admin_model->getAdmin();
      $this->data['imgs'] = $this->admin_model->getImages();
  $this->load->view("editor_work.php",$this->data);
}
  
}
public function editoraddcontact()
{
  $lcn=$this->input->post('parameter');
  $phone=$this->input->post('parameter2');
  $add=$this->input->post('parameter3');
  $email=$this->input->post('parameter4');
  $add_id=1;
  //$data=$this->admin_model->register_address($lcn,$phone,$add,$email,$add_id);
  //$this->db->simple_query("UPDATE address SET locn='".$loc."' , phone='".$phone."'' , add='".$add." ', admin_email='".$email."' WHERE add_id = " .$add_id."");
  $this->db->set('locn',$lcn);
  $this->db->set('phone',$phone);
  $this->db->set('address',$add);

  $this->db->set('admin_email',$email);
  $this->db->where('add_id', $add_id);
  $this->db->update('address');
  
}

public function editor_about()
{

	$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
    	$this->data['admin'] = $this->admin_model->getAdmin();
  $this->load->view("editor_about.php",$this->data);
}
  
}

public function editoraddabout()
{
  $title=$this->input->post('parameter');
  $caption=$this->input->post('parameter2');
  $res=$this->input->post('parameter3');
  $passion=$this->input->post('parameter4');
  $design=$this->input->post('parameter5');
  $support=$this->input->post('parameter6');
  $about=1;
  //$data=$this->admin_model->register_address($lcn,$phone,$add,$email,$add_id);
  //$this->db->simple_query("UPDATE address SET locn='".$loc."' , phone='".$phone."'' , add='".$add." ', admin_email='".$email."' WHERE add_id = " .$add_id."");
   	$this->db->set('Title',$title);
	$this->db->set('Caption',$caption);
	$this->db->set('R_content',$res);
	$this->db->set('P_content',$passion);
	$this->db->set('D_content',$design);
	$this->db->set('S_content',$support);

	$this->db->where('about_id', $about);
   	$this->db->update('about');
  
}

public function editor_banner()
{

	$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
    	$this->data['admin'] = $this->admin_model->getAdmin();
  		$this->load->view("editor_banner.php",$this->data);
}
  
}

public function editoraddbanner()
{
  //$editor1=$this->uri->segment(3);
  //echo"$editor1";

  $title=$this->input->post('title');
  $button=$this->input->post('button');
  $banner_id=1;

  $config['upload_path']="./assets/background";
  $config['allowed_types']='gif|jpg|png';
  //$config['encrypt_name'] = TRUE;

  $this->load->library('upload', $config);

  if($this->upload->do_upload("file")){
	$data = array('upload_data' => $this->upload->data());

	           

  $image= $data['upload_data']['file_name']; 
 
   	$this->db->set('Title',$title);
	$this->db->set('button_content',$button);
	$this->db->set('banner_image',$image);
	

	$this->db->where('banner_id', $banner_id);
   	$this->db->update('website_banner');
 	redirect("admin/editor_banner");
   }
  

}
public function editor_content_second()
{

  $logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
      $this->data['admin'] = $this->admin_model->getAdmin();
      $this->load->view("editor_content_second.php",$this->data);
}
  
}
public function editoraddcontentsecond()
{
  $con=$this->input->post('content');
 
  $content_id=1;

  $config['upload_path']="./assets/content";
  $config['allowed_types']='gif|jpg|png|jpeg';
  $this->load->library('upload', $config);

  if($this->upload->do_upload("file"))
  {
      $data = array('upload_data' => $this->upload->data());
      $image= $data['upload_data']['file_name']; 
     
      $this->db->set('content',$con);
      $this->db->set('img',$image);
      $this->db->where('content_id', $content_id);
      $this->db->update('website_content_second');
      redirect("admin/editor_content_second");
   }
}

public function editor_content()
{

	$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
    	$this->data['admin'] = $this->admin_model->getAdmin();
  		$this->load->view("editor_content.php",$this->data);
}
  
}

public function editoraddcontent()
{

  $title=$this->input->post('title');
  $button=$this->input->post('button');
  $content_id=1;

  $config['upload_path']="./assets/background";
  $config['allowed_types']='gif|jpg|png|jpeg';
  $this->load->library('upload', $config);

  if($this->upload->do_upload("file"))
  {
    	$data = array('upload_data' => $this->upload->data());           
      $image= $data['upload_data']['file_name']; 
     
        $this->db->set('Title',$title);
      	$this->db->set('Content',$button);
      	$this->db->set('Image',$image);
      	$this->db->where('content_id', $content_id);
        $this->db->update('website_content');

       	redirect("admin/editor_content");
   }
}

public function editor_team()
{

$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
    	$this->data['admin'] = $this->admin_model->getAdmin();
    	$this->data['members'] = $this->admin_model->getMembers();
  		$this->load->view("editor_team.php",$this->data);
}
  
}

public function update_workimg()
{
  $logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
  
        $this->data['admin']=$this->admin_model->getAdmin();
        $planid=$this->uri->segment(3);
        $this->data['records'] = $this->admin_model->getImagefromid($planid);
        $this->load->view('update_workimg',$this->data);
}
  
}

public function update_workimg2()
{
  $logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
      $this->data['admin'] = $this->admin_model->getAdmin();
    $this->load->view('update_workimg2.php',$this->data);
  }
}
public function reset_update_workimg()
{

  $logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
      $this->data['admin'] = $this->admin_model->getAdmin();
      $img_id=$this->input->post("img_id");
      $cap=$this->input->post('caption');
        

        $config['upload_path']="./assets/work";
          $config['allowed_types']='gif|jpg|png|jpeg';
          //$config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

          if($this->upload->do_upload("file")){
              $data = array('upload_data' => $this->upload->data());
             

              $image= $data['upload_data']['file_name']; 
              //$this->resize_image($data['upload_data']['file_name']);

        $user_exist = $this->admin_model->work_check($img_id);

        if($user_exist)
        {
          $data=$this->db->simple_query("UPDATE our_work SET caption='".$cap."', work_img='".$image."' WHERE img_id = " .$img_id."");
           $this->session->set_flashdata('success_msg', 'Information updated successfully'); 
           //redirect('admin/update_user2');
        }
        else
        {
          $this->session->set_flashdata('error_msg', 'Enter all fields to update.'); 
              redirect('admin/update_workimg2');
        }
      }
  $this->load->view('update_workimg2',$this->data);
}
}

public function update_member()
{

	$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{

      	$this->data['admin']=$this->admin_model->getAdmin();
      	$planid=$this->uri->segment(3);
      	$this->data['records'] = $this->admin_model->getMemberfromid($planid);
      	$this->load->view('update_member',$this->data);
}
	
}

public function update_member2()
{
	$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
    	$this->data['admin'] = $this->admin_model->getAdmin();
		$this->load->view('update_member2.php',$this->data);
	}
}
public function reset_update_member()
{

	$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
    	$this->data['admin'] = $this->admin_model->getAdmin();
		  $member_id=$this->input->post("member_id");
	      $name=$this->input->post('member_name');
	      $member_email=$this->input->post('member_email');
	      $field=$this->input->post('field');
	      $designation=$this->input->post('designation');
	      $member_about=$this->input->post('member_about');

	     	$config['upload_path']="./assets/team";
	        $config['allowed_types']='gif|jpg|png|jpeg';
	        //$config['encrypt_name'] = TRUE;

	    	$this->load->library('upload', $config);

	        if($this->upload->do_upload("file")){
	            $data = array('upload_data' => $this->upload->data());
	           

		          $image= $data['upload_data']['file_name']; 
		          //$this->resize_image($data['upload_data']['file_name']);

				$user_exist = $this->admin_model->member_check($member_id);

				if($user_exist)
				{
					$data=$this->db->simple_query("UPDATE team SET designation='".$designation."', name='".$name."', member_email='".$member_email."', field='".$field."', member_image='".$image."' , member_about='".$member_about."' WHERE member_id = " .$member_id."");
					 $this->session->set_flashdata('success_msg', 'User information updated successfully'); 
					 //redirect('admin/update_user2');
				}
				else
				{
					$this->session->set_flashdata('error_msg', 'Enter all fields to update.'); 
			        redirect('admin/update_member2');
				}
			}
	$this->load->view('update_member2',$this->data);
}
}

public function add_member()
{
  $logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
      $this->data['admin'] = $this->admin_model->getAdmin();

  $this->load->view('add_member',$this->data);
}
}
public function reset_add_member()
{

  $logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else
    { 
      $this->data['admin'] = $this->admin_model->getAdmin();

            $mid=$this->input->post('member_id');
            $mname=$this->input->post('member_name');
          //  $img=$this->input->post('img');
            $des=$this->input->post('designation');
            $field=$this->input->post('field');
            $abt=$this->input->post('member_about');
            $em=$this->input->post('member_email');

              $config['upload_path']="./assets/team";
              $config['allowed_types']='gif|jpg|png|jpeg';
              //$config['encrypt_name'] = TRUE;

              $this->load->library('upload', $config);
              if($this->upload->do_upload("file")){

              $data = array('upload_data' => $this->upload->data());
              $image= $data['upload_data']['file_name'];
              $data1 = array(
                  'member_id'=>$mid,
                  'name'=>$mname,
                  'member_image'=>$image,
                  'designation'=>$des,
                  'field'=>$field,
                  'member_about'=>$abt,
                  'member_email'=>$em
              ); 
                   $this->db->insert('team',$data1);
                  
                  redirect('admin/editor_team');
                 
        
            }
    }
}

public function reset_delete_member()
{
    
  $planid = $this->input->post('val');
  $plan_exist = $this->admin_model->member_check($planid);

  if($plan_exist)
  {
     $response=$this->admin_model->delete_member($planid);
     if($response){
     $this->session->set_flashdata('success_msg', 'Member deleted successfully'); 
    }
  }
  else
  {
    $this->session->set_flashdata('error_msg', 'Cant delete member.'); 
        
  }
}

public function deleteAllmember()
{

      $this->load->database();
      $this->data['member'] = $this->admin_model->getMember(); 

        $ids = $this->input->post('ids');

        $this->db->where_in('member_id', explode(",", $ids));

        $this->db->delete('team');
        echo json_encode(['success'=>"Item Deleted successfully."]);
        redirect('admin/editor_team');

}

public function manage_plan()
{

	$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{

	$this->data['plans']=$this->admin_model->getPlan();
	$this->data['admin']=$this->admin_model->getAdmin();


	$this->load->view('plan_view', $this->data); 
}

}

public function manage_user()
{

	$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{

	$this->data['users']=$this->admin_model->getUser(); 
	$this->data['admin']=$this->admin_model->getAdmin();


	$this->load->view('user_view_admin', $this->data); 
}
}

public function update_plan()
{
	$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
        	$this->data['admin']=$this->admin_model->getAdmin();
        	$planid=$this->uri->segment(3);
        	$this->data['records'] = $this->admin_model->getPlanfromid($planid);

        	$this->load->view('update_plan',$this->data);
}
	
}

public function update_plan2()
{
	$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
    	$this->data['admin'] = $this->admin_model->getAdmin();
		$this->load->view('update_plan2.php',$this->data);
	}
}

public function update_user2()
{
	$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
    	$this->data['admin'] = $this->admin_model->getAdmin();
	$this->load->view('update_user2',$this->data);
}
}

public function add_plan()
{

$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
    	$this->data['admin'] = $this->admin_model->getAdmin();
	$this->load->view('add_plan',$this->data);
}
}

public function delete_plan()
{

	$this->load->view('delete_plan');
}


public function update_user()
{


$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
    	$this->data['admin'] = $this->admin_model->getAdmin();
	$userid=$this->uri->segment(3);
	$this->data['records'] = $this->admin_model->getUserfromid($userid);


	//echo "$data['records']['Title']";
	
	//echo "$planid";

	/*$this->session->set_flashdata('planid',$planid);
	$this->session->set_flashdata('title',$data['records']['Title']);
	$this->session->set_flashdata('desc',$data['records']['Description']);
	$this->session->set_flashdata('month',$data['records']['Month']);
	$this->session->set_flashdata('price',$data['records']['Price']);
	$this->session->set_flashdata('dev',$data['records']['Device_count']);
*/

	$this->load->view('update_user',$this->data);
}
	
}

public function add_user()
{
	$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
    	$this->data['admin'] = $this->admin_model->getAdmin();

	$this->load->view('add_user',$this->data);
}
}

public function delete_user()
{

	$this->load->view('delete_user');
}

public function reset_update_plan()
{
	$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
    	$this->data['admin'] = $this->admin_model->getAdmin();
		$planid=$this->input->post("plan_id");
		$title=$this->input->post("plan_title");
		$desc=$this->input->post("plan_desc");
		$month=$this->input->post("plan_month");	
		$price=$this->input->post("plan_price");
		$device_cnt=$this->input->post("plan_device");

		//echo "$planid";

		$plan_exist = $this->admin_model->plan_check($planid);

		if($plan_exist)
		{
			 $response=$this->admin_model->update_plan($planid,$title,$desc,$month,$price,$device_cnt);
			 $this->session->set_flashdata('success_msg', 'Plan updated successfully'); 
		}
		else
		{
			$this->session->set_flashdata('error_msg', 'Enter all fields to update.'); 
	        redirect('admin/update_plan2');
		}
		$this->load->view('update_plan2',$this->data);
	}
}

public function reset_add_plan()
{

	$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
    	$this->data['admin'] = $this->admin_model->getAdmin();
	$plan=array(
	'plan_id'=>$this->input->post("plan_id"),
	'Title'=>$this->input->post("plan_title"),
	'Description'=>$this->input->post("plan_desc"),
	'Month'=>$this->input->post("plan_month"),	
	'Price'=>$this->input->post("plan_price"),
	'Device_count'=>$this->input->post("plan_device")
	);

	$planid=$this->input->post("plan_id");
	$plan_exist = $this->admin_model->plan_check($planid);

	if($plan_exist)
	{

		$this->session->set_flashdata('error_msg', 'Plan already exists'); 
        redirect('admin/add_plan');
		
	}
	else
	{
		 $response=$this->admin_model->add_plan($plan);
		 $this->session->set_flashdata('success_msg', 'Plan added successfully'); 
	}
	$this->load->view('add_plan',$this->data);
}
}

public function reset_delete_plan()
{
	  
	$planid = $this->input->post('val');
	$plan_exist = $this->admin_model->plan_check($planid);

	if($plan_exist)
	{
		 $response=$this->admin_model->delete_plan($planid);
		 if($response){
		 $this->session->set_flashdata('success_msg', 'Plan deleted successfully'); 
		}
	}
	else
	{
		$this->session->set_flashdata('error_msg', 'Cant delete plan.'); 
        
	}
	//$this->load->view('plan_view');
}

public function reset_delete_complain()
{
	  
	$cid = $this->input->post('val');
	$c_exist = $this->admin_model->complain_check($cid);

	if($c_exist)
	{
		 $response=$this->admin_model->delete_complain($cid);
		 if($response){
		 $this->session->set_flashdata('success_msg', 'Complain deleted successfully'); 
		}
	}
	else
	{
		$this->session->set_flashdata('error_msg', 'Cant delete complain.'); 
        
	}
	//$this->load->view('plan_view');
}

public function reset_add_user()
{

	$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
    	$this->data['admin'] = $this->admin_model->getAdmin();
	$user=array(
	  'user_id'=>$this->input->post("user_id"),
      'user_name'=>$this->input->post('user_name'),
      'user_email'=>$this->input->post('user_email'),
      'user_password'=>$this->input->post('user_password'),
      'user_age'=>$this->input->post('user_age'),
      'user_mobile'=>$this->input->post('user_mobile'),
      'user_country'=>$this->input->post('user_country'),
       'user_state'=>$this->input->post('user_state')
        );

		$config['upload_path']="./assets/img";
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;

    	$this->load->library('upload', $config);

        if($this->upload->do_upload("file")){
	            $data = array('upload_data' => $this->upload->data());
	           

	         $image= $data['upload_data']['file_name']; 
	          $this->resize_image($data['upload_data']['file_name']);

			$email = $this->input->post("user_email");
	        $user_exist = $this->admin_model->user_check($user['user_id']);

			if($user_exist)
			{

				$this->session->set_flashdata('error_msg', 'User already exists'); 
		        redirect('admin/add_user');
				
			}
			else
			{
				 $response=$this->admin_model->add_user($user,$user['user_email'],$image);
				 $this->session->set_flashdata('success_msg', 'user added successfully'); 
			}
		}
	$this->load->view('add_user',$this->data);
}
}
public function resize_image($filename)
    {
        
        $source_path = './assets/img/'.$filename;

        $target_path = './assets/thumbnails/'.$filename;

        $config_manip = array(

          'image_library' => 'gd2',

          'source_image' => $source_path,

          'new_image' => $target_path,

          'maintain_ratio' => TRUE,

          'width' => 150,

          'height' => 150

        );

       $this->load->library('image_lib');
	   $this->image_lib->initialize($config_manip);

        if (!$this->image_lib->resize()) {

          echo $this->image_lib->display_errors();

        }

        $this->image_lib->clear();

    }
public function reset_update_user()
{

	$logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
    	$this->data['admin'] = $this->admin_model->getAdmin();
		  $user_id=$this->input->post("user_id");
	      $user_name=$this->input->post('user_name');
	      $user_email=$this->input->post('user_email');
	      $user_password=$this->input->post('user_password');
	      $user_age=$this->input->post('user_age');
	      $user_mobile=$this->input->post('user_mobile');
	      $user_country=$this->input->post('user_country');
	      $user_state=$this->input->post('user_state');

	     	$config['upload_path']="./assets/img";
	        $config['allowed_types']='gif|jpg|png';
	        $config['encrypt_name'] = TRUE;

	    	$this->load->library('upload', $config);

	        if($this->upload->do_upload("file")){
	            $data = array('upload_data' => $this->upload->data());
	           

		          $image= $data['upload_data']['file_name']; 
		          $this->resize_image($data['upload_data']['file_name']);

				$user_exist = $this->admin_model->user_check($user_id);

				if($user_exist)
				{
					$data=$this->db->simple_query("UPDATE user SET user_password='".$user_password."', user_name='".$user_name."', user_mobile='".$user_mobile."', user_email='".$user_email."', user_age=".$user_age." , user_picture='".$image."' , user_country='".$user_country."' , user_state='".$user_state."' WHERE user_id = " .$user_id."");
					 $this->session->set_flashdata('success_msg', 'User information updated successfully'); 
					 //redirect('admin/update_user2');
				}
				else
				{
					$this->session->set_flashdata('error_msg', 'Enter all fields to update.'); 
			        redirect('admin/update_user2');
				}
			}
	$this->load->view('update_user2',$this->data);
}
}

public function reset_delete_user()
{
	$userid=$this->input->post("val");
	
	$user_exist = $this->admin_model->user_check($userid);

	if($user_exist)
	{
		 $response=$this->admin_model->delete_user($userid);
		 if($response){
		 $this->session->set_flashdata('success_msg', 'User deleted successfully'); 
		}
	}
	else
	{
		$this->session->set_flashdata('error_msg', 'cant delete user.'); 
       // redirect('admin/delete_user');
	}
	//$this->load->view('delete_user');
}

public function deleteAllplan()

    {

    	$this->load->database();
    	$this->data['plans'] = $this->admin_model->getPlan(); 

		

        $ids = $this->input->post('ids');

 

        $this->db->where_in('plan_id', explode(",", $ids));

        $this->db->delete('plan_desc');

 

        echo json_encode(['success'=>"Item Deleted successfully."]);
        $this->load->view('plan_view', $this->data); 

    }
public function deleteAllcomplain()

    {

    	$this->load->database();
    	$this->data['complains'] = $this->admin_model->getComplain(); 

		

        $ids = $this->input->post('ids');

 

        $this->db->where_in('cid', explode(",", $ids));

        $this->db->delete('contact_us');

 

        echo json_encode(['success'=>"Item Deleted successfully."]);
        $this->load->view('complain', $this->data); 

    }
    public function deleteAlluser()

    {

    	$this->load->database();
    	$this->data['users'] = $this->admin_model->getUser(); 

        $ids = $this->input->post('ids');

 

        $this->db->where_in('user_id', explode(",", $ids));

        $this->db->delete('user');

 

        echo json_encode(['success'=>"Item Deleted successfully."]);
        $this->load->view('user_view_admin', $this->data);  

    }



public function resize_image_admin($filename)
    {
        
        $source_path = './assets/admin/'.$filename;

        $target_path = './assets/admin/thumbnails/'.$filename;

        $config_manip = array(

          'image_library' => 'gd2',

          'source_image' => $source_path,

          'new_image' => $target_path,

          'maintain_ratio' => TRUE,

          'width' => 150,

          'height' => 150

        );

       $this->load->library('image_lib');
	   $this->image_lib->initialize($config_manip);

        if (!$this->image_lib->resize()) {

          echo $this->image_lib->display_errors();

        }

        $this->image_lib->clear();

    }

public function change_profile_picture(){

	 	$config['upload_path']="./assets/admin";
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;

         $this->load->library('upload', $config);

        if($this->upload->do_upload("file")){
            $data = array('upload_data' => $this->upload->data());

         $image= $data['upload_data']['file_name']; 

         $this->admin_model->update_image($image);
         $this->resize_image_admin($data['upload_data']['file_name']);
          redirect('admin/welcome_admin');

}

}
public function change_picture()
{
	$this->load->view("admin_picture");
}
public function change_password()
{
	$this->load->view("admin_password");
}

public function reset_password()
{
	$this->load->helper(array('form'));
	$this->load->library('form_validation');
	$this->form_validation->set_rules('admin_email', 'Email', 'required|valid_email'); 
    $this->form_validation->set_rules('admin_old_password', 'Password', 'required|min_length[4]');
    $this->form_validation->set_rules('admin_password', 'Password', 'required|min_length[4]'); 
     $admin=array(
      
      'admin_email'=>$this->input->post('admin_email'),
      'admin_password'=>$this->input->post('admin_old_password')
        );

      $email_exist = $this->admin_model->email_check($admin['admin_email'],$admin['admin_password']);

    if ($this->form_validation->run()==FALSE||!$email_exist) { 
           $this->session->set_flashdata('error_msg', 'Enter all fields correctly to login.'); 
            redirect('admin/change_password');
     } 

     else
     {
     		$password=$this->input->post('admin_password');
     		$email = $this->input->post("admin_email");
     		$password_change = $this->admin_model->pass_change($email,$password);
     		redirect('admin/welcome_admin');
     }
 
	$this->load->view("welcome_admin.php");
 
}
public function forget_password(){
  //echo "password reset";
   //redirect(base_url() . 'user/reset_view');
  $pass=$this->input->post("admin_password");
  $temp_pass = $this->input->post("admin_temp_password");
  $email = $this->input->post("admin_email");
  $data=$this->admin_model->admin_check($email,$temp_pass);

    if ($data) {
            
          
          $response=$this->admin_model->change_password($email,$pass);
          if($response)
          {
             $this->session->set_flashdata("pass_set", "Password updated successfully.");
          }
          else
          {
             $this->session->set_flashdata("pass_set", "Can't update password");
          }

        } 
        else {
            $this->session->set_flashdata("pass_set", "Email does not exist or password incorrect");
          //echo "Fail";
        }
  $this->load->view("admin_reset_password.php");
}

public function send_mail() {
      $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'saloni.goyal242@gmail.com',
            'smtp_pass' => 'rightdirections',
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
          
          
         $from_email = "saloni.goyal242@gmail.com"; 
         $to_email = $this->input->post('email'); 
        // echo "$to_email";
   
         //Load email library 
         $this->load->library('email',$config); 
   
         $this->email->from($from_email, 'Saloni Goyal'); 
         $this->email->to($to_email);
         $this->email->subject('New Temporary Password'); 
         $pass=$this->generateRandomString();
         $pass_link="http://localhost/project/admin/forget_password";
         $this->email->message('<h5> Your temporary password is: </h5>'. $pass . '<h5> Reset password link is: </h5>'. $pass_link);
         //$this->email->message(); 
         $data=$this->admin_model->change_password($to_email,$pass);
        // echo "$data";
         if($data)
         {

         
   
         //Send mail 
         if ($this->email->send()) {
            $this->session->set_flashdata("email_sent", "Email sent successfully.");
            redirect("admin/forget_password");
          //echo "Success";
        } else {
            $this->session->set_flashdata("email_sent", "Error in sending Email.");
          //echo "Fail";
        }
      }
      else
      {
        echo "Email ID does not exist";

      }
        $this->load->view('admin_email_form'); 
      
  }

      function generateRandomString() {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < 20; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
} 
public function deactivate_plan() {
        $id=$this->uri->segment(3);
        $off = 1;
        $this->db->set('off', $off);
        $this->db->where('user_id', $id);
        $query = $this->db->update('userlog');

        if ($query) {
            redirect('admin/manage_user');
        } else {
            echo "error";
        }
    }

    public function activate_plan() {
        $id=$this->uri->segment(3);
        $off = 0;
        $this->db->set('off', $off);
        $this->db->where('user_id', $id);
        $query = $this->db->update('userlog');

        if ($query) {
            redirect('admin/manage_user');
        } else {
            echo "error";
        }
    }
     public function deactivate_temporary()
    {
      $id=$this->uri->segment(3);
        $deactivate_button = "disabled";
        $this->db->set('disable_button', $deactivate_button);
        $this->db->where('user_id', $id);
        $query = $this->db->update('userlog');
         redirect('admin/manage_user');
    }
    
     public function reactivate_temporary()
    {
        $id=$this->uri->segment(3);
        $reactivate_button = "";
        $this->db->set('disable_button', $reactivate_button);
        $this->db->where('user_id', $id);
        $query = $this->db->update('userlog');
         redirect('admin/manage_user');
    }
    public function admin_device()
    {
      $logged_in = $this->session->userdata('logged_in');
    if($logged_in != TRUE || empty($logged_in))
    {
        #user not logged in
        $this->session->set_flashdata('error', 'Session has Expired');
        redirect('admin/index'); # Login view
    }
    else{
      $id=$this->uri->segment(3);
      $this->data['admin'] = $this->admin_model->getAdmin();
      $this->data['userlog'] = $this->admin_model->getUserlog($id);
      $this->load->view('admin_device', $this->data);  
    }
  }
   public function devicecontrol() {
         $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            redirect("user/login_view");
        }
        else{

        if (isset($_POST['led'])) {

            // echo $name;
           $name=$this->uri->segment(3);
           $id=$this->uri->segment(4);
            $this->db->select('*');
            $this->db->from('userlog');
            $this->db->where('name', $name);


            $query = $this->db->get();



            if ($query->num_rows() > 0) {
                $data = array(
                    'var1' => $_POST['led'],
                    'var2' => $_POST['led']
                );
                $this->db->insert('test_arduino', $data);

                $log = array(
                    'name' => $name,
                    'var1' => $_POST['led'],
                    'var2' => $_POST['led']
                );
                $this->db->insert($name, $log);

                   $status = $_POST['led'];
            if ($status == "BULB ON" || $status == "BULB OFF") {
                $this->db->set('status1', $status);
                $this->db->where('name', $name);
                $query = $this->db->update('userlog');
            }

            if ($status == "FAN ON" || $status == "FAN OFF") {
                $this->db->set('status2', $status);
                $this->db->where('name', $name);
                $query = $this->db->update('userlog');
            }


                //$row = $query->row_array();
                //return $row;

                redirect('admin/admin_device/' . $id);
            } else {
                echo "error";
            }
        }
    }
    }
}
?>