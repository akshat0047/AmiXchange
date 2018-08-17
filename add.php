<?php include_once "header.php"; ?>

<section class="container-fluid profile-section">

  <div class="row">
    <div class=" offset-md-3 offset-lg-3 col-sm-12 col-md-6 col-lg-6 text-center">
      <div class="add-form ">
    <form class="text-center" action="includes/add.inc.php" method="POST" enctype="multipart/form-data">
      <h4 id="Log-head" class="log-head text-center">ADD DETAILS</h4>
      <input class="inputs" type="text" name="bookname" placeholder="Book Name" required/><br/>
      <input class="inputs" type="text" name="writer" placeholder="Writer Name" required/><br/>
      <input class="inputs" type="text" name="edition" placeholder="Edition" required/><br/>
      <input class="inputs" type="date" name="tsp" placeholder="Time Since Purchase" required/><br/>
      <input class="inputs" type="textarea" name="description" placeholder="Description" required/><br/>
      <input class="inputs file_input" id="bookfile" type="file" name="bookpic" placeholder="Select a picture" required/><br/>
      <label class="inputs file_label" for="bookfile">CHOOSE A PICTURE</label>
      <button id="submit-btn"  name="submit" type="submit" >SUBMIT</button>
      <a href="profile.php"><button id="submit-btn"  >PROFILE</button></a>
  </form>

  </div>

   </div>
   </div>

  </section>

<?php  include_once "footer.php"; ?>
