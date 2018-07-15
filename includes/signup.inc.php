<?php

if(isset($_POST["submit"])){

include_once "db.inc.php";

$unm= mysqli_real_escape_string($conn,$_POST["username"]);
$pwd= mysqli_real_escape_string($conn,$_POST["password"]);
$email= mysqli_real_escape_string($conn,$_POST["email"]);
$course= mysqli_real_escape_string($conn,$_POST["course"]);
$sem= mysqli_real_escape_string($conn,$_POST["semester"]);
$first=mysqli_real_escape_string($conn,$_POST["firstname"]);
$last=mysqli_real_escape_string($conn,$_POST["lastname"]);

if(empty($unm)||empty($pwd)||empty($email)||empty($course)||empty($first)||empty($last)){
  header("Location: ../index?signup=empty");
  exit();
}
else{
      //check if iput characters are valid

      if(!preg_match("/^[a-zA-Z]*$/",$first)||!preg_match("/^[a-zA-Z]*$/",$course)||!preg_match("/^[a-zA-Z]*$/",$last))
      {
        header("Location: ../index.php?signup=invalid");
        exit();
      }
      else{
        //checking Email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location ../index.php?signup=email");
        exit();
      }
      else{

           $sql= "SELECT * FROM users WHERE USERNAME='$unm'";
           $result= mysqli_query($conn,$sql);
           $resultCheck = mysqli_num_rows($result);

           if($resultCheck > 0){
             header("Location: ../index.php?signup=usertaken");
             exit();
           }
           else{
             //hashing Password
             $hashedPwd= password_hash($pwd, PASSWORD_DEFAULT);
             //insert the user into database
             $sql = "INSERT INTO users(user_uid,user_pwd,user_first,user_last,user_email,user_course,user_semester)VALUES('$unm','$pwd','$first','$last','$email','$course','$sem');";
             mysqli_query($conn,$sql);

             header("Location: ../index.php?signup=success");
             exit();
           }
      }
      }
}


} else{

header("Location: ../index.php?signup=notset");
exit();
}


 ?>
