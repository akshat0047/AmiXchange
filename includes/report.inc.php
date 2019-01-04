<?php
include_once "send-report-email.inc.php";
if(isset($_POST['submit']))
{
include_once "db.inc.php";
$report=mysqli_real_escape_string($conn,$_POST['reported-user']);
$sql="SELECT user_rc FROM verification WHERE user_uid='$report'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
if($row['user_rc']<4)
{
$inc=$row['user_rc']+1;
$sql="UPDATE verification SET user_rc=$inc where user_uid='$report'";
$result=mysqli_query($conn,$sql);
}
else{
    report_email($report,$_POST['reason'],$_POST['description']);
}
}
else{
    header("Location: index.php?reply=ha ha ha");
}
?>