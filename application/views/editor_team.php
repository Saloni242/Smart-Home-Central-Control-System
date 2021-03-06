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
			

					<div class="container">
						<div class="row" style="float:right;">
							<br>
			                 <div class="col-xs-12 col-sm-6">
			                 <form role="form" method="post" action="<?php echo base_url('admin/add_member'); ?>" id="add_member_form">
			                      
			                                <input class="btn btn-lg btn-success" type="submit" value="Add Member" name="add_team" style="margin-right: 880px">                     
			                 </form>
		                	 </div>

		                	 <div class="col-xs-12 col-sm-6">
			                 <button class="btn btn-lg btn-danger" id="delete_all" style="margin-left:-435px">Delete All Selected</button>
		                	 </div>
			             </div>
			         </div>
			         <br>
			         <div class="showscroll">
				<table class="table table-striped table-bordered table-hover" id="table" style="width: 1200px; ">

					<tr>

						<td><strong>Select Multiple</strong><br><input type="checkbox" class="sub_chk" id="master"></td>
						<td  WIDTH="50"><strong>Member Id</strong></td>
						<td><strong>Name</strong></td>
						<td><strong>Email</strong></td>
						<td><strong>Picture</strong></td>
						<td  WIDTH="50"><strong>Designation</strong></td>
						<td  WIDTH="50"><strong>Area of expertise</strong></td>
						<td><strong>About</strong></td>
						<td><strong>Update member</strong></td>
						<td><strong>Delete member</strong></td>


					</tr>

						<?php foreach($members as $members){?>

					<tr memberid="<?php echo $members->member_id; ?>">
						<td><input type="checkbox" class="sub_chk" data-id="<?php echo $members->member_id; ?>"></td>
						<td><?php echo $members->member_id;?></td>

						<td><?php echo $members->name;?></td>
						<td><?php echo $members->member_email;?></td>
						<td><img src="<?php echo base_url(); ?>assets/team/<?php echo $members->member_image;?>" alt="" height='300' width='250'/></td>
						<td><?php echo $members->designation;?></td>
						<td><?php echo $members->field;?></td>
						<td><?php echo $members->member_about;?></td>
						<td><a class="update-link btn btn-md btn-success" href="<?php echo base_url(). 'admin/update_member/'. $members->member_id;?>" title="Edit member">Update</a></td>
						<td><a class="delete-link btn btn-md btn-danger" href="javascript:;" title="Delete member">Delete</a></td>

					</tr>

					<?php }?>

				</table>
			</div>
				<center>

	                 </center>
	              

		</body>
		 <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
		 <script type="text/javascript">
		 	
				  $('.delete-link').on('click', function () {
	   		 var member_id = $(this).parent().parent('tr').attr('memberid');
	   		 var ans = confirm("Are you sure you want to delete ?");
               if(ans){
	                 $.ajax({
	               
			        type: 'POST',
			        url: '<?php echo base_url(). 'admin/reset_delete_member';?>', // link to CI function
			        data: {
			            val: member_id
			        }
			    	});
	                 alert("member deleted");
	                 window.location.reload();
             }
             else
             {
             	alert("member still exists");
             }
	   		 //document.write(member_id);	
		});
				 $('.update-link').on('click', function () {
			   		 var members_id = $(this).parent().parent('tr').attr('memberid');
			   		 var ans = confirm("Are you sure you want to update ?");
		               if(ans){
			   		  $.ajax({
					        type: 'POST',
					        url: '', // link to CI function
					        data: {
					            memberid: members_id
					           
					        }
					  });
			   		}	
			   		  //document.write(members_id);
				});
	</script>

		<script type="text/javascript">
	
	 		var $table = $('#table');
		     $table.bootstrapTable({
			      search: true,
			      pagination: true,
			      buttonsClass: 'primary',
			      showFooter: true,
			      minimumCountColumns: 2,
			      columns: [{
			          field: 'member_id',
			          title: 'ID',
			          sortable: true,
			      },
			      {
			          field: 'member_name',
			          title: 'Name',
			          sortable: true,
			      },
			      {
			          field: 'member_email',
			          title: 'Email_ID',
			          sortable: true,
			          
			      }

			      ],
 
  			 });
  			
 
</script>
<script type="text/javascript">
            $(document).ready(function () {

 

        $('#master').on('click', function(e) {

         if($(this).is(':checked',true))  

         {

            $(".sub_chk").prop('checked', true);  

         } else {  

            $(".sub_chk").prop('checked',false);  

         }  

        });

 

        $('#delete_all').on('click', function(e) {

 

            var allVals = [];  

            $(".sub_chk:checked").each(function() {  

                allVals.push($(this).attr('data-id'));

            });  

 

            if(allVals.length <=0)  

            {  

                alert("Please select row(s) to delete.");  

            }  else {  

 

                var check = confirm("Are you sure you want to delete this row?");  

                if(check == true){  

 

                    var join_selected_values = allVals.join(","); 

 

                    $.ajax({

                        url: '<?php echo base_url(). 'admin/deleteAllmember';?>',

                        type: 'POST',

                        data: 'ids='+join_selected_values,

                        success: function (data) {

                          console.log(data);

                          $(".sub_chk:checked").each(function() {  

                              $(this).parents("tr").remove();

                          });

                          alert("Item Deleted successfully.");

                        },

                        error: function (data) {

                            alert(data.responseText);

                        }

                    });

 

                  $.each(allVals, function( index, value ) {

                      $('table tr').filter("[data-row-id='" + value + "']").remove();

                  });

                }  

            }  

        });

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







