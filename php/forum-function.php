<?php
  include("dbconn.php");
  include("checksession.php");
  if(isset($_POST['getForum'])){
    $sql = "SELECT * FROM forumparticipant WHERE userID = '$userID' AND participantStatus = '0'";
    $query = mysqli_query($dbcon,$sql);
    $row = mysqli_num_rows($query);
    $jsonobj = null;
    if($row == 0){
      $jsonobj['1'] = array("forumid"=>null);
      echo json_encode($jsonobj);
    }else{
      while($dataParticipant = mysqli_fetch_assoc($query)){
        $sql1 = "SELECT * FROM foruminfo WHERE forumID = '".$dataParticipant['forumID']."'";
        $query1 = mysqli_query($dbcon,$sql1);
        $dataForum = mysqli_fetch_assoc($query1);

        $sql2 = "SELECT messageDescription,messageTime,messageDate FROM forummessage WHERE forumID = '".$dataForum['forumID']."' AND messageTime IN(SELECT MAX(messageTime) FROM forummessage WHERE forumID = '".$dataForum['forumID']."' AND messageDate IN(SELECT MAX(messageDate) FROM forummessage WHERE forumID = '".$dataForum['forumID']."'))";
        $query2 = mysqli_query($dbcon,$sql2);
        $messageRow = mysqli_num_rows($query2);

        if($messageRow == 0){
          $forumArray = array("forumid"=>(string)$dataParticipant['forumID'],"forumname"=>(string)$dataForum['forumName'],"forumdescription"=>(string)$dataForum['forumDescription'],"forumpicture"=>(string)$dataForum['forumPicture'],"message"=>null,"date"=>null,"time"=>null);
          $jsonobj[(string)$dataParticipant['forumID']] = $forumArray;
        }else{
          $dataMessage = mysqli_fetch_assoc($query2);
          $dateFormat = new DateTime($dataMessage['messageDate']);
          $date = $dateFormat->format('d/m/Y');
          $timeFormat = new DateTime($dataMessage['messageTime']);
          $time = $timeFormat->format('H:i a');
          $forumArray = array("forumid"=>(string)$dataParticipant['forumID'],"forumname"=>(string)$dataForum['forumName'],"forumdescription"=>(string)$dataForum['forumDescription'],"forumpicture"=>(string)$dataForum['forumPicture'],"message"=>(string)$dataMessage['messageDescription'],"date"=>(string)$date,"time"=>(string)$time);
          $jsonobj[(string)$dataParticipant['forumID']] = $forumArray;
        }
      }
      echo json_encode($jsonobj);
    }
  }
  if(isset($_POST['getParticipant'])){
    $forumID = $_POST['forumid'];
    $sql = "SELECT userID FROM forumparticipant WHERE forumID = '$forumID' AND participantStatus = '0'";
    $query = mysqli_query($dbcon,$sql);
    $row = mysqli_num_rows($query);
    $jsonobj = null;
    if($row == 0){
      $jsonobj[(string)1] = array("name"=>null);
      echo json_encode($jsonobj);
    }else{
      $participantList = null;
      while($dataParticipant = mysqli_fetch_assoc($query)){
        if($dataParticipant['userID'] != $userID){
          $sql1 = "SELECT userName FROM useracc WHERE userID = '".$dataParticipant['userID']."'";
          $query1 = mysqli_query($dbcon,$sql1);
          $dataUser = mysqli_fetch_assoc($query1);
          $participantList = $participantList.$dataUser['userName'].',';
        }else{
          $participantList = $participantList."You,";
        }
      }
      $jsonobj[(string)1] = array("name"=>(string)$participantList);
      echo json_encode($jsonobj);
    }
  }
  if(isset($_POST['getmessage'])){
    $forumID = $_POST['forumid'];
    $sql = "SELECT * FROM forummessage WHERE forumID = '$forumID'";
    $query = mysqli_query($dbcon,$sql);
    $row = mysqli_num_rows($query);
    $jsonobj = null;
    if($row == 0){
      $jsonobj[(string)1] = array("messageid"=>null);
      echo json_encode($jsonobj);
    }else{
      while($dataMessage = mysqli_fetch_assoc($query)){
        $sql1 = "SELECT userID FROM forumparticipant WHERE participantID = '".$dataMessage['participantID']."'";
        $query1 = mysqli_query($dbcon,$sql1);
        $dataParticipant = mysqli_fetch_assoc($query1);
        $sql2 = "SELECT userName FROM useracc WHERE userID = '".$dataParticipant['userID']."'";
        $query2 = mysqli_query($dbcon,$sql2);
        $dataUser = mysqli_fetch_assoc($query2);
        $messageID = (string)$dataMessage['messageID'];
        $dateFormat = new DateTime($dataMessage['messageDate']);
        $date = (string)$dateFormat->format('d/m/Y');
        $timeFormat = new DateTime($dataMessage['messageTime']);
        $time = (string)$timeFormat->format('H:i a');
        $messageArray = array("messageid"=>$messageID,"messagedescription"=>(string)$dataMessage['messageDescription'],"time"=>$time,"date"=>$date,"username"=>(string)$dataUser['userName']);
        $jsonobj[$messageID] = $messageArray;
      }
      echo json_encode($jsonobj);
    }
  }
  if(isset($_POST['sendmessage'])){
    $input = mysqli_real_escape_string($dbconn,$_POST['input']);
    $forumID = $_POST['forumid'];
    $sql = "SELECT participantID FROM forumparticipant WHERE userID = '$userID'";
    $query = mysqli_query($dbcon,$sql);
    $dataParticipant = mysqli_fetch_assoc($query);
    //prepared statement
    $sql = $dbconn->prepare("INSERT INTO forummessage(messageDescription,forumID,participantID,messageDate,messageTime)VALUES(?,?,?,CURRENT_DATE,CURRENT_TIME)");
    $sql->bind_param("sss",$input,$forumID,$dataParticipant['participantID']);
    $sql->execute();
    $insertedID = $dbconn->insert_id;
    $sql->close();
    $sql = "SELECT * FROM forummessage WHERE messageID = '$insertedID'";
    $query = mysqli_query($dbcon,$sql);
    $dataMessage = mysqli_fetch_assoc($query);
    $dateFormat = new DateTime($dataMessage['messageDate']);
    $date = $dateFormat->format('d/m/Y');
    $timeFormat = new DateTime($dataMessage['messageTime']);
    $time = $timeFormat->format('H:i a');
    $jsonobj[$insertedID] = array("time"=>(string)$time,"date"=>(string)$date);
    echo json_encode($jsonobj);
  }
  if(isset($_POST['creategroup'])){
    $groupname = mysqli_real_escape_string($dbconn,$_POST['groupname']);
    $groupdescription = mysqli_real_escape_string($dbconn,$_POST['groupdescription']);
    //prepared statement
    $sql = $dbconn->prepare("INSERT INTO foruminfo(forumName,forumDescription,forumDate,forumPicture)VALUES(?,?,CURRENT_TIMESTAMP,'../images/sources/blank-user-icon.png')");
    $sql->bind_param("ss",$groupname,$groupdescription);
    $sql->execute();
    $insertedID = $dbconn->insert_id;
    $sql->close();
    $sql = "INSERT INTO forumparticipant(userID,participantDate,forumID,participantStatus)VALUES('$userID',CURRENT_DATE,'$insertedID','0')";
    $query = mysqli_query($dbcon,$sql);
    $insertedParticipantID = mysqli_insert_id($dbcon);
    $sql = "INSERT INTO forumadmin(forumID,participantID)VALUES('$insertedID','$insertedParticipantID')";
    $query = mysqli_query($dbcon,$sql);
  }
  if(isset($_POST['leftgroup'])){
    $forumID = $_POST['forumid'];
    $sql = "UPDATE forumparticipant SET participantStatus = '1' WHERE userID = '$userID' AND forumID = '$forumID'";
    $query = mysqli_query($dbcon,$sql);
  }
  if(isset($_POST['getparticipantlist'])){
    $forumID = $_POST['forumid'];
    $sql = "SELECT * FROM forumparticipant WHERE forumID = '$forumID' AND participantStatus = '0'";
    $query = mysqli_query($dbcon,$sql);
    $jsonobj = null;
    $sql3 = "SELECT * FROM forumparticipant WHERE forumID = '$forumID' AND userID = '$userID'";
    $query3 = mysqli_query($dbcon,$sql3);
    $row3 = mysqli_num_rows($query);
    $adminStatus = '0';
    if($row3 != 0){
      $adminStatus = '1';
    }
    while($dataParticipant = mysqli_fetch_assoc($query)){
      $userid = $dataParticipant['userID'];
      $self = '0';
      if($userID == $userid){
        $self = '1';
      }
      $sql = "SELECT * FROM useracc WHERE userID = '$userid'";
      $query1 = mysqli_query($dbcon,$sql);
      $participantID = $dataParticipant['participantID'];
      $sql = "SELECT * FROM forumadmin WHERE participantID = '$userid'";
      $query2 = mysqli_query($dbcon,$sql);
      $row = mysqli_num_rows($query2);
      $dataUser = mysqli_fetch_assoc($query1);
      if($row == 0){
        $jsonobj[$userID] = array("userid"=>$userID,"username"=>(string)$dataUser['userName'],"userPicture"=>(string)$dataUser['userPicture'],"admin"=>"","adminStatus"=>$adminStatus,"selfStatus"=>$self);
      }else{
        $jsonobj[$userID] = array("userid"=>$userID,"username"=>(string)$dataUser['userName'],"userPicture"=>(string)$dataUser['userPicture'],"admin"=>"Admin","adminStatus"=>$adminStatus,"selfStatus"=>$self);
      }
    }
    echo json_encode($jsonobj);
  }
  if(isset($_POST['updategroupinfo'])){
    $forumID = $_POST['forumid'];
    $groupName = mysqli_real_escape_string($dbcon,$_POST['groupname']);
    $groupDescription = mysqli_real_escape_string($dbcon,$_POST['groupdesc']);
    //PREPARED STATEMENT
    $sql = $dbconn->prepare("UPDATE foruminfo SET forumName = ?,forumDescription = ? WHERE forumID = ?");
    $sql->bind_param("sss",$groupName,$groupDescription,$forumID);
    $sql->execute();
    $sql->close();
  }
  if(isset($_POST['getsearch'])){
    $value = mysqli_real_escape_string($dbconn,$_POST['search']);
    $sql = "SELECT * FROM foruminfo WHERE forumName LIKE '%".$value."%'";
    $query = mysqli_query($dbcon,$sql);
    $row = mysqli_num_rows($query);
    $jsonobj = null;
    while($dataForum = mysqli_fetch_assoc($query)){
      $sql1 = "SELECT * FROM forumparticipant WHERE userID = '$userID' AND forumID = '".$dataForum['forumID']."' AND participantStatus = '0'";
      $query1 = mysqli_query($dbcon,$sql1);
      $row = mysqli_num_rows($query1);
      if($row==0){
        $forumArray = array("forumid"=>(string)$dataForum['forumID'],"forumname"=>(string)$dataForum['forumName'],"joinedstatus"=>"0","forumpicture"=>(string)$dataForum['forumPicture']);
      }else{
        $forumArray = array("forumid"=>(string)$dataForum['forumID'],"forumname"=>(string)$dataForum['forumName'],"joinedstatus"=>"1","forumpicture"=>(string)$dataForum['forumPicture']);
      }
      $forumID = $dataForum['forumID'];
      $jsonobj[$forumID] = $forumArray;
    }
    echo json_encode($jsonobj);
  }
  if(isset($_POST['getForumInfo'])){
    $forumid = $_POST['forumid'];
    $sql = "SELECT * FROM foruminfo WHERE forumID = '$forumid'";
    $query = mysqli_query($dbcon,$sql);
    $jsonobj = null;
    $dataForum = mysqli_fetch_assoc($query);
    $forumArray = array("forumname"=>(string)$dataForum['forumName'],"forumpicsrc"=>(string)$dataForum['forumPicture']);
    $jsonobj['1'] = $forumArray;
    echo json_encode($jsonobj);
  }
  if(isset($_POST['joinGroup'])){
    $forumid = $_POST['forumid'];
    $sql = "SELECT * FROM forumparticipant WHERE userID = '$userID' AND forumID = '$forumID'";
    $query = mysqli_query($dbcon,$sql);
    $row = mysqli_num_rows($query);
    if($row==0){
      $sql = "INSERT INTO forumparticipant(userID,forumID,participantDate,participantStatus)VALUES('$userID','$forumid',CURRENT_TIMESTAMP,'0')";
      $query = mysqli_query($dbcon,$sql);
    }else{
      $sql = "UPDATE forumparticipant SET participantStatus = '0' WHERE userID = '$userID'";
      $query = mysqli_query($dbcon,$sql);
    }
  }
?>
