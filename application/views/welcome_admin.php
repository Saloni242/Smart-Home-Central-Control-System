<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

	<title>WELCOME ADMIN</title>

	<link rel="stylesheet" href="../assets/css/demo1.css">
	<link rel="stylesheet" href="../assets/css/sidebar-left.css">
	<link rel="stylesheet" href="../assets/css/demo2.css">
	<link rel="stylesheet" href="../assets/css/header-user-dropdown.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">

	

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

</head>
<style type="text/css">
html{
	background-color: white;
}
	#tab,p{
		margin-left: 450px;
		margin-top: 150px;
	}
	.table {
	    width: 39%;
	    max-width: 100%;
	    margin-bottom: 20px;
	    box-shadow: 5px 10px 8px 10px #888888;
	}
	.table > tbody > tr > td{
		line-height: 2.5;
	}
	.card-header {
    padding: 0.75rem 1.25rem;
    margin-left: 488px;
    margin-top: 202px;
    background-color: #f0f3f5;
    border-bottom: 1px solid #c2cfd6;
    width: 532px;
    box-shadow: 5px 10px 8px 10px #888888;
}
ul {
    margin-top: 15px;
    margin-bottom: 10px;
} 
.pointer {cursor: pointer;}
</style>

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
                        	<table class="table table-striped table-bordered table-hover" id="tab" width="300">
							<tr>
								<td style="background-color: #f0f3f5;font-size: 16px;" colspan="2"><center><strong>Site Status</strong></center></td>
							</tr>
							<tr>
								<td width="200"><strong>Site URL</strong></td>
								<td><a target="_blank" href="http://localhost/project/user/front" style="text-decoration: none;">http://localhost/project/user/front</a></td>
							</tr>
							<tr>
								<td><strong>Site Name</strong></td>
								<td>Smart Home Control</td>
							</tr>
							<tr>
								<td><strong>Admin Email ID</strong></td>
								<td>saloni.goyal242@gmail.com</td>
							</tr>

							</table>
				

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script type="text/javascript">

		$(function () {

			var links = $('.sidebar-links > a');

			links.on('click', function () {

				links.removeClass('selected');
				$(this).addClass('selected');

			})
		});

		$(document).ready(function(){

		var userMenu = $('.header-user-dropdown .header-user-menu');

		userMenu.on('touchend', function(e){

			userMenu.addClass('show');

			e.preventDefault();
			e.stopPropagation();

		});

		// This code makes the user dropdown work on mobile devices

		$(document).on('touchend', function(e){

			// If the page is touched anywhere outside the user menu, close it
			userMenu.removeClass('show');

		});

	});
	$(".fa-bars").click(function(){
    	//$(".sidebar-left").toggle();
    	$(".sidebar-left").animate({
      		width: "toggle"
    	});
    	$(this).show("slide", { direction: "right" }, 1000);
  		});

		
	</script>

</body>

</html>
