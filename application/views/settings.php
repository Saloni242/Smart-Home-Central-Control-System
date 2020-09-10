<!DOCTYPE html>
<html>
    <title>USER PANEL</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>


    <style>    
    html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}



        .wrapper {
            text-align: center;
        }



        .center { 
            height: 400px;
            width: 400px;
            background: #BBDEFB;
            position: fixed;
            top: 50%;
            left: 50%;
            margin-top: -170px;
            margin-left: -200px;
        }

        .form{
            padding-top: 50px;
            padding-right: 30px;
            padding-bottom: 50px;
            padding-left: 30px;
        }

        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .button1 {
            background-color: white; 
            color: black; 
        }

        .button1:hover {
            background-color: #4CAF50;
            color: white;
        }

        .button2 {
            background-color: black; 
            color: white; 
        }

        .button2:hover {
            background-color: #F44336;
            color: white;
        }

        .button3 {
            background-color: white; 
            color: black; 
        }

        .button3:hover {
            background-color: #F44336;
            color: white;
        }

        .ip{
            background-color: #fffff; /* Green */
            border: none;
            color: black;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s; /* Safari */
        }

        .footer{
            background:#64B5F6;
            width:100%;
            height:100px;
            position:absolute;
            bottom:0;
            left:0;
        }



        body
        {
            position: relative; 
        }

        #section1 {padding-top:50px;height:700px;}
        #section2 {padding-top:50px;height:700px;}
        #section3 {padding-top:50px;height:700px;}
        #section4 {padding-top:50px;height:700px;}
        #section5 {padding-top:50px;height:700px;}
        #section6 {padding-top:50px;height:700px;}





        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 16px 50px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .button1 {
            background-color: white; 
            color: black; 
        }

        .button1:hover {
            background-color: #4CAF50;
            color: white;
        }

        .button3 {
            background-color: white; 
            color: black; 
        }

        .button3:hover {
            background-color: #F44336;
            color: white;
        }


        .button2 {
            background-color: black; 
            color: white; 
        }

        .button2:hover {
            background-color: #e7e7e7;
            color: black;
        }

        .disabled {
            opacity: 0.6;
            cursor: allowed;
        }



        .ip{
            background-color: #fffff; /* Green */
            border: none;
            color: black;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s; /* Safari */
        }

        .footer{
            background:#64B5F6;
            width:100%;
            height:100px;
            position:absolute;
            bottom:0;
            left:0;
        }

        table, th, td
        {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td
        {
            padding: 5px;
            text-align: left;
        }
        
        input[type=text],input[type=password],input[type=email],input[type=number],input[type=file] {
          border: 1.5px solid #555;
          padding: 10px;
          box-shadow: 1px 2px 2px #888888;
        }


    </style>


    <body class="w3-light-grey">

        <!-- Top container -->
        <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
            <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
            <?php
            if ($fetch_data->num_rows() > 0) {
                foreach ($fetch_data->result() as $u) {
                    $this->session->set_userdata('user_name',$u->name);
                    ?> 
                   <a href="<?php echo base_url(). 'user/front';?>" class="w3-bar-item w3-button" style="text-decoration: none;">SMART HOME CONTROL</a>


                    <a href="<?php echo base_url('user/user_logout'); ?>"><span class="w3-bar-item w3-button w3-right">Logout</span></a>
                    <?php
                }
            }
            ?> 
        </div>

        <!-- Sidebar/menu -->
        <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
            <div class="w3-container w3-row">
                <div class="w3-col s4">
                    <?php
                    if ($fetch_data->num_rows() > 0) {
                        foreach ($fetch_data->result() as $u) {
                            ?>  
                            <img src="<?php echo base_url(); ?>/assets/img/<?php echo $u->dp ?>" class="w3-circle w3-margin-2px" style="width:70px; height:70px;">
                        </div>
                        <div class="w3-col s8 w3-bar">
                            <br>
                            <span>  Welcome, <strong><?php echo $u->name; ?></strong></span><br>


                            <?php
                        }
                    }
                    ?> 
                </div>
            </div>
            <hr>

            <?php
            if ($fetch_data->num_rows() > 0) {
                foreach ($fetch_data->result() as $u) {
                    ?>

                    <div class="w3-bar-block">
                        <a href="<?php echo base_url('userpanel/user_view/' . $u->name) ?>" class="w3-bar-item w3-button w3-padding"><i class="fas fa-info-circle"></i>  USER INFORMATION</a>
                        <a href="<?php echo base_url('userpanel/user_devices_view/' . $u->name) ?>" class="w3-bar-item w3-button w3-padding"><i class="fas fa-tachometer-alt"></i>  DEVICES</a>
                        <a href="<?php echo base_url('userpanel/user_complain_view/' . $u->name) ?>" class="w3-bar-item w3-button w3-padding"><i class="fas fa-exclamation-triangle"></i>  COMPLAIN</a>
                        <a href="<?php echo base_url('userpanel/user_notification_view/' . $u->name) ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  NOTIFICATION</a>
                        <a href="<?php echo base_url('userpanel/user_current_plan_view/' . $u->name) ?>" class="w3-bar-item w3-button w3-padding"><i class="fas fa-edit"></i>  CURRENT PLAN</a>
                        <a href="<?php echo base_url('userpanel/user_setting_view/' . $u->name) ?>" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  SETTINGS</a>
                    </div>
                </nav>


                <!-- Overlay effect when opening sidebar on small screens -->
                <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

                <!-- !PAGE CONTENT! -->
                <div class="w3-main" style="margin-left:300px;margin-top:43px;">

                    <!-- Header -->
                    <hr>
                    <div>     
                        

                        <?php
                    }
                }
                ?> 

            </div>

            <div style="display: flex; margin-left: 5%"> 
            <div style="width: 55%;">

                <h2>CHANGE PROFILE PICTURE</h2>

                <?php
                if ($fetch_data->num_rows() > 0) {
                    foreach ($fetch_data->result() as $u) {
                        ?>  
                        <p>

                        
                            <img src="<?php echo base_url(); ?>/assets/img/<?php echo $u->dp ?>"  onclick="onClick(this)" class="w3-hover-opacity" style="width:200px; height:200px; box-shadow: 1px 2px 2px #888888;"> 

                            </p>    
                        

                        <form action="<?php echo base_url('userpanel/update/' . $u->id . '/' . $u->name); ?>" method="post" enctype=multipart/form-data class="w3-container w3-card-4 w3-padding-16 w3-white" style="width: 75%">
                            <label>
                                <fieldset>
                                    <br>
                                    <input type="file" name="file" class="w3-input" placeholder="select picture" required="true" >
                                    <br>
                                    <center><input type="submit" name="upload" class="button button2" value="UPLOAD"></center>
                                </fieldset>
                            </label>
                        </form>

                        <br>
                        <br>
                        </div>
                        <div>
                            <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
              <div class="row"><!-- row class is used for grid system in Bootstrap-->
                  <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
                      <div class="login-panel panel panel-success">
                          <div class="panel-heading">
                              <h2>UPDATE INFORMATION</h2>
                          </div>
                          <div class="panel-body">

                      <form role="form" method="post" action="<?php echo base_url('userpanel/update_password/' . $u->id . '/' . $u->name); ?>" class="w3-container w3-card-4 w3-padding-16 w3-white" id="update_form">
                        <center>
                          <fieldset>
                              <div class="w3-section">
                                  <input class="w3-input" placeholder="Name" name="user_name" type="text" id="user_name" required="true" value="<?php $u->name;?>">
                              </div>
                              
                              <div class="w3-section">
                                  <input class="w3-input" placeholder="E-mail" name="user_email" type="email" id="user_email" required="true">
                              </div>
                              

                              <div class="w3-section">
                                  <input class="w3-input" placeholder="Password" name="user_password" type="password"  value="" id="user_password" required="true">
                              </div>
                              

                              <div class="w3-section">
                                  <input class="w3-input" placeholder="Age" name="user_age" type="number" value="" id="user_age" required="true">
                              </div>
                              

                              <div class="w3-section">
                                  <input class="w3-input" placeholder="Mobile No" name="user_mobile" type="number" value="" id="user_mobile" required="true">
                              </div>
                              

                            <input type="submit" name="update" class="button button2" value="UPDATE">
                            <br>
                          </fieldset>
                      </center>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
                        </div>
                        <?php
                    }
                }
                ?>            

            </div>
        </div>
        <hr>
         <form role="form" method="post" action="<?php echo base_url('userpanel/update_address/' . $u->name); ?>" id="address_form">
        <center><input type="submit" name="update" class="button button2" value="Request to Update Address"></center>
        </form>
        <br>
        <center>
        <?php
                  $error_msg=$this->session->flashdata('error');
                  $success_msg=$this->session->flashdata('success');
                  $update_s=$this->session->flashdata('update_s');
                  $update_e=$this->session->flashdata('update_e');


                  if($error_msg){
                    echo "<div style='color:red; font-weight:bold;'>$error_msg</div>";
                  }
                  elseif($success_msg){
                    echo "<div style='color:green; font-weight:bold;'>$success_msg</div>";
                  }
                  elseif($update_s){
                    echo "<div style='color:green; font-weight:bold;'>$update_s</div>";
                  }
                  elseif($update_e){
                    echo "<div style='color:red; font-weight:bold;'>$update_e</div>";
                  }
        ?>
        </center>
    </body>
</html>
