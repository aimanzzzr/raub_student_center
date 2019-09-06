<?php
  include('../php/dbconn.php');
  include('../php/checksession.php');
  $sql = "SELECT * FROM admin WHERE adminID = '$adminID'";
  $query = mysqli_query($dbcon,$sql);
  $dataAdmin = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Admin</title>
    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">
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
            <a class="dropdown-item" href="#">Hello,&nbsp;<?php echo $dataAdmin['adminUserName'];?></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item smaller" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-sign-out-alt"></i>&nbsp;Logout</a>
          </div>
        </li>
      </ul>
    </nav>
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav fixed-top">
        <li class="nav-item dropdown active"><a class="nav-link dropdown-toggle" href="#" id="activityDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-sliders-h"></i><span>&nbsp;Activity</span></a>
          <div class="dropdown-menu" aria-labelledby="activityDropdown">
            <a class="dropdown-item smaller" href="activity.php"><i class="fas fa-fw fa-home"></i>&nbsp;Activity Page</a>
            <a class="dropdown-item smaller" href="activity-details.php"><i class="fas fa-fw fa-info-circle"></i>&nbsp;Activity Details</a>
          </div>
        </li>
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="mapDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-map"></i><span>&nbsp;Interactive Map</span></a>
          <div class="dropdown-menu" aria-labelledby="mapDropdown">
            <a class="dropdown-item smaller" href="map.php"><i class="fas fa-fw fa-map-pin"></i>&nbsp;Map Page</a>
            <a class="dropdown-item smaller" href="map-details.php"><i class="fas fa-fw fa-info-circle"></i>&nbsp;Map Details</a>
          </div>
        </li>
      </ul>
      <div id="content-wrapper" class="margin1">
        <div class="container-fluid">
          <!-- Icon Cards-->
          <div class="col-md-12">
            <div class="alert alert-info alert-dismissible fade show">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              This is where all the latest news of UiTM Raub shown
            </div>
          </div>
          <div class=row>
            <div class="col-md-12">
              <!--Slider Activity-->
              <div id="activity-slider" class="carousel slide" data-ride="carousel">
                <!--Indicators-->
                <ul class="carousel-indicators" id="carousel-indicators"></ul>
                <!--The Slideshow-->
                <div class="carousel-inner" id="carousel-inner"></div>
                <!--Left and Right Controls-->
                <a class="carousel-control-prev" href="#activity-slider" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
                <a class="carousel-control-next" href="#activity-slider" data-slide="next"><span class="carousel-control-next-icon"></span></a>
              </div>
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
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.js"></script>
    <script src="../js/admin/activity.js"></script>
  </body
</html>
