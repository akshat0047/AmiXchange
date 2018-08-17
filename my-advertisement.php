<?php
include_once "header.php";
$limit= ceil($_SESSION['ad_count']/6);
if(isset($_GET['page']))
{

  $page=$_GET['page'];
}
else{
  $page=1;
}?>

<section class="container-fluid  myads-section ">

<div class="ad-block d-flex">

  <div class="row">
    <?php
    for($x=(($page-1)*6);$x<($page*6);$x++)
    {
      if(isset($_SESSION['book_name']))
      {
    echo('  <div class="col-12 col-sm-12 col-md-4 col-lg-4 text-center  ">

        <div class="ad-card">');
          echo('<img src="assets/books/'.$_SESSION['book_pic'][5].'" class="img-fluid ad-pic"/>
          <div class="ad-card-body text-center">');
            echo('<h4>'.$_SESSION["book_name"][$x].'</h3><hr class="ad-card-divider"/>');
            echo('<p>BY - '. $_SESSION["writer_name"][$x].'<br/> EDITION - '
            . $_SESSION["edition"][$x].'<br/>'.
              $_SESSION["book_description"][$x].'</p>
            <a href="#" class="btn btn-primary " >Know More</a>
          </div>
        </div>
      </div>');
    }
    else{
      echo('');
    }
  }
     ?>
</div>
</div>
<?php
echo("<ul class='ad-pagin text-center'>
  <span class='pagin-element-block'><a href='advertisement.php?page=");
  if($page>0 && $page<$limit){echo('.'.($page-1).'.');}
  else{echo("$page");}
  echo("'class='pagin-element'><i class='fas fa-angle-left'></i></li>");

  for($x=1;$x<=$limit;$x++)
  {echo("<a href='advertisement.php?page=".$x."' class='pagin-element'>".$x."</li>");
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
include_once "footer.php" ?>
