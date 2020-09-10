<?php

class userpanel extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->m_user->check_session(1);
        $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');
        ob_start();
    }

    function login_validation() {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run()) {
                //true  
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                //model function  
                $this->load->model('main_model');
                if ($this->main_model->can_login($username, $password)) {
                    $session_data = array(
                        'name' => $username
                    );
                    $this->session->set_userdata($session_data);
                    redirect(base_url() . 'userpanel/user_view/' . $username);
                } else {
                    $this->session->set_flashdata('error', 'Invalid Username and Password');
                    redirect(base_url() . 'userpanel/login');
                }
            } else {
                //false  
                $this->login();
            }
        } else {
            $session_data = array(
                'name' => $username
            );

            $this->load->view("login_session", $session_data);
        }
    }

    function logout() {
        // $this->m_user->check_session(0);
        $this->load->driver('cache');
        // $this->session->sess_destroy();
        $this->cache->clean();
        ob_clean();
        $this->clearCache();
        $this->load->library('session');
        $this->load->helper('url');
        $this->session->sess_destroy();
        //  $this->session->unset_userdata('username');
        redirect(base_url() . 'userpanel/login');
    }

    protected function clearCache() {
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

    public function user_view($uname) {

        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            redirect("user/login_view");
        }
        else
        {

            $newdata = array(
                'name' => $uname,
            );

            $this->session->set_userdata($newdata);


            $this->db->select('*');
            $this->db->from('userlog');
            $this->db->where('name', $uname);
            $query = $this->db->get();
            $data["fetch_data"] = $query;

            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('user_name', $uname);
            $query1 = $this->db->get();
            $data["user_data"] = $query1;

            $this->load->view('user_info', $data);
        
    }
}

    public function user_devices_view($uname) {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            redirect("user/login_view");
        }
        else
        {
            $this->db->select('*');
            $this->db->from('userlog');
            $this->db->where('name', $uname);
            $query = $this->db->get();
            $data["fetch_data"] = $query;
            // print_r($data)
            $this->load->view('user_devices', $data);
        }
    }

    public function user_devices_control($name) {

        //echo $name;
         $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            redirect("user/login_view");
        }
        else{
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

            redirect('userpanel/user_devices_view/' . $name);
        } else {
            echo "error";
        }
    }
    }

    public function user_complain_view($name) {
         $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            redirect("user/login_view");
        }
        else{
            $this->db->select('*');
            $this->db->from('userlog');
            $this->db->where('name', $name);
            $query = $this->db->get();
            $data["fetch_data"] = $query;
            $this->load->view('user_complain', $data);
        }
    }

    public function user_complain($name) {
         $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            redirect("user/login_view");
        }
        else{
        if (isset($_POST['user_complain'])) {

            $data = array(
                'subject' => $_POST['Name'],
                'email' => $_POST['Email'],
                'msg' => ($_POST['Message'])
            );

            $this->db->insert('contact_us', $data);
            $this->session->set_flashdata("success1", "email has been recieved");



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
            $from_email = $this->input->post('Email');
            // $name= $this->input->post('Name');
            $msg = $this->input->post('Message');


            $this->load->library('email', $config);

            $this->email->from($from_email);
            $this->email->to($to_email);

            $this->email->message($msg);

            if($this->email->send())
            {
                $this->session->set_flashdata("email_sent", "<div style='color:green;'>Thank you for contacting us. We will revert back shortly.</div>");
            }
            else
            {
                $this->session->set_flashdata("email_sent", "<div style='color:red;'>Error in sending Email.</div>");
            }


            redirect('userpanel/user_complain_view/' . $name);
        }
    }
    }

    public function user_notification_view($name) {
         $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            redirect("user/login_view");
        }
        else{
        $com = 2;
        $this->db->select('*');
        $this->db->from('userlog');
        $this->db->where('name', $name);
        $query = $this->db->get();
        $data["fetch_data"] = $query;

        $sql="Select u.date_diff,u1.user_email from userlog u, user u1 where u.user_id=u1.user_id and u.name='".$name."'";
        $query1 = $this->db->query($sql);
        $record=$query1->row_array();

        $date = $record['date_diff'];
        $email = $record['user_email'];

            if($date == $com)
            {
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


                $to_email = $email;
                $from_email = "saloni.goyal242@gmail.com";
                // $name= $this->input->post('Name');
                $msg = "Kindly extend your plan to enjoy home automation. Your current plan is about to expire in 2 days.";


                $this->load->library('email', $config);

                $this->email->from($from_email);
                $this->email->to($to_email);
                $this->email->subject("Extend your plan");
                $this->email->message($msg);
                $this->email->send();
            }
        
        $this->load->view('user_notification', $data);
    }
    }

    public function user_current_plan_view($name) {
       /* $this->db->select('*');
        $this->db->from('userlog');
        $this->db->where('name', $name);
    */
         $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            redirect("user/login_view");
        }
        else{
        $this->db->select('*');
        $this->db->from('plan_desc AS p, userlog AS u');
        $this->db->where('u.name', $name);
        $this->db->where('u.plan = p.plan_id');
        $query = $this->db->get();

        $data["fetch_data"] = $query;
        $this->load->view('user_current_plan', $data);
    }
    }

    public function deactivate_plan($name) {
         $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            redirect("user/login_view");
        }
        else{
        $off = 1;
        $device = 0;
        $device1_on = "bulboff.jpg";
        $device2_on = "fanoff1.PNG";
        $duration = 0;
        $date = date();
        $this->db->set('on', $off);
        $this->db->set('device1_on', $device1_on);
        $this->db->set('device2_on', $device2_on);
        $this->db->where('name', $name);
        $this->db->update('userlog');
        $this->session->set_flashdata('deactivate', '<div style=color:green;><b>Plan deactivated as per your request. Request to reactivate again.</b></div>');

         redirect('userpanel/user_current_plan_view/' . $name);
     }
    }

    public function request_reactivate_plan($name) {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            redirect("user/login_view");
        }
        else{

        $device1_on = "bulbon.gif";
        $device2_on = "fanon1.gif";

        $this->db->set('device1_on', $device1_on);
        $this->db->set('device2_on', $device2_on);
        $this->db->where('name', $name);
        $this->db->update('userlog');

        $session_email = $this->session->userdata('email');
        //echo $session_email;
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
            $from_email = $session_email;
            // $name= $this->input->post('Name');
            $msg = "User named: " .$name."<br>Email-ID: " .$session_email. "<br>wishes to reactivate their plan. <br>Kindly revert back ASAP.";


            $this->load->library('email', $config);

            $this->email->from($from_email);
            $this->email->to($to_email);
            $this->email->subject("Plan Reactivation Request");
            $this->email->message($msg);
             if($this->email->send())
            {
                    //echo "<script>alert('\\nEmail request to Admin for Address Change sent.\\n\\nAdmin will revert back shortly.');</script>";
                    $this->session->set_flashdata('success', 'Email request for Plan Reactivation sent.');
            }
            else
            {
                    $this->session->set_flashdata('error', 'Cant Send Email. Try Again.');
            }

            redirect('userpanel/user_current_plan_view/' . $name);
        }
    }

        public function request_extend_plan($name) {
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            redirect("user/login_view");
        }
        else{
        $session_email = $this->session->userdata('email');
        //echo $session_email;
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
            $from_email = $session_email;
            // $name= $this->input->post('Name');
            $msg = "User named: " .$name."<br>Email-ID: " .$session_email. "<br>wishes to extend their plan. <br>Kindly revert back ASAP.";


            $this->load->library('email', $config);

            $this->email->from($from_email);
            $this->email->to($to_email);
            $this->email->subject("Plan Extension Request");
            $this->email->message($msg);
             if($this->email->send())
            {
                    //echo "<script>alert('\\nEmail request to Admin for Address Change sent.\\n\\nAdmin will revert back shortly.');</script>";
                    $this->session->set_flashdata('success', 'Email request for Plan Extension sent.');
            }
            else
            {
                    $this->session->set_flashdata('error', 'Cant Send Email. Try Again.');
            }

            redirect('userpanel/user_current_plan_view/' . $name);
        }
    }

    public function user_setting_view($name) {
         $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            redirect("user/login_view");
        }
        else{
        $this->db->select('*');
        $this->db->from('userlog');
        $this->db->where('name', $name);
        $query = $this->db->get();
        $data["fetch_data"] = $query;
        $this->load->view('settings', $data);
    }
    }

    public function update($id, $name) {
        // echo $id;
         $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            redirect("user/login_view");
        }
        else{
      $config['upload_path']="./assets/img";
      $config['allowed_types']='gif|jpg|png|jpeg';
      $this->load->library('upload', $config);

      if($this->upload->do_upload("file"))
      {
          $data = array('upload_data' => $this->upload->data());
          $image= $data['upload_data']['file_name']; 
       
            $this->db->set('dp', $image);
            $this->db->where('id', $id);
            $query = $this->db->update('userlog');

        if ($query) {
            redirect('userpanel/user_setting_view/' . $name);
        } else {
            echo "error";
        }
    }
    else {
            echo "error";
        }
    }
}

    public function update_password($id, $name) {
         $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            redirect("user/login_view");
        }
        else{
            $password = $_POST['user_password'];
            $email = $_POST['user_email'];
            $age = $_POST['user_age'];
            $mobile = $_POST['user_mobile'];
            $name = $_POST['user_name'];

            $this->db->set('user_password', md5($password));
            $this->db->set('user_email', $email);
            $this->db->set('user_age', $age);
            $this->db->set('user_mobile', $mobile);
            $this->db->set('user_name', $name);
            $this->db->where('user_id', $id);
            $query = $this->db->update('user');

            $this->db->set('password', md5($password));
            $this->db->set('name', $name);
            $this->db->where('id', $id);
            $query1 = $this->db->update('userlog');

            if ($query && $query1) {
                //echo "<script> alert(Information successfully updated.);</script>";
                $this->session->set_flashdata('update_s', 'Information updated successfully.');
                
            } else {
                $this->session->set_flashdata('update_e', 'Cant Update Information.');
                //echo "error";
            }
            redirect('userpanel/user_setting_view/' . $name,"refresh");
        }
    }


    public function uname($name) {
         $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            redirect("user/login_view");
        }
        else{
        $this->db->select('*');
        $this->db->from('userlog');
        $this->db->where('name', $name);
        $query = $this->db->get();
        $data["row"] = $query;

        $this->load->view('include/header');
        $this->load->view('include/navbar');
        $this->load->view('devicecontrol', $data);
        $this->load->view('include/footer');
    }
    }

    public function udev($name) {
         $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            redirect("user/login_view");
        }
        else{
        $this->db->select('*');
        $this->db->from('userlog');
        $this->db->where('name', $name);
        $query = $this->db->get();
        $data["row"] = $query;

        // $this->load->view('include/header');
        // $this->load->view('include/navbar');
        $this->load->view('devicecontrol', $data);
        // $this->load->view('include/footer');
    }
    }

    public function devicecontrol($name) {
         $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            redirect("user/login_view");
        }
        else{

        if (isset($_POST['led'])) {

            // echo $name;
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

                redirect('userpanel/uname/' . $name);
            } else {
                echo "error";
            }
        }
    }
    }

    public function payment_view() {
        //$this->load->view('payment');
         $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            redirect("user/login_view");
        }
        else{
        redirect('http://localhost/instamojo/index.php', 'refresh');
        //redirect('','');
    }
    }
    
    public function deactivate_temporary($name)
    {
        $deactivate_button = "disabled";
        $this->db->set('disable_button', $deactivate_button);
        $this->db->where('name', $name);
        $query = $this->db->update('userlog');
        redirect('userpanel/uname/' . $name);
    }
    
     public function reactivate_temporary($name)
    {
        $reactivate_button = "";
        $this->db->set('disable_button', $reactivate_button);
        $this->db->where('name', $name);
        $query = $this->db->update('userlog');
        redirect('userpanel/uname/' . $name);
    }

    public function update_address($name) {
         $logged_in = $this->session->userdata('logged_in');
        if ($logged_in != TRUE || empty($logged_in)) {
            redirect("user/login_view");
        }
        else{

        $session_email = $this->session->userdata('email');
        //echo $session_email;
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
            $from_email = $session_email;
            // $name= $this->input->post('Name');
            $msg = "User named: " .$name."<br><br>Email-ID: " .$session_email. "<br><br>Wishes to Change their Address. <br><br>Kindly revert back ASAP.";


            $this->load->library('email', $config);

            $this->email->from($from_email);
            $this->email->to($to_email);
            $this->email->subject("Address Change Request");
            $this->email->message($msg);
            if($this->email->send())
            {
                    //echo "<script>alert('\\nEmail request to Admin for Address Change sent.\\n\\nAdmin will revert back shortly.');</script>";
                    $this->session->set_flashdata('success', 'Email request for Address Change sent.');
            }
            else
            {
                    $this->session->set_flashdata('error', 'Cant Send Email. Try Again.');
            }

            redirect('userpanel/user_setting_view/' . $name);
    }
}
}