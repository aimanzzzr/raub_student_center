<?php
  include("../dbconn.php");
  include("../checksession.php");
  if(isset($_POST['AddActivity'])){
    $activityName = mysqli_real_escape_string($dbconn,$_POST['activityname']);
    $activityDesc = mysqli_real_escape_string($dbconn,$_POST['activitydesc']);
    $activityPicture = $_FILES['activitypicture'];
    $activityDate = $_POST['activitydate'];
    $activityTime = $_POST['activitytime'];
    //prepared statement
    $sql = $dbconn->prepare("INSERT INTO activity(activityName,activityDescription,activityDate,activityTime,adminID)VALUES(?,?,?,?,?)");
    $sql->bind_param("sssss",$activityName,$activityDesc,$activityDate,$activityTime,$adminID);
    $sql->execute();
    $insertedID = $dbconn->insert_id;
    $sql->close();

    $path = "../../images/activity/";
    $filext =  end(explode('.',$activityPicture['name']));
    $filename = rand().".".$filext;
    $path = $path.basename($filename);
    $newpath = "../images/activity/".basename($filename);
    if(move_uploaded_file($activityPicture['tmp_name'],$path)){
      $sql = "UPDATE activity SET activityPicture = '$newpath' WHERE activityID = '$insertedID'";
      $query = mysqli_query($dbconn,$sql);
    }
    header("Location:../../admin/activity-details.php");
  }
  if(isset($_POST['deleteActivity'])){
    $activityID = $_POST['activityid'];

    $sql = "UPDATE activity SET activityStatus = '1' WHERE activityID = '$activityID'";
    $query = mysqli_query($dbcon,$sql);
    mysqli_close($dbcon);
    header("Location:../../admin/activity-details.php");
  }
  if(isset($_POST['editActivity'])){
    $activityID = $_POST['activityID'];
    $activityName = mysqli_real_escape_string($dbconn,$_POST['activityname']);
    $activityDesc = mysqli_real_escape_string($dbconn,$_POST['activitydesc']);
    $activityDate = $_POST['activitydate'];
    $activityTime = $_POST['activitytime'];
    //prepared statement
    $sql = $dbconn->prepare("UPDATE activity SET activityName = ?,activityDescription = ?,activityDate = ?,activityTime = ? WHERE activityID = ?");
    $sql->bind_param("sssss",$activityName,$activityDesc,$activityDate,$activityTime,$activityID);
    $sql->execute();
    $sql->close();
    if($_FILES['activityPicture']['error']==0){
      $activityPicture = $_FILES['activitypicture'];
      $sql = "SELECT activityPicture FROM activity WHERE activityID = '$activityID'";
      $query = mysqli_query($dbcon,$sql);
      $dataActivity = mysqli_fetch_assoc($query);
      $path = "../../images/activity/";
      $filext =  end(explode('.',$activityPicture['name']));
      $filename = rand().".".$filext;
      $path = $path.basename($filename);
      $newpath = "../images/activity/".basename($filename);
      if(move_uploaded_file($activityPicture['tmp_name'],$path)){
        $sql = "UPDATE activity SET activityPicture = '$newpath' WHERE activityID = '$activityID'";
        $query = mysqli_query($dbconn,$sql);
        unlink("../".$dataActivity['activityPicture']);
      }
    }
    header("Location:../../admin/activity-details.php");
  }
  if(isset($_POST['getActivity'])){
    $activityID = $_POST['activityid'];
    $sql = "SELECT * FROM activity WHERE activityID = '$activityID'";
    $query = mysqli_query($dbcon,$sql);
    $jsonobj = null;
    $dataActivity = mysqli_fetch_assoc($query);
    $jsonobj[$dataActivity['activityID']] = array("activityID"=>(string)$dataActivity['activityID'],"activityName"=>(string)$dataActivity['activityName'],"activityDescription"=>(string)$dataActivity['activityDescription'],"activityPicture"=>(string)$dataActivity['activityPicture'],"activityDate"=>(string)$dataActivity['activityDate'],"activityTime"=>(string)$dataActivity['activityTime']);
    echo json_encode($jsonobj);
  }
?>
