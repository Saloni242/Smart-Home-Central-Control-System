<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PLANS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/pricing.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:600,700' rel='stylesheet' type='text/css'>
<title>SMART HOME CONTROL</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="footer, contact, form, icons" />

 

  
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/footer-distributed-with-contact-form.css">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
   body{
  background: #eaeae1;
}
</style>
</head>
<div class="w3-top" >
   
  <div class="w3-bar w3-white w3-card" id="myNavbar">
 <a href="<?php echo base_url(). 'user/front';?>" class="w3-bar-item w3-button" style="text-decoration: none;">SMART HOME CONTROL</a>



    <div class="w3-right w3-hide-small">
          
      <?php 
       $name = $this->session->userdata('user_name');
      if($name!=null)
        {?>
      <a href="<?php echo base_url(). 'userpanel/user_view/'.$name;?>" class="w3-bar-item w3-button" style="text-decoration: none;">Hello <?php echo $name;?>!</a>
      <?php
    }
    else{
      ?>
      <a href="<?php echo base_url(). 'user/';?>" class="w3-bar-item w3-button" style="text-decoration: none;">REGISTER</a></b>
      <a href="<?php echo base_url(). 'user/login_view';?>" class="w3-bar-item w3-button" style="text-decoration: none;">LOGIN</a>
      <?php
    }?>
      
     
    </div>
  </div>
</div>

<body>
<?php  $name = $this->session->userdata('user_name');?>

    <section class="pricing-table">
        <div class="container">
            
            <div class="row justify-content-md-center">
                <div class="col-md-5 col-lg-4">
                    <div class="item">
                        <div class="ribbon">Best Value</div>
                        <div class="heading">
                            <h3><?php echo $records['Title']; ?></h3>
                        </div>
                        <p><?php echo $records['Description']; ?></p>
                        <div class="features">
                            <h4><span class="feature">Devices allowed: </span><span class="value"><?php echo $records['Device_count']; ?></span></h4>
                            <h4><span class="feature">Duration</span> : <span class="value"><?php echo $records['Month']; ?> months </span></h4>
                            <h4><span class="feature">Installation</span> : <span class="value">Free</span></h4>
                        </div>
                        <div class="price">
                            <h4><?php echo $records['Price']; ?> INR</h4>

                        </div>
                         <?php 
                           $name = $this->session->userdata('user_name');
                          if($name!=null)
                            {?>
                              <a href="<?php echo base_url()?>user/order/<?php echo $records['plan_id'];?>" class="btn btn-block btn-primary">SUBSCRIBE NOW</a>
                        <?php
                          }
                          else{
                            ?>
                             <a href="<?php echo base_url(). 'user/login_view';?>" class="btn btn-block btn-primary" style="text-decoration: none;">LOGIN TO SUBSCRIBE</a>
                            <?php
                          }?>
                    </div>
                </div>
                
            </div>
        </div>
    </section>


    <footer class="footer-distributed">

      <div class="footer-left">

        <table>
          <tr>
            <td><a href="http://localhost/project/user/front"><img src="<?php echo base_url();?>/assets/background/logo.jpg" height="45" width="45"></img></a></td>
            <td><h3> &nbsp; Smart Home <span>Control</span></h3></td>
          </tr>
        </table>
        
        
        <br/>
        <p class="footer-links">
          <a href="<?php echo base_url(). 'user/front';?>">Home</a>
          ·
          <a href="<?php echo base_url(). 'user/front';?>#team">Team</a>
          ·
          <a href="<?php echo base_url(). 'user/plan_display';?>#Pricing">Pricing</a>
          ·
          <a href="<?php echo base_url(). 'user/front';?>#about">About</a>
          ·
          <a href="<?php echo base_url(). 'user/faq';?>">Faq</a>
          ·
          <a href="<?php echo base_url(). 'user/address';?>">Contact</a>
        </p>

        <br/>

        <div class="wrapper">
          <ul class="social-icons icon-circle icon-zoom list-unstyled list-inline"> 
          <li> <a href="#"><i class="fa fa-facebook"></i></a></li> 
          <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
          <li> <a href="#"><i class="fa fa-linkedin"></i></a></li> 
          <li> <a href="#"><i class="fa fa-google-plus"></i></a></li>
          <li> <a href="#"><i class="fa fa-youtube"></i></a></li>
          <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
          </ul>
        </div>



        <br/>
        <br/>
        <br/>
        <p class="footer-company-name">Smart Home Control &copy; 2019</p>

      </div>

      <div class="footer-right">

        <h4 style="color: white;
                  font: normal 28px 'Cookie', cursive;">Contact Us</h4>
        <form action="<?php echo base_url(). 'user/contact_us';?>" method="post">
          
          <input type="text" name="email" placeholder="Email" required="true" />
          <input type="text" name="subject" placeholder="Subject" required="true" />
          <textarea name="message" placeholder="Message" required="true"></textarea>
          <button>Send</button>

        </form>

      </div>

    </footer>
</body>
</html>
