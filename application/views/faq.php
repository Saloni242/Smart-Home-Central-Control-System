<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <title>Frequently Asked Questions</title>
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<script language=javascript src='http://maps.google.com/maps/api/js?sensor=false'></script>
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

  <style type="text/css">
  	
.btn{
	box-shadow: 5px 10px 8px 10px #888888;
}

h1{
	text-shadow: 2px 2px 4px grey;
}

body { 
      background: url(../assets/background/faqss.jpg) no-repeat center center fixed #000; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
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

<br>
<br>
<br>
<center><h1><b><font size="8">FAQ</font></b></h1></center>
<br/>
<?php foreach($faqs as $faqs){?>
<div class="container mt-3">

  <button type="button" class="btn btn-lg " data-toggle="collapse" data-target="#<?php echo $faqs->faq_id;?>">Q<?php echo $faqs->faq_id?>) <?php echo $faqs->faq_question?> </button>
  <br/>
  <br/>
  <div id="<?php echo $faqs->faq_id;?>" class="collapse">
    <b><font size="4"><?php echo $faqs->faq_answer?></font></b>
  </div>
<br/>
  
</div>
<?php }?>

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
</script>
</html>