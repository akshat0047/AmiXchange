<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');
session_start();
include_once "db.inc.php";

   $sql="select idno,book_pic from advertisements where user_uid='".$_SESSION['u_id']."';";
   $result=mysqli_query($conn,$sql);
   $resultcheck=mysqli_num_rows($result);
   if($resultcheck>0)
   {
       while($row=mysqli_fetch_assoc($result))
       {
           if($_GET['id']==$row['idno'])
           {  
               $file="../assets/books/".$row['book_pic'];
               chmod($file, 0644);
               unlink($file);
               $del_sql="delete from advertisements where idno=".$row['idno'];
               $del_result=mysqli_query($conn,$del_sql);
               header('Location: advertisement.inc.php');  
               
           }
       }
   }
?>