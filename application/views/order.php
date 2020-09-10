<?php 

    $prd_name = $records['Title'];
    $price = $records['Price'];
    $id = $records['plan_id'];

	// Price calculation with tax and fee
	$fee = 3 +($price*.02);
	$tax = $fee * .15;
	$tot_price = $fee + $tax + $price;
	$prd_price = round($tot_price,2);
	$num = preg_replace("/[^0-9\.]/", '', $prd_name);
	
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Payment Mojo</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	  </head>

  <body>
    <div class="container">

      <div class="page-header">
        <h1>Instamojo Payment</h1>
      </div>

		<p>
		<b>Product name :</b> <?php echo $prd_name;?>
		</p>
		<p>
		<b>Price : </b> <?php echo $price; ?> INR
		</p>
		<p><b>Bank Fee : </b> <?php echo $tax + $fee ; ?> INR <small> (Rs: 3 + 2% of fee + 15% Service Tax)</small></p>

		<p><b>Total : </b> <?php echo $prd_price; ?> INR </p>
		<?php 
       $name = $this->session->userdata('user_name');?>

		<h3>Your Payment Details </h3>
		<hr>
		<form action="<?php echo base_url()?>user/pay" method="POST" accept-charset="utf-8">
	
			<input type="hidden" name="product_name" value="<?php echo $prd_name; ?>"> 
			<input type="hidden" name="product_price" value="<?php echo $prd_price; ?>"> 
			<input type="hidden" name="num" value="<?php echo $num; ?>"> 
			<input type="hidden" name="id" value="<?php echo $id; ?>"> 

			<div class="form-group">
	    	<label>Your Name</label>
	   		<input type="text" class="form-control" name="name"  value="<?php echo $name;?>" readonly>	 <br/>
			</div>

			<div class="form-group">
	    	<label>Your Phone</label>
	   		<input type="text" class="form-control" name="phone" placeholder="Enter your phone number"> <br/>
			</div>


			<div class="form-group">
	    	<label>Your Email</label>
	   		<input type="email" class="form-control" name="email" placeholder="Enter your email"> <br/>
			</div>

		  
			<input type="submit" class="btn btn-success btn-lg" value="Click here to Pay <?php echo $prd_price; ?> INR">

		</form>
	 <br/>
	 <br/>     
    </div> <!-- /container -->


  </body>
</html>
