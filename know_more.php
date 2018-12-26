<?php include_once "header.php";
      include_once "includes/db.inc.php";
$sql="select * from users where user_uid='".$_GET['user']."'";
$result= mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$sql1="select * from advertisements where user_uid='".$_GET['user']."' AND book_name='".$_GET['book']."';";
$result1= mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($result1);
echo '<section class="container-fluid  profile-section-know-more ">';




  echo '<div class="row align-items-center">'.

    '<div  class=" col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6  text-center   image-box">'.
         '<img src="assets/books/'.$row1['book_pic'].'" class=" profile-dp-know-more text-center"/>    
    </div>'.
    
     '<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">'.
      '<div class="profile-info-know-more">
        <div class="row">
          <div id="info-que" class="col-6 col-sm-6 col-md-6 col-lg-6 ">
          <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
           <span class="infos text-center">USER:</span></div>
           <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
           <span class="infos text-center">ITEM NAME:</span>
           <span class="infos text-center">ITEM DESCRIPTION:</span>
           <span class="infos text-center">PURCHASED ON :</span>
           <span class="infos text-center">PRICE:</span>
         </div></div></div>'.

      '<div id="info-ans" class="col-6 col-sm-6 col-md-6 col-lg-6 ">'.
              '<span class="infos text-center">';  echo $row['user_first']." ".$row['user_last'] ; echo '</span>'.
              '<span class="infos text-center">';  echo $row1['book_name']; echo '</span>'.
              '<span class="infos text-center">';  echo $row1['book_description']; echo '</span>'.
              '<span class="infos text-center">';  echo $row1['time_since_purchase']; echo '</span>'.
              '<span class="infos text-center">';  echo $row1['book_price']; echo '</span>'.
        '</div>
      </div>
</div>
      </div>
    </div></section>'.

'<div class="slick">';
$sql2="select * from advertisements where user_uid='".$_GET['user']."';";
$result2=mysqli_query($conn,$sql2);
while(($row2=mysqli_fetch_assoc($result2))&&($row2['book_name']!=$row1['book_name']))
{
 
echo ('<div class="know-more-card text-center">');
echo('<img src="assets/books/'.$row2['book_pic'].'" class=" ad-pic"/>
<div class="know-more-card-body text-center">');
  echo('<h4>'.$row2["book_name"].'</h3><hr class="ad-card-divider"/>');
  echo('<p>BY - '. $row2["writer_name"].'<br/>'.$row2["book_price"].'<br/>'.
    '</p><a href="know_more.php?user='.$row2['user_uid'].'&book='.$row2['book_name'].'" class="btn btn-primary " >Know More</a>
</div>
</div>');
}
?>
</div>

<script type="text/javascript">
    $(document).ready(function(){
      $('.slick').slick({
        dots: false,
  infinite: true,
  speed: 2000,
  autoplay:true,
  autoplaySpeed:2500,
  prevArrow: '<a class= "slick-prev text-center" ><i class="fas fa-chevron-left" ></i></a>',
  nextArrow: '<a class= "slick-next text-center" ><i class="fas fa-chevron-right" ></i></a>',
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
  responsive: [
   
    {
      breakpoint: 600,
      settings: {
        autoplay:true,
        autoplaySpeed:2500,
        infinite:true,
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows:false,
        autoplay:true,
        autoplaySpeed:2500,
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
      });
    });
  </script>
<?php include_once "footer.php"?>
