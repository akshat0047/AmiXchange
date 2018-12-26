<?php
include_once "header.php";
 ?>


<section class="container-fluid home">

  <div class="row">
    <div class=" offset-md-3 offset-lg-3 col-sm-12 col-md-6 col-lg-6 text-center">
      <div class="signup-form ">
    <form class="text-center" action="includes/signup.inc.php" method="POST">
      <h4 id="Log-head" class="log-head text-center">SIGN-UP</h4>
      <input class="inputs" type="text" name="username" placeholder="Username"/><br/>
      <input class="inputs" type="password" name="password" placeholder="Password"/><br/>
      <input class="inputs" type="text" name="firstname" placeholder="First Name"/><br/>
      <input class="inputs" type="text" name="lastname" placeholder="Last Name"/><br/>
      <input class="inputs" type="text" name="email" placeholder="Email"/><br/>
      <input class="inputs" type="text" name="course" placeholder="Course"/><br/>
      <input class="inputs" type="text" name="semester" placeholder="Semester"/><br/>
      <input class="inputs" type="text" name="phone" placeholder="Phone Number"/><br/>
      <button id="submit-btn"  name="submit" type="submit" >SUBMIT</button>
  </form>

  </div>

   </div>
   </div>
  </section>

<?php include_once "footer.php" ?>
