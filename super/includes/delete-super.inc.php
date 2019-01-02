<?php
session_start();
include_once "db.inc.php";

   $sql="select user_dp from users where user_uid='".$_GET['del-user']."';";
   $result=mysqli_query($conn,$sql);
   $resultcheck=mysqli_num_rows($result);
   if($resultcheck>0)
   {
       while($row=mysqli_fetch_assoc($result))
       {
           if(isset($_SESSION['token']))
           {
          
               $file="../../assets/Users/".$_GET['del-user'];
               chmod($file, 0644);
               unlink($file);
               $del_sql="delete from users where user_uid=".$_GET['del-user'];
               $del_result=mysqli_query($conn,$del_sql);
               header('Location: ../index.php');  
               
           }
        
       }
   }
?>