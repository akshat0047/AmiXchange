<?php 
include_once "header-super.php";
include_once "includes/db.inc.php";
include_once "select.php";
 if(isset($_GET['page']))
 {
   if($page!=1)
   {
   $ll=(($_GET['page']*10)-10);
   $page=$_GET['page'];
 }
 else{
   $ll=0;
   $page=0;
 }
 }
 else{
   $ll=0;
   $page=0;
 }
 if(isset($_GET['search']))
 {
 $search=mysqli_real_escape_string($conn,$_GET['search']);
 $sql="SELECT * from users where user_uid="."'".$search."';";
 $result=mysqli_query($conn,$sql);
 $resultcheck=mysqli_num_rows($result);
 }
 else{
 $limit=select_all_front_super();
 $sql="SELECT * FROM users LIMIT ".$page.",10";
 $result=mysqli_query($conn,$sql);
 $resultcheck=mysqli_num_rows($result);
 }
 echo('<section class="store">
 <div class="row">');
 
 while($row=mysqli_fetch_assoc($result))
 {
     echo('  <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center user-column">
             <div>'.$row['user_uid'].'//'.$row['user_first'].' '.$row['user_last'].'//'.$row['user_phone'].'//'.$row['user_email'].'<br class="mobile"/><span  onclick="del('."'".$row['user_uid']."','".$_SERVER['REQUEST_URI']."'".')" class="btn-sm btn-danger delete-user">DELETE</span>');
   }
 echo('</div>');
 

if(!(isset($_GET['search'])))
{
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
  ?>
  <div id="dialog" class="delete-dialog text-center">
</div>
 </section>
 <?php include_once "footer-super.php"; ?>
<script>
 function del(id,urlp){
  document.getElementById('dialog').innerHTML= '<p class="delete-warning">THIS USER WILL BE DELETED</p><br/>'+
          '<a href="includes/delete-super.inc.php?id='+id+'&ur='+urlp+'" ><span class="btn-sm btn-danger btn-dialog">DELETE</span></a><span  onclick="go_back()" class="btn-sm btn-success btn-dialog">GO BACK</span>';
  document.getElementById('dialog').style.display="block";
  document.getElementsByClassName('store')[0].style.opacity="0.7";     
 }

 function go_back(){
  document.getElementById('dialog').style.display="none";
   document.getElementsByClassName('store')[0].style.opacity="1";
 }
 $(document).ready(function(){
  // Add smooth scrolling to all links
$(".smooth-scroll").click(function (event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800);
    }});
  });

</script>
  </body>
  </html>
 