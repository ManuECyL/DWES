<?php
    session_start();

    require('./funciones/conexionBD.php');
    require('./funciones/validaciones.php');
    require('./funciones/logout.php');

    if (!comprobarBD()) {
        crearScript();
    }
    
    if (existe('iniciarSesion') && !textVacio('user') && !textVacio('pass')) {
        
        $usuario = validaUsuario($_REQUEST['user'], $_REQUEST['pass']);

        if ($usuario) {
            
            $_SESSION['usuario'] = $usuario;
            $contraseña = $_REQUEST['pass'];
        
        } else {
            echo "<div class='alert alert-danger text-center'><b>No existe el usuario o la contraseña es incorrecta</b></div>";
        }
    
    } elseif (existe('iniciarSesion') && (textVacio('user') || textVacio('pass'))) {
        echo "<div class='alert alert-danger text-center'><b>Debe rellenar los campos para Iniciar Sesión</b></div>";
    
    } elseif (isset($_SESSION['usuario'])) {

        if (existe('perfil')) {
            header('Location: ./perfil.php');
            exit;
  
        } elseif (existe('comprar')) {
            añadirCarrito();
        
        } elseif (existe('cerrarSesion')) {
            cerrarSesion();
        }
    }
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Productos</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        <link rel="stylesheet" href="css/estilos.css">

        <style>
            #cantidadProd {
                width: 25%;
                margin: 0 auto;
                margin-bottom: 10px;
            }
        </style>

    </head>

    <body>

    <!-- HEADER -->
        <?php              
            if (isset($_SESSION['usuario'])) {
                include_once("./html/header.php");
                
            } else {
                if (existe('registrarse')) {
                    header('Location: ./registro.php');
                    exit;
            
                } elseif (existe('comprar')) {
                    echo "<div class='alert alert-danger text-center'><b>Debe iniciar sesión para comprar</b></div>";
                
                } elseif (existe('carrito')) {
                    echo "<div class='alert alert-danger text-center'><b>Debe iniciar sesión para acceder al carrito</b></div>";
                }

                include_once("./html/header.php");
            }
        ?>
          
    <!-- NAV -->
        <?php
            include_once("./html/nav.php");
        ?>
    
    <!-- MAIN -->
        <main>
            <?php

                $productos = consultar('Productos');

                echo '
                    <div class="container">

                        <div class="row gx-2 gx-lg-5 row-cols-2 row-cols-lg-3 py-3" style="text-align: center">
                ';

                    while (($producto = mysqli_fetch_assoc($productos))) {

                        echo '
                            <div class="col-12 col-sm-6 col-xl-4 mb-4">

                                <div class="card h-80 d-block mx-auto">

                                    <img class="card-img-top productos" src="'.$producto['ruta_Imagen'].'" alt="'.$producto['ruta_Imagen'].'"/>

                                    <div class="card-body p-4">

                                        <div class="text-center">

                                            <h5 class="fw-bolder mb-3">' . $producto['titulo'] . '</h5>

                                            <div class="d-flex justify-content-center small mb-3">
                                                <div>' . $producto['cod_Prod'] . '</div>
                                            </div>

                                            <div class="d-flex justify-content-center small mb-3">
                                                <div>' . $producto['compañia'] . '</div>
                                            </div>

                                            <div class="d-flex justify-content-center small mb-3">
                                                <div style="font-size: 18px"><b>' . $producto['precio'] . '€</b></div>
                                            </div>

                                            <div class="d-flex justify-content-center small mb-0">
                                                <div>Stock: ' . $producto['stock'] . '</div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">

                                        <form action="" method="post" name="formularioCarrito" enctype="multipart/form-data">
                        ';
                                            if (isset($_SESSION['usuario']) ) {
                        echo '
                                                <input type="hidden" name="id_Usuario" value="'.$_SESSION['usuario']['id_Usuario'].'">
                                                <input type="hidden" name="cod_Prod" value="'.$producto['cod_Prod'].'">
                                                <input type="hidden" name="cantidad" value="1">
                        ';
                                            }

                        echo '
                                            <input type="submit" value="Comprar" name="comprar">
                                        </form>    

                                    </div>

                                </div>

                            </div>
                        ';
                    }

                echo '
                        </div>
                    </div>
                ';
            ?>
            
        </main>

        <!-- FOOTER -->
        <?php
            include_once("./html/footer.php");
        ?>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    </body>
</html>