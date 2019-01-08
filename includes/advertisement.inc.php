<?php

session_start();
include_once "db.inc.php";

$sql="SELECT * FROM advertisements WHERE user_uid="."'".$_SESSION['u_id']."'";
$result=mysqli_query($conn,$sql);
$resultcheck= mysqli_num_rows($result);

$Product_Name=array();
$Product_Type=array();
$time_since_purchase=array();
$Product_Description=array();
$Product_Pic=array();
$Product_Price=array();
$idno=array();


if($resultcheck < 1)
{
  header("location: ../profile.php");
  exit();
}
else{
  while($row=mysqli_fetch_assoc($result))
  {
  array_push($Product_Name,$row['Product_Name']);
  array_push($Product_Type,$row['Product_Type']);
  array_push($time_since_purchase,$row['time_since_purchase']);
  array_push($Product_Description,$row['Product_Description']);
  array_push($Product_Pic,$row['Product_Pic']);
  array_push($Product_Price,$row['Product_Price']);
  array_push($idno,$row['idno']);


}

$_SESSION['Product_Name']=$Product_Name;
$_SESSION['Product_Type']=$Product_Type;
$_SESSION['time_since_purchase']=$time_since_purchase;
$_SESSION['Product_Description']=$Product_Description;
$_SESSION['Product_Pic']=$Product_Pic;
$_SESSION['Product_Price']=$Product_Price;
$_SESSION['idno']=$idno;
$_SESSION['ad_count']=$resultcheck;
header("Location: ../my-advertisement.php");
exit();
}
?>
