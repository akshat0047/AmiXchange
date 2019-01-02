<?php 
include_once "header-super.php";
include_once "../includes/db.inc.php";
 if(isset($_GET['page']))
 {
   if($page!=1)
   {
   $page=(($_GET['page']*10)-10);
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
 $sql="SELECT * from users where user_uid='".$search."' LIMIT ".$page.",10";
 $result=mysqli_query($conn,$sql);
 $resultcheck=mysqli_num_rows($result);
 $limit=ceil($resultcheck/10);
 }
 else{
 $sql="SELECT * FROM users LIMIT ".$page.",10";
 $result=mysqli_query($conn,$sql);
 $resultcheck=mysqli_num_rows($result);
 $limit=ceil($resultcheck/10);
 }
 echo('<section class="store-super">
 <div class="row">');
 
 while($row=mysqli_fetch_assoc($result))
 {
     echo('  <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
             <div>'.$row['user_uid'].'//'.$row['user_first'].' '.$row['user_last'].'//'.$row['user_phone'].'//'.$row['user_email'].'<a href="includes/super-delete.inc.php"><br class="mobile"/><span class="btn-sm btn-danger delete-user">DELETE</span></a>');
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
 
  ?>

 </section>
  </body>
  </html>
 