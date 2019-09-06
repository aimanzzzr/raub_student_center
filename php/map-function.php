<?php
  include("dbconn.php");
  include("checksession.php");
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
