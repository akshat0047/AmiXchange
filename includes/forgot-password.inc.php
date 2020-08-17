<?php 
# Include the Autoloader 
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');
require 'vendor/autoload.php';
require 'db.inc.php';
use Mailgun\Mailgun;

if(isset($_POST['submit']))
{
    $rescue=$_POST['rescue'];
function forgot_pwd_email($user,$email,$token)
{
# Instantiate the client.
$mgClient = new Mailgun('92b581566e7ab071379b2e661641d718-49a2671e-e4405271');
$domain = "verify.amixchange.me";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
	'from'    => 'AmiXchange<AmiXchange@verify.amixchange.me>',
	'to'      =>  $email,
	'subject' => 'Password Reset',
    'text'    => 'AmiXchange,
                  http://www.amixchange.me/password-reset.php?user='.$user.'&tk='.$token.'

                  Click on the link above to reset your password
                  Do Not share the link for security reasons.'
));
}
$sql="SELECT user_uid,user_email FROM users WHERE (user_uid="."'".$rescue."' OR user_email="."'".$rescue."');";
$result=mysqli_query($conn,$sql);
$check=mysqli_num_rows($result);
if($check>0)
{  $rp = rand(100000, 999999);
   $row=mysqli_fetch_assoc($result);
   forgot_pwd_email($row['user_uid'],$row['user_email'],$rp);
   mysqli_query($conn,"UPDATE verification SET user_at=".$rp." WHERE user_uid='".$row['user_uid']."';");
   header("Location: forgot-password.php?msg=sent");
}
else{
    
}
}
?>
