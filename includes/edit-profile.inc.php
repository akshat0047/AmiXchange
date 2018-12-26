<?php
session_start(); 
include_once "db.inc.php";
if(isset($_POST['submit']))
{

    if($_POST['firstname']!=$_SESSION['u_first'])
    {
       $sql="UPDATE users SET user_first ='".$_POST['firstname']."' where user_uid='".$_SESSION['u_id']."';";
       $result=mysqli_query($conn,$sql);

    }

    if($_POST['lastname']!=$_SESSION['u_last'])
    {
        $sql="UPDATE users SET user_last ='".$_POST['lastname']."' where user_uid='".$_SESSION['u_id']."';";
        $result=mysqli_query($conn,$sql);
        
    }

    if($_POST['email']!=$_SESSION['u_email'])
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
        $sql="UPDATE users SET user_email ='".$_POST['email']."' where user_uid='".$_SESSION['u_id']."';";
        $result=mysqli_query($conn,$sql);
        }
        else{
            $errmsg="INVALID EMAIL";
        }
    }

    if(!empty($_POST['password']))
    {
      if(($_POST['password']==$_SESSION['u_pwd']) && ($_POST['passwordnew']==$_POST['passwordrenew']))
      {
        $sql="UPDATE users SET user_pwd ='".$_POST['passwordrenew']."' where user_uid='".$_SESSION['u_id']."';";
        $result=mysqli_query($conn,$sql);
      }
        
    }

    if($_POST['course']!=$_SESSION['u_course'])
    {
        $sql="UPDATE users SET user_course ='".$_POST['course']."' where user_uid='".$_SESSION['u_id']."';";
        $result=mysqli_query($conn,$sql);
        
    }

    if($_POST['semester']!=$_SESSION['u_semester'])
    {
        $sql="UPDATE users SET user_semester ='".$_POST['semester']."' where user_uid='".$_SESSION['u_id']."';";
        $result=mysqli_query($conn,$sql);
        
    }

    if($_POST['phone']!=$_SESSION['ph_no'])
    {
        $sql="UPDATE users SET user_phone ='".$_POST['phone']."' where user_uid='".$_SESSION['u_id']."';";
        $result=mysqli_query($conn,$sql);
        
    }
    
    header("Location: session-reset.inc.php?");
}
?>