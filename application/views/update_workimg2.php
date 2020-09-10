<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      Update Member    </title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/js/bootstrap-formhelpers.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/css/bootstrap-formhelpers.css" rel="stylesheet"/>

<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>WELCOME ADMIN</title>

  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/demo1.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/sidebar-left.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/sidebar-collapse.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/demo2.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/header-user-dropdown.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">

  

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>


  

  

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

<style type="text/css">
    ul {
        margin-top: 15px;
        margin-bottom: 10px;
    } 
    .pointer {cursor: pointer;}
    html{
          background-color: white;
      }
      .showscroll{
        overflow-y: scroll;
        overflow-x: hidden;
        max-height: 480px;
      }
  </style>

  </head>
  <body>
   <?php foreach($admin as $admin){?>
  <header class="header-user-dropdown">

  <div class="header-limiter">
    <h1><i class="fa fa-bars pointer" style="color: white;font-size:25px;margin-left: -60px;"></i><a href="<?php echo base_url('admin/welcome_admin'); ?>">&nbsp;&nbsp;<img src="<?php echo base_url(); ?>/assets/background/logo.jpg" height="45" width="45" style="background-color:white";></img></a></h1>
    
    <h1 style="margin-left: 500px;font-size: 34px;">Welcome<span>&nbsp;admin!</span></h1>
    <div class="header-user-menu">
      <img src="<?php echo base_url(); ?>/assets/admin/thumbnails/<?php echo $admin->admin_picture?>" alt="Admin Image"/>

      <ul>
        <li><a href="<?php echo base_url('admin/change_picture'); ?>">Change Profile Picture</a></li>
        <li><a href="<?php echo base_url('admin/change_password'); ?>">Change Password</a></li>
        <li><a href="<?php echo base_url('admin/logout'); ?>" class="highlight">Logout</a></li>
      </ul>
    </div>

  </div>

  <?php }?>

</header>

  <aside class="sidebar-left">
    <div class="sidebar-links">
      <a class="link-blue" href="<?php echo base_url('admin/welcome_admin'); ?>"><i class="fa fa-dashboard"></i>Dashboard</a>
      <a class="link-orange" href="<?php echo base_url('admin/manage_user'); ?>"><i class="fa fa-users"></i>Users</a>
      <a class="link-red" href="<?php echo base_url('admin/manage_plan'); ?>"><i class="fa fa-pencil-square-o"></i>Plans</a>
      <a class="link-yellow" href="<?php echo base_url('admin/complain'); ?>"><i class="fa fa-warning"></i>Inquiries & Complaints</a>
      <a class="link-brown" href="<?php echo base_url('admin/payment'); ?>"><i class="fa fa-credit-card"></i>Payment History</a>
      <a class="link-green" href="<?php echo base_url('admin/admin_manage'); ?>"><i class="fa fa-puzzle-piece"></i>Manage
      </a>
    </div>
  </aside>
  <br>

<span style="background-color:red;">
  <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
      <div class="row"><!-- row class is used for grid system in Bootstrap-->
          <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
              <div class="login-panel panel panel-success">
                  <div class="panel-heading">
                      <h3 class="panel-title">Update Our Work</h3>
                  </div>
                  <div class="panel-body">

                  <?php
                  $error_msg=$this->session->flashdata('error_msg');
                  $success_msg=$this->session->flashdata('success_msg');

                  if($error_msg){
                    echo $error_msg;
                  }
                  else
                  {
                    echo $success_msg;
                  }
                   ?>

                   


                      <form role="form" method="post" action="<?php echo base_url('admin/reset_update_workimg'); ?>" id="update_plan_form">
                         <?php echo validation_errors(); ?>  
                         <?php echo form_open('form'); ?> 
                          


                      </form>
                      
                      
                  
                  </div>
              </div>
          </div>
      </div>
  </div>





</span>



  </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script type="text/javascript">

    $(function () {

      var links = $('.sidebar-links > a');

      links.on('click', function () {

        links.removeClass('selected');
        $(this).addClass('selected');

      })
    });
     $(".fa-bars").click(function(){
      //$(".sidebar-left").toggle();
      $(".sidebar-left").animate({
          width: "toggle"
      });
      $(this).show("slide", { direction: "right" }, 1000);
      });
</script>

  </script>
</html>