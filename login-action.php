<?php
  include("php/dbconn.php");
  session_start();
  if(isset($_POST['submit'])){
    //get input from user
    $username = mysqli_real_escape_string($dbconn,$_POST['username']);
    $password = mysqli_real_escape_string($dbconn,$_POST['password']);
    //prepared statement
    $sql = $dbconn->prepare('SELECT * FROM useracc WHERE userName = ?');
    $sql->bind_param('s',$username);
    $sql->execute();
    $result = $sql->get_result();
    if($result->num_rows != 0){
      $data = $result->fetch_assoc();
      if(password_verify($password,$data['userPassword'])){
        $encyptUserID = password_hash($data['userID'],PASSWORD_DEFAULT);
        $sql1 = "UPDATE useracc SET userSession = '$encyptUserID' WHERE userID = '".$data['userID']."'";
        $query = mysqli_query($dbcon,$sql1) or die("Error: ".mysqli_error($dbcon));
        $_SESSION['userSession'] = $encyptUserID;
        $sql->close();
        header("Location:student/activity.php");
      }else{
        $sql->close();
        header("Location:index.html?errid=1");
      }
    }else{
      $sql->close();
      //prepared statement
      $sql = $dbconn->prepare('SELECT * FROM admin WHERE adminUserName = ?');
      $sql->bind_param('s',$username);
      $sql->execute();
      $result = $sql->get_result();
      if($result->num_rows != 0){
        $data = $result->fetch_assoc();
        if(password_verify($password,$data['adminPassword'])){
          $encyptAdminID = password_hash($data['adminID'],PASSWORD_DEFAULT);
          $sql1 = "UPDATE admin SET adminSession = '$encyptAdminID' WHERE adminID = '".$data['adminID']."'";
          $query = mysqli_query($dbcon,$sql1) or die("Error: ".mysqli_error($dbcon));
          $_SESSION['adminSession'] = $encyptAdminID;
          $sql->close();
          header("Location:admin/activity.php");
        }else{
          $sql->close();
          header("Location:index.html?errid=1");
        }
      }else{
        $sql->close();
        header("Location:index.html?errid=2");
      }
    }
  }
?>
