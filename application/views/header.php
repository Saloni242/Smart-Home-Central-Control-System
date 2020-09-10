<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>WELCOME ADMIN</title>

	<link rel="stylesheet" href="../assets/css/demo2.css">
	<link rel="stylesheet" href="../assets/css/header-user-dropdown.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">


</head>

<body>

<header class="header-user-dropdown">

	<div class="header-limiter">
		<h1><i class="fa fa-bars" style="color: white;font-size:25px;margin-left: -60px;"></i><a href="<?php echo base_url('admin/welcome_admin'); ?>">&nbsp;&nbsp;<img src="../assets/background/logo.jpg" height="45" width="45" style="background-color:white";></img></a></h1>
		
		<h1 style="margin-left: 500px;font-size: 34px;">Welcome<span>&nbsp;admin!</span></h1>
		<div class="header-user-menu">
			<img src="http://localhost/project/assets/background/bc2.png" alt="User Image"/>

			<ul>
				<li><a href="#">Change Profile Picture</a></li>
				<li><a href="#">Change Password</a></li>
				<li><a href="#" class="highlight">Logout</a></li>
			</ul>
		</div>

	</div>

</header>

<!-- The content of your page would go here. -->




<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

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
    	$(".sidebar-left").toggle();
  		});


</script>


<!-- Demo ads. Please ignore and remove. -->



</body>

</html>
