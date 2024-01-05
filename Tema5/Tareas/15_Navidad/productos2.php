<?php
    session_start();

    require('./funciones/conexionBD.php');
    require('./funciones/validaciones.php');

    if (!comprobarBD()) {
        crearScript();
    }
    
    if (existe('iniciarSesion') && !textVacio('user') && !textVacio('pass')) {
        
        $usuario = validaUsuario($_REQUEST['user'], $_REQUEST['pass']);

        if ($usuario) {
            
            $_SESSION['usuario'] = $usuario;
            header('Location: ./homeUser.php');
            exit;
        
        } else {
            echo "<div class='alert alert-danger text-center'><b>No existe el usuario o la contraseña es incorrecta</b></div>";
        }
    
    } elseif (existe('iniciarSesion') && (textVacio('user') || textVacio('pass'))) {
        echo "<div class='alert alert-danger text-center'><b>Debe rellenar los campos para Iniciar Sesión</b></div>";
    } 


    if (existe('registrarse')) {
        header('Location: ./registro.php');
        exit;
    }

    if (existe('perfil')) {
        header('Location: ./perfil.php');
        exit;
    }

    if (cerrado()) {
        cerrarSesion();
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

    </head>

    <body>

    <!-- HEADER -->
        <?php              
            if (isset($_SESSION['usuario'])) {
                include_once("./html/headerUser.php");
                
            } else {
                include_once("./html/headerInicio.php");
            }
            
        ?>
          
    <!-- NAV -->
        <?php
            include_once("./html/navInicio.php");
        ?>
    
    <!-- MAIN -->
        <main>
            <section>

                <div class="container">

                    <div class="row gx-2 gx-lg-5 row-cols-2 row-cols-lg-3 py-3" style="text-align: center">

                        <div class="col-12 col-sm-6 col-xl-4 mb-4">
                            
                            <div class="card h-80 d-block mx-auto">

                                <img class="card-img-top productos" src="imagenes/productos/producto1.jpg" alt="RDR2"/>

                                <div class="card-body p-4">

                                    <div class="text-center">

                                        <h5 class="fw-bolder">Red Dead Redemption 2</h5>

                                        <div class="d-flex justify-content-center small mb-2">
                                          <div style="margin-top: 2px;">Rockstar Games</div>
                                        </div>
                                        
                                        <b>69,99€</b> 
                                    </div>
                                </div>

                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto" href="#">Añadir al carro</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-xl-4 mb-4">

                            <div class="card h-80 d-block mx-auto">

                                <img class="card-img-top productos" src="imagenes/productos/producto2.jpg" alt="TW3WH" />

                                <div class="card-body p-4">
                                    <div class="text-center">

                                        <h5 class="fw-bolder">The Witcher 3: Wild Hunt</h5>

                                        <div class="d-flex justify-content-center small mb-2">
                                            <div style="margin-top: 2px;">CD Projekt</div>
                                        </div>

                                        <b>39,99€</b>
                                    </div>
                                </div>

                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto" href="#">Añadir al carro</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-xl-4 mb-4">

                            <div class="card h-80 d-block mx-auto">

                                <img class="card-img-top productos" src="imagenes/productos/producto3.jpg" alt="GTA5" />

                                <div class="card-body p-4">
                                    <div class="text-center">

                                        <h5 class="fw-bolder">Grand Theft Auto V</h5>

                                        <div class="d-flex justify-content-center small mb-2">
                                          <div style="margin-top: 2px;">Rockstar Games</div>
                                        </div>

                                        <b>19,99€</b>
                                    </div>
                                </div>
 
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto" href="#">Añadir al carro</a>
                                    </div>
                                </div>
                            </div>
                        </div>                                           

                        <div class="col-12 col-sm-6 col-xl-4 mb-4">

                            <div class="card h-80 d-block mx-auto">

                                <img class="card-img-top productos" src="imagenes/productos/producto4.jpg" alt="CODBO2" />

                                <div class="card-body p-4">
                                    <div class="text-center">

                                        <h5 class="fw-bolder">Call of Duty: Black Ops 2</h5>

                                        <div class="d-flex justify-content-center small mb-2">
                                          <div style="margin-top: 2px;">Treyarch</div>
                                        </div>

                                        <b>19,99€</b> 
                                    </div>
                                </div>

                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto" href="#">Añadir al carro</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-xl-4 mb-4">

                            <div class="card h-80 d-block mx-auto">

                                <img class="card-img-top productos" src="imagenes/productos/producto5.jpg" alt="ACB" />

                                <div class="card-body p-4">
                                    <div class="text-center">

                                        <h5 class="fw-bolder">Assassin´s Creed Brotherhood</h5>

                                        <div class="d-flex justify-content-center small mb-2">
                                            <div style="margin-top: 2px;">Ubisoft</div>
                                        </div>

                                        <b>14,99€</b>
                                    </div>
                                </div>

                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto" href="#">Añadir al carro</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-xl-4 mb-4">

                            <div class="card h-80 d-block mx-auto">

                                <img class="card-img-top productos" src="imagenes/productos/producto6.jpg" alt="HL" />

                                <div class="card-body p-4">
                                    <div class="text-center">

                                        <h5 class="fw-bolder">Hogwarts Legacy</h5>

                                        <div class="d-flex justify-content-center small mb-2">
                                          <div style="margin-top: 2px;">Avalanche</div>
                                        </div>

                                        <b>49,99€</b>
                                    </div>
                                </div>
 
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto" href="#">Añadir al carro</a>
                                    </div>
                                </div>
                            </div>
                        </div>  

                    </div>

                </div>

            </section>
            
        </main>

        <!-- FOOTER -->
        <?php
            include_once("./html/footer.php");
        ?>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    </body>
</html>