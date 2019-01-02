<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');
session_start();
if (isset($_POST["submit"])){
  
  include_once "db.inc.php";
  $unm=mysqli_real_escape_string($conn,$_POST["username"]);
  $pwd=mysqli_real_escape_string($conn,$_POST["password"]);

  //error handlers
  if(empty($unm) || empty($pwd)){
 header("location: ../login.php");
 exit();
  }
  else{
       $sql="SELECT * FROM users WHERE ((user_uid='".$unm."'|| user_email='$unm')&&(user_pwd='".$pwd."'));";
       $result=mysqli_query($conn,$sql);
       $resultcheck=mysqli_num_rows($result);
       if($resultcheck<1){
         if(mysqli_num_rows(mysqli_query($conn,"SELECT user_first from users WHERE (user_uid='$unm'|| user_email='$unm')"))==0)
         {
         header("location: ../login.php?usererr=INVALID");
         exit();
         }
         else{
         header("location: ../login.php?pwderr=INVALID");
         exit();
         }
       }
       else{
            $row=mysqli_fetch_assoc($result);
             $_SESSION["u_id"]= $row["user_uid"];
             $_SESSION["u_first"]= $row["user_first"];
             $_SESSION["u_last"]= $row["user_last"];
             $_SESSION["u_pwd"]= $row["user_pwd"];
             $_SESSION["u_email"]= $row["user_email"];
             $_SESSION["u_course"]= $row["user_course"];
             $_SESSION["u_semester"]= $row["user_semester"];
             $_SESSION['u_dp']=$row["user_dp"];
             header("Location: ../profile.php");
             exit();
         }
       

}
}
  else{
    header("Location: ../index.php?reply=You Cant See Me");
    exit();
  }

?>
