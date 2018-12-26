<?php session_start(); 
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="layout.css">
<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans|Chela+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>

<body>


  <header class="container-fluid  headblock">
<div class="row">
  <div class=" col-md-3 col-lg-3 text-center">
    <?php if(!isset($_SESSION['u_id'])){
      echo '<a href="signup.php" class="desktop"><span class="account-control btn-info">SIGN-UP</span></a>';
    }
    else{
      echo '<a href="index.php" class="desktop"><span class="account-control btn-info">HOME</span></a>';
    }
    ?>
  </div>

  <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center">
    <h3 id="main-head" class="main-heading">AMITY BOOK STORE</h3>
  </div>

  <div class="col-md-3 col-lg-3 text-center">
    <?php if(!isset($_SESSION['u_id'])){
    echo '<a  href="login.php" class="desktop"><span class="account-control btn-info">LOGIN</span></a>';
  }
    else if(explode("/",$_SERVER['REQUEST_URI'])[2]=="index.php"){
    echo '<a href="profile.php" class="desktop"><span class="account-control btn-info">PROFILE</span></a>';
    }
    else{
    echo '<a href="edit-profile.php" class="desktop"><span class="account-control btn-info">EDIT PROFILE</span></a>';
    }?>
  </div>

</div>

</header>

<?php if(isset($_SESSION["u_id"])){
  echo "<form class='logout-form' action='includes/logout.inc.php' method='POST'>
  <button class='side-scrl' name='submit' >
    <i class='fas fa-power-off ic-logout'></i>
    </button>
    </form>";}
?>
