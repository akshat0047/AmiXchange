<?php
include_once "header.php";
include_once "includes/db.inc.php";
include_once "select.php";
if(isset($_GET['page']))
{
  if($_GET['page']!=1)
  {
  $ll=(($_GET['page']*6)-6);
  $page=$_GET['page'];
}
else{
  $ll=0;
  $page=1;
}
}
else{
  $page=1;
  $ll=0;
}
if(isset($_GET['search']))
{
$search=mysqli_real_escape_string($conn,$_GET['search']);
$limit=select_all_front_search($_GET['search']);
$sql="SELECT * from advertisements where ((Product_Name like '".$search."%') or (Product_Name like '%".$search."') or (Product_Name like '%".$search."%')) LIMIT ".$ll.",6";
$result=mysqli_query($conn,$sql);
$resultcheck=mysqli_num_rows($result);
}
else{
$limit=select_all_front();
$sql="SELECT * FROM advertisements LIMIT ".$ll.",6";
$result=mysqli_query($conn,$sql);
$resultcheck=mysqli_num_rows($result);
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
          <a href="know_more.php?user='.$row['user_uid'].'&product='.$row['Product_Name'].'" class="btn-sm btn-warning btn-know-more" >Know More</a>
        </div>
      </div>
    </div>');
  }


echo('</div>');

if(isset($_GET['search']))
{
  echo("<ul class='ad-pagin text-center'>
  <span class='pagin-element-block'><a href='index.php?page=");
  if($page>1){echo($page-1);}
  else{echo("1");}
  echo("&search=".$_GET['search']."'class='pagin-element'><i class='fas fa-angle-left'></i></li>");

  for($x=1;$x<=$limit;$x++)
  {
    echo("<a href='index.php?page=".$x."' class='pagin-element'>".$x."</li>");
  }
echo("<a href='index.php?page=");
if($page<$limit){echo($page+1);}
else{echo($limit);}
echo("&search=".$_GET['search']."' class='pagin-element'><i class='fas fa-angle-right'></i></a>
</span>
</ul><br/>");
}

  else{
echo("<ul class='ad-pagin text-center'>
  <span class='pagin-element-block'><a href='index.php?page=");
  if($page>1){echo($page-1);}
  else{echo("1");}
  echo("'class='pagin-element'><i class='fas fa-angle-left'></i></li>");

  for($x=1;$x<=$limit;$x++)
  {
    echo("<a href='index.php?page=".$x."' class='pagin-element'>".$x."</li>");
  }
echo("<a href='index.php?page=");
if($page<$limit){echo($page+1);}
else{echo($limit);}
echo("' class='pagin-element'><i class='fas fa-angle-right'></i></a>
</span>
</ul><br/>");
  }

include_once "footer.php";
 ?>


</section>


