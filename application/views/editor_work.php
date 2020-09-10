<!DOCTYPE html>

	<html lang="en">

		<head>
			<title> members </title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">

			<title>WELCOME ADMIN</title>

			<link rel="stylesheet" href="../assets/css/demo1.css">
			<link rel="stylesheet" href="../assets/css/sidebar-left.css">
			<link rel="stylesheet" href="../assets/css/demo2.css">
			<link rel="stylesheet" href="../assets/css/header-user-dropdown.css">

			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
			<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

			<style type="text/css">
				.table {
			    width: 100%;
			    max-width: 100%;
			    margin-bottom: 20px;
			    margin-left: 125px;
			}

			h4
			{
				margin-left: 125px;
			}
			.btn-group-lg > .btn, .btn-lg {
			    padding: 6px 8px;
			    font-size: 17px;
			    line-height: 1.2;
			    border-radius: 3px;
			    margin-left: -60px;
			}
			.container {
  
				    margin-left: 152px;
				}
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
		
			<header class="header-user-dropdown" id="fixed">

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
	

			
		
			
        <aside class="sidebar-left" > 
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
			         <div class="showscroll">
					<table class="table table-striped table-bordered table-hover" id="table" style="width: 1200px; ">

					<tr>

						
						<td WIDTH="100"><strong>Image Id</strong></td>
						<td WIDTH="300"><strong>Caption</strong></td>
						<td><strong>Image</strong></td>
						<td WIDTH="200"><strong>Change Image</strong></td>
						

					</tr>

						<?php foreach($imgs as $imgs){?>

					<tr memberid="<?php echo $imgs->img_id;?>">
						
						<td><?php echo $imgs->img_id;?></td>

						<td><?php echo $imgs->caption;?></td>
						<td><img src="<?php echo base_url(); ?>assets/work/<?php echo $imgs->work_img;?>" alt="" height='300' width='250'/></td>
						<td><a class="update-link btn btn-md btn-success" href="<?php echo base_url(). 'admin/update_workimg/'. $imgs->img_id;?>" title="Edit image">Change</a></td>

					</tr>

					<?php }?>

				</table>
			</div>
				<center>

	                 </center>
	              

		</body>
		 <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
		 <script type="text/javascript">
				 $('.update-link').on('click', function () {
			   		 var img_id = $(this).parent().parent('tr').attr('memberid');
			   		 var ans = confirm("Are you sure you want to update ?");
		               if(ans){
			   		  $.ajax({
					        type: 'POST',
					        url: '', // link to CI function
					        data: {
					            imgid: img_id
					           
					        }
					  });
			   		}	
			   		  //document.write(members_id);
				});
	</script>



     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script type="text/javascript">

		$(function () {

			var links = $('.sidebar-links > a');

			links.on('click', function () {

				//links.removeClass('selected');
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







