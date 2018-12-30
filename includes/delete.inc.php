<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');
session_start();
include_once "db.inc.php";

   $sql="select idno,Product_Pic from advertisements where user_uid='".$_SESSION['u_id']."';";
   $result=mysqli_query($conn,$sql);
   $resultcheck=mysqli_num_rows($result);
   if($resultcheck>0)
   {
       while($row=mysqli_fetch_assoc($result))
       {
           if($_GET['id']==$row['idno'])
           {  
               $file="../assets/Products/".$_SESSION['u_id'].'/'.$row['Product_Pic'];
               chmod($file, 0644);
               unlink($file);
               $del_sql="delete from advertisements where idno=".$row['idno'];
               $del_result=mysqli_query($conn,$del_sql);
               header('Location: advertisement.inc.php');  
               
           }
       }
   }
?>