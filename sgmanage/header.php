<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel - SarahG</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="assets/vendors/dripicons/webfont.css">
    <link rel="stylesheet" href="node_modules/dropzone/dist/dropzone.css">

    <script type="text/javascript">
        if (window.history.forward(1) != null) {window.history.forward(1);}
    </script>

    <script src="js/jquery-3.6.1.min.js"></script>
    
</head>

<body>
    
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <img src="../images/logo/logo_st.png" alt="Logo" srcset="" style="width: 110px; height: 80px;">
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item ">
                            <a id="opt_tablero" href="index.php" class='sidebar-link '>
                                <i class="bi bi-grid-fill"></i>
                                <span>Tablero</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a id="opt_cat" href="categorias.php" class='sidebar-link '>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Categorias</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a id="opt_prod" href="productos.php" class='sidebar-link '>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Productos</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a id="opt_prod" href="marcas.php" class='sidebar-link '>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Marcas</span>
                            </a>
                        </li>
                        <li class="sidebar-item  " style="margin-top: 100px; display:flex; justify-content: center; align-items: center;">
                            <a href="ajax/usuario.php?op=salir">Cerrar Sesión</a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <script type="text/javascript" src="scripts/index.js?v=<?php echo(rand()); ?>"></script>
        <script src="js/jquery-3.6.1.min.js"></script>
        <script src="js/bootbox.min.js"></script>