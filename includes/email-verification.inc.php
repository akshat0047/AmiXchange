<?php 
# Include the Autoloader 
require 'vendor/autoload.php';
use MailgunMailgun;

function verify_email($email,$token,$user)
{
# Instantiate the client.
$mgClient = new Mailgun('92b581566e7ab071379b2e661641d718-49a2671e-e4405271');
$domain = "verify.amixchange.me";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
	'from'    => 'verify.amixchange.me',
	'to'      => "'".$email."'",
	'subject' => 'Email Verification',
    'text'    => 'AmiXchange,
                  https://www.amixchange.com/email-verified.inc.php?user='.$user.'&tk='.$token.'

                  Click on the link above to verify your email and proceed with your dealings on AmiXchange.me
                  Happy Selling!!'
));
}
?>