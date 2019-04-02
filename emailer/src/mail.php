<?php 



$name =$_POST['name'];
$email =$_POST['email'];
$cname =$_POST['message'];
$cnumber =$_POST['cnumber'];

//mail

require 'PHPMailer.php';
require 'PHPMailerAutoload.php';
require  'SMTP.php';

$mail = new PHPMailer;
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth=true;
$mail->Username = 'suresh.ramesh1308@gmail.com';   
$mail->Password = '12345678@aA';   
$mail->Port = 465;

// Email subject
$mail->Subject = 'Enquiry';

$mail->setFrom('suresh.ramesh1308@gmail.com');


// Add a recipient
$mail->addAddress('manisha.yadav@magitt.in');

$mailContent='';

$mailContent .="Name:".$name."<br>";
$mailContent .="Email:".$email."<br>";
$mailContent .="Number:".$cnumber."<br>";
$mailContent .="Message:".$cname."<br>";

$mail->Body = $mailContent;

$mail->isHTML(true);

// Email body content



// Send email
if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
   
 
   echo "<script>
 alert('Thank You Will Get Back To You Soon!');
 window.location ='http://bunnyspeaks.com/elemech/#contact';</script>";
}
 


?>
