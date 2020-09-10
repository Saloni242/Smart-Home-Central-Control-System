<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>REGISTRATION</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/js/bootstrap-formhelpers.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/css/bootstrap-formhelpers.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/footer-distributed-with-contact-form.css">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">


<style type="text/css">
  body { 
background: url(http://localhost/project/assets/background/register.jpg) no-repeat center center fixed #000; 
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
  </div>
</div>

  <body>
<br>
<br>
<br>
<span style="background-color:red;">
  <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
      <div class="row"><!-- row class is used for grid system in Bootstrap-->
          <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
              <div class="login-panel panel panel-success">
                  <div class="panel-heading">
                      <h3 class="panel-title">Registration</h3>
                  </div>
                  <div class="panel-body">

                  <?php
                  $error_msg=$this->session->flashdata('error_msg');
                  if($error_msg){
                    echo $error_msg;
                  }
                   ?>


                      <form role="form" method="post" action="<?php echo base_url('user/register_user'); ?>" id="register_form" enctype=multipart/form-data>
                         <?php echo validation_errors(); ?>  
                         <?php echo form_open('form'); ?> 
                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Name" name="user_name" type="text" id="user_name" autofocus>
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="E-mail" name="user_email" type="email" id="user_email" autofocus>
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="Password" name="user_password" type="password" value="" id="user_password">
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="Age" name="user_age" type="number" value="" id="user_age">
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="Mobile No" name="user_mobile" type="number" value="" id="user_mobile">
                              </div>

                              <div class="form-group">
                                Select Country:
                                <select id="countries_states1" class=" form-control input-medium bfh-countries" data-country="IN" name="user_country"></select>
                              </div>

                              <div class="form-group">
                                State:
                                <select class="form-control input-medium bfh-states" data-country="countries_states1" name="user_state"></select>
                              </div>

                              <div class="form-group">
                                  Upload profile Picture:<input type="file" name="file" id="fileUpload" onchange="readURL(this);">
                              </div>
                              <img alt="Image Display Here" id="test" src="#"  width="300" height="200" />
                              <br>
                              <br>
                                   
                              <input type="checkbox" class="sub_chk" id="master"> I Agree to the <a href="<?php echo base_url('user/terms'); ?>">Terms and Conditions</a>
                                  <br>
                                  <br>

                              <input class="btn btn-lg btn-success btn-block" type="submit" value="Register" name="register" id="terms">

                          </fieldset>
                      </form>
                      <center><b>Already registered ?</b> <br></b><a href="<?php echo base_url('user/login_view'); ?>">Login here</a></center><!--for centered text-->
                  </div>
              </div>
          </div>
      </div>
  </div>





</span>

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
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        $('#test').attr('src', e.target.result);
       }
        reader.readAsDataURL(input.files[0]);
       }
    }
    $("#register_form").validate({
        rules: {
            user_name: {
                required: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
                lettersonly: true
            },
           
            user_email: {
                required: {
                    depends: function () {
                        $(this).val($.trim($(this).val()));
                        return true;
                    }
                },
                user_email: true,
                remote: {
                    url: "<?php echo base_url(). 'user/check_email_exist_validation' ?>",
                    type: "post",
                    dataType: "json",
                    data: {
                        email: function () {
                            return  $("#user_email").val();
                        }
                    }
                }
            },
            user_password: {
                required: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
                minlength: 4,
                maxlength: 20
            },
             user_age: {
                required: true,
                normalizer: function (value) {
                    return $.trim(value);
                },

            },
             user_mobile: {
                required: true,
                pattern: "/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/",
                normalizer: function (value) {
                    return $.trim(value);
                }
            }
        },
        messages: {
            user_name: {
                required: "The field is required"
            },
           
            user_email: {
                required: "The field is required",
                email: "Invalid email",
                remote: "An account with this email already exists"
            },
            user_password: {
                required: "The field is required",
                minlength: "Minimum length 4 characters",
                maxlength: "Maximum length 20 characters"
            },
             user_age: {
                required: "The field is required",
            },
            user_mobile: {
                required: "The field is required",
                mobile: "Invalid mobile number",
            }
        }
    });
</script>
<script type="text/javascript">
   $(document).ready(function () {
     $('#terms').on('click', function() {

      var x= document.getElementById("master").checked

         if(!x)  

         {
               alert("Please Agree to the terms and conditions to Register"); 

         }

        });
     });
</script>
</html>