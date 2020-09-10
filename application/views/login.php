<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>LOGIN</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
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
    <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <?php
	              $success_msg= $this->session->flashdata('success_msg');
	              $error_msg= $this->session->flashdata('error_msg');

                  if($success_msg){
                    ?>
                    <div class="alert alert-success">
                      <?php echo $success_msg; ?>
                    </div>
                  <?php
	                  }
	                  if($error_msg){
                    ?>
                    <div class="alert alert-danger">
                      <?php echo $error_msg; ?>
                    </div>
                    <?php
                  }
                  ?>

                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo base_url('user/login_user'); ?>" id="login_form">
                      <?php echo validation_errors(); ?>  
                      <?php echo form_open('form'); ?>  
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="E-mail" name="user_email" type="email" autofocus id="user_email">
                            </div>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="Name" name="user_name" type="text" autofocus id="user_name">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="user_password" type="password" value="" id="user_password">
                            </div>


                                <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >

                        </fieldset>
                    </form>
                <center><b>Not registered ?</b> <br></b><a href="<?php echo base_url('user'); ?>">Register here</a></center><!--for centered text-->
                <center><b>Forgot Password? </b> <br></b><a href="<?php echo base_url('user/send_mail'); ?>">Reset here</a></center>
                </div>
            </div>
        </div>
    </div>
</div>

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
    $("#login_form").validate({
        rules: {
            user_email: {
                required: {
                    depends: function () {
                        $(this).val($.trim($(this).val()));
                        return true;
                    }
                },

                user_email: true,
                remote: {
                    url: "<?php echo base_url() . 'user/valid_email' ?>",
                    type: "post",
                    dataType: "json",
                    data: {
                        email: function () {
                            return  $("#user_email").val();
                        }
                    }
                }
            },

             user_name: {
                required: {
                    depends: function () {
                        $(this).val($.trim($(this).val()));
                        return true;
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
            }

        },
        messages: {
            user_email: {
                required: "The field is required",
                email: "Invalid email",
                remote: "An account with this email not exists"
            },
            user_name: {
                required: "The field is required"
            },
            user_password: {
                required: "The field is required",
                minlength: "Minimum length 4 characters",
                maxlength: "Maximum length 20 characters"
            }
        }
    });
</script>
<script>
    history.pushState(null, null, null);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, null);
    });
</script>
</html>