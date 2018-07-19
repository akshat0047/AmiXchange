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
$allowtype=array('jpg','jpeg','png');

if(in_array($dpext,$allowtype))
{
  if($dperror==0){
      if($dpsize < 3000){
         $dpnewname= uniqid('',true).'.'.$dpext;
         $dpdestination="assets/".$dpnewname;
         move_uploaded_file($dptmpname,$dpdestination);
         $sql="INSERT INTO extra(user_dp)VALUES($dpnewname);";
         $result=mysqli_query($conn,$sql);
         $dps=mysqli_fetch_assoc($result);
         $_SESSION['u_dp']=$dps["user_dp"];
         header("Location: profile.php?upload=success")
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
header("Location: profile.php?upload=np");
}

?>
