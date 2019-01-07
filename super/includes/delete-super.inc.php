<?php
session_start();
include_once "db.inc.php";
if(($_SESSION['u_sid']=="AmiXchange") && ($_GET['ur']=="/AmiXchange/super/home-super.php"))
{
   $sql="select user_dp from users where user_uid='".$_GET['id']."';";
   $result=mysqli_query($conn,$sql);
   $resultcheck=mysqli_num_rows($result);
   if($resultcheck>0)
   {
    $row=mysqli_fetch_assoc($result); 
    $file="../../assets/Users/".$row['user_dp'];
    $ads="../../assets/Products/";
    unlink($file);
    $sql1="select Product_Pic from advertisements where user_uid='".$_GET['id']."';";
    $result1=mysqli_query($conn,$sql1);
    $resultcheck1=mysqli_num_rows($result1);
    if($resultcheck1>0)
    {
     while($row1=mysqli_fetch_assoc($result))
     {
      $file1="../../assets/Products/".$row1['Product_Pic'];
      unlink($file);
     }                       
               $del_sql1="delete from users where user_uid='".$_GET['id']."'";
               $del_sql2="delete from verification where user_uid='".$_GET['id']."'";
               $del_sql3="delete from advertisements where user_uid='".$_GET['id']."'";
               $del_result=mysqli_query($conn,$del_sql1);
               $del_result=mysqli_query($conn,$del_sql2);
               $del_result=mysqli_query($conn,$del_sql3);
               header("Location: logout-super.inc.php");
                   
       }
   }
  }
?>