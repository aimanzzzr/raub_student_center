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
              This is where you can find anything about UiTM Raub Building
            </div>
          </div>
          <div class="row">
            <div class="map col-md-8 mx-auto padding-left">
              <svg class="map-svg" viewBox="0 0 1280 720">
                   <g id="19" class="building">
                     <path id="path4221" d="M721.304 657.01c0 8.49-6.95 15.373-15.522 15.373-1.072 0-3.21-.125-3.681.793l-1.81 3.523c-2.726-1.016-5.108-1.955-4.57-2.246l1.018-4.087c.239-.959-3.271-3.943-3.83-4.76a15.149 15.149 0 0 1-2.651-8.595c0-8.492 6.95-15.375 15.524-15.375 8.573 0 15.522 6.883 15.522 15.374z" display="inline" transform="translate(12.5 -10.938)"/>
                  	 <path transform="matrix(.97677 .21428 -.23875 .97108 12.5 -10.938)" id="rect4225" display="inline" d="M819.476 435.414h14.094v19.807h-14.094z"/>
                  	 <path transform="rotate(20.519 36.464 29.061)" id="rect4227" display="inline" d="M907.201 360.836h17.314v19.403h-17.314z"/>
                   </g>
                   <path class="building" id="25" d="M434.259 527.903l67.723 24.954-13.421 35.26-68.62-23.61z" display="inline" />
                   <path class="building" id="10" d="M457.678 411.456l86.277 31.755-39.56 105.678-86.425-32.203z" display="inline" />
                   <path class="building" id="26" d="M409.818 539.01l16.008 6.27-7.753 20.088-16.008-6.867z" display="inline" />
                   <path class="building" id="bangunanSebelahTunTeja1_bawah" transform="rotate(18.442) skewX(.031)" display="inline"  d="M380.86 348.563h26.576v45.969H380.86z"/>
                   <path class="building" id="13" d="M310.507 405.435l55.315 29.487-10.095 18.642 14.006 7.347 5.648-19.818 55.799 16.6-4.65 17.348-4.055 15.109-4.65 17.496-55.996-16.385-2.69 5.228 50.885 30.764-25.531 44.044-50.328-29.765 9.345-17.384-12.746-8.28-7.224 19.632-40.507-11.414-17.224-4.698 13.983-49.486 55.99 15.1 2.495-5.962-52.032-27.695z" display="inline"/>
                   <path class="building" id="bangunanSebelahTunTeja1_atas" transform="rotate(29.208) skewX(.168)" display="inline"  d="M435.447 201.457H461.2v44.71h-25.753z"/>
                   <path class="building" id="bangunanSebelahTunTeja2_kanan" d="M397.927 305.466l22.298 7.293-5.312 16.8-22.596-5.502z" display="inline" />
                   <path class="building" id="24" d="M402.022 340.83l23.578 6.53-4.249 15.618-23.578-6.53z" display="inline" />
                   <path class="building" id="27" transform="rotate(15.874)" display="inline"  d="M293.55 410.998h37.573v21.53H293.55z"/>
                   <path class="building" id="6" d="M515.062 244.858l69.214 1.963-.178 6.556 6.688-2.4 6.538 1.48 11.464.286 2.658 8.645.568 5.958 1.762 6.556-.477 6.555.27 7.75-.775 3.718-2.567 3.72-.775 5.51-5.104 7.003-7.342-1.504-8.089 1.182-7.701-4.932.06 5.218-68.319-3.307z" display="inline"/>
                   <path class="building" id="7" d="M572.977 165.055l28.17 1.1-1.119 67.586-.383 16.31-4.406-.487-10.22.061.024-3.252-7.382-.044-23.96-.242.457-12.664 16.648-.106z" display="inline" />
                   <path class="building" id="bawahPI" d="M561.601 308.523l34.221.299-.149 13.458-33.69-.448z" display="inline" />
                   <path class="building" id="28" d="M604.605 190.33l13.545.575-.172 17-13.141-.597z" display="inline" />
                   <path class="building" id="3" d="M640.173 177.687l68.974 34.7-10.265 22.815 5.017 2.303 3.225-7.698 19.533 11.973 21.623 12.719-4.05 12.57-2.855 7.494-4.796 10.182-24.2-6.386-22.11-5.341 3.563-10.715-5.53-2.878-10.53 22.047-65.99-26.192z" display="inline"/>
                   <path class="building" id="2" d="M608.339 306.975l18.073-5.803-.435-2.37 55.55-16.084 5.911 22.56 5.205-1.784-3.751-11.634 58.638-4.77 8.04 28.666-52.707 25.978-5.393-14.62-3.92 1.806 7.64 21.486-71.695 26.496-1.693-4.795-1.417-4.243-1.417-4.242-1.417-4.243-1.417-4.243-1.417-4.242-1.417-4.243-.82-3.645 4.255-.96-1.278-6.1-2.91.832-3.346-13.877-2.932-11.612-2.878 1.31z" display="inline"/>
                   <path class="building" id="bangunanSampahDepo" d="M591.75 110.74l22.236.298-.69 18.139-21.248.138z" display="inline" />
                   <path class="building" id="sebelahSampah" d="M521.336 111.584l68.55.299.15 16.14-68.7-.448z" display="inline" />
                   <path class="building" id="18" d="M538.011 41.788l52.174.299V69.79h-52.472z" display="inline" />
                   <path class="building" id="bangunanBas" d="M594.643 42.411h35.586v28.733l-35.586-.597z" display="inline" />
                   <path class="building" id="kiriDepo" display="inline"  d="M631.408 35.384h25.963v33.562h-25.963z"/>
                   <path class="building" id="16" d="M658.168 38.164l81.834.895v15.554l-2.561-.056.235 19.84-73.34-.716.125-17.967-6.442-.056z" display="inline"/>
                   <path class="building" id="bangunanGas" d="M812.108 55.764l19.081.423 2.717 2.887 15.939 1.252.207-12.434 4.754.101.127-2.287 31.448 1.096-.994 61.726-73.553-1.717z" display="inline" />
                   <path class="building" id="1" d="M917.155 215.58l96.663 4.126-5.382 162.063-96.874-3.317.594-12.84 1.227-44.29-37.401-16.216.382-14.95.593-10.94 38.8-14.316 1.015-34.37z" display="inline"/>
                   <path class="building" id="bangunanStorBawahHea" transform="rotate(39.806)" display="inline" d="M1020.862-324.185h14.354v16.464h-14.354z"/>
                   <path class="building" id="8" d="M13.858 211.25l.64-24.838 120.954-42.417 69.175 201.66-128.625 44.99z" display="inline" />
                   <path class="building" id="23" transform="rotate(-17.983)" display="inline" d="M217.984 241.26827.463v45.374h-27.463z"/>
                   <path class="building" id="22" transform="rotate(-20.122)" display="inline" d="M98.232 197.364h31.046v63.285H98.232z"/>
                   <path class="building" id="12" transform="rotate(-20.122)" display="inline" d="M136.151 230.968h31.046v63.285h-31.046z"/>
                   <path class="building" id="21" transform="rotate(-18.879)" display="inline" d="M174.37 251.477h19.105v34.628H174.37z"/>
                   <path class="building" id="15" transform="rotate(-18.409)" display="inline" d="M246.539 231.627h38.807v65.972h-38.807z"/>
                   <path class="building" id="9" d="M390.953 356.79l31.969 7.953-6.028 19.731 10.197 7.23-1.892 6.932-2.19 8.722-12.143 1.325-6.178 24.359-31.92-8.336z" display="inline"/>
                   <path class="building" id="rumahLecturer" d="M276.956 257.698l50.24 27.492-18.64 37.914-53.9-24.824z" display="inline"/>
                   <path class="building" id="17" d="M543.118 481.651l54.775 26.813-10.745 19.807 18.461 6.461 4.995-20.414 59.057 14.34-12.343 51.63-59.458-14.54-2.938 6.37 55.243 28.866-25.34 46.968-52.965-28.942 10.88-19.792-18.92-8.701-6.154 24.501-58.651-14.842 12.774-50.763 58.145 13.678 2.297-7.096-52.49-26.819z" display="inline"/>
                   <path class="building" id="14" d="M343.294 423.397l-50.13-29.756 8.985-16.522-16.59-8.156-4.507 19.069-58.022-15.37 13.18-49.104 57.616 16.043 7.322-18.434 8.153 3.098 6.362-14.216 12.724 3.21 7.281-19.522 34.834 9.706 20.33 5.718-14.117 48.954-57.876-15.655-.539 6.327 50.381 30.443z" display="inline"/>
                   <path class="building" id="5" d="M783.204 349.614l123.498 3.68-1.99 51.255-122.97-6.74-.136-14.45 1.62-1.79-7.033-8.754 9.114-8.228-2.706-.628z" display="inline"/>
                   <g class="building" id="11">
                     <path id="rect4231" d="M755.659 573.9l32.662 10.174-4.67 12.966-9.447 27.742-2.582-.317-4.372 11.473-24.752-9.428 1.998-5.452-2.927-.677 3.996-11.203-2.904-1.361 8.44-21.064z" display="inline" transform="translate(12.5 -10.938)"/>
                     <path id="rect5123" d="M799.471 617.427l11.046 1.492-2.986 23.881-15.672-3.432z" display="inline" transform="translate(12.5 -10.938)"/>
                   </g>
                   <path class="building" id="4" d="M788.005 167.332l126.302 4.592.165 65.443-129.287-5.787z" display="inline"/>
                   <ellipse class="building" id="20" cx="782.096" cy="63.669" rx="20.564" ry="20.897" display="inline"/>
                   <g id="line-sekeliling-uitm">
                     <text xml:space="preserve" style="line-height:125%" x="262.164" y="506.385" id="text4249" font-style="normal" font-weight="400" font-size="40" font-family="sans-serif" letter-spacing="0" word-spacing="0" fill="#000" fill-opacity="1" stroke="none" transform="translate(14.957 -10.877)"/>
                     <path d="M785.646 719.261l2.85-10.765 29.763-38.839 5.066-25.963 15.409-9.499 2.11-15.514-8.977-10.923-3.582 2.389-7.165-11.941 1.791-11.344-3.582-60.897-5.97-26.269 1.791-14.926 8.359-15.522 13.134-9.553 11.94-3.582 24.479-3.582 3.582 21.493 8.359 5.97 19.104-4.776 39.404-17.911 32.24-19.105-28.657-22.687-1.194-4.776 10.746-12.538 4.776 4.776 25.076-2.388 6.592-7.33m5.374-163.1l-1.22-30.769-22.687-34.627-27.463-21.493-32.24-13.732-34.926-75.524s-19.666-1.213-25.262-1.143c-5.596.07-25.408-1.535-35.834-1.475-10.425.06-41.86-2.225-56.346-2.252-14.487-.027-20.258-1.173-38.04-1.366-17.78-.194-26.68-.894-46.982-1.56l-47.712-1.567-63.66.091-63.375-1.653-1.583 88.7-9.208 8.686-30.923 24.802-10.936 22.173-5.672 15.821-30.15 1.194-31.941-18.508-27.464 7.762-21.493-58.21-56.717 20.298-18.21 5.373-22.687-.597-13.732-3.582-32.24-11.045-13.73-5.373-57.017 2.985L.529 186.058" id="path4174" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M-.063 230.101l55.789 160.611-33.773-21.952-22.205 27.65" id="path4176" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M-.126 458.259l44.031 21.108 10.132-13.51 15.198 8.444-10.132 21.952 101.32 31.24v17.731l4.22 9.288h20.265l-8.444 33.773-10.132 13.51-5.91 5.91-162.955-32.93" id="path4178" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M-2.533 590.818l7.705 2.032 7.704 2.031 7.704 2.032 7.705 2.032 7.704 2.031 7.705 2.032 7.704 2.032 7.705 2.031 7.704 2.032 7.705 2.032 7.704 2.031 7.705 2.032 7.704 2.032 7.705 2.031 7.704 2.032 7.705 2.032 7.704 2.031 7.705 2.032 7.704 2.032 7.705 2.031 7.704 2.032 7.705 2.032 7.704 2.031 7.705 2.032 7.704 2.031 7.705 2.032 7.704 2.032 7.705 2.031 7.704 2.032 7.705 2.032 7.704 2.031 7.705 2.032 7.704 2.032 7.705 2.031 7.704 2.032 7.704 2.032 7.705 2.031 7.704 2.032 7.705 2.032 7.704 2.031 7.705 2.032 7.704 2.032 7.705 2.031 7.704 2.032 7.705 2.032 7.704 2.031 7.705 2.032 7.704 2.032 7.705 2.031 7.704 2.032 7.705 2.032 7.704 2.031 7.705 2.032 7.704 2.032 7.705 2.031 7.704 2.032 7.705 2.032 7.704 2.031 7.705 2.032 7.704 2.032 7.705 2.031 7.704 2.032 7.705 2.032 7.704 2.031" id="path4180" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M555.567 719.156l-357.994-98.787-2.533-16.886 23.64-86.122 81.056 38.84 30.396 18.575 27.863 5.91 119.894 40.528 70.924 25.33 112.295 37.994 32.085-89.498 28.707 5.066-1.689 23.64-.211 6.544 33.984 11.399v3.8l-19.842 51.925-62.269-21.952 21.109-80.211" id="path4182" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M721.689 599.472l30.607-132.981-8.022-3.272.106-10.66-86.755-19.841-2.85 8.02-2.532-2.216-.58-5.066 2.163-7.598 1.689-1.69 7.018.95-1.32 3.959 84.75 13.773 8.865 2.955 14.354 10.554 9.077 9.499 9.076 10.554 6.333 13.931 7.176 23.641 1.689 26.174.422 22.375v5.488l-3.377 2.533-3.8.844-2.11-1.688-.845-44.75-10.976-41.372-10.554.495-2.966-8.32-13.309 5.216 1.463 5.735-9.885 3.207-1.688 9.287 2.955-.844 9.287 32.507-6.754 1.266v2.955h-3.378v35.04l3.378.422v3.8l4.273-.124 13.268.262 12.439 6.797 6.238 3.552-14.715 46.783-2.179 9.515-4.268 18.769.21 9.664 2 22.202-.452 5.372-8.793 21.799" id="path4184" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M621.414 135.807l5.97-.597 2.388 7.164 205.976-3.88 49.255 3.88 33.135 18.508L937.84 177.3l22.985 21.195-1.194 6.567-4.179 1.194-7.164-2.388-18.21-17.314-28.657-19.403-17.015-7.762-28.658-5.671-109.555-4.18-81.793-.597-39.404.896z" id="path4186" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M600.518 122.97l5.672 7.165-2.388 12.538-6.568 6.567-51.941.298-23.284 9.553-5.91-8.098-7.75-9.58 91.572-.532z" id="path4188" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M508.575 141.33l-7.335-9.553-8.828 8.358 15.778 1.343" id="path4190" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M504.098 153.718l5.672 9.552-15.523 14.926L483.5 195.51l-11.94 30.448-8.359 29.553-1.79 11.642-2.986 5.373-8.358 1.791h-23.882l-.597-5.97 2.388-1.79h19.702l4.18-.598 1.194-4.776 1.194-8.956 4.776.597 11.94-39.404 9.852-22.09 11.343-18.508 11.94-10.149-4.178-6.567z" id="path4192" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M381.408 185.36l-3.582 10.747-4.18.597-7.164-1.194-7.164 4.179-13.732 24.478-4.776-2.985 7.165-10.747-.597-4.179-30.449 11.344.597 3.582 22.09 9.85 17.612 9.553 22.09 14.329 14.33 5.373 14.925 3.582.597 7.165-14.627-.597-12.538-5.075-19.105-11.94-28.956-14.926-23.88-5.97-31.345 2.388-23.284 8.358-25.672 20.896-18.21 28.956-24.478-11.94-4.776-9.553 7.463-2.09-15.822-43.881-19.104 7.462 17.313 53.136 5.374 8.956 16.716 12.537 2.389 1.493 3.582-5.374 3.283-.597 3.284 2.687 1.791 3.582-1.79 5.373-4.777 7.762-2.388 13.732-2.388 9.254-1.791 13.134 1.194 11.344 4.776 14.925 5.97 12.837 2.985 20.597 2.388 22.687v27.464l-2.985 6.567-17.91-4.478-1.792-49.852-.895-7.463-14.628-32.24-60.897 25.375-25.075 75.524 44.777 12.537 10.747-30.15 59.106 19.105-.597 1.791L162 472.233l-4.18 14.328 19.703 4.777.597-3.582 25.97 7.164-11.94 41.195-31.941-8.358" id="path4194" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M835.25 51.926l-.421 18.997-14.143-1.055-2.955-2.955-18.997-.422.21-16.042" id="path4196" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M738.153 48.338l-1.266 72.4 43.271.634v4.222l-44.327-.845-2.533-3.377 1.478-73.456" id="path4198" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M660.264 170.343v6.755l77.467.21 8.865 3.378 4.222 4.644 2.955 5.91-.844 10.132-8.866 35.462-8.443 3.8-11.82 2.954-5.278-2.744-2.11-.422-6.333 12.243 20.264 11.398 2.955-6.754 9.71-7.6 4.855-5.276 13.509-66.069-4.644-7.177z" id="path4200" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M526.755 232.929c1.08 1.835 2.684 3.476 4.327 3.06 4.613-.21 4.857-.633 5.91-.844 1.995-.749 2.92-2.567 3.8-4.433l1.688-19.63c-.424-.913-.73-1.945-1.688-2.322-.845-.167-2.322 1.1-3.167 1.477-1.045 3.277-11.659 19.666-10.87 22.692z" id="path4202" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M556.834 257.008l.633-21.019-5.91 1.69-1.478 5.91-10.132.105-3.166 3.694-3.377 2.11h-8.233l-8.865-2.532c-10.154-14.77-27.31-2.298-13.193-26.491l4.011-9.024 4.01-7.018 5.489-6.808 4.327-5.33 5.277-4.01 7.599 7.599 1.055-1.267.95-12.348-1.794-4.116-3.747.158-7.124 4.17-5.857 4.801-3.958 5.014-5.963 8.64-6.174 11.808-4.908 10.224-4.644 11.992-3.535 13.378-2.533 11.187-.845 3.377-.844 8.021v10.132l-.211 10.977.37 14.3-.053 9.024 1.266 5.805 2.005 4.75 1.583 4.115 5.91 8.971 2.534 3.589h5.277l1.688-3.8-1.055-1.477-2.11-.211-6.122-10.132-3.272-7.177-1.16-5.277-.199-14.644-.092-17.177.33-13.588 2.018-12.533 7.942-.317z" id="path4204" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M498.364 315.99l2.11-59.948" id="path4206" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M591.539 175.991l-.721 24.326 29.762 1.055-23.59 66.156 59.933 23.889-55.284-4.237-.333-2.865-1.426-4.448-.83-7.433-3.516-8.925-8.143-.567.069-7.762.789-79.102-35.673-1.605-1.045-2.047 1.343-2.047 88.094-.21 2.687 2.095-2.09 3.29z" id="path4212" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M601.227 299.293l43.007.997-33.006 9.513.698 2.387-18.648 5.91.943 6.348 3.177-1.056 6.507 25.315 2.955-.844.844 5.066-15.59 4.047 1.19-39.02 3.846-4.815.273-5.39 3.156-4.614z" id="path4214" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M614.67 414.565l22.586 6.121 3.8 4.222-2.956 6.754-10.554-2.955 2.111-7.599-17.309-4.644z" id="path4216" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M569.018 404.722l-2.494 7.572-42.414-17.797-3.181 8.772-11.019-5.006 4.943-15.162 14.79 7.084 14.603 5.703 14.006 5.405z" id="path4218" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M496 372.203l8.67 6.275-20.7 58.229-37.626-13.7 20.78-18.574 20.765-24.38z" id="path4220" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M455.726 402.322l-17.52 19.208-9.72 3.749-13.482.1-5.166-6.33 4.69-20.068 2.235-.196 1.143 1.091-2.736 11.263 3.395 2.237 4.29 1.492 7.724 1.94 11.156.968 6.082-6.643-2.874-3.732 6.081-4.18 3.992-2.091z" id="path4222" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M403.8 333.931l-1.795 5.277 2.533 4.855 4.433 9.182 2.744 6.016 2.216 4.01 2.111 5.172 1.689 4.327.528 3.167-1.396 11.784-.94 1.518-4.743 2.502-4.52 5.263-2.28-1.901 6.215-19.923-34.236-8.742-3.807 13.327-21.526-5.689 10.16-2.112 6.087-2.122 16.896-53.22 22.797 7.6z" id="path4224" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M258.997 264.063l4.855-1.055 5.91 4.644 24.908-7.388-.422-6.333 12.454-2.322 12.665 2.533 2.533 5.066-4.222 6.755-2.955 2.533-7.177-.844-3.377-4.644-6.755-.422-9.498 3.588-6.755 4.644-2.955 5.488z" id="path4226" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M345.963 267.652l-4.222-2.955-4.221-.634h-2.111l-2.639 4.01-1.16 3.484 1.055 3.905 2.533-5.7 31.24 17.942 4.01 2.111-.633 5.066 11.82 3.378 20.265 5.382 5.277-2.427.844-3.589-1.689-3.271-13.087-2.006-8.97-3.483-6.333-2.533-12.665-6.754-8.76-5.383c-.24.234-3.487-2.629-4.644-3.166-1.353-.629-5.91-3.377-5.91-3.377z" id="path4228" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M425.963 293.193l-4.222 10.976 9.288 4.222 19.842 1.688 12.665 33.773 11.82 17.731 10.132-.844-14.353-22.797-10.977-34.617-3.377-9.288z" id="path4230" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M221.636 506.807l8.021-46.438v-16.886l-2.533-17.731-2.533-16.887v-7.599l2.533-5.91 2.533 5.066 2.533 6.755 1.689 18.575.844 13.51 6.755 1.688 2.947-1.68 12.665 7.6-3.792 10.122 49.393 28.285v5.066l-42.634-10.129 2.745-10.135-26.6-9.29z" id="path4164" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M830.392 360.85l65.198 1.605.851-28.758-12.86-5.566-7.534 11.86-2.388 2.985-5.97 1.791-5.97 2.388-8.359 2.388h-3.582l-8.956 1.791-6.567 1.791-2.985.299z" id="path4166" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M831.78 247.855l13.025 1.86 6.815 1.967 10.053 1.019 27.69 1.441-.778 25.898 7.761-2.737.896-27.726z" id="path4168" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M756.343 266.556l60.686-.105.28-6.987 5.536.508 5.326.825 5.641 1.141 5.326 1.247 5.325.72 5.114.93 5.536 1.563 5.325 1.774-1.225-3.092-3.073-2.037-3.653-1.825-4.603-2.09-6.696-1.547-6.587-1.141-6.599-.457-5.912-.404-6.124.018-7.6-.193-7.189-.053-8.27.051s-6.652.082-9.327.474c-2.202.322-4.641.708-7.374 1.224-2.734.517-4.97 1.217-4.97 1.217l-4 1.703-4.37 2.179-3.63 2.337z" id="path4170" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M812.165 341.483l1.194 6.568-12.24 1.79-10.149-.596-7.164-1.194-14.627-3.881-8.359-5.075-4.179-4.179 11.94 5.373 8.956 1.194 13.732 1.194 10.15.597z" id="path4172" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M756.992 266.081l-4.533 3.533-1.21 2.002-2.07 7.478-2.09 49.255 9.552 6.567" id="path4175" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M859.33 267.452s3.673 1.841 5.374 2.985c1.906 1.282 3.665 2.78 5.373 4.318 1.718 1.546 3.451 3.108 4.885 4.92 1.154 1.46 2.949 4.74 2.949 4.74m-.07 39.151l-4.019 6.185-7.186 6.184-7.903 4.354-12.537 2.985-17.911 2.986-14.926 1.79" id="path4177" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M817.38 266.4l14.785 3.44 15.523 5.373 7.165 5.373 7.972 9.028m-.386 27.421l-2.106 6.501-3.795 4.813-15.417 7.164-28.06 8.358" id="path4179" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M752.163 354.916l16.717 5.075-.671 17.169-7.004 6.192 6.083 8.514.172 17.802 124.646 6.673.908-24.584 37.661.772-35.821 25.076-15.847 7.21-16.692 3.835-11.269 1.34-12.113.075-13.274-.558-20.029-1.931-30.197-11.093-10.732-8.73z" id="path4181" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M936.049 418.5l7.164 8.956-15.523 10.15-17.314 10.149-28.657 10.15 1.791-8.36 27.463-12.537z" id="path4183" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M928.586 511.935l-26.27 13.732-15.522 21.493-4.777 34.03-5.671 48.659-2.389 44.777 6.568 6.866 14.926 5.97 37.015 5.672 11.344-4.18 1.791-5.373-14.329-17.314-7.164-17.91 2.985-19.703 17.314-13.731 1.791-24.478 4.18-14.33 5.373-9.552 8.358-14.328 13.135-9.553 11.94-10.15H1026.2l13.732.896h30.747l29.851-.298 26.867 1.194 48.06-7.463 26.27-8.955 46.867-5.672 4.776-10.15-6.866-14.328-19.404-16.12-22.09 4.179-13.134-4.18-16.419 2.986-5.97 8.955-11.343 11.94-3.583 12.539-7.164 7.76-8.657 11.046-29.254 1.194-19.105-8.358-13.135-12.538-19.105-.597-12.836-5.075-69.852-2.686-32.539 5.373z" id="path4185" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M427.018 232.19l6.333.633-1.689 16.465h-2.11l-2.534-2.111z" id="path4187" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M360.739 210.66l4.644-1.689 2.11.844-9.92 14.565-1.69-2.955z" id="path4189" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M258.997 264.063l-17.942 16.887-22.374 40.105-2.322 6.966 53.192 14.565 5.489-12.665-35.673-19.209 23.43-44.327z" id="path4191" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M368.677 398.94l-14.764 48.177-23.236-12.798 3.986-3.603 11.405 2.194z" id="path4193" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M526.09 469.446l9.135 3.771-3.644 6.183 6.99 4.524-5.476 9.484-4.788-1.683-2.334 5.182-6.905-1.563-8.776 14.346z" id="path4195" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M608.854 514.487l7.735 2.993-.68 4.172 45.644 17.232-3.919 2.746-3.999 11.02 2.813-13.702-36.167-8.946-.81-4.127-13.678-4.934z" id="path4197" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M547.366 615.13l13.932 5.277 5.488-9.92-16.464-7.6z" id="path4199" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M536.19 495.216l49.047 19.87 1.467-2.75 1.886.327-9.847 18.686 5.875-12.25z" id="path4201" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M606.04 364.17l-15.97 4.18-.299 12.537 19.404 5.374 3.88-2.687-7.164-20" id="path4203" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M575.89 365.962l4.628.746 1.343-32.389-34.33-.746-.298-12.836-30.204-1.406.966 4.046 25.118 1.056-.036 10.364 33.86 3.382.285 10.038-.611 10.933-.91 10.337-1.806 7.351 1.834 4.186 14.456 4.571 47.282 13.56 6.729 1.55 4.247-2.605v-2.955l-4.221-2.533-26.386-4.644 115.04-42.638 12.665 55.725v4.222l-2.533 1.267-4.644.422h-5.066l-14.776-2.744-12.242-2.111-13.298-2.533-15.198-2.111-2.744.633.422-6.332-8.444 2.955-3.377 2.955-.844 6.755 5.066 1.266 9.287 2.955 12.243 1.267 20.686 4.644 23.22 3.377 19.63-3.59.97-14.172-4.348-14.322-4.643-13.51-2.111-12.242-1.689-11.821-2.322-17.942v-27.23l2.955-36.095 7.177-24.907" id="path4205" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M505.143 350.439l2.388-4.926 4.776-2.985 5.373-.597 4.478 1.642 3.88 2.388 2.389 4.478 8.06 3.582 30.747 9.254-4.627 12.836-3.583.896-17.015-3.732-12.687-4.776-15.97-8.508z" id="path4207" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M580.724 441.514l-6.669 17.317 2.222.314 3.837-3.308 3.712-10.726-1.376-3.02z" id="path4209" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M719.327 473.576l-4.478 21.195 2.687.298 2.686-.597.896-2.687 2.687-14.328-.896-1.791z" id="path4211" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M710.073 509.547l-4.478 19.404h2.687l4.328-2.09 1.194-6.269 1.194-5.075v-3.88z" id="path4213" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M702.909 546.264l-4.18 19.702 4.478-.895 1.194-4.478 2.388-8.955-.597-3.881z" id="path4215" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M780.58 123.905l8.022.211.633-73.456" id="path4450" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path d="M0 189.763V17.695h1255.252v702.179L0 720z" id="path4603" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(14.957 -10.877)"/>
                     <path id="path3955" d="M580.966 365.847l-.6 11.386-11.984 35.355 50.037 13.184-36.423 114.937 9.494 3.343 38.015-114.984" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(13.262 -10.877)"/>
                     <path id="path3957" d="M613.854 416.437l-32.289-8.942 7.191-22.771" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(13.262 -10.877)"/>
                     <path id="path3959" d="M580.26 366.629l-12.83-3.778" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(13.262 -10.877)"/>
                     <path id="path3961" d="M580.367 377.233l-44.943-12.584-10.787-4.794 2.397-8.989-8.39-5.093-12.583 34.157-20.075 56.928 10.74 4.241 31.207-90.532" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(13.262 -10.877)"/>
                     <path id="path3928" d="M731.356 298.142l.417-6.175 10.787-28.763 28.164-22.772" display="inline" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(13.262 -10.877)"/>
                     <path id="path3930" d="M771.923 229.047l-8.989 4.194-24.83 21.99" display="inline" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(13.262 -10.877)"/>
                     <path id="path3932" d="M771.024 240.432l.599-11.385" display="inline" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(13.262 -10.877)"/>
                     <path id="path3934" d="M676.21 290.841l35.296 1.126c-1.918-.48-23.38-5.739-33.57-8.286z" display="inline" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(13.262 -10.877)"/>
                     <path id="path3936" d="M676.044 269.402l4.528 4.46-8.723 32.487-2.397-12.907-7.144 1.938 2.598-4.26z" display="inline" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(13.262 -10.877)"/>
                     <path id="path3938" d="M727.625 334.537l8.39-4.012 20.327 15.074 27.266 9.289.6 4.794h-16.18l-15.88-5.993-16.18-9.588z" display="inline" fill="none" fill-rule="evenodd" stroke="#000" transform="translate(13.262 -10.877)"/>
                   </g>
              </svg>
            </div>
            <div class="col-md-4 padding-right">
              <ul class="list-group">
                <li class="list-group-item list-group-item-dark d-flex justify-content-between align-items-center rounded-0">Location Info</li>
                <li class="list-group-item list-group-item-light rounded-0" style="height:410px;">
                  <div id="clicked-building">
                     <a href="" id="buildingPicture-link" target="_blank"><img src="" id="buildingPicture" width="300" height="240"></a>
                    <div class="d-flex flex-column">Building Information
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend"><button class="btn btn-outline-secondary" type="button">Name</button></div>
                        <input type="text" class="form-control" placeholder="Building Name" id="buildingName">
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
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
    <script src="../js/admin/map.js" charset="utf-8"></script>
  </body
</html>
