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
$sql="SELECT * FROM advertisements LIMIT ".$page.",6";
$result=mysqli_query($conn,$sql);
$resultcheck=mysqli_num_rows($result);
$limit=ceil($resultcheck/6);

echo('<section class="container-fluid store">
<div class="row">');

while($row=mysqli_fetch_assoc($result))
{
    echo('  <div class="col-12 col-sm-12 col-md-4 col-lg-4 text-center  ">

      <div class="ad-card">');
        echo('<img src="assets/books/'.$row['book_pic'].'" class="img-fluid ad-pic"/>
        <div class="ad-card-body text-center">');
          echo('<h4>'.$row["book_name"].'</h3><hr class="ad-card-divider"/>');
          echo('<p>BY - '. $row["writer_name"].'<br/> EDITION - '
          . $row["edition"].'<br/>'.
            $row["book_description"].'</p>
          <a href="#" class="btn btn-primary " >Know More</a>
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
</ul>");

?>



</section>

<?php
include_once "footer.php"
 ?>
