<!DOCTYPE html> 
<html lang = "en"> 


   <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RESET PASSWORD</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">

<style type="text/css">
  body { 
background: url(http://localhost/project/assets/background/admin.jpg) no-repeat center center fixed #000; 
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
                    <h3 class="panel-title">RESET PASSWORD</h3>
                </div>

                <div class="panel-body">
      <?php 
       if (isset($_POST['submit']))
       {
         echo $this->session->flashdata('email_sent'); 
       }
         echo form_open('/admin/send_mail'); 
      ?> 
       <fieldset>
		<center>
      <div class="form-group"  >
      <input type = "email" name = "email" placeholder="E-mail" required /> <br><br><br>
      <input class="btn btn-lg btn-success" type = "submit" value = "SEND MAIL" name="submit"> 
    </div>
		</center>
  </fieldset>
      <?php 
         echo form_close(); 
      ?> 
  </div>
</div>
</div>
</div>
</div>
   </body>
	
</html>