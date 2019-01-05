<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');
if(isset($_POST["submit"])){
include_once "email-verification.inc.php";
include_once "db.inc.php";

$unm= mysqli_real_escape_string($conn,$_POST["username"]);
$pwd= mysqli_real_escape_string($conn,$_POST["password"]);
$email= mysqli_real_escape_string($conn,$_POST["email"]);
$course= mysqli_real_escape_string($conn,$_POST["course"]);
$sem= mysqli_real_escape_string($conn,$_POST["semester"]);
$first=mysqli_real_escape_string($conn,$_POST["firstname"]);
$last=mysqli_real_escape_string($conn,$_POST["lastname"]);

if(empty($unm)||empty($pwd)||empty($email)||empty($course)||empty($sem)||empty($first)||empty($last)){
  header("Location: ../signup.php");
  exit();
}
else{
      //check if input characters are valid

      if(!preg_match("/^[a-zA-Z]*$/",$first))
      {
        header("Location: ../signup.php?fnameerr=Invalid");
        exit();
      }
      else if(!preg_match("/^[a-zA-Z]*$/",$last)){
        header("Location: ../signup.php?lnameerr=Invalid");
        exit();
      }
      else{
        if(!(strlen($pwd)<6))
      {
        //checking Email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
          {
            header("Location: ../signup.php?emailerr=Invalid");
            exit();
          }
          else{
            if(!preg_match("/student.amity.edu/",$email))
            {
              header("Location: ../signup.php?emailerr=NOT AMIZONE EMAIL");
              exit();
            }
          else{            
          $sql= "SELECT user_first FROM users WHERE user_email='$email'";
          $result= mysqli_query($conn,$sql);
          $resultCheck = mysqli_num_rows($result);
          if($resultCheck > 0){
            header("Location: ../signup.php?emailerr=EMAIL TAKEN");
            exit();
          }
      else{

           $sql= "SELECT user_first FROM users WHERE user_uid='$unm'";
           $result= mysqli_query($conn,$sql);
           $resultCheck = mysqli_num_rows($result);

           if($resultCheck > 0){
             header("Location: ../signup.php?ut=USER TAKEN");
             exit();
           }
           else{
             //insert the user into database
             $at=rand(1000,100000);
             $pwd=password_hash($pwd,PASSWORD_DEFAULT);
             $sql = "INSERT INTO users(user_uid,user_pwd,user_first,user_last,user_email,user_course,user_semester)VALUES('$unm','$pwd','$first','$last','$email','$course',$sem);";
             $sql1= "INSERT INTO verification(user_uid,user_at,user_rc,user_ev,user_pv)VALUES('$unm',$at,0,1,1);";
             mysqli_query($conn,$sql);
             mysqli_query($conn,$sql1);
             verify_email($email,$at,$unm);
             header("Location: ../login.php?signup=success");
             exit();
           }
      }
    }}}
    else{
      header("Location: ../signup.php?pwd=atleast 6 characters");
             exit();
    }
      }
}
}
 else{
header("Location: ../signup.php?reply=You_Cant_See_Me;)");
exit();
}


 ?>
