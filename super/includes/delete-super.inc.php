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
       while($row=mysqli_fetch_assoc($result))
       {
           
          
               $file="../../assets/Users/".$row['user_dp'];
               $ads="../../assets/Products/".$_GET['id'];
               unlink($file);
              /* 
               * php delete function that deals with directories recursively
               */
             function delete_files($target) {
               if(is_dir($target)){
                  $files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned

                  foreach( $files as $file ){
                    delete_files( $file );      
                   }
                   } elseif(is_file($target)) {
                                       @chmod($target,0644);
                                       unlink( $target );  
                                             }
                                            }         
               delete_files($ads);
               rmdir($ads);
               $del_sql1="delete from users where user_uid='".$_GET['id']."'";
               $del_sql2="delete from verification where user_uid='".$_GET['id']."'";
               $del_sql3="delete from advertisement where user_uid='".$_GET['id']."'";
               $del_result=mysqli_query($conn,$del_sql1);
               $del_result=mysqli_query($conn,$del_sql2);
               $del_result=mysqli_query($conn,$del_sql3);
               header("Location: logout-super.inc.php");
                   
       }
   }
}
?>