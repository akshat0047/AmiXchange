<?php
session_start();
include_once "db.inc.php";
if(isset($_FILES["displaypic"]))
{
$dpname= mysqli_real_escape_string($conn,$_FILES["displaypic"]["name"]);
$dptmpname= mysqli_real_escape_string($conn,$_FILES["displaypic"]["tmp_name"]);
$dpsize= mysqli_real_escape_string($conn,$_FILES["displaypic"]["size"]);
$dperror= mysqli_real_escape_string($conn,$_FILES["displaypic"]["error"]);
$dptype= mysqli_real_escape_string($conn,$_FILES["displaypic"]["type"]);


$namelogy=explode('.',$dpname);
$dpext= strtolower(end($namelogy));
$allowtype=array('jpg','jpeg','png');

if(in_array($dpext,$allowtype))
{
  if($dperror==0){
      if($dpsize > 500){

         $dpdestination="../assets/Users/";
         $dpname=$_SESSION['u_id'].".".$dpext;
         move_uploaded_file($dptmpname,$dpdestination.$dpname);
         mysqli_query($conn,"UPDATE users SET user_dp='".$dpname."' WHERE user_uid='".$_SESSION['u_id']."';");

         //Deleting the previous dp if it had some different extension
         foreach($allowtype as $delext)
         {
         if($delext!=$dpext)
         { 
           $file_del='../assets/Users/'.$_SESSION['u_id'].'.'.$delext;
         if(file_exists($file_del))
         {  
            echo($file_del);
            chmod($file_del, 0644);
            unlink($file_del);
         }}
        }
        header("Location: session-reset.inc.php");
      }
      else{
        header("Location: ../profile.php?upload=Upload file under 500kb");
      }
  }
  else{
    header("Location: ../profile.php?upload=Problem uploading file");
  }
}
else{
  header("Location: ../profile.php?upload=jpg/jpeg/png");
}
}
else{
header("Location: ../profile.php?upload=Network Issue");
}



?>
