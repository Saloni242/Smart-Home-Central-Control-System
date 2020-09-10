<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:600,700' rel='stylesheet' type='text/css'>
<title>SMART HOME CONTROL</title>
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
<?php foreach($banner as $banner){?>

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.5;
}

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("<?php echo base_url();?>assets/background/<?php echo $banner->banner_image;?>");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}

#head{
  margin-top:50px;
  text-shadow: 3px 3px 9px grey;
}

.w3-container
{
  border: 100px;
}
.container{
  
  background-color: white;
  margin-top: 21px;
  margin-left: -271px;
  text-align: center;
  display: flex;
  flex-direction: row;
}

.wrap{  
    position: relative;
    width: 30%;
    height: 30%;
    margin: 20px auto 30px auto;
    &:last-child {
      margin-bottom: 0;
  }
}
.edit{
  -webkit-column-count: 4; /* Chrome, Safari, Opera */
  -moz-column-count: 4; /* Firefox */
  column-count: 4;
 
}


</style>

</head>


<body>

  <div class="w3-top" >
   
  <div class="w3-bar w3-white w3-card" id="myNavbar">
 <a href="<?php echo base_url(). 'user/front';?>" class="w3-bar-item w3-button" style="text-decoration: none;">SMART HOME CONTROL</a>

    <div class="w3-right w3-hide-small">
      <?php
      $name = $this->session->userdata('user_name');
      if($name){
      ?>
        <a href="<?php echo base_url(). 'userpanel/user_view/'.$name;?>" class="w3-bar-item w3-button" style="text-decoration: none;">Hello <?php echo $name;?>!</a>
        <?php 
      }
      else
        {
          ?>
      <a href="<?php echo base_url(). 'user/';?>" class="w3-bar-item w3-button" style="text-decoration: none;">REGISTER</a></b>
      <a href="<?php echo base_url(). 'user/login_view';?>" class="w3-bar-item w3-button" style="text-decoration: none;">LOGIN</a>
      <?php
    }?>
      
     
    </div>
  </div>
</div>

<?php  $name = $this->session->userdata('user_name');?>
<header class="bgimg-1 w3-display-container" id="home">
  <div class="w3-display-left w3-text-white" style="padding:250px" id="head">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <span class="w3-jumbo w3-hide-small"><?php echo $banner->Title;?></span><br>
    <span class="w3-xxlarge w3-hide-large w3-hide-medium" style="font-weight: bold;"><?php echo $banner->Title;?></span><br>
    
    <p><a href="<?php echo base_url(). 'user/plan_display';?>" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off" style="text-decoration: none;    font-weight: bold;"><?php echo $banner->button_content;?></a></p>
  </div> 
 
</header>
<?php }?>

<?php foreach($about as $about){?>
<!--
  --><div class="w3-container" style="padding:40px 4px" id="about"><!--
  --><h3 class="w3-center"><?php echo $about->Title;?></h3><!--
  --><p class="w3-center w3-large"><?php echo $about->Caption;?></p><!--
  --><br><div class="w3-row-padding w3-center" style="margin-top:64px"><!--
  --><div class="w3-quarter">
      <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">Responsive</p>
      <p><?php echo $about->R_content;?></p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-heart w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Passion</p>
      <p><?php echo $about->P_content;?></p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-diamond w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Design</p>
      <p><?php echo $about->D_content;?></p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-cog w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Support</p>
      <p><?php echo $about->S_content;?></p>
    </div>
  </div>
</div>

<br>
<br>
<br>
<?php }?>

<?php foreach($content as $content){?>

<div class="w3-container w3-light-grey" style="padding:128px 16px">
  <div class="w3-row-padding">
    <div class="w3-col m6">
      <h3 style="font: normal 36px 'Cookie', cursive;"><?php echo $content->Title;?></h3>
      <br>
      <br>
     
      <p><?php echo $content->Content;?></p>
      </p>
      <br>
      <br>
      <p><a href="#work" class="w3-button w3-black" style="text-decoration: none;"><i class="fa fa-th"> </i> View Our Work</a></p>
    </div>
    <div class="w3-col m6">
        <img class="w3-image w3-round-large" src="<?php echo base_url();?>/assets/background/<?php echo $content->Image;?>" alt="Buildings" width="700" height="200">
    </div>
  </div>
</div>
<?php }?>


