<?php
session_start();
if (isset($_POST["submit"])){
  
  include_once "db.inc.php";
  $unm=mysqli_real_escape_string($conn,$_POST["username"]);
  $pwd=mysqli_real_escape_string($conn,$_POST["password"]);

  //error handlers
  if(empty($unm) || empty($pwd)){
 header("location: ../index.php");
 exit();
  }
  else{
         if($unm!='AmiXchange')
         {
         header("location: ../index.php?usererr=INVALID");
         exit();
         }
         else if($pwd!='amixchangeawsworldwarakshat0047')
         {
         header("location: ../index.php?pwderr=INVALID");
         exit();
         }
       
       else{
             $_SESSION["u_id"]= $unm;
             header("Location: ../home-super.php");
             exit();
         }
       }
      }
  else{
    header("Location: ../index.php?reply=ha ha ha");
    exit();
  }

?>
