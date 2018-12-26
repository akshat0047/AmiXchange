<?php include_once "header.php";
?>

<section class=" profile-section ">




  <div class="row ">

    <div  class=" offset-md-1 col-lg-4 col-lg-4  text-center   image-box">

    <form action="includes/dp.inc.php" method="POST" enctype="multipart/form-data">

      <label for="profiledp" ><?php if(isset($_SESSION['u_dp'])){ echo "<img src='assets/member_dp/".$_SESSION['u_dp']."'"."class='img-fluid profile-dp text-center'/>";}
        else{
          echo "<img src='assets/akshat.jpg' class=' profile-dp text-center'/>";
        }?></label>
      <input class="profile-upload-hide dp" type="file" id="profiledp"  name="displaypic" />
      <button type="submit" name="submit">SUBMIT</button>
    </form>

    </div>

  <div  class=" offset-md-1 offset-lg-1  col-md-4 col-lg-4 profile-activity-box-desktop  desktop">
      <ul >
        <a href="includes/advertisement.inc.php" ><li id="activity-button1" class="profile-activity-desktop btn-warning text-center">MY ADDS</li></a>
        <a href="add.php" ><li id="activity-button2" class="profile-activity-desktop btn-warning text-center">POST AN ADD</li></a>
      </ul>
      </div>

  </div>
</div>
<br/>
    <div class="row">
      <div class="offset-sm-1 offset-md-1 offset-lg-1 col-12 col-sm-12 col-md-4 col-lg-4 text-center  profile-info">

        <div class="row">
          <div id="info-que" class="col-6 col-sm-6 col-md-6 col-lg-6 ">
           <span class="infos text-center">NAME:</span>
           <span class="infos text-center">COURSE:</span>
           <span class="infos text-center">SEMESTER:</span>
           <span class="infos text-center">USERNAME:</span>
           <span class="infos text-center">PHONE:</span>
         </div>

      <div id="info-ans" class="col-6 col-sm-6 col-md-6 col-lg-6 ">
              <span class="infos text-center"> <?php echo $_SESSION['u_first'].' '.$_SESSION['u_last'] ; ?></span>
              <span class="infos text-center"> <?php echo $_SESSION['u_course']; ?></span>
              <span class="infos text-center"> <?php echo $_SESSION['u_semester']; ?></span>
              <span class="infos text-center"> <?php echo $_SESSION['u_id']; ?></span>
              <span class="infos text-center"> <?php echo $_SESSION['ph_no']; ?></span>  
        </div>
      </div>

      </div>
    </div>

 <div class="row mobile">
   <div  class="col-12 col-sm-12 profile-activity-box-mobile mobile">

      <div class="row">
        <div class="col-6 col-sm-6">
         <a href="includes/advertisement.inc.php"><span id="activity-button1" class="profile-activity-mobile btn-warning text-center">MY ADDS</span></a>
       </div>

       <div class="col-6 col-sm-6">
        <a href="add.php" ><span id="activity-button2" class="profile-activity-mobile btn-warning text-center">POST AN ADD</span></a>
      </div>

       </div>
     </div>
</div>
</section>

<?php include_once "footer.php"?>
