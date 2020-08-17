<?php 

function select_all_front_super()
{
include "includes/db.inc.php";
$select="SELECT * from users";
$resultall=mysqli_query($conn,$select);
$checkall=mysqli_num_rows($resultall);
return ceil($checkall/10);
}

?>