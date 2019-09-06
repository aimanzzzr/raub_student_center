<?php
  include("../dbconn.php");
  include("../checksession.php");
  if(isset($_POST['getMapInfo'])){
    $mapID = $_POST['mapID'];
    $sql = "SELECT * FROM map WHERE mapID = '$mapID'";
    $query = mysqli_query($dbcon,$sql);
    $dataMap = mysqli_fetch_assoc($query);
    $jsonobj = null;
    $mapArray = array("buildingname"=>(string)$dataMap['mapName'],"buildingdesc"=>(string)$dataMap['mapDescription']);
    $jsonobj[$mapID] = $mapArray;
    echo json_encode($jsonobj);
  }
  if(isset($_POST['editBuilding'])){
    $mapID = $_POST['mapID'];
    $buildingname = mysqli_real_escape_string($dbcon,$_POST['buildingname']);
    $buildingdesc = mysqli_real_escape_string($dbcon,$_POST['buildingdesc']);
    //prepared statement
    $sql = $dbconn->prepare("UPDATE map SET mapName = ?,mapDescription = ? WHERE mapID = ?");
    $sql->bind_param("sss",$buildingname,$buildingdesc,$mapID);
    $sql->execute();
    $sql->close();
    if(isset($_FILES['buildingpicture'])){
      $buildingpicture = $_FILES['buildingpicture'];
      $sql = "SELECT mapPicture FROM map WHERE mapID = '$mapID'";
      $query = mysqli_query($dbcon,$sql);
      $dataMap = mysqli_fetch_assoc($query);
      $path = "../../images/building/";
      $filext =  end(explode('.',$activityPicture['name']));
      $filename = $buildingname.".".$filext;
      $path = $path.basename($filename);
      $newpath = "../images/building/".basename($filename);
      if(move_uploaded_file($buildingPicture['tmp_name'],$path)){
        $sql = "UPDATE map SET mapPicture = '$newpath' WHERE mapID = '$mapID'";
        $query = mysqli_query($dbconn,$sql);
        unlink("../".$dataMap['mapPicture']);
      }
    }
    header("Location:../../admin/map-details.php");
  }
  if(isset($_POST['getBuildingInfo'])){
    $mapID = $_POST['buildingID'];
    $sql = "SELECT * FROM map WHERE mapID = '$mapID'";
    $query = mysqli_query($dbcon,$sql);
    $dataMap = mysqli_fetch_assoc($query);
    $jsonobj = null;
    $mapArray = array("buildingname"=>(string)$dataMap['mapName'],"buildingdesc"=>(string)$dataMap['mapDescription'],"buildingpicture"=>(string)$dataMap['mapPicture']);
    $jsonobj[$mapID] = $mapArray;
    echo json_encode($jsonobj);
  }
?>