<div class="w3-container" style="padding:128px 16px" id="team">
  <h3 class="w3-center">THE TEAM</h3>
  <p class="w3-center w3-large">Enthusiasts behind this idea</p>
  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-col l3 m6 w3-margin-bottom">
      
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="container">
      <?php foreach($team as $team){?>
<div class="wrap">  
      <div class="w3-card w3-center">
          <img src="<?php echo base_url()?>assets/team/<?php echo $team->member_image;?>" alt="Shiv" height="305" width="260">
        
          <h3><?php echo $team->name;?></h3>
          <p class="w3-opacity"><?php echo $team->designation;?></p>
          <p class="w3-opacity"><?php echo $team->field;?></p>
          <p> <?php echo $team->member_about;?></p>
          <br>
         
          <p><a href="mailto:<?php echo $team->member_email;?>" style="text-decoration: none;"><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></a></p>
       

       </div>
     </div>
      <?php }?>
    </div>
   
    </div>

    </div>
    
  </div>
</div>



<div class="w3-container w3-row w3-center w3-dark-grey w3-padding-64">
  <div class="w3-quarter">
    <span class="w3-xxlarge">14+</span>
    <br>Partners
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">55+</span>
    <br>Projects Done
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">89+</span>
    <br>Happy Clients
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">150+</span>
    <br>Meetings
  </div>
</div>


<div class="w3-container" style="padding:128px 16px;" id="work">
  <h3 class="w3-center">OUR WORK</h3>
  <p class="w3-center w3-large">Areas explored so far</p>
  <br>
  <div class="edit">

<?php foreach($img as $img){?>
 
  <div class="w3-row-padding" style="margin-top:8px;">
    
    <div class="w3-col l3 m6">
      
      <img src="<?php echo base_url();?>assets/work/<?php echo $img->work_img;?>" height="160" width="270" onclick="onClick(this)" class="w3-hover-opacity" alt="<?php echo $img->caption;?>" id="img_disp">
 
      </div>
       
  </div>
  <?php }?>
</div>


</div>


<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
  <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright" title="Close Modal Image">×</span>
  <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
    <img id="img01" class="w3-image">
    <p id="caption" class="w3-opacity w3-large"></p>
  </div>
</div>


<div class="w3-light-white w3-padding-64">
  <div class="w3-row-padding">
    <div class="w3-col m6">
      <h3>Our Skills.</h3>
      <p>Mainly we work on IOT based platforms and Web based Applications.</p>
     
    </div>
    <div class="w3-col m6">
      <p class="w3-wide"><i class="fa fa-cloud w3-margin-right"></i>Internet Of Things</p>
      <div class="w3-grey">
        <div class="w3-container w3-dark-grey w3-center" style="width:90%">90%</div>
      </div>
      <p class="w3-wide"><i class="fa fa-desktop w3-margin-right"></i>Web Development</p>
      <div class="w3-grey">
        <div class="w3-container w3-dark-grey w3-center" style="width:85%">85%</div>
      </div>
      <p class="w3-wide"><i class="fa fa-globe w3-margin-right"></i>Artificial Intelligence</p>
      <div class="w3-grey">
        <div class="w3-container w3-dark-grey w3-center" style="width:75%">75%</div>
      </div>
    </div>
  </div>
</div>







<footer class="footer-distributed">

      <div class="footer-left">

        <table>
          <tr>
            <td><a href="http://localhost/project/user/front"><img src="../assets/background/logo.jpg" height="45" width="45"></img></a></td>
            <td><h3> &nbsp; Smart Home <span>Control</span></h3></td>
          </tr>
        </table>
        
        
        <br/>
        <p class="footer-links">
          <a href="#">Home</a>
          ·
          <a href="#team">Team</a>
          ·
          <a href="<?php echo base_url(). 'user/plan_display';?>#Pricing">Pricing</a>
          ·
          <a href="#about">About</a>
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

<script>
// Modal Image Gallery
window.counter=0;
function onClick(element) {
  counter++;
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
  if(counter==4)
  {
    $('#img_disp').addClass('disp');
  }
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}


</script>

</html>




