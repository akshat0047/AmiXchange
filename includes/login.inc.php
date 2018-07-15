<?php

if (isset($_POST["submit"])){

  include_once "db.inc.php";

  $unm=mysqli_real_escape_string($conn,$_POST["username"]);
  $pwd=mysqli_real_escape_string($conn,$_POST["password"]);

  //error handlers
  if(empty($unm) || empty($pwd)){
 header("location: ../login.php?login=empty");
 exit();
  }
  else{
       $sql="SELECT * FROM user WHERE user_uid='$unm'";
       $result=mysqli_query($conn,$sql);
       $resultcheck=mysqli_num_rows($result);
       if($result<1){
         header("location: ../login.php?login=error");
         exit();
       }
       else{
         if($row=mysqli_fetch_assoc($result)){
           //de-hashing
           $hashedPwdCheck=password_verify($pwd,$row["user_pwd"]);
           if($hashedPwdCheck == false){
             header("Location: ../login.php?login=error");
             exit();
           }
           else if($hashedPwdCheck == true){
             //log in the users
             $_SESSION["u_id"]= $row[]
           }
         }
       }
  }
}
  else{
    header(location: ../login.php)
  }
