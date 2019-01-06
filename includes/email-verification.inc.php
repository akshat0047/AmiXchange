<?php 
# Include the Autoloader 
require 'vendor/autoload.php';
use Mailgun\Mailgun;

function verify_email($email,$token,$user)
{
# Instantiate the client.
$mgClient = new Mailgun('92b581566e7ab071379b2e661641d718-49a2671e-e4405271');
$domain = "verify.amixchange.me";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
	'from'    => 'AmiXchange<AmiXchange@verify.amixchange.me>',
	'to'      =>  $email,
	'subject' => 'Email Verification',
    'text'    => 'AmiXchange,
                  https://www.amixchange.me/includes/email-verified.inc.php?user='.$user.'&tk='.$token.'

                  Click on the link above to verify your email and proceed with your dealings on www.amixchange.me
                  Happy Selling!!'
));
}
?>