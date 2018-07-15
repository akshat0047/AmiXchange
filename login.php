<?php
include_once "header.php" ?>


<section class="container-fluid home">

<div class="row">
  <div class=" col-sm-12 col-md-3 col-lg-3">
<img class="display-login" class="img-fluid" src="assets/amity.jpg" />
  </div>

  <div class=" offset-md-4 offset-lg-4 col-sm-12 col-md-4 col-lg-4 text-center">
    <div class="login-form">
  <form class="text-center" action="includes/login.inc.php" method="POST">
    <h4 id="Log-head" class="log-head text-center">LOG-IN</h4>
    <input class="inputs" type="text" name="username" placeholder="Username"/><br/>
    <input class="inputs" type="password" name="password" placeholder="Password"/><br/>
    <button id="submit-btn"  name="submit" type="submit" >SUBMIT</button>

    </form>
    <a href="index.php"><button id="submit-btn" >SIGN-UP</button></a>
  </div>

</div>
</div>
  </section>

<?php include_once "footer.php" ?>
