<!DOCTYPE html>
<html>

<head>
<title>AmiXchange</title>
<meta charset="UTF-8">
<meta name="description" content="Free Web tutorials">
<meta name="author" content="John Doe">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/svg" href="assets/Display/favicon.svg"/>
<link rel="stylesheet" href="styles/layout-super.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
  <header class="container-fluid  headblock">
<div class="row align-items-center header-row">
  <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center ">
  <img src="../assets/Display/AmiXchange_logo_dark.svg.png" class="header-logo"/>
  </div>

<?php 
if(isset($_SESSION['u_id']))
{
  echo('<div class="col-sm-6 col-md-6 col-lg-6 text-center search-block">
  <form action="index.php" class="search-form" method="POST">
     <input type="search" name="search" class="input-search" placeholder="Search Users"/>
     <button type="submit" name="submit" class="btn-sm btn-warning btn-search" value="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
  </form>
</div>');
}?>

</header>

<?php if(isset($_SESSION["u_id"])){
  echo "<form class='logout-form' action='includes/logout.inc.php' method='POST'>
  <button class='side-scrl' name='submit'>
    <i class='fas fa-power-off ic-logout'></i>
    </button>
    </form>";}
?>
