<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      User Devices
    </title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/js/bootstrap-formhelpers.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/css/bootstrap-formhelpers.css" rel="stylesheet"/>

<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/demo1.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/sidebar-left.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/sidebar-collapse.css">
   <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/demo2.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/header-user-dropdown.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

  

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
  </style>


  </head>
  <body>
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
 <body>

                <h3 style="margin-left: 150px;">DEVICES</h3>
                <br><br>

                <a href="http://192.168.43.34:8080/video"><button type="button" class="btn btn-md btn-success" style="margin-left: 150px;">CAMERA</button> </a>
                <?php
             
                    foreach ($userlog as $u) {
                        ?> 
                
                <a href="<?php echo base_url(). 'admin/deactivate_temporary/'. $u->user_id;?>"><button type="button" class="btn btn-md btn-danger" style="margin-left: 150px;">Deactivate device temporary</button> </a>
                <a href="<?php echo base_url('admin/reactivate_temporary/'.$u->user_id)?>"><button type="button" class="btn btn-md btn-success" style="margin-left: 10px;">Reactivate devices</button> </a>
               
        <?php
                    }
                
                ?>



<br>
<br>
                <div align = "center" class = "form">
                    <?php
                    
                        foreach ($userlog as $u) {
                            ?> 


                            <form action="<?php echo base_url('admin/devicecontrol/' . $u->name.'/'.$u->user_id) ?>" method="post">

                                <table>
                                    <tr>
                                        <?php
                                        if ($u->status1 == "BULB ON") {
                                            ?>
                                        <img id="myImage" src="<?php echo base_url() ?>/assets/images/<?php echo $u->device1_on ?>" style="width:150px;height:150px">
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if ($u->status1 == "BULB OFF") {
                                        ?>
                                        <img id="myImage" src="<?php echo base_url() ?>/assets/images/<?php echo $u->device1_off ?>" style="width:150px;height:150px">
                                        <?php
                                    }
                                    ?>

                                    &nbsp;&nbsp; <input type="submit" id="D1-on" onclick="document.getElementById('myImage').src = '<?php echo base_url() ?>/assets/images/<?php echo $u->device1_on; ?>'" class="btn btn-md btn-danger"  name="led" value="BULB OFF" ></input>&nbsp;

                                    <input type="submit" id="D1-off"  onclick="document.getElementById('myImage').src = '<?php echo base_url() ?>/assets/images/<?php echo $u->device1_off; ?>'" class="btn btn-md btn-success" name="led" value="BULB ON"></input>



                                    <br>
                                    <br>


                                    <?php
                                    if ($u->status2 == "FAN ON") {
                                        ?>
                                        <img id="myImage1" src="<?php echo base_url() ?>/assets/images/<?php echo $u->device2_on ?>" style="width:170px;height:150px">
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if ($u->status2 == "FAN OFF") {
                                        ?>
                                        <img id="myImage1" src="<?php echo base_url() ?>/assets/images/<?php echo $u->device2_off ?>" style="width:170px;height:150px">
                                        <?php
                                    }
                                    ?>          

                                    &nbsp;&nbsp; <input type="submit" id="D2-on" onclick="document.getElementById('myImage1').src = '<?php echo base_url() ?>/assets/images/<?php echo $u->device2_on; ?>'"  class="btn btn-md btn-danger" name="led" value="FAN ON" ></input>&nbsp;

                                    <input type="submit" id="D2-off" onclick="document.getElementById('myImage1').src = '<?php echo base_url() ?>/assets/images/<?php echo $u->device2_off; ?>'"  class="btn btn-md btn-success" name="led" value="FAN OFF"></input>




                                    <br>
                                    </tr>     
                                </table>


                                <br>
                                <br>
                                <textarea id="logger" class="ip" placeholder="LOGS" readonly></textarea>
                            </form>
                            <br><br>
                        </div>


                        <script>
                            document.getElementById('D1-on').addEventListener('click', function () {
                                //var ip = document.getElementById('ip').value;
                                var ip = "<?php echo $u->ip; ?>";
                                var on = "<?php echo $u->on; ?>";
                                var url = "http://" + ip + "/D1/" + on;
                                var settings = {
                                    "async": true,
                                    "crossDomain": true,
                                    "url": url,
                                    "method": "GET",
                                    "headers": {
                                        "cache-control": "no-cache",
                                        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'

                                    }
                                }
                                logger.textContent = "\nD1 Turned ON\n" + document.getElementById("logger").value;
                                $.ajax(settings).done(function (response) {
                                });
                            });

                            document.getElementById('D1-off').addEventListener('click', function () {
                                var ip = "<?php echo $u->ip; ?>";
                                var off = "<?php echo $u->off ?>";
                                var url = "http://" + ip + "/D1/" + off;
                                var settings = {
                                    "async": true,
                                    "crossDomain": true,
                                    "url": url,
                                    "method": "GET",
                                    "headers": {
                                        "cache-control": "no-cache",
                                        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'

                                    }
                                }
                                logger.textContent = "\nD1 Turned OFF\n" + document.getElementById("logger").value;
                                $.ajax(settings).done(function (response) {
                                });
                            });



                            document.getElementById('D2-on').addEventListener('click', function () {
                                //var ip = document.getElementById('ip').value;
                                var ip = "<?php echo $u->ip; ?>";
                                var on = "<?php echo $u->on ?>";
                                var url = "http://" + ip + "/D2/" + on;
                                var settings = {
                                    "async": true,
                                    "crossDomain": true,
                                    "url": url,
                                    "method": "GET",
                                    "headers": {
                                        "cache-control": "no-cache",
                                        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'

                                    }
                                }
                                logger.textContent = "\nD1 Turned ON\n" + document.getElementById("logger").value;
                                $.ajax(settings).done(function (response) {
                                });
                            });

                            document.getElementById('D2-off').addEventListener('click', function () {
                                //var ip = document.getElementById('ip').value;
                                var ip = "<?php echo $u->ip; ?>";
                                var off = "<?php echo $u->off ?>";
                                var url = "http://" + ip + "/D2/" + off;
                                var settings = {
                                    "async": true,
                                    "crossDomain": true,
                                    "url": url,
                                    "method": "GET",
                                    "headers": {
                                        "cache-control": "no-cache",
                                        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'

                                    }
                                }
                                logger.textContent = "\nD1 Turned ON\n" + document.getElementById("logger").value;
                                $.ajax(settings).done(function (response) {
                                });
                            });



                        </script>

                       


        <?php
    
}
?>



      


 

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