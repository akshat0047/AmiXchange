<?php
$database= "localhost";
$databaseuser="root";
$databasepwd="akshat0047";
$databasename="STORE";

// Create connection
$conn = new mysqli($database,$databaseuser,$databasepwd,$databasename);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Users Table
$sql = "CREATE TABLE users (
user_uid VARCHAR(20) PRIMARY KEY,
user_pwd VARCHAR(300) NOT NULL,
user_first VARCHAR(30) NOT NULL,
user_last VARCHAR(30) NOT NULL,
user_email VARCHAR(50),
user_course VARCHAR(50),
user_semester VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}


// Verification Table
$sql = "CREATE TABLE verification (
    user_uid VARCHAR(10) PRIMARY KEY,
    user_at VARCHAR(30) NOT NULL,
    user_rc INT(1),
    user_ev INT(1),
    user_pv INT(1)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Verification created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
}

// Advertisements Table
$sql = "CREATE TABLE advertisements (
    idno INT(6) AUTO_INCREMENT PRIMARY KEY,
    user_uid VARCHAR(10),
    Product_Name CHAR(30),
    Product_Type CHAR(30),
    Product_Description CHAR(200),
    time_since_purchase DATE,
    Product_Pic VARCHAR(50),
    Product_Price INT(5)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Advertisements created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 