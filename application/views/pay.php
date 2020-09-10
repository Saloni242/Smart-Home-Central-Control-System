<?php 
$product_name = $_POST["product_name"];
$price = $_POST["product_price"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$num = $_POST["num"];
$id = $_POST["id"];


include 'src/instamojo.php';

$api = new Instamojo\Instamojo('test_fbb76c7b5690518f4afacaea4b4', 'test_f6b43cd07110717ed0341eb16d0','https://test.instamojo.com/api/1.1/');


try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $product_name,
        "amount" => $price,
        "buyer_name" => $name,
        "phone" => $phone,
        "send_email" => true,
        "send_sms" => true,
        "email" => $email,
        'allow_repeated_payments' => false,
        "redirect_url" => "http://35.154.40.14/instamojo/thankyou.php",
        //"webhook" => "http://localhost/project/user/webhook.php"
        ));
    //print_r($response);

    $pay_ulr = $response['longurl'];
    
    //Redirect($response['longurl'],302); //Go to Payment page

    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('user_email',$email);
    $query=$this->db->get();
   
    if($query->num_rows()>0){
      $data=$this->db->simple_query("UPDATE userlog SET status=1,subscription_date=curdate(),plan=".$id.",expire_date=DATE_ADD(curdate(), INTERVAL ".$num." MONTH) WHERE name = '" .$name."'");

      $data1 = $this->db->simple_query("INSERT into transaction(user_email,plan,amount,created_at,updated_at) VALUES ('".$email."','".$product_name."',".$price.",curdate(),NOW())");
    }else{
      $data=$this->db->simple_query("UPDATE userlog SET status=0,subscription_date='0000-00-00' WHERE name = '" .$name."'");
    }
    header("Location: $pay_ulr");
    exit();

}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}     
  ?>