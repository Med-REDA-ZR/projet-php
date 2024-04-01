<?php include("../assets/include/config.php"); ?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MedicApp - Medical & Hospital </title>
    <meta name="keywords" content="MedicApp">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/img/favicon.ico">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/icofont.min.css">
    <link rel="stylesheet" href="../assets/css/simple-line-icons.css">
    <link rel="stylesheet" href="../assets/css/jquery.typeahead.css">
    <link rel="stylesheet" href="../assets/css/datatables.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../assets/css/Chart.min.css">
    <link rel="stylesheet" href="../assets/css/morris.css">
    <link rel="stylesheet" href="../assets/css/leaflet.css">
    <script src="./fullcalendar/lib/main.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Theme CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">


</head>

<body class="vertical-layout boxed">

    <!-- .main-loader -->
    <div class="page-box">
        <div class="app-container">
            <!-- Horizontal navbar -->
            <div id="navbar1" class="app-navbar horizontal">
                <div class="navbar-wrap">
                    
                    
                    <div class="app-actions">
                        <div class="dropdown item">
                            <button class="no-style dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" data-bs-offset="0, 12"><span class="icon "><i
                                        class="fa fa-bell"></i></span> <span
                                    class="badge badge-danger badge-sm">
                                    <?php $today = date('Y-m-d');
                    foreach ($cnx->query("SELECT COUNT(*) AS totalrows FROM appoiments where `date_app`='$today'") as $v) { ?> <?= $v['totalrows']+1 ?><?php   } ?>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-w-280">
                                <div class="menu-header">
                                    <h4 class="h5 menu-title mt-0 mb-0">Notifications</h4><a href="#"
                                        class="text-danger">Clear All</a>
                                </div>
                                <ul class="list">
                                    <?php 
                                        foreach ($cnx->query("SELECT patients.name_pat , appoiments.time_app FROM appoiments INNER JOIN patients on (appoiments.id_pat = patients.id_pat) where `date_app`='$today'") as $data) { 
                                            echo('
                                                <li>
                                                    <a href="#"><span class="icon "><i class="fa fa-envelope"></i></span>
                                                        <div class="content">
                                                            <span class="desc"> Appointment : '. $data["name_pat"].' </span>
                                                            <span class="date">in: '. $data["time_app"] .' </span>
                                                        </div>
                                                    </a>
                                                </li>
                                            ');     
                                        }
                                    ?>
                                    
                               
                                </ul>
                            <div class="menu-footer"><button class="btn btn-primary w-100">all notifications
                                    <span class="btn-icon ms-2 "><i class="fa fa-envelopes-bulk"></i></span></button>
                            </div>
                        </div>

                    </div>
                    <div class="dropdown item">
                        <button class="no-style dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" data-bs-offset="0, 10"><span
                                class="d-flex align-items-center"><img
                                    src="../assets/img/profils/RED.png"
                                    alt="" width="40" height="40" class="rounded-500 me-1"> <i
                                    class="fa fa-angles-down"></i></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-w-180">
                            <ul class="list">
                                <li><a href="./login.php" class="align-items-center"><span class="icon "><i
                                                class="fa-solid fa-right-from-bracket"></i></span> Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="navbar-skeleton horizontal">
                    <div class="left-part d-flex align-items-center"><span
                            class="navbar-button bg animated-bg d-lg-none"></span> <span
                            class="sk-logo bg animated-bg d-none d-lg-block"></span> <span
                            class="search d-none d-md-block bg animated-bg"></span>
                    </div>
                    <div class="right-part d-flex align-items-center">
                        <div class="icon-box"><span class="icon bg animated-bg"></span> <span class="badge"></span>
                        </div>
                        <span class="avatar bg animated-bg"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Horizontal navbar -->
        <!-- Vertical navbar -->
        <div id="navbar2" class="app-navbar vertical">
            <div class="navbar-wrap">
                <button class="no-style navbar-toggle navbar-close  d-lg-none"><i class="fa fa-close"></i></button>
                <div class="app-wrap col-sm-12 d-flex justify-content-center">
                    <div class="logo-wrap ">
                        <img src="../assets/img/logo.png" alt="" width="130" height="33" class="logo-img">
                    </div>
                </div>
                <div class="main-menu">
                    <nav class="main-menu-wrap">
                        <ul class="menu-ul ">
                            <li class="menu-item"><a class="item-link" href="?pages=dashboard"><span
                                        class="link-icon "><i class="fa fa-chart-line"></i></span> <span
                                        class="link-text">Dashboard</span></a></li>
                            <li class="menu-item"><a class="item-link" href="?pages=appointments"><span
                                        class="link-icon"><i class="fa fa-stethoscope"></i></span> <span
                                        class="link-text">Appointments</span></a></li>
                            <li class="menu-item"><a class="item-link" href="?pages=doctors"><span class="link-icon "><i
                                            class="fa-solid fa-user-doctor"></i></span> <span
                                        class="link-text">Doctors</span></a></li>
                            <li class="menu-item"><a class="item-link" href="?pages=departments"><span
                                        class="link-icon"><i class="fa-solid fa-user-nurse"></i></span> <span
                                        class="link-text">Departments</span></a></li>
                            <li class="menu-item"><a class="item-link" href="?pages=patients"><span class="link-icon"><i
                                            class="fa-solid fa-wheelchair"></i></span> <span
                                        class="link-text">Patients</span></a></li>
                            <li class="menu-item"><a class="item-link" href="?pages=stocks"><span class="link-icon "><i
                                            class="fa-solid fa-staff-snake"></i></i></span> <span
                                        class="link-text">Stock-Products</span></a></li>
                            <li class="menu-item"><a class="item-link" href="?pages=payments"><span
                                        class="link-icon "><i class="fa-solid fa-hand-holding-dollar"></i></span> <span
                                        class="link-text">Payments</span></a></li>
                            <li class="menu-item"><a class="item-link" href="?pages=operation"><span
                                        class="link-icon "><i class="fa-solid fa-calendar-days"></i></span> <span
                                        class="link-text">Operation</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- end Vertical navbar -->
        <?php 

    if(isset($_GET["pages"])){
        
        if($_GET["pages"] == "dashboard"){
            include("dashboard.php");
        }

        if($_GET["pages"] == "appointments"){
            include("appointments.php");
        }

        if($_GET["pages"] == "patients"){
            include("patients.php");
        }
        if($_GET["pages"] == "operation"){
            include("operation.php");
        }

        if($_GET["pages"] == "payments"){
            include("payments.php");
        }

        if($_GET["pages"] == "stocks"){
            include("stocks.php");
        }

        if($_GET["pages"] == "departments"){
            include("departments.php");
        }
        if($_GET["pages"] == "doctors"){
            include("doctors.php");
        }
        if($_GET["pages"] == "doctor"){
            include("doctor.php");
        }


    }else{
        
            include("dashboard.php");
        
    }


?>

    </div>
    </div>





    <!-- end Add patients modals -->
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.typeahead.min.js"></script>
    <script src="../assets/js/datatables.min.js"></script>
    <script src="../assets/js/bootstrap-select.min.js"></script>
    <script src="../assets/js/jquery.barrating.min.js"></script>
    <script src="../assets/js/Chart.min.js"></script>
    <script src="../assets/js/raphael-min.js"></script>
    <script src="../assets/js/morris.min.js"></script>
    <script src="../assets/js/echarts.min.js"></script>
    <script src="../assets/js/echarts-gl.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <!-- jQuery select2 -->
</body>

</html>