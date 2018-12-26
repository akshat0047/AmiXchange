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

<section class="  myads-section ">

<div class="ad-block d-flex">

  <div class="row">
    <?php
    for($x=(($page-1)*6);$x<($page*6);$x++)
    {
      if(isset($_SESSION['book_name'][$x]))
      {
    echo('  <div class="col-12 col-sm-12 col-md-4 col-lg-4 text-center  ad-card-column">

        <div class="ad-card">');
          echo('<img src="assets/books/'.$_SESSION['book_pic'][$x].'" class="img-fluid ad-pic"/>
          <div class="ad-card-body text-center">');
            echo('<p class="ad-head">'.$_SESSION["book_name"][$x].'</p><hr class="ad-card-divider"/>');
            echo('<p class="ad-info">BY - '. $_SESSION["writer_name"][$x].'<br/> EDITION - '
            . $_SESSION["edition"][$x].'<br/>'.$_SESSION['book_price'][$x].'<br/>'.
              $_SESSION["book_description"][$x].'<br/></p>
            <a href="#" onclick="del('.$_SESSION['idno'][$x].')" class="btn-sm btn-danger " >DELETE</a>
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
</ul><br/>");
?>

<div id="dialog" class="delete-dialog text-center">
</div>

<script>
 function del(id){
  document.getElementById('dialog').innerHTML= '<p class="delete-warning">THIS ADVERTISEMENT WILL BE DELETED</p><br/>'+
          '<a href="includes/delete.inc.php?id='+id+'" ><span class="btn-sm btn-danger btn-dialog">DELETE</span></a><span  onclick="go_back()" class="btn-sm btn-success btn-dialog">GO BACK</span>';
  document.getElementById('dialog').style.display="block";
  document.getElementsByClassName('ad-block')[0].style.opacity="0.7";     
 }

 function go_back(){
  document.getElementById('dialog').style.display="none";
   document.getElementsByClassName('ad-block')[0].style.opacity="1";
 }
</script>



<?php
include_once "footer.php" ?>
</section>