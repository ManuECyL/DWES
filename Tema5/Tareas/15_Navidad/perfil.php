<?php
    session_start();

    require('./funciones/conexionBD.php');
    require('./funciones/validaciones.php');
    require('./funciones/logout.php');

    $usuario = $_SESSION['usuario'];

    if (existe('pedidos')) {
        header('Location: ./pedidos.php');
        exit;
        
    } elseif (existe('modificarProductos')) {
        header('Location: ./modificarProductos.php');
        exit;
    
    } elseif (cerrado()) {
        cerrarSesion();
    }
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Perfil</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        <link rel="stylesheet" href="css/estilos.css">

    </head>

    <body>

        <?php

            $errores = array();

            if (existe("guardarCambios") && validarPerfil($errores)) {
                // Actualiza los datos del usuario en la BD
                actualizarUsuario();

                // Actualiza los datos del usuario en la sesión
                $resultado = consultarId('Usuarios', 'id_Usuario', $_SESSION['usuario']['id_Usuario']);

                // Actualiza la sesión
                $_SESSION['usuario'] = $resultado;

                header('Location: ./index.php');
                exit;
                            
            } else {
        ?>

            <!-- HEADER -->
                <?php
                    include_once("./html/header.php");
                ?>
                
            <!-- NAV -->
                <?php
                    include_once("./html/nav.php");
                ?>
            
            <!-- MAIN -->
                <main>

                    <?php
                    // Si por lo que sea la sesion tiene datos (que es un error)
                        if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                        }
                    ?>

                    <div class="container mt-4 text-center">

                        <h3>Información Usuario</h3>

                        <br>

                        <form action="./perfil.php" method="post" name="formularioPerfil" enctype="multipart/form-data" class="formularioPerfil mx-auto">

                            <?php
                                foreach ($usuario as $campo => $valor) {

                                    echo "<label class='form-label lblForm'>" . $campo . ":";

                                        if ($campo == 'id_Usuario' || $campo == 'rol') {
                                            echo "<input type='text' class='form-control mx-auto inputForm' name='" . $campo . "' value='" . $valor . "' size=25px readonly>";

                                        } elseif ($campo == 'fecha_Nacimiento') {
                                            $fechaOriginal = date("d-m-Y", strtotime($valor));
                                            echo "<input type='text' class='form-control mx-auto inputForm' name='" . $campo . "' value='" . $fechaOriginal . "' size=25px>";


                                        } else {
                                            echo "<input type='text' class='form-control mx-auto inputForm' name='" . $campo . "' value='" . $valor . "' size=25px>";
                                        }

                                    echo "</label>";

                                    echo "<span class='error'>";
                                        errores($errores,$campo);
                                    echo "</span>";
                                    
                                    echo "<br>";
                                }

                                echo "<br>";

                                echo '<button type="submit" id="guardarCambios" name="guardarCambios" class="btn btn-dark formu" style="width: 40%;">Guardar Cambios</button>';
                            ?>

                        </form>


                        <br><br>

                    </div>

                </main>

            <?php
                }
            ?>
            

<!-- FOOTER -->
        <?php
            include_once("./html/footer.php");
        ?>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    </body>
</html>