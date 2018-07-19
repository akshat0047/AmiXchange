<?php include_once "header.php";
?>

<section class="container-fluid profile-section">




  <div class="row ">

    <div  class=" offset-md-1 offset-lg-1 col-sm-12 col-md-4 col-lg-4  image-box">

    <form action="profilepic.inc.php" method="POST" enctype=onkeypress="multipart/form-data">

      <label for="profiledp" ><?php if(isset($_SESSION['u_dp'])){ echo "<img src='assets/".$_SESSION['u_dp']."'"."class='img-fluid profile-dp text-center'/>";}
        else{
          echo "<img src='assets/akshat.jpg' class='img-fluid profile-dp text-center'/>";
        }?></label>
      <input class="profile-upload-hide" type="file" id="profiledp" class="dp" name="displaypic" ></input>
    </form>

    </div>

    <div  class=" offset-md-3 offset-lg-3 col-sm-12 col-md-4 col-lg-4 profile-activity-box ">
      <ul >
        <ui id="activity-button1" class="profile-activity btn-warning text-center">MY ADDS</ui>
        <a href="add.php" ><ui id="activity-button2" class="profile-activity btn-warning text-center">POST AN ADD</ui></a>
      </ul>
    </div>

  </div>

  <div class="row">
    <div class="col-sm-12 offset-md-1 offset-lg-1 col-md-4 col-lg-4 profile-info">

      <div class="row">
        <div id="info-que" class="col-sm-3 col-md-6 col-lg-6 ">
         <span class="infos text-center">NAME:</span>
         <span class="infos text-center">COURSE:</span>
         <span class="infos text-center">SEMESTER:</span>
         <span class="infos text-center">USERNAME:</span>
       </div>

    <div id="info-ans" class="col-sm-3 col-md-6 col-lg-6 ">
            <span class="infos text-center"> <?php echo $_SESSION['u_first'].' '.$_SESSION['u_last'] ; ?></span>
            <span class="infos text-center"> <?php echo $_SESSION['u_course']; ?></span>
            <span class="infos text-center"> <?php echo $_SESSION['u_semester']; ?></span>
            <span class="infos text-center"> <?php echo $_SESSION['u_id']; ?></span>
      </div>
    </div>

    </div>
  </div>


</section>
<?php include_once "footer.php"?>
