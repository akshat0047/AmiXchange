<?php session_start(); 
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');?>
<!DOCTYPE html>
<html>

<head>
<title>AmiXchange</title>
<meta charset="UTF-8">
<meta name="description" content="Sell your products in Amity Lucknow Campus">
<meta name="keywords" content="Buy,Sell,Earn,Amity,Lucknow,Notes,Pdf,Books,Stationary">
<meta name="author" content="Akshat Pande">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/svg" href="assets/Display/favicon.svg"/>
<link rel="stylesheet" href="styles/layout.css">
<link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Chela+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>

<body>

<div id="menu-mobile-con" class="menu-mobile-con text-center">
<span class='mob-link'><i id="close-menu" class="fas fa-times mob-menu-close-icon"></i>
  <h4>DASHBOARD</h4><hr/></span>
  <ul class="mob-menu-list text-center">
    <a href='index.php' class='mob-link'><li class='mob-menu-list-element' >HOME</li></a>
    <?php if(!isset($_SESSION['u_id'])){echo"<a href='signup.php' class='mob-link'><li class='mob-menu-list-element' >SIGNUP</li></a>";}?>
    <?php if(!isset($_SESSION['u_id'])){echo"<a href='login.php' class='mob-link'><li class='mob-menu-list-element'>LOGIN</li></a>";}?>
    <?php if(isset($_SESSION['u_id'])){echo"<a href='profile.php' class='mob-link'><li class='mob-menu-list-element'>PROFILE</li></a>";}?>
    <?php if(isset($_SESSION['u_id'])){echo"<a href='edit-profile.php' class='mob-link'><li class='mob-menu-list-element'>EDIT-PROFILE</li></a>";}?>
    <?php if(isset($_SESSION['u_id'])){echo"<a href='my-advertisement.php' class='mob-link'><li class='mob-menu-list-element'>MY-ADVERTISEMENT</li></a>";}?>
    <?php if(isset($_SESSION['u_id'])){echo"<a href='add.php' class='mob-link'><li class='mob-menu-list-element' style='white-space:nowrap'>POST-ADVERTISEMENT</li></a>";}?>
    </ul>
    <p class="mob-menu-con-text mob-link">1.0.0(Early Access)<br/><i class="far fa-copyright"></i> 2019 | All Rights Reserved | Made with <i class="far fa-heart"></i> in Amity
    <br/>Powered by <strong>ALiAS LUCKNOW</strong></p>
</div>

  <header class="container-fluid  headblock">
<div class="row align-items-center header-row">
  <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center ">
  <img src="assets/Display/AmiXchange_logo_dark.svg.png" class="header-logo"/>
  </div>

  <div class="col-sm-6 col-md-6 col-lg-6 text-center search-block">
  <form action="index.php" class="search-form" method="POST">
     <input type="search" name="search" class="input-search" placeholder="Search Products"/>
     <button type="submit" name="submit" class="btn-sm btn-warning btn-search" value="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
     <span id="expand-menu" class="menu-mobile"><i class="fas fa-bars"></i></span>
  </form>
  <?php if(!isset($_SESSION['u_id'])){
      echo '<a href="signup.php" class="desktop"><span class="btn-sm btn-info">SIGN-UP</span></a>';
    }
    else{
      echo '<a href="index.php" class="desktop"><span class="btn-sm btn-info">HOME</span></a>';
    }
    ?>
    <?php if(!isset($_SESSION['u_id'])){
    echo '<a  href="login.php" class="desktop"><span class="btn-sm btn-info">LOGIN</span></a>';
  }
    else if(explode("/",$_SERVER['REQUEST_URI'])[2]=="index.php"){
    echo '<a href="profile.php" class="desktop"><span class="btn-sm btn-info">PROFILE</span></a>';
    }
    else{
    echo '<a href="edit-profile.php" class="desktop"><span class="btn-sm btn-info">EDIT PROFILE</span></a>';
    }?>
  </div>

</div>

</header>

<?php if(isset($_SESSION["u_id"])){
  echo "<form class='logout-form' action='includes/logout.inc.php' method='POST'>
  <button class='side-scrl' name='submit'>
    <i class='fas fa-power-off ic-logout'></i>
    </button>
    </form>";}
?>

<script>
  $(document).ready(function(){
    var g=0;
    $("#expand-menu").click(function(){
      $("#menu-mobile-con").css({"width":"100%","padding":"20px"});
    var numitems=$(".mob-link").length;
    console.log(numitems);
    var interval= setInterval(() => {
      if(g<numitems)
      {
        document.getElementsByClassName("mob-link")[g].style.visibility="visible";
        document.getElementsByClassName("mob-link")[g].style.opacity="1";
        g++;
      }
    }, 100);
    setTimeout(() => {
      clearInterval(interval);
    }, 1900);
  });

  $("#close-menu").click(function(){
    $(".mob-link").css({"visibility":"hidden","opacity":"0"});
    $("#menu-mobile-con").css({"width":"0%","padding":"0px"});
    g=0;
  });
  });
</script>