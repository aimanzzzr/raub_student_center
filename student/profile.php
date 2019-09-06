<!DOCTYPE html>
<?php
  include("../php/dbconn.php");
  include("../php/checksession.php");
  $sql = "SELECT * FROM useracc WHERE userID = '$userID'";
  $query = mysqli_query($dbconn,$sql);
  $data = mysqli_fetch_assoc($query);
  mysqli_close($dbconn);
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Student</title>
    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link href='../css/croppie.css'>
  </head>
  <body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top fixed-top">
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
      <a class="navbar-brand mr-1 smaller-1" href="activity.php">RSPROG RAUB CENTER</a>
      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="get" target="_blank" action="https://www.google.com/search">
        <div class="input-group">
          <input type="text" class="form-control smaller" placeholder="Google.." name="q" size="31" onfocus="this.value=''">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Hello,&nbsp;<?php echo $data['userName'];?></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item smaller" href="profile.php"><i class="fas fa-fw fa-user-circle"></i>&nbsp;View Profile</a>
            <a class="dropdown-item smaller" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-sign-out-alt"></i>&nbsp;Logout</a>
          </div>
        </li>
      </ul>
    </nav>
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav fixed-top">
        <li class="nav-item"><a class="nav-link" href="activity.php"><i class="fas fa-fw fa-sliders-h"></i><span>&nbsp;Activity</span></a></li>
        <li class="nav-item"><a class="nav-link" href="map.php"><i class="fas fa-fw fa-map"></i><span>&nbsp;UiTM Interactive Map</span></a></li>
        <li class="nav-item"><a class="nav-link" href="forum.php"><i class="fas fa-fw fa-comments"></i><span>&nbsp;Forum</span></a></li>
        <li class="nav-item"><a class="nav-link" href="todolist.php"><i class="fas fa-fw fa-list"></i><span>&nbsp;To Do List</span></a></li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-link"></i><span>&nbsp;Related Link</span></a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item smaller" href="http://istudent.uitm.edu.my/nsp/home/main.asp" target="_blank"><i class="fas fa-external-link-alt"></i>&nbsp;UiTM Student Portal</a>
            <a class="dropdown-item smaller" href="https://pahang.uitm.edu.my/v3/index.php/pengenalan-krb" target="_blank"><i class="fas fa-external-link-alt"></i>&nbsp;Pahang Website</a>
          </div>
        </li>
      </ul>
      <div id="content-wrapper" class="margin1">
        <div class="container-fluid">
          <!-- Icon Cards-->
          <div class="row">
            <div class="col-md-12" id="notification-section">
              <div class="alert alert-info alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                This is where you can edit and view your profile
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
              <h4><strong>STUDENT USER PROFILE</strong></h4>
            </div>
          </div>
          <div class=row>
            <?php
              $sql = "SELECT * FROM student WHERE studentID = '".$data['studentID']."'";
              $query = mysqli_query($dbcon,$sql);
              $dataStudent = mysqli_fetch_assoc($query);
            ?>
            <div class="col-md-8">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text width100">Matric Number</span>
                </div>
                <input type="text" class="form-control" value="<?php echo $dataStudent['studentNumber']; ?>" readonly>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text width100">Full Name</span>
                </div>
                <input type="text" class="form-control" value="<?php echo $dataStudent['studentName']; ?>" readonly>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text width100">User Name</span>
                </div>
                <input type="text" class="form-control" value="<?php echo $data['userName'];?>" readonly>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text width100">About</span>
                </div>
                <input type="text" class="form-control" id="about" value="<?php echo $data['userBio'] ?>">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text width100">Gender</span>
                </div>
                <input type="text" class="form-control" value="<?php if($dataStudent['studentGender']=='L'){echo "Male";}else{echo "Female";} ?>" readonly>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text width100">Religion</span>
                </div>
                <input type="text" class="form-control" value="<?php echo $dataStudent['studentReligion']; ?>" readonly>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text width100">E-mail</span>
                </div>
                <input type="text" class="form-control" value="<?php echo $dataStudent['studentEmail']; ?>" readonly>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text width100">Interest</span>
                </div>
                <input type="text" class="form-control" id="interest" value="<?php echo $data['userInterest']; ?>">
              </div>
              <input type="submit" class="btn btn-primary btn-md" id="update-profile-button" value="Update User Profile">
            </div>
            <div class="col-md-3 d-flex flex-column justify-content-center align-items-center" style="height:240px;">
              <img src="../images/sources/blank-user-icon.png" class="rounded-circle" style="align:center;" width="150px" height="150px">
              <div class="dropdown-divider"></div>
              <a href="change-profile-picture.php" class="btn btn-info">Change Picture</a>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
        <!-- Sticky Footer -->
        <footer class="sticky-footer static-bottom">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © RSPROG SDN BHD 2018</span>
            </div>
          </div>
        </footer>
      </div>
      <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5><button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
          <div class="modal-footer"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button><a class="btn btn-primary" href="../logout.php">Logout</a></div>
        </div>
      </div>
    </div>
    <!--Upload Profile Picture Modal-->

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src='../js/croppie.js'></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.js"></script>
    <script src="../js/profile.js"></script>
  </body
</html>
