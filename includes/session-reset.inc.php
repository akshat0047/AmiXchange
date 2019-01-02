<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');
session_start(); 
include_once "db.inc.php";
if(isset($_SESSION['u_id']))
{
$sql="select * from users where user_uid='".$_SESSION['u_id']."';";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$_SESSION['u_id']=$row["user_uid"];
$_SESSION["u_first"]= $row["user_first"];
$_SESSION["u_last"]= $row["user_last"];
$_SESSION["u_pwd"]= $row["user_pwd"];
$_SESSION["u_email"]= $row["user_email"];
$_SESSION["u_course"]= $row["user_course"];
$_SESSION["u_semester"]= $row["user_semester"];
$_SESSION['u_dp']=$row["user_dp"];
header("Location: ../profile.php");

}
?>