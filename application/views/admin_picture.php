 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CHANGE PROFILE PICTURE</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/js/bootstrap-formhelpers.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/css/bootstrap-formhelpers.css" rel="stylesheet"/>


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
                    <h3 class="panel-title">CHANGE PROFILE PICTURE</h3>
                </div>

                <div class="panel-body">
         			<center>
					  <form role="form" method="post" action="<?php echo base_url('admin/change_profile_picture'); ?>" id="uploadForm" enctype=multipart/form-data>
					      <fieldset>
							 <div class="form-group">


								Upload File:<br><br><br><input type="file" name="file" required="true" id="fileUpload" onchange="readURL(this);">
							</div>
							<br>
               <img alt="Image Display Here" id="test" src="#"  width="300" height="200" />
               <br>
               <br>

						  <input class="btn btn-lg btn-success" type="submit" value="Upload" name="upload" >
              

					      </fieldset>
					  </form>
					</center>
					

</body>
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

</script>
</html>