  <?php
   
  class User extends CI_Controller {
   
  public function __construct(){
   
          parent::__construct();
  	  	$this->load->helper('url');
  	  	$this->load->model('user_model');
          $this->load->library('session');
          $this->load->helper('form');
   
  }
  public function index()
  {

  	$this->load->view("register.php");
    
  }
  public function terms()
  {
    $this->load->view("terms.php");
  }
  public function front()
  {
     $this->data['about'] = $this->user_model->getAbout(); 
     $this->data['banner'] = $this->user_model->getBanner(); 
     $this->data['content'] = $this->user_model->getContent();
     $this->data['team'] = $this->user_model->getTeam();
     $this->data['img'] = $this->user_model->getImages();

    $this->load->view("front_design.php", $this->data);
  }

  public function address()
  {
     $this->data['add'] = $this->user_model->getAddress(); 
     $this->load->view('contact_address', $this->data); 
  }


  public function plan_display()
  {
    $this->data['plan'] = $this->user_model->getPlan(); 
    $this->data['content'] = $this->user_model->getContentSecond();
    

    $this->load->view("plan_display",$this->data);
  }

  public function faq()
  {
    $this->data['faqs'] = $this->user_model->getfaq(); 

    $this->load->view('faq', $this->data); 
   
  }
  public function contact_us()
  {
    $flag=0;
    $data = array(
                      'email' => $_POST['email'],
                      'msg' =>($_POST['message']),
                      'subject' => $_POST['subject']
                           );

                       $this->db->insert('contact_us', $data);
                       $this->session->set_flashdata("success", "email has been recieved");
              
              
              
              $config = array
                      (
                      'protocol' => 'smtp',
                      'smtp_host' => 'smtp.gmail.com',
                      'smtp_port' => 465,
                      'smtp_user' => 'saloni.goyal242@gmail.com',
                      'smtp_pass' => 'rightdirections',
                      'mailtype' => 'html',
                      'charset' => 'utf-8'
                      );
              
                  $this->email->initialize($config);
                  $this->email->set_mailtype("html");
                  $this->email->set_newline("\r\n");


                  $to_email = "saloni.goyal242@gmail.com";
                  $from_email = $this->input->post('email');
                  $msg= $this->input->post('message');
                  $subject= $this->input->post('subject');
                 
                  $this->load->library('email', $config);

                  $this->email->from($from_email);
                  $this->email->to($to_email);
                  $this->email->subject($subject);
                 $this->email->message($msg);
                 
                  if ($this->email->send())
                      {     
                         echo '<script type="text/javascript">alert("Email sent successfully");</script>';
                          $flag=1;
                      } 
                  else
                      {
                          echo '<script type="text/javascript">alert("Cant send Email. Try again.");</script>';
                      }  

                  if($flag==1) 
                  {
                     redirect("/user/front");
                  }      
  }

  public function pdf()
  {
    $this->load->view("demo_pdf.php");
  }

  public function display_plan()
  {
    $planid=$this->uri->segment(3);

    $this->data['records'] = $this->user_model->getPlanfromid($planid);

    $this->load->view('display_plan',$this->data);
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

          $this->load->library('image_lib', $config_manip);

          if (!$this->image_lib->resize()) {

            echo $this->image_lib->display_errors();

          }

          $this->image_lib->clear();

      }

  public function register_user(){

       
          //print_r($user);
             
          //$this->load->helper(array('form'));
        
           /* Load form validation library */ 
          // $this->load->library('form_validation');
        
           /* Set validation rule for name field in the form */ 
           //$this->form_validation->set_rules('user_email', 'Email', 'required|valid_email'); 
          /* $this->form_validation->set_rules('user_password', 'Password', 'required|min_length[4]'); 
           $this->form_validation->set_rules('user_age', 'Age', 'required'); 
           $this->form_validation->set_rules('user_mobile', 'Mobile', 'required'); 
        
           if ($this->form_validation->run()==FALSE) { 
             $this->session->set_flashdata('error_msg', 'Enter all fields correctly to register.'); 
              redirect('user/');
           } 
            $reg = "/^[789]\d{9}$/";
            if (!preg_match($reg, $user['user_mobile'])) {
               $this->session->set_flashdata('error_msg', 'Invalid Mobile number.'); 
              redirect('user/');
                
               }*/

          $config['upload_path']="./assets/img";
          $config['allowed_types']='gif|jpg|png';
          $config['encrypt_name'] = TRUE;

           $this->load->library('upload', $config);

          if($this->upload->do_upload("file")){
              $data = array('upload_data' => $this->upload->data());


              $user_country = $this->input->post('user_country');
              //echo"$user_country";

                   $user=array(
            'user_name'=>$this->input->post('user_name'),
            'user_email'=>$this->input->post('user_email'),
            'user_password'=>md5($this->input->post('user_password')),
            'user_age'=>$this->input->post('user_age'),
            'user_mobile'=>$this->input->post('user_mobile'),
            'user_country'=>$this->input->post('user_country'),
            'user_state'=>$this->input->post('user_state')
            
              );

               
              
              $image= $data['upload_data']['file_name']; 
              //console.log("$image");
             
               $res=$this->user_model->email_check($user['user_email']);

               if(!$res){
                           $this->user_model->register_user($user,$image,$user['user_email']);
                          $this->resize_image($data['upload_data']['file_name']);
                      
                           $this->send_verification_mail($user['user_email']);
                           $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.'); 

                          $data1=array('ENGINE'=>'InnoDB');
                          $fields = array(
                                    'user_id' => array(
                                            'type' => 'INT',
                                            'unsigned' => TRUE,
                                            'auto_increment' => TRUE
                                    ),
                                    'on' => array(
                                            'type' => 'INT',
                                    ),
                                    'off' => array(
                                            'type' =>'INT',
                                    ),
                                    'updated_at' => array(
                                            'type' => 'DATETIME',
                                            'Attributes' => 'on update CURRENT_TIMESTAMP',
                                    ),
                            );
                          $this->dbforge->create_table($user['user_email'],FALSE,$data1);
                          $this->dbforge->add_field($fields);
      }
      else{
            $this->session->set_flashdata('error_msg', 'Email already registered! .');
          redirect('user');
      }
    }
      else 
      {
          $this->session->set_flashdata('error_msg', 'Cant upload image.');
          redirect('user');
      }
    
    redirect('user/login_view');
  }

  public function send_verification_mail($email) {
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
          
          // echo "$to_email";
     
           //Load email library 
           $this->load->library('email',$config); 
     
           $this->email->from($from_email, 'Saloni Goyal'); 
           $this->email->to($email);
           $this->email->subject('Welcome User!'); 
           //$pass=$this->generateRandomString();
           $login_link="http://localhost/project/user/login_view";
           $this->email->message('<h5> You are successfully registered! Click to login: </h5>'. $login_link);
           //$this->email->message(); 
           //$data=$this->user_model->change_password($to_email,$pass);
          // echo "$data";
           
           //Send mail 
           if ($this->email->send()) {
              $this->session->set_flashdata("email_sent", "Email sent successfully.");
              //redirect("user/reset_password");
            //echo "Success";
          } else {
              $this->session->set_flashdata("email_sent", "Error in sending Email.");
            //echo "Fail";
          }
       
          //$this->load->view('email_form'); 
           redirect('user/login_view');
        
    }

   public function check_email_exist_validation() {
    $user=array(
        
        'user_email'=>$this->input->post('user_email'),
          );
          $email = $this->input->post("user_email");
          $email_exist = $this->user_model->email_check($user['user_email']);
          if ($email_exist) {
              $response = 'An account with this email already exists';
              $this->output->set_content_type('application/json');
              $this->output->set_output(json_encode($response));
              return $response;
          } else {
              $response = "true";
              $this->output->set_content_type('application/json');
              $this->output->set_output(json_encode($response));
              return $response;
          }
      }

  public function valid_email()
  {
     $user=array(
        
        'user_email'=>$this->input->post('user_email'),
          );
     $email = $this->input->post("user_email");
          $email_exist = $this->user_model->email_check($user['user_email']);
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

  	
  public function login_view(){
   
  	$this->load->view("login.php");
   
  }

  public function pay(){
   
    $this->load->view("pay.php");
   
  }

  public function order(){
   
    $planid = $this->uri->segment(3);
    $data['records'] = $this->user_model->getPlanfromid($planid);
    $this->load->view("order.php", $data);  
  }

  	
  function login_user(){
    $user_login=array(
   
    'user_email'=>$this->input->post('user_email'),
    'user_name'=>$this->input->post('user_name'),
    'user_password'=>md5($this->input->post('user_password'))
   
      );
          //$this->load->helper(array('form'));
        
           /* Load form validation library */ 
           //$this->load->library('form_validation');
        
           /* Set validation rule for name field in the form */ 
         /* $this->form_validation->set_rules('user_email', 'Email', 'required'); 
           $this->form_validation->set_rules('user_password', 'Password', 'required'); 
        
           if ($this->form_validation->run()==FALSE) { 
             $this->session->set_flashdata('error_msg', 'Enter all fields correctly to login.'); 
              redirect('user/login_view');
           } 
          */
        $data=$this->user_model->login_user($user_login['user_email'],$user_login['user_password']);
        
        if($data)
        {
        
          //$this->session->set_userdata('user_id',$data['user_id']);
          //$this->session->set_userdata('user_email',$data['user_email']);
         // $this->session->set_userdata('user_name',$data['user_name']);
          //$this->session->set_userdata('user_age',$data['user_age']);
          //$this->session->set_userdata('user_mobile',$data['user_mobile']);
          //$this->session->set_userdata('user_picture',$data['user_picture']);

          $session_data = array(
                        'name' => $user_login['user_name'],
                        'email' => $user_login['user_email'],
                        'logged_in' => TRUE
                    );
          $this->session->set_userdata($session_data);
          redirect(base_url() . 'userpanel/user_view/' . $user_login['user_name']);

   	
          //redirect(base_url() . 'user/user_profile');
   
        }
        else{
          $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
          redirect("user/login_view");
   
        }
   
   
  }
  function user_profile(){
   
  $this->load->view('user_profile.php');
   
  }
  public function user_logout(){
   
    $this->session->sess_destroy();
    redirect('user/login_view', 'refresh');
  }

  function reset_password(){
    //echo "password reset";
     //redirect(base_url() . 'user/reset_view');
    $pass=md5($this->input->post("user_password"));
    $temp_pass = $this->input->post("user_temp_password");
    $email = $this->input->post("user_email");
    $data=$this->user_model->user_check($email,$temp_pass);

      if ($data) {
              
            
            $response=$this->user_model->change_password($email,$pass);
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
    $this->load->view("reset_password.php");
  }

  function reset_pass()
  {
    //echo "validate";
     $user=array(
        
        'user_email'=>$this->input->post('user_email'),
          );
          $email = $this->input->post("user_email");
          $email_exist = $this->user_model->email_check($user['user_email']);
      if ($email_exist) {
              $response = "true";
              $this->output->set_content_type('application/json');
              $this->output->set_output(json_encode($response));
              return $response;
          } 
          else {
              $response = "An account with this email not exists";
              $this->output->set_content_type('application/json');
              $this->output->set_output(json_encode($response));
              return $response;
          }
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

           $this->load->library('email',$config); 
     
           $this->email->from($from_email, 'Saloni Goyal'); 
           $this->email->to($to_email);
           $this->email->subject('New Temporary Password'); 
           $pass=$this->generateRandomString();
           $pass_link="http://localhost/project/user/reset_password";
           $this->email->message('<h5> Your temporary password is: </h5>'. $pass . '<h5> Reset password link is: </h5>'. $pass_link);
           //$this->email->message(); 
           $data=$this->user_model->change_password($to_email,$pass);
          // echo "$data";
           if($data)
           {
             if ($this->email->send()) {
                $this->session->set_flashdata("email_sent", "Email sent successfully.");
                redirect("user/reset_password");
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
          $this->load->view('email_form'); 
        
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
      
}
?>