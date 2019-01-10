<?php


$database= "localhost";
$databaseuser="phpmyadmin";
$databasepwd="Akshat0047$";
$databasename="STORE";

$conn= mysqli_connect($database,$databaseuser,$databasepwd,$databasename);
if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}


 ?>
