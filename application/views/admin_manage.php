<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WELCOME ADMIN</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   

    <link rel="stylesheet" href="../assets/css/demo1.css">
    <link rel="stylesheet" href="../assets/css/sidebar-left.css">
    <link rel="stylesheet" href="../assets/css/sidebar-collapse.css">
    <link rel="stylesheet" href="../assets/css/demo2.css">
    <link rel="stylesheet" href="../assets/css/header-user-dropdown.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">

    

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
        <h1><i class="fa fa-bars pointer" style="color: white;font-size:25px;margin-left: -60px;"></i><a href="<?php echo base_url('admin/welcome_admin'); ?>">&nbsp;&nbsp;<img src="../assets/background/logo.jpg" height="45" width="45" style="background-color:white";></img></a></h1>
        
        <h1 style="margin-left: 500px;font-size: 34px;">Welcome<span>&nbsp;admin!</span></h1>
        <div class="header-user-menu">
            <img src="<?php echo base_url(); ?>assets/admin/thumbnails/<?php echo $admin->admin_picture?>" alt="Admin Image"/>

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
  
    <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Manage</h3>
                </div>
<div class="showscroll">
                <div class="panel-body">
                   
                        <fieldset>
                           
                               <a href="<?php echo base_url('admin/editor_general'); ?>" style="text-decoration: none"><input class="btn btn-lg btn-success btn-block" type="submit" value="General Settings" name="general" ></a>

                                <br/>

                                <a href="<?php echo base_url('admin/editor_faq'); ?>" style="text-decoration: none"><input class="btn btn-lg btn-success btn-block" type="submit" value="FAQ" name="faq" ></a>

                                <br/>

                                <a href="<?php echo base_url('admin/editor_address'); ?>" style="text-decoration: none"><input class="btn btn-lg btn-success btn-block" type="submit" value="Contact Page" name="contact" ></a>

                                <br/>

                                <a href="<?php echo base_url('admin/editor_about'); ?>" style="text-decoration: none"><input class="btn btn-lg btn-success btn-block" type="submit" value="About Us" name="about" ></a>

                                <br/>

                                <a href="<?php echo base_url('admin/editor_banner'); ?>" style="text-decoration: none"><input class="btn btn-lg btn-success btn-block" type="submit" value="Website Banner" name="banner" ></a>

                                 <br/>

                                 <a href="<?php echo base_url('admin/editor_content'); ?>" style="text-decoration: none"><input class="btn btn-lg btn-success btn-block" type="submit" value="Content" name="content" ></a>

                                <br/>

                                <a href="<?php echo base_url('admin/editor_content_second'); ?>" style="text-decoration: none"><input class="btn btn-lg btn-success btn-block" type="submit" value="Second Page Content" name="content" ></a>

                                <br/>

                                <a href="<?php echo base_url('admin/editor_team'); ?>" style="text-decoration: none"><input class="btn btn-lg btn-success btn-block" type="submit" value="Team" name="team" ></a>

                                <br/>

                                <a href="<?php echo base_url('admin/editor_work'); ?>" style="text-decoration: none"><input class="btn btn-lg btn-success btn-block" type="submit" value="Our Work" name="work" ></a>


                        </fieldset>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>


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

</html>