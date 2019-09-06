<?php
  include('dbconn.php');
  include('checksession.php');
  if(isset($_POST['updateprofile'])){
    //GET USER INPUT
    $about = $_POST['about'];
    $interest = $_POST['interest'];
    //PREPARED STATEMENT
    $sql = $dbconn->prepare("UPDATE useracc SET userBio = ?,userInterest = ? WHERE userID = ?");
    $sql->bind_param("sss",$about,$interest,$userID);
    $sql->execute();
    $sql->close();
  }
  if(isset($_POST['uploadPicture'])){
    
  }
?>
