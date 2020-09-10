<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:600,700' rel='stylesheet' type='text/css'>
  <title>PLANS</title>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="footer, contact, form, icons" />

 <link rel="stylesheet" href="../assets/css/plan-design.css">

  <link rel="stylesheet" href="../assets/css/demo.css">
  <link rel="stylesheet" href="../assets/css/footer-distributed-with-contact-form.css">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

  


   <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
 <div class="w3-top" >
   
  <div class="w3-bar w3-white w3-card" id="myNavbar">
 <a href="#" class="w3-bar-item w3-button" style="text-decoration: none;">SMART HOME CONTROL</a>



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

<video width="100%" autoplay="autoplay" muted="muted" loop="loop" id="myVideo">
  <source src="<?php echo base_url();?>assets/background/bg1.mp4" type="video/mp4">
</video>

<br>
<br>
<br>
<br>
<br>
<br>

<div class="w3-container w3-light-grey" style="padding:128px 16px">
  <div class="w3-row-padding"><!--
        --><div class="w3-col m6"><!--
        -->
   <?php foreach($content as $content){?>
        <img class="w3-image w3-round-large" src="<?php echo base_url();?>/assets/content/<?php echo $content->img?>" alt="content_image" width="700" height="200">
    </div>
    <div class="w3-col m6">
      <br>
      <br>
      <br>
      <br>

      <br>

      <p><?php echo $content->content?>
      </p>
      <br>
      
      <br>
      
    </div>
    
  </div>
</div>
<br>
<br>
<br>
    <?php }?>

<div class="container" style="font-size: 13px;
line-height: 1.3; " id="Pricing">
<br>
<?php  $name = $this->session->userdata('user_name');?>
   <?php foreach($plan as $plan){?>
<div class="wrap">  

    <button class="clicker" onclick="myfunction(<?php echo $plan->plan_id?>)"> <?php echo $plan->Title?></button>

    <div class="circle angled"></div>

  </div>
    <?php }?>
</div>
<br>
<br>
<br>



<footer class="footer-distributed">

      <div class="footer-left">

        <table>
          <tr>
            <td><a href="http://localhost/project/user/front"><img src="../assets/background/logo.jpg" height="45" width="45" style="background-color:white";></img></a></td>
            <td><h3> &nbsp; Smart Home <span>Control</span></h3></td>
          </tr>
        </table>
        
        
        <br/>
        <p class="footer-links">
          <a href="<?php echo base_url(). 'user/front';?>">Home</a>
          ·
          <a href="<?php echo base_url(). 'user/front';?>#team">Team</a>
          ·
          <a href="#Pricing">Pricing</a>
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
<script type="text/javascript">
  function myfunction($plan_id)
  {
    window.location.href="http://localhost/project/user/display_plan/"+$plan_id;
  }
</script>
</html>