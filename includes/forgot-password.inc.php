<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
if(isset($_POST['submit']))
{
$unm= mysqli_real_escape_string($conn,$_POST['rescue']);
$sql="select token from users where (user_uid='".$unm."' OR user_email='".$unm."');";
$result=mysqli_query($conn,$sql);


$mailObj = new PHPMailer;  
$to = "pande.akshat21@gmail.com"; 
$subject = "Reset Password"; 
$msg = "This is simple test mail sending by phpmailer class"; 
$mailObj->AddAddress($to, 'Akshat');
$mailObj->SetFrom('selami.com', 'Selami');
$mailObj->AddReplyTo('pande.akshat21@gmail.com', 'Akshat Pande');
$mailObj->Subject = $subject;
$mailObj->AltBody = 'To view the message, please use an HTML compatible email viewer!'; 
$mailObj->MsgHTML($msg);
 
// SMTP Settings
$mailObj->isSMTP();                                      // Set mailer to use SMTP
$mailObj->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
$mailObj->SMTPAuth = true;                               // Enable SMTP authentication
$mailObj->Username = 'pande.akshat21@gmail.com';         // SMTP username
$mailObj->Password = 'criticaldamageworldwar$';           // SMTP password
$mailObj->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mailObj->Port = 587;
 
$mailObj->Send();
if(!$mailObj->Send()) {
echo "There was an error sending the e-mail";
} else {
echo "E-Mail has been sent successfully";
}
}
?>