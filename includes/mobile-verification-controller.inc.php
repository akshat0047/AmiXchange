<?php
session_start();
error_reporting(E_ALL & ~ E_NOTICE);
require ('textlocal.class.php');
include_once "db.inc.php";
class Controller
{
    function __construct() {
        $this->processMobileVerification();
    }
    function processMobileVerification()
    {
        switch ($_POST["action"]) {
            case "send_otp":
                
                $mobile_number = $_POST['mobile_number'];        
                $apiKey = urlencode('vxJhRzta9G0-ta4zLjjMVpKGu8hP8Bhfki3xi11Efk');
                $Textlocal = new Textlocal(false, false, $apiKey);
                
                $numbers = array(
                    $mobile_number
                );
                $_SESSION['ph_no']=$mobile_number;
                $sender = 'TXTLCL';
                $otp = rand(100000, 999999);
                $_SESSION['session_otp'] = $otp;
                $message = "Your One Time Password is " . $otp;
                
                try{
                    $response = $Textlocal->sendSms($numbers, $message, $sender);
                    require_once ("verification-form.php");
                    exit();
                }catch(Exception $e){
                    die('<div class="error">Error: '.$e->getMessage().'</div>');
                    unset($_SESSION['ph_no']);
                }
                break;
                
            case "verify_otp":
                $otp = $_POST['otp'];
                
                if ($otp == $_SESSION['session_otp']) {
                    unset($_SESSION['session_otp']);
                    mysqli_query($conn,"UPDATE users SET user_phone=".$_SESSION['phone_no']." where user_uid='".$_SESSION['u_id']."'");
                    mysqli_query($conn,"UPDATE verification SET user_mv=0 where user_uid='".$_SESSION['u_id']."'");
                    echo json_encode(array("type"=>"success", "message"=>"Your mobile number is verified!"));
                } else {
                    unset($_SESSION['ph_no']);
                    echo json_encode(array("type"=>"error", "message"=>"Mobile number verification failed"));
                }
                break;
        }
    }
}
$controller = new Controller();
?>