<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');
include_once "db.inc.php";
if(isset($_POST['submit']))
{   $user=$_POST['pwd-reset-user'];
    $newpwd=$_POST['new-pwd'];
    $confnewpwd=$_POST['confirm-new-pwd'];
   if($newpwd==$confnewpwd)
   {   if(strlen($newpwd)<6)
    {
        header("Location: ../password-reset.php?user=".$_POST['pwd-reset-user']."&tk=".$_POST['token']."&rpwderr=atleast 6 characters");
    }
    else{
        mysqli_query($conn,"UPDATE users SET user_pwd="."'".$confnewpwd."' WHERE user_uid="."'".$user."';") or die(mysql_error());;
        header("Location:../login.php?pass=reset");
        exit();
    }
   }
   else{
       header("Location: ../password-reset.php?user=".$_POST['pwd-reset-user']."&tk=".$_POST['token']."&rpwderr=PASSWORD DONT MATCH");
       exit();
   }
}

?>