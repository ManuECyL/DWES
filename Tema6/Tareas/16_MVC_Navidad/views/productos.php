<?php
    require_once('../config/config2.php');

    session_start();

    $_SESSION['vista'] = VIEW . 'productos.php';

      if (existe('iniciarSesion') && !textVacio('user') && !textVacio('pass')) {
        $_SESSION['vista'] = VIEW . 'productos.php';
        $_SESSION['controller'] = CONTROLLER . 'LoginController.php';
    
    } elseif (existe('registrarse')) {
        $_SESSION['vista'] = VIEW . 'registro.php';
        $_SESSION['controller'] = CONTROLLER . 'RegistroController.php';
    
    } elseif (existe('modificarProductos')) {
        $_SESSION['vista'] = VIEW . 'modificarProductos.php';
        $_SESSION['controller'] = CONTROLLER . 'ModificarProductosController.php';
    
    } elseif (existe('comprar')) {
        $_SESSION['vista'] = VIEW . 'carrito.php';
        // $_SESSION['controller'] = CONTROLLER . 'CarritoController.php';
    }
    
    
    if (isset($_SESSION['controller'])) {
        require($_SESSION['controller']);
    }
    
    if (isset($sms)) {
        echo $sms;
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

        <link rel="stylesheet" href= "<?= CSS . 'estilos.css' ?>" >

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
            require_once HTML . 'header.php';
        ?>
          
    <!-- NAV -->
        <?php
            require_once HTML . 'nav.php';
        ?>
    
    <!-- MAIN -->
        <main>
            <?php

                if (!isset($_SESSION['vista']) || $_SESSION['vista'] == VIEW . 'productos.php') {
                    
                    $_SESSION['view'] = VIEW .'productos.php';

                    $productos = ProductoDAO::findAll();

                    if (isset($_SESSION['usuario']) && ($usuario -> rol == 'admin' || $usuario -> rol == 'moderador')) {
                        echo '
    
                            <form action="" method="post" name="formularioGest" enctype="multipart/form-data">

                                <div class="container mt-5 text-center">
            
                                    <button type="submit" class="btn btn-primary" name="modificarProductos" id="modificarProductos">Modificar Producto</button>
                                    
                                </div>

                            </form>
                        ';
        
                        echo '<br>';
                    }
                    
                    echo '
                        <div class="container">

                            <div class="row gx-2 gx-lg-5 row-cols-2 row-cols-lg-3 py-3" style="text-align: center">
                    ';

                                foreach ($productos as $producto) {

                                    echo '
                                        <div class="col-12 col-sm-6 col-xl-4 mb-4">

                                            <div class="card h-80 d-block mx-auto">

                                                <img class="card-img-top productos" src="'. IMGP. $producto -> ruta_Imagen.'" alt="'. IMGP . $producto -> ruta_Imagen.'"/>
                                                
                                                <div class="card-body p-4">

                                                    <div class="text-center">

                                                        <h5 class="fw-bolder mb-3">' . $producto -> titulo . '</h5>

                                                        <div class="d-flex justify-content-center small mb-3">
                                                            <div>' . $producto -> cod_Prod . '</div>
                                                        </div>

                                                        <div class="d-flex justify-content-center small mb-3">
                                                            <div>' . $producto -> compañia . '</div>
                                                        </div>

                                                        <div class="d-flex justify-content-center small mb-3">
                                                            <div style="font-size: 18px"><b>' . $producto -> precio . '€</b></div>
                                                        </div>                                              
            
                                                        <div class="d-flex justify-content-center small mb-0">
                                                            <div>Stock: ' . $producto -> stock . '</div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">

                                                    <form action="" method="post" name="formularioCarrito" enctype="multipart/form-data">
                                    ';
                                                        if (isset($_SESSION['usuario']) ) {
                                    echo '
                                                            <input type="hidden" name="id_Usuario" value="'. $usuario -> id_Usuario .'">
                                                            <input type="hidden" name="cod_Prod" value="'. $producto -> cod_Prod .'">
                                                            <input type="hidden" name="cantidad" value="1">
                                    ';
                                                            echo '<input type="submit" value="Comprar" name="comprar">';

                                                        } else {
                                                            echo '<input type="submit" value="Comprar" name="comprar">';
                                                        }
                                    echo '
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
                
                } else {
                    require $_SESSION['vista'];
                }
    
                // Si por lo que sea la sesion tiene datos (que es un error)
                if (isset($_SESSION['error'])) {
                echo "<span style='color:red'>". $_SESSION['error'] ."</span>";
                }
            ?>
            
        </main>

        <!-- FOOTER -->
        <?php
            require_once HTML . 'footer.php';
        ?>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    </body>
</html>