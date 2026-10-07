
<?php 

include('config.php');

// New

include_once('easebuzz-lib/easebuzz_payment_gateway.php');
/*
Enter The SALT 
*/

// prod
$SALT = "REPLACE_WITH_PRIVATE_VALUE";

// test
// $SALT = "REPLACE_WITH_PRIVATE_VALUE";

$easebuzzObj = new Easebuzz($MERCHANT_KEY = null, $SALT, $ENV = null);
$result = $easebuzzObj->easebuzzResponse( $_POST );
/*
$result jeson Data
*/
// print_r($result);
 $result = json_decode($result, true);
//  print_r($result);
//echo "<h1>EaseBuzz</h1>"; 
$chk_tx=$result["data"]["status"];
if($chk_tx=="success")
{

      
           $name = $result["data"]["firstname"];
           $tId = $result["data"]["txnid"];
           $easebuzzpayid = $result["data"]["easepayid"];
           $email = $result["data"]["email"];
           $phone = $result["data"]["phone"];
           $amount = $result["data"]["amount"];
           $product_name = $result["data"]["productinfo"];
           $paymentfor = $result["data"]["udf1"];
           $status = "Success";
           
           $sql = mysqli_query($con,"INSERT INTO payonline (name, transactionId, easebuzzpayid, email, phone, amount, product_name, paymentfor, status) 
                   VALUES ('$name', '$tId', '$easebuzzpayid', '$email','$phone', '$amount', '$product_name', '$paymentfor', '$status')")or die("Please Contact Administrator.");
           
      
   echo "
             <script type='text/javascript'>
                     window.location ='transaction.php?q=transaction-successful&tId=".$tId."'
             </script>
            ";
    
    
}
elseif ($chk_tx=="userCancelled")
{ 


           $name = $result["data"]["firstname"];
           $tId = $result["data"]["txnid"];
           $easebuzzpayid = $result["data"]["easepayid"];
           $email = $result["data"]["email"];
           $phone = $result["data"]["phone"];
           $amount = $result["data"]["amount"];
           $product_name = $result["data"]["productinfo"];
           $paymentfor = $result["data"]["udf1"];
           $status = "Cancelled";
           
           $sql = mysqli_query($con,"INSERT INTO payonline (name, transactionId, easebuzzpayid, email, phone, amount, product_name, paymentfor, status) 
                   VALUES ('$name', '$tId', '$easebuzzpayid', '$email','$phone', '$amount', '$product_name', '$paymentfor', '$status')")or die("Please Contact Administrator.");
       


       

       echo "
             <script type='text/javascript'>
                     window.location ='transaction.php?q=transaction-cancelled'
             </script>
            ";

}

 elseif ($chk_tx=="failure")
{ 
           

           $name = $result["data"]["firstname"];
           $tId = $result["data"]["txnid"];
           $easebuzzpayid = $result["data"]["easepayid"];
           $email = $result["data"]["email"];
           $phone = $result["data"]["phone"];
           $amount = $result["data"]["amount"];
           $product_name = $result["data"]["productinfo"];
           $paymentfor = $result["data"]["udf1"];
           $status = "Failure";
           
           $sql = mysqli_query($con,"INSERT INTO payonline (name, transactionId, easebuzzpayid, email, phone, amount, product_name, paymentfor, status) 
                   VALUES ('$name', '$tId', '$easebuzzpayid', '$email','$phone', '$amount', '$product_name', '$paymentfor', '$status')")or die("Please Contact Administrator.");

       

       echo "
             <script type='text/javascript'>
                     window.location ='transaction.php?q=transaction-failure'
             </script>
            ";
}
 ?>