
<!DOCTYPE html>

  <html lang="en">

    <head>
      <title> CONTACT </title>



          <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
          <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
          <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
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

          body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
            hr {border-top: 1px solid #000; width:50%;}

              a {color: #000;}

              a:link{text-decoration:none;}

             

              .box1{background: rgb(76, 175, 80, 0.6);}
              .box2{background: rgb(192, 192, 200, 0.6);}
              .box3 {
              background: rgb(255, 0, 0, 0.3);
          };}



              #author a{
                color: #fff;
                text-decoration: none;
                  
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
<?php  $name = $this->session->userdata('user_name');?>


    <body>

          <div class="container-fluid">
            <br>
            <br>
            <br>
          <h1 class="text-center">Contact Address</h1>
          <center><hr></center>
          <?php foreach($add as $add){?>
           <div class="row">
            

            <!--

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3672.322584858815!2d72.52161231450788!3d23.011924984958416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e84d59c8513eb%3A0x664a7312c110e25!2sVethics!5e0!3m2!1sen!2sin!4v1547789076755" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
          -->
       
       <iframe src="<?php echo $add->locn?>" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>


           </div>
          	<div class="row text-center">
          	  <div class="col-4 box1 pt-4">
                  <a href="tel:079-40084241"><i class="fas fa-phone fa-3x"></i>
                  <h3 class="d-none d-lg-block d-xl-block">Phone</h3>
                  <p class="d-none d-lg-block d-xl-block"><?php echo $add->phone?></p></a>
                </div>
                <div class="col-4 box2 pt-4">
                  <a href=""><i class="fas fa-home fa-3x"></i>
                  <h3 class="d-none d-lg-block d-xl-block">Address</h3>
                  <p class="d-none d-lg-block d-xl-block"><?php echo $add->address?></p></a>
                </div>
                <div class="col-4 box3 pt-4">
                  <a href="mailto:saloni.goyal242@gmail.com"><i class="fas fa-envelope fa-3x"></i>
                  <h3 class="d-none d-lg-block d-xl-block">E-mail</h3>
                  <p class="d-none d-lg-block d-xl-block"><?php echo $add->admin_email?></p></a>
                </div>
          	</div>
            <?php }?>
</div>
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
</html>
