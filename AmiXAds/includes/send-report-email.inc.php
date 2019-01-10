<?php 
# Include the Autoloader 
require 'vendor/autoload.php';
use Mailgun\Mailgun;

function report_email($reported,$reason,$desc)
{
# Instantiate the client.
$mgClient = new Mailgun('92b581566e7ab071379b2e661641d718-49a2671e-e4405271');
$domain = "verify.amixchange.me";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
	'from'    => 'AmiXchange<AmiXchange@verify.amixchange.me>',
	'to'      => 'pande.akshat21@gmail.com',
	'subject' => 'User Reported',
    'text'    => 'AmiXchange,

                  This user is being reported by the users
                  Name:'.$reported.'
                  Reason:'.$reason.'
                  Description:'.$desc.'

                  Please take the required action'
));
}
?>