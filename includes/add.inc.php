<?php

session_start();
if(isset($_POST['submit']))
{

  include_once "db.inc.php";

  $bn=mysqli_real_escape_string($conn,$_POST["bookname"]);
  $bw=mysqli_real_escape_string($conn,$_POST["writer"]);
  $be=mysqli_real_escape_string($conn,$_POST["edition"]);
  $btsp=mysqli_real_escape_string($conn,$_POST["tsp"]);
  $bp=mysqli_real_escape_string($conn,$_POST["price"]);
  $bds=mysqli_real_escape_string($conn,$_POST["description"]);
  $bpn=mysqli_real_escape_string($conn,$_FILES["bookpic"]["name"]);
  $bptn=mysqli_real_escape_string($conn,$_FILES["bookpic"]["tmp_name"]);
  $bps=mysqli_real_escape_string($conn,$_FILES["bookpic"]["size"]);
  $bpe=mysqli_real_escape_string($conn,$_FILES["bookpic"]["error"]);
  $bpt=mysqli_real_escape_string($conn,$_FILES["bookpic"]["type"]);
  $name=explode('.',$bpn);
  $bpext=strtolower(end($name));
  $allowtype=array('png','jpg','jpeg');

  if(empty($bn)||empty($bw)||empty($be)||empty($btsp)||empty($bds)||empty($bp)){
    header("Location: ../add.php?fields=empty");
    exit();
  }
  else{
        //check if iput characters are valid
        if(!preg_match("/^[a-zA-Z]*/",$bn))
        {
          header("Location: ../add.php?fields=invalid");
          exit();
        }
        else{
          if(in_array($bpext,$allowtype))
          {
            if($bpe==0){
                if($bps > 3000){
                  $dest="../assets/books/";
                  $bpnewname=$bn.'.'.$bpext;
                  move_uploaded_file($bptn,$dest.$bpnewname);
                  $sql="INSERT INTO advertisements(user_uid,book_name,writer_name,book_edition,book_description,time_since_purchase,book_pic,book_price)VALUES"."('".$_SESSION['u_id']."','$bn','$bw',$be,'$bds',".DATE."'".$btsp."'".",'$bpnewname',$bp);";
                  $result=mysqli_query($conn,$sql);
                 
                  
                  header("Location: ../add.php?fields=success");
                  exit();
                }
                else{
                  header("Location: ../add.php?fields=crashed");
                }


  }


        }



      }}}
else{
  header("Location: ../profile.php?upload=crashed");
}
