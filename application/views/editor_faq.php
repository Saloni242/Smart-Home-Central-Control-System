
<html>
  <head>

  <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>

  
   <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>WELCOME ADMIN</title>

  <link rel="stylesheet" href="../assets/css/demo1.css">
  <link rel="stylesheet" href="../assets/css/sidebar-left.css">
  <link rel="stylesheet" href="../assets/css/sidebar-collapse.css">
  <link rel="stylesheet" href="../assets/css/demo2.css">
  <link rel="stylesheet" href="../assets/css/header-user-dropdown.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">

  

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

  

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

<style type="text/css">
  #cke_editor1 {
    
    margin-left: 135px;
}
#cke_editor2{
    
    margin-left: 135px;
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
        max-height: 550px;
        margin-left: 200px;
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


<div class="showscroll">
    <h3 style="margin-left: 135px">Manage FAQ</h3>
    <p style="margin-left: 135px">Enter Question:</p>
    <textarea  name="editor1" required="true"></textarea>
    <br/>
    <p style="margin-left: 135px">Enter Answer:</p>
    <textarea name="editor2" required="true"></textarea>
    <br/>
    <button style="margin-left: 135px" onclick="save()">Save</button>
    <p id="print"></p>
  </div>
    <script>

      CKEDITOR.replace('editor1');
      CKEDITOR.replace('editor2');
      CKEDITOR.config.autoParagraph = false;
       CKEDITOR.config.defaultLanguage='en';
     
    </script>

    <script type="text/javascript">
       function save() {
try{


        var que = CKEDITOR.instances.editor1.getData();
        var ans = CKEDITOR.instances.editor2.getData();
      }
      catch(ex)
      {

        
      }
      
        //document.getElementById('print').innerHTML=topass;

        //window.location.href="http://localhost/project/user/editoradd/"+topass;

        
        $.ajax({  
          type: 'POST',  
           url: '<?php echo base_url('admin/editoraddfaq')?>',
           //contentType: "charset=utf-8",
          data: {parameter:que, parameter2:ans},
          success: function(response) {
             alert("Data Saved");
          },
          error: function(e) {
                alert(e);
            }
      });
    }




    </script>
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

  </body>
</html>