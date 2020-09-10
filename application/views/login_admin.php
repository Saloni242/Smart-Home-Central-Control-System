<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login-CI Login Registration</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">


 <style type="text/css">
    

body { 
background: url(../assets/background/admin.jpg) no-repeat center center fixed #000; 
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}
  </style>





  </head>
  <body>

    <div class="container">
    <div class="row" style="margin-top: 143px;">
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
                    <form role="form" method="post" action="<?php echo base_url('admin/login_view'); ?>" id="login_form">
                      <?php echo validation_errors(); ?>  
                      <?php echo form_open('form'); ?>  
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="E-mail" name="admin_email" type="email" autofocus id="user_email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="admin_password" type="password" value="" id="user_password">
                            </div>


                                <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >


                        </fieldset>
                         <center><b>Forgot Password? </b> <br></b><a href="<?php echo base_url('admin/send_mail'); ?>">Reset here</a></center>
                    </form>
                
                </div>
            </div>
        </div>
    </div>
</div>


  </body>
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
 
<script type="text/javascript">
    $("#login_form").validate({
        rules: {
            admin_email: {
                required: {
                    depends: function () {
                        $(this).val($.trim($(this).val()));
                        return true;
                    }
                },
                admin_email: true,
                remote: {
                    url: "<?php echo base_url() . 'admin/valid_email' ?>",
                    type: "post",
                    dataType: "json",
                    data: {
                        email: function () {
                            return  $("#admin_email").val();
                        }
                    }
                }
            },
            admin_password: {
                required: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
                minlength: 4,
                maxlength: 20
            }
        },
        messages: {
            admin_email: {
                required: "The field is required",
                email: "Invalid email",
                remote: "An account with this email not exists"
            },
            admin_password: {
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