<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel - SarahG</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
       
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left" style="padding-left: 50px; padding-right: 50px;">
                    <div class="auth-logo">
                        <a href="#"><img src="images/logo.png" alt="Logo" style="width: 250px; height: 100px; margin-left: -20px;"></a>
                    </div>
                    <h1 class="auth-title" style="font-size: 35px;">Iniciar sesión</h1>
                    

                    
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="usuario" type="text" class="form-control form-control-xl" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="contrasena" type="password" class="form-control form-control-xl" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" onclick="login();">Entrar</button>
                    
                   
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block" style="background-image: url(images/fondo_login.png); background-repeat: no-repet; background-size: cover;">
                    <!-- <div id="auth-right">

                    </div> -->
            </div>
        </div>

    </div>
</body>
<script src="js/moment.js"></script>
<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/bootbox.min.js"></script>
<script type="text/javascript" src="scripts/login.js?v=<?php echo(rand()); ?>"></script>
</html>