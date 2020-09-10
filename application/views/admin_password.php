<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RESET PASSWORD</title>
    <!-- Bootstrap CSS -->
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
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">CHANGE PASSWORD</h3>  
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
          <form action="<?php echo base_url('/admin/reset_password'); ?>" method="post" id="reset_password">
          <fieldset>
              <div class="form-group">
                  <input class="form-control" placeholder="E-mail" name="admin_email" type="email" id="admin_email" autofocus required><br>
              </div>
               <div class="form-group">
                  <input class="form-control" placeholder="Old Password" name="admin_old_password" type="password" value="" id="admin_old_password"><br>
                </div>
                <div class="form-group">

                  <input class="form-control" name="admin_password" id="admin_password" type="password" placeholder="New Password"> <br>

              </div>   
      <center><input class="btn btn-lg btn-success" type="submit" value="Submit" name="submit" ></center>

            </fieldset>
        </form> 
             
    </div>
 </div>
</div>
</div>
</div>
 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    
    
  </body>
  
  
 
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
 
<script type="text/javascript">
    $("#reset_password").validate({
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
            },
              admin_old_password: {
                required: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
                minlength: 4,
                maxlength: 20
            }
        },
             messages: {
             admin_password: {
                required: "The field is required",
                minlength: "Minimum length 4 characters",
                maxlength: "Maximum length 20 characters"
            }
             admin_temp_password: {
                required: "The field is required",
                minlength: "Minimum length 4 characters",
                maxlength: "Maximum length 20 characters"
            }
            }
});
</script>
  
</html>