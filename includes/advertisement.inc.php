<?php

session_start();
include_once "db.inc.php";

$sql="SELECT * FROM advertisements WHERE user_uid="."'".$_SESSION['u_id']."'";
$result=mysqli_query($conn,$sql);
$resultcheck= mysqli_num_rows($result);

$book_name=array();
$writer_name=array();
$edition=array();
$time_since_purchase=array();
$book_description=array();
$book_pic=array();
$book_price=array();
$idno=array();


if($resultcheck < 1)
{
  header("location: ../profile.php");
  exit();
}
else{
  while($row=mysqli_fetch_assoc($result))
  {
  array_push($book_name,$row['book_name']);
  array_push($writer_name,$row['writer_name']);
  array_push($edition,$row['book_edition']);
  array_push($time_since_purchase,$row['time_since_purchase']);
  array_push($book_description,$row['book_description']);
  array_push($book_pic,$row['book_pic']);
  array_push($book_price,$row['book_price']);
  array_push($idno,$row['idno']);


}

$_SESSION['book_name']=$book_name;
$_SESSION['writer_name']=$writer_name;
$_SESSION['edition']=$edition;
$_SESSION['time_since_purchase']=$time_since_purchase;
$_SESSION['book_description']=$book_description;
$_SESSION['book_pic']=$book_pic;
$_SESSION['book_price']=$book_price;
$_SESSION['idno']=$idno;
$_SESSION['ad_count']=$resultcheck;
header("Location: ../my-advertisement.php");
exit();
}
?>
