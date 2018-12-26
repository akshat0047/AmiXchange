<?php
include_once "header.php";?>

<section class="container-fluid home">
  <div class="row">

   <div class="offset-sm-2 offset-md-3 offset-lg-4 col-12 col-sm-8 col-md-6 col-lg-4 text-center">
      <div class="forgot-password-form">
    <form class="text-center" action="includes/forgot-password.inc.php" method="POST">
      
      <input class="inputs" type="text" name="rescue" placeholder="Username/Email"/><br/>
      <button id="submit-btn"  name="submit" type="submit" >SUBMIT</button>

      </form>

    </div>

  </div>
  </div>




</section>

<?php
include_once "footer.php";
?>