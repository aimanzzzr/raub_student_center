<?php
  include('dbconn.php');
  include('checksession.php');
  if(isset($_POST['addNewTodolist'])){
    //GET USER INPUT
    $todoitem = mysqli_real_escape_string($dbconn,$_POST['todolistinput']);
    //PREPARED STATEMENT
    $sql = $dbconn->prepare("INSERT INTO todolist(todoTitle,userID)VALUES(?,?)");
    $sql->bind_param('ss',$todoitem,$userID);
    $sql->execute();
    $insertedID = $dbconn->insert_id;
    $sql->close();
    echo $insertedID;
  }
  if(isset($_POST['checked']) || isset($_POST['nonchecked']) || isset($_POST['deleted'])){
    //GET USER INPUT
    $todoID = $_POST['todoID'];
    $sql = null;
    if(isset($_POST['checked'])){
      //SQL STATEMENT
      $sql = "UPDATE todolist SET checked = '1' WHERE todoID = '$todoID'";
      $query = mysqli_query($dbcon,$sql);
    }
    if(isset($_POST['nonchecked'])){
      //SQL STATEMENT
      $sql = "UPDATE todolist SET checked = '0' WHERE todoID = '$todoID'";
      $query = mysqli_query($dbcon,$sql);
    }
    if(isset($_POST['deleted'])){
      //SQL STATEMENT
      $sql = "UPDATE todolist SET deleted = '1' WHERE todoID = '$todoID'";
      $query = mysqli_query($dbcon,$sql);
    }
    mysqli_close($dbcon);
  }
  if(isset($_POST['getTodolist'])){
    //GET USER INPUT
    $userID = $_POST['userID'];
    //SQL STATEMENT
    $sql = "SELECT * FROM todolist WHERE userID = '$userID' AND deleted = '0'";
    $query = mysqli_query($dbcon,$sql) or die("Error:".mysqli_error($dbcon));
    $JsonObj = null;
    if(mysqli_num_rows($query)!=0){
      while($data = mysqli_fetch_assoc($query)){
        //JSON SEGMENT
        $todoID = (string)$data['todoID'];
        $todoitem = (string)$data['todoTitle'];
        $checked = (string)$data['checked'];
        $todoArray = array("todoid"=>$todoID,"todoitem"=>$todoitem,"checked"=>$checked);
        $JsonObj[$todoID] = $todoArray;
      }
      echo json_encode($JsonObj);
    }
  }
?>
