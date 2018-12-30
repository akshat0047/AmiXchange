<?php

session_start();
if(isset($_POST['submit']))
{
  if(isset($_GET['ad']))
  {
    echo('<script>window.alert("ADVERTISEMENT POSTED");</script>');
  }
  include_once "db.inc.php";

  $pn=mysqli_real_escape_string($conn,$_POST["productname"]);
  if(mysqli_num_rows(mysqli_query($conn,"SELECT Product_Name from advertisements where ((user_uid='".$_SESSION['u_id']."')&&(Product_Name='".$pn."'))"))>0)
  {
    header("Location: ../add.php?pn=Already Exists");
    exit();
  }
  else{
  $pt=mysqli_real_escape_string($conn,$_POST["producttype"]);
  $ptsp=mysqli_real_escape_string($conn,$_POST["tsp"]);
  $pp=mysqli_real_escape_string($conn,$_POST["price"]);
  $pds=mysqli_real_escape_string($conn,$_POST["description"]);
  $ppn=mysqli_real_escape_string($conn,$_FILES["productpic"]["name"]);
  $pptn=mysqli_real_escape_string($conn,$_FILES["productpic"]["tmp_name"]);
  $pps=mysqli_real_escape_string($conn,$_FILES["productpic"]["size"]);
  $ppe=mysqli_real_escape_string($conn,$_FILES["productpic"]["error"]);
  $ppt=mysqli_real_escape_string($conn,$_FILES["productpic"]["type"]);
  $name=explode('.',$ppn);
  $ppext=strtolower(end($name));
  $allowtype=array('png','jpg','jpeg');

  if(empty($pn)||empty($pt)||empty($ptsp)||empty($pds)||empty($pp)){
    header("Location: ../add.php?fields=empty");
    exit();
  }
  else{
        //check if input characters are valid
        if(!preg_match("/^[a-zA-Z]*/",$pn))
        {
          header("Location: ../add.php?pnerr=invalid");
          exit();
        }
        else{
          if(in_array($ppext,$allowtype))
          {
            if($ppe==0){
                if($pps > 3000){
                  $dest="../assets/Products/".$_SESSION['u_id']."/";
                  $ppnewname=$pn.'.'.$ppext;
                  if(! is_dir($dest))
                  {
                     mkdir($dest);
                  }
                  echo($dest);
                  move_uploaded_file($pptn,$dest.$ppnewname);
                  $sql="INSERT INTO advertisements(user_uid,Product_Name,Product_Type,Product_Description,time_since_purchase,Product_Pic,Product_Price)VALUES"."('".$_SESSION['u_id']."','$pn','$pt','$pds',".DATE."'".$ptsp."'".",'$ppnewname',$pp);";
                  $result=mysqli_query($conn,$sql);
                 
                  
                  header("Location: ../add.php?ad=success");
                  exit();
                }
                else{
                  header("Location: ../add.php");
                }


  }


        }



      }}}}
else{
  header("Location: ../profile.php?upload=crashed");
}
?>