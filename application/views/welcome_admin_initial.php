<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WELCOME ADMIN</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
  </head>
  <body>

    <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Admin Panel</h3>
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
                    <fieldset>
                    <form role="form" method="post" action="<?php echo base_url('admin/manage_plan'); ?>" id="manage_plan_form">
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Manage Plans" name="plan" >                     
                    </form>
                    <br>

                    <form role="form" method="post" action="<?php echo base_url('admin/manage_user'); ?>" id="manage_user_form">
                      
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Manage Users" name="plan" >                     
                    </form>
                    </fieldset>
                
                </div>
            </div>
        </div>
    </div>
</div>


  </body>
 
</html>