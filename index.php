<?php
include_once "header.php";
include_once "includes/db.inc.php";
if(isset($_GET['page']))
{
  if($page!=1)
  {
  $page=(($_GET['page']*6)-6);
}
else{
  $page=0;
}
}
else{
  $page=0;
}
if(isset($_POST['submit']))
{
$search=mysqli_real_escape_string($conn,$_POST['search']);
$sql="SELECT * from advertisements where ((Product_Name like '".$search."%') or (Product_Name like '%".$search."') or (Product_Name like '%".$search."%')) LIMIT ".$page.",6";
$result=mysqli_query($conn,$sql);
$resultcheck=mysqli_num_rows($result);
$limit=ceil($resultcheck/6);
}
else{
$sql="SELECT * FROM advertisements LIMIT ".$page.",6";
$result=mysqli_query($conn,$sql);
$resultcheck=mysqli_num_rows($result);
$limit=ceil($resultcheck/6);
}
echo('<section class="store">
<div class="row">');

while($row=mysqli_fetch_assoc($result))
{
    echo('  <div class="col-12 col-sm-12 col-md-4 col-lg-4 text-center  ad-card-column">

      <div class="ad-card">');
        echo('<img src="assets/Products/'.$row['user_uid'].'/'.$row['Product_Pic'].'" class="ad-pic"/>
        <div class="ad-card-body text-center">');
          echo('<p class="ad-head">'.$row["Product_Name"].'</p><hr class="ad-card-divider"/>');
          echo('<p class="ad-info">'. $row["Product_Type"].'<br/><i class="fas fa-rupee-sign"></i>'.$row['Product_Price'].'<br/></p>
          <a href="know_more.php?user='.$row['user_uid'].'&product='.$row['Product_Name'].'" class="btn-sm btn-primary btn-know-more" >Know More</a>
        </div>
      </div>
    </div>');
  }


echo('</div>');


echo("<ul class='ad-pagin text-center'>
  <span class='pagin-element-block'><a href='index.php?page=");
  if($page>0 && $page<$limit){echo('.'.($page-1).'.');}
  else{echo("$page");}
  echo("'class='pagin-element'><i class='fas fa-angle-left'></i></li>");

  for($x=1;$x<=$limit;$x++)
  {echo("<a href='index.php?page=".$x."' class='pagin-element'>".$x."</li>");
  }
echo("<a href='advertisement.php?page=");
if($page>0 && $page<$limit){echo('.'.($page+1).'.');}
else{echo("$page");}
echo("' class='pagin-element'><i class='fas fa-angle-right'></i></a>
</span>
</ul><br/>");


include_once "footer.php";
 ?>


</section>


