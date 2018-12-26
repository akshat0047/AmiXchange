<?php
session_start();
include_once "db.inc.php";
if(isset($_FILES["displaypic"]))
{
$dpname= $_FILES["displaypic"]["name"];
$dptmpname= $_FILES["displaypic"]["tmp_name"];
$dpsize= $_FILES["displaypic"]["size"];
$dperror= $_FILES["displaypic"]["error"];
$dptype= $_FILES["displaypic"]["type"];


$namelogy=explode('.',$dpname);
$dpext= strtolower(end($namelogy));
$allowtype=array('jpg');

if(in_array($dpext,$allowtype))
{
  if($dperror==0){
      if($dpsize > 3000){

         $dpdestination="../assets/member_dp/";
         $dpname=$_SESSION['u_id'].".".$dpext;
         move_uploaded_file($dptmpname,$dpdestination.$dpname);
         $_SESSION['u_dp']=$dpname;
         header("Location: ../profile.php?upload=success");
      }
      else{
        echo "FIle size too big";
      }
  }
  else{
    echo "Problem uploading file";
  }
}
else{
  echo "File type not allowed";
}
}
else{
header("Location: ../profile.php?upload=no");
}


?>
