<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');
session_start();
if(isset($_POST['submit']))
{
  include_once "db.inc.php";
  $unm=$_SESSION['u_id'];
  $pn=mysqli_real_escape_string($conn,$_POST["productname"]);
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
    $date=$ptsp;
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
                if($pps < 2000000){
                  $dest="../assets/Products/";
                  $time = date("Y-m-d H:i:s");
                  $ppnewname=$time."-".$pn.'.'.'jpg';
                  /*
                  $im = new Imagick($pptn);

                 // Optimize the image layers
                 $im->optimizeImageLayers();

                // Compression and quality
                 $im->setImageCompression(Imagick::COMPRESSION_JPEG);
                 $im->setImageCompressionQuality(25);

                // Write the image back
                  $im->writeImages($dest.$ppnewname, true);
                  */
                  move_uploaded_file($pptn, $dest.$ppnewname);
                  $sql="INSERT INTO advertisements(user_uid,Product_Name,Product_Type,Product_Description,time_since_purchase,Product_Pic,Product_Price)VALUES('$unm','$pn','$pt','$pds','$date','$ppnewname',$pp);";
                  $result=mysqli_query($conn,$sql);
                  if($result===false)
                  die("Database Connection Error, Inform Admin");
                  header("Location: ../add.php?ad=success");                 
                }
                else{
                  header("Location: ../add.php?imerr=upload below 2 mb");
                  exit();
                }


  }
else{
  header("Location: ../add.php?fail=yes");
}
        }



      }}}
else{
  header("Location: ../add.php?upload=crashed");
}
?>