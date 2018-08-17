<?php

session_start();
if(isset($_POST['submit']))
{

  include_once "db.inc.php";

  $bn=mysqli_real_escape_string($conn,$_POST["bookname"]);
  $bw=mysqli_real_escape_string($conn,$_POST["writer"]);
  $be=mysqli_real_escape_string($conn,$_POST["edition"]);
  $btsp=mysqli_real_escape_string($conn,$_POST["tsp"]);
  $bds=mysqli_real_escape_string($conn,$_POST["description"]);
  $bpn=$_FILES["bookpic"]["name"];
  $bptn=$_FILES["bookpic"]["tmp_name"];
  $bps=$_FILES["bookpic"]["size"];
  $bpe=$_FILES["bookpic"]["error"];
  $bpt=$_FILES["bookpic"]["type"];
  $name=explode('.',$bpn);
  $bpext=strtolower(end($name));
  $allowtype=array('png','jpg','jpeg');

  if(empty($bn)||empty($bw)||empty($be)||empty($btsp)||empty($bds)){
    header("Location: ../add.php?fields=empty");
    exit();
  }
  else{
        //check if iput characters are valid
        if(!preg_match("/^[a-zA-Z]*$/",$bn))
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
                  $sql="INSERT INTO advertisements(user_id,book_name,writer_name,edition,time_since_purchase,book_description,book_pic)VALUES"."(".$_SESSION['id'].",'$bn','$bw',$be,'$btsp','$bds','$bpnewname');";
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
