<?php
session_start();
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
       $sql="SELECT * FROM users WHERE user_uid='$unm'";
       $result=mysqli_query($conn,$sql);
       $resultcheck=mysqli_num_rows($result);
       if($result<1){
         header("location: ../login.php?login=error");
         exit();
       }
       else{
            $row=mysqli_fetch_assoc($result);
             $_SESSION["u_id"]= $row["user_uid"];
             $_SESSION["u_first"]= $row["user_first"];
             $_SESSION["u_last"]= $row["user_last"];
             $_SESSION["u_email"]= $row["user_email"];
             $_SESSION["u_course"]= $row["user_course"];
             $_SESSION["u_semester"]= $row["user_semester"];
             header("Location: ../profile.php?login=success");
             exit();


         }
       }

}
  else{
    header("Location: ../index.php?login=success");
    exit();
  }

?>
