<?php 
include_once "header.php";
include_once "includes/db.inc.php";
$sql="select * from users where user_uid='".$_GET['user']."';";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
echo('<section class="profile-section-know-more">
<div class="know-more-inner">
<div class="row align-items-center">'.
'<div  class=" col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6  text-center   image-box">'.
         '<img src="assets/Users/'.$row['user_dp'].'" class=" profile-dp-know-more text-center"/> 
         </div>'.
    
     '<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">'.
      '<div class="profile-info-know-more">
        <div class="row ">
          <div id="info-que" class="col-6 col-sm-6 col-md-6 col-lg-6 ">
          <div class="row">
           <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
           <span class="infos text-center">NAME:</span>
           <span class="infos text-center">COURSE:</span>
           <span class="infos text-center">SEMESTER:</span>
           <span class="infos text-center">PHONE:</span>
           <span class="infos text-center">EMAIL:</span>
         </div></div></div>');

      echo('<div id="info-ans" class="col-6 col-sm-6 col-md-6 col-lg-6">'.
              '<span class="infos text-center">'.$row['user_first'].' '.$row['user_last'].'</span>'.
              '<span class="infos text-center">'.$row['user_course'].'</span>'.
              '<span class="infos text-center">'.$row['user_semester'].'</span>'.
              '<span class="infos text-center">'.$row['user_phone'].'</span>'.
              '<a target="_blank" href="mailto:'.$row['user_email'].'?Subject=Ami-Exchange%20" class="seller-email"><span class="infos text-center">'.$row['user_email'].'</span></a>'.
        '</div>
      </div>
      </div><span class="btn btn-danger report-btn">REPORT</span>
      </div>
      </div>
      </div>
      </section>');
  

include_once "footer.php";
?>
