<?php


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


// if($_POST['tops'] == 1){
//    $top_options ="Event Management Companies"; 
//    if($_POST['radios_1'] == 1){
//     $sub = 1;
//      $top_sub_options ="Beginner";
//    }else if($_POST['radios_1'] == 2){
//     $sub = 2;
//     $top_sub_options ="Enhanced";
//    }else if($_POST['radios_1'] == 3){
//       $sub = 3;
//     $top_sub_options ="Ultimate"; 
//    }
// }else if($_POST['tops'] == 2){
//     $top_options ="Artist Management Companies";  
//      if($_POST['radios_2'] == 1){
//       $sub = 1;
//      $top_sub_options ="Beginner";
//    }else if($_POST['radios_2'] == 2){
//     $sub = 2;
//     $top_sub_options ="Enhanced";
//    }else if($_POST['radios_2'] == 3){
//     $sub = 3;
//     $top_sub_options ="Ultimate";
//    }
// }else if($_POST['tops'] == 3){
//     $top_options ="Service Providers & Individual Artist"; 
//      if($_POST['radios_3'] == 1){
//       $sub = 1;
//      $top_sub_options ="Beginner";
//    }else if($t$_POST['radios_3'] == 2){
//     $sub = 2;
//     $top_sub_options ="Enhanced";
//    }else if($_POST['radios_3'] == 3){
//     $sub = 3;
//     $top_sub_options ="Ultimate";
//    }
// }

$fname = $_POST['fname'];
$lname =$_POST['lname'];
$email =$_POST['email_id'];
$contact_number =$_POST['contact_number'];
$city =$_POST['city_name'];
$subject =$_POST['subject'];



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

$mailContent .=" First Name:".$fname."<br>";
$mailContent .="Last Name:".$lname."<br>";
$mailContent .="Email:".$email."<br>";
$mailContent .="contact number:".$contact_number."<br>";
$mailContent .="City:".$city."<br>";
$mailContent .="Subject:".$subject."<br>";


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