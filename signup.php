<?php
include_once "header.php";
 ?>


<section class="container-fluid home">

  <div class="row">
    <div class=" offset-md-3 offset-lg-3 col-sm-12 col-md-6 col-lg-6 text-center">
      <div class="signup-form ">
    <form class="text-center" action="includes/signup.inc.php" method="POST">
      <h4 id="Log-head" class="log-head text-center">SIGN-UP</h4>
      <input class="inputs" type="text" value="<?php if(isset($_GET['ut'])){echo($_GET['ut']);}?>" name="username" placeholder="Username" required/><br/>
      <input class="inputs" type="<?php if(isset($_GET['pwd'])){echo('text');} else{echo('password');}?>" value="<?php if(isset($_GET['pwd'])){echo($_GET['pwd']);}?>" name="password" placeholder="Password" required/><br/>
      <input class="inputs" type="text" value="<?php if(isset($_GET['fnameerr'])){echo($_GET['fnameerr']);}?>" name="firstname" placeholder="First Name" required/><br/>
      <input class="inputs" type="text" value="<?php if(isset($_GET['lnameerr'])){echo($_GET['lnameerr']);}?>" name="lastname" placeholder="Last Name" required/><br/>
      <input class="inputs" type="text" value="<?php if(isset($_GET['emailerr'])){echo($_GET['emailerr']);}?>" name="email" placeholder="Amizone Email" required/><br/>
      <input class="inputs" type="text" name="course" placeholder="Course" required/><br/>
      <input class="inputs" type="text" name="semester" placeholder="Semester" required/><br/>
      <button id="submit-btn"  name="submit" type="submit" >SUBMIT</button>
  </form>

  </div>

   </div>
   </div>
  </section>

<?php include_once "footer.php" ?>
