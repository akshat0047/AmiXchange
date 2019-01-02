<?php
include_once "db.inc.php";
if(isset($_GET['user']) && isset($_GET['tk']))
{
$sql="SELECT * FROM verification WHERE user_uid="."'".$_GET['user']."'";
$result=mysqli_query($conn,$sql);
$resultcheck=mysqli_num_rows($result);
if($resultcheck>0)
{
    $row=mysqli_fetch_assoc($result);
    if($_GET['tk']==$row['at'])
    {
        $row['ev']=0;
        header("Location: ../login.php/?status=verified");
    }
    else{
        echo "AH! not this trick guy!!";
    }
}
}
?>