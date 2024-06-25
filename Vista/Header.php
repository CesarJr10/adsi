<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ADSI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="Public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="Public/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="Public/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">

</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <strong class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">ADSI</h3>
                </strong>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="ms-3">
                        <h6 class="mb-0">
                            <?php
                            echo $_SESSION['nombre'];
                            ?>
                        </h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="?controlador=inicio&accion=dashboard" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Inicio</a>
                    <a href="?controlador=usuario&accion=principal" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Usuario</a>
                    <a href="?controlador=libros&accion=principal" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Libros</a>
                    <a href="?controlador=prestamos&accion=principal" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Prestamos</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-none d-lg-inline-flex">
                                <?php
                                    echo $_SESSION['nombre'];
                                ?>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">

                            <a href="?controlador=inicio&accion=cerrarSession" class="dropdown-item">
                                <span>
                                    Log Out
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->