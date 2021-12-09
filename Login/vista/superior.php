<?php
// if(!isset($_SESSION)) { 
//     session_start();
// } 
// if (!isset($_SESSION["usuario"])) {
//     header("Location:login.php");
// }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <title>Principal</title>
</head>

<body id="page-top">
    <!-- div página -->
    <div id="wrapper">

        <!-- Barra lateral -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Barra lateral: encabezado -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./vistaUsuario.php">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">Login Carlos</div>
            </a>

            <!-- Divisor -->
            <hr class="sidebar-divider my-0">

            <!-- Elemento de navegación: Panel -->
            <li class="nav-item active">
                <a class="nav-link" href="./vistaUsuario.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Panel de Control</span></a>
            </li>

            <!-- Divisor -->
            <hr class="sidebar-divider">

            <!-- Título Elemento de navegación -->
            <div class="sidebar-heading">
                Interfaz
            </div>

            <!-- Elemento de navegación -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <!-- <i class="fas fa-envelope"></i> -->
                    <span></span>
                </a>
            </li>
            <!-- Elemento de navegación -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <!-- <i class="fas fa-envelope"></i> -->
                    <span></span>
                </a>
            </li>
            <!-- Elemento de navegación -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <!-- <i class="fas fa-envelope"></i> -->
                    <span></span>
                </a>
            </li>

            <!-- Divisor -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Alternador de barra lateral -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- Fin barra lateral -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['sesion-usuario']?></span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="./vistaUsuario.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
</body>

</html>