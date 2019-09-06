<?php
  include('dbconn.php');
  include('checksession.php');
  //GET FUNCTION FROM ACTIVITY FOR ACTIVITY.PHP
  if(isset($_POST['getactivity'])){
    $sql = "SELECT * FROM activity WHERE activityStatus = '0'";
    $query = mysqli_query($dbcon,$sql);
    $row = mysqli_num_rows($query);
    $json = null;
    if($row==0){
      $empty = array("activityID"=>null);
      $json["1"] = $empty;
      echo json_encode($json);
    }else{
      while($data = mysqli_fetch_assoc($query)){
        $activityid = (string)$data['activityID'];
        $activityName = (string)$data['activityName'];
        $activityPicture = (string)$data['activityPicture'];
        $dataArray = array("activityID"=>$activityid,"activityName"=>$activityName,"activityPicture"=>$activityPicture);
        $json[$activityid] = $dataArray;
      }
      echo json_encode($json);
    }
  }
  //GET FUNCTION FROM ACTIVITY FOR ACTIVITY-DETAILS.PHP
  if(isset($_POST['getactivitydetails'])){
    //get activity id
    $activityid = $_POST['actvityid'];
    $sql = "SELECT * FROM activity WHERE activityID = '$activityid'";
    $query = mysqli_query($dbcon,$sql);
    $data = mysqli_fetch_assoc($query);
    $activityid = (string)$activityid;
    $activityName = (string)$data['activityName'];
    $activityDescription = (string)$data['activityDescription'];
    $activityPicture = (string)$data['activityPicture'];
    $activityDate = (string)$data['activityDate'];
    $activityTime = (string)$data['activityTime'];
    $json[$activityid] = array("activityid"=>$activityid,"activityName"=>$activityName,"activityDescription"=>$activityDescription,"activityPicture"=>$activityPicture,"activityDate"=>$activityDate,"activityTime"=>$activityTime);
    echo json_encode($json);
  }
?>
