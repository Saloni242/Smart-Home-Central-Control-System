<!DOCTYPE html>
<html>
    <title>USER PANEL</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

                    <?php
                }
            }
            ?>
        </nav>


        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:25%;margin-top:43px;">
            <br>
             <h1>CURRENT PLAN</h1>
            <!-- Header -->

            <div id="section5" style="margin-left:5%;">
                <?php
                if ($fetch_data->num_rows() > 0) {
                    foreach ($fetch_data->result() as $u) {
                        
                        ?> 

                        <table align="center" style="width:50%">

                            <thead>
                                <tr>

                                    <th scope="col">Name:</th>
                                    <td><?php echo $u->Title; ?></td>
                                </tr> 
                                <tr>
                                    <th scope="col">Devices:</th>
                                    <td><?php echo $u->Device_count; ?> devices allowed</td>
                                </tr>
                                <tr>
                                    <th scope="col">Subscription date:</th>
                                    <td><?php echo $u->subscription_date; ?></td>
                                </tr>
                                <tr>
                                    <th scope="col">Cost:</th>
                                    <td><?php echo $u->Price; ?> &nbsp;INR</td>
                                </tr>

                            </thead>
                        </table>

                        <br>
                        <br>
                        <div class="wrapper">
                            <form action="<?php echo base_url('userpanel/deactivate_plan/' . $u->name) ?>" method="post">
                                <input type="submit" class="button button3" value="Deactivate plan"></input>
                            </form>

                            <form action="<?php echo base_url('userpanel/request_reactivate_plan/' . $u->name) ?>" method="post">
                                <input type="submit" class="button button1" value="Request Plan Reactivation"></input>
                            </form>
                            <br>
                            <?php 
                            if ($u->status !=1){
                            ?>
                             <a href="http://localhost/instamojo/bill_pay.php"><button class="button button1">PAY <?php echo $u->Price; ?> INR NOW</button></a>
                             <?php
                         }
                         ?>
                             <a href="<?php echo base_url(). 'user/plan_display';?>#Pricing"><button class="button button1">LOOK FOR ANOTHER PLAN</button></a>
                            <br>
                            <br>
                             <form action="<?php echo base_url('userpanel/request_extend_plan/' . $u->name) ?>" method="post">
                                <input type="submit" class="button button1" value="Request Plan Extension"></input>
                            </form>
                        </div>


                        <?php

                    }
                }
                ?>
                <br>
                 <center>
                 <?php
                  $error_msg=$this->session->flashdata('error');
                  $success_msg=$this->session->flashdata('success');
                  $d=$this->session->flashdata('deactivate');

                  if($error_msg){
                    echo "<div style='color:red; font-weight:bold;'>$error_msg</div>";
                  }
                  elseif($success_msg){
                    echo "<div style='color:green; font-weight:bold;'>$success_msg</div>";
                  }
                  elseif($d)
                  {
                    echo $d;
                  }

        ?>
        </center>

            </div>

        </div>
       

    </body>

</html>
