<?php
  include('../php/dbconn.php');
  if(isset($_POST['submit'])){
    $studentnum = mysqli_real_escape_string($dbconn,$_POST['studentnumber']);
    $studentname = mysqli_real_escape_string($dbconn,$_POST['studentname']);
    $studentnric = mysqli_real_escape_string($dbconn,$_POST['studentnric']);
    $studentpassword = password_hash($_POST['studentpassword'],PASSWORD_DEFAULT);
    $studentemail = mysqli_real_escape_string($dconn,$_POST['studentemail']);
    $studentphonenum = mysqli_real_escape_string($dbconn,$_POST['studentphonenum']);
    $studentgender = $dbconn,$_POST['studentgender'];
    $studentreligion =$_POST['studentreligion'];
    //PREPARED STATEMENT
    $sql = $dbconn->prepare("INSERT INTO student(studentNumber,studentName,studentNric,studentPassword,studentEmail,studentPhonenum,studentGender,studentReligion)VALUES(?,?,?,?,?,?,?)");
    $sql->bind_param("sssssss",$studentnum,$studentname,$studentnric,$studentpassword,$studentemail,$studentphonenum,$studentgender,$studentreligion);
    $sql->execute();
    $sql->close();
    header("Location:registerStudent.html");
  }
?>
