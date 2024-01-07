<?php
    session_start();

    require('./funciones/conexionBD.php');
    require('./funciones/validaciones.php');

    if (existe('iniciarSesion') && !textVacio('user') && !textVacio('pass')) {
          
        $usuario = validaUsuario($_REQUEST['user'], $_REQUEST['pass']);
        
        if ($usuario) {
          
          $_SESSION['usuario'] = $usuario;
          $contraseña = $_REQUEST['pass'];

          header('Location: ./index.php');
          exit;
              
        } else {
            echo "<div class='alert alert-danger text-center'><b>No existe el usuario o la contraseña es incorrecta</b></div>";
        }

    } elseif (existe('iniciarSesion') && (textVacio('user') || textVacio('pass'))) {
        echo "<div class='alert alert-danger text-center'><b>Debe rellenar los campos para Iniciar Sesión</b></div>";
    }
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Registro</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        <link rel="stylesheet" href="css/estilos.css">
    </head>

    <body>

        <?php

            $errores = array();

            if (existe("crearCuenta") && validarRegistro($errores)) {
                insertarUsuario();
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

            <div class="container mt-5 text-center">

                <h3>Formulario de Registro</h3>

                <br>

                <form action="./registro.php" method="post" name="formularioRegistro" enctype="multipart/form-data" class="formularioRegistro mx-auto">

                    <div class="mb-3">
                        <label for="id_Usuario" class="form-label lblForm">Usuario
                            <input type="text" id="id_Usuario" name="id_Usuario" class="form-control mx-auto inputForm" placeholder="Usuario" value="<?php recuerda('id_Usuario')?>">
                        </label>
                        
                        <span class="error">
                            <?php            
                                errores($errores,'id_Usuario');
                            ?>
                        </span>
                    </div>

                    <div class="mb-3">
                        <label for="contraseña" class="form-label lblForm">Contraseña
                            <input type="password" id="contraseña" name="contraseña" class="form-control mx-auto inputForm" placeholder="8 caracteres, Mayúscula, Minúscula y Número" value="<?php recuerda('contraseña')?>">
                        </label>

                        <span class="error">
                            <?php            
                                errores($errores,'contraseña');
                            ?>
                        </span>
                    </div>

                    <div class="mb-3">
                        <label for="passRepetida" class="form-label lblForm">Repetir Contraseña
                            <input type="password" id="passRepetida" name="passRepetida" class="form-control mx-auto inputForm" placeholder="Repetir contraseña" value="<?php recuerda('passRepetida')?>">
                        </label>

                        <span class="error">
                            <?php            
                                errores($errores,'passRepetida');
                            ?>
                        </span>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label lblForm">Email
                            <input type="text" id="email" name="email" class="form-control mx-auto inputForm" placeholder="prueba@prueba.com" value="<?php recuerda('email')?>">
                        </label>

                        <span class="error">
                            <?php            
                                errores($errores,'email');
                            ?>
                        </span>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_Nacimiento" class="form-label lblForm">Fecha Nacimiento
                            <input type="text" id="fecha_Nacimiento" name="fecha_Nacimiento" class="form-control mx-auto inputForm" placeholder="01-01-2023" value="<?php recuerda('fecha_Nacimiento')?>">
                        </label>

                        <span class="error">
                            <?php            
                                errores($errores,'fecha_Nacimiento');
                            ?>
                        </span>
                    </div>

                    <br>

                    <button type="submit" id="crearCuenta" name="crearCuenta" class="btn btn-dark formu" style="width: 40%;">Crear Cuenta</button>
                </form>
                <br>

            <?php
                }
            ?>
            
            </div>

        </main>

<!-- FOOTER -->
        <?php
            include_once("./html/footer.php");
        ?>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    </body>
</html>