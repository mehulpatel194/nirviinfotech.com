<?php

$id = $_GET['id'];


// database script

$servername = "magitt.in";
$username = "alphamag_get";
$password = "XoJ6bx=DK*f%";
$dbname = "alphamag_get";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql1 = "UPDATE register SET status=1 WHERE id='$id'";

if ($conn->query($sql1) === TRUE) {
	
   $sql2 = "SELECT company_type,plans,name,cname,cnumber,email,lcategory,add1, add2, state, district, city, pincode FROM register where id ='$id'";

 $result = $conn->query($sql2);

if($result->num_rows > 0) {

$row = $result->fetch_assoc();

$top_company=$row['company_type'];
$tops = $row['company_type'];
$top_sub_company=$row['plans'];
$name=$row['name'];
$cname=$row['cname'];
$cnumber=$row['cnumber'];
$email=$row['email'];
$multiselect=$row['lcategory'];
$add1=$row['add1'];
$add2=$row['add2'];
$po_tate=$row['state'];
$po_district=$row['district'];
$po_city =$row['po_city'];
$po_pincode =$row['po_pincode'];

}


} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

// database script

// mail start
require 'PHPMailer.php';
require 'PHPMailerAutoload.php';
require  'SMTP.php';

$mail = new PHPMailer;
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth=true;
$mail->Username = 'santosh.magitt@gmail.com';   
$mail->Password = 'santosh__4@qwerty';   
$mail->Port = 465;

// Email subject
$mail->Subject = 'Enquiry';


if($top_company == 1){
   $top_options ="Event Management Companies"; 
   if($top_sub_company == 1){
    $sub = 1;
     $top_sub_options ="Beginner";
   }else if($top_sub_company == 2){
    $sub = 2;
    $top_sub_options ="Enhanced";
   }else if($top_sub_company == 3){
      $sub = 3;
    $top_sub_options ="Ultimate"; 
   }
}else if($top_company == 2){
    $top_options ="Artist Management Companies";  
     if($top_sub_company == 1){
      $sub = 1;
     $top_sub_options ="Beginner";
   }else if($top_sub_company == 2){
    $sub = 2;
    $top_sub_options ="Enhanced";
   }else if($top_sub_company == 3){
    $sub = 3;
    $top_sub_options ="Ultimate";
   }
}else if($top_company == 3){
    $top_options ="Service Providers & Individual Artist"; 
     if($top_sub_company == 1){
      $sub = 1;
     $top_sub_options ="Beginner";
   }else if($top_sub_company == 2){
    $sub = 2;
    $top_sub_options ="Enhanced";
   }else if($top_sub_company == 3){
    $sub = 3;
    $top_sub_options ="Ultimate";
   }
}


//if($multiselect == 'Vendor'){
 // $multiselect = $multiselect.'->'.$_POST['listing1'];
 // }else if($multiselect == 'Artist'){
 //      $multiselect = $multiselect.'->'.$_POST['listing2'];
 // }else{
 //      $multiselect = $multiselect.'->'.$_POST['listing3'];
 // }

$mail->setFrom('santosh.magitt@gmail.com');


// Add a recipient
$mail->addAddress('signup@getserve.in');

$mailContent='';

$mailContent .="Name:".$name."<br>";
$mailContent .="Company Name:".$cname."<br>";
$mailContent .="Company Number:".$cnumber."<br>";
$mailContent .="Email:".$email."<br>";
$mailContent .="Listing Category:".$multiselect."<br>";
$mailContent .="Address 1:".$po_add1."<br>";
$mailContent .="Address 2:".$po_add2."<br>";
$mailContent .="district:".$po_district."<br>";
$mailContent .="City:".$po_city."<br>";
$mailContent .="State:".$po_tate."<br>";
$mailContent .="Pincode:".$po_pincode."<br>";
$mailContent .="Package:".$top_options."<br>";
$mailContent .="Plan:".$top_sub_options."<br>";

$mail->Body = $mailContent;

$mail->isHTML(true);

// Email body content



// Send email
if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
  
  echo "<script>
  alert('Thankyou Your payment is Successful!');
  window.location ='http://getserve.in/';</script>";
  
}


?>