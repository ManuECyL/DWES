<?php
    session_start();

    require('./funciones/conexionBD.php');
    require('./funciones/validaciones.php');
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

<!-- HEADER -->
        <?php
            include_once("./html/headerInicio.php");
        ?>
          
<!-- NAV -->
        <?php
            include_once("./html/navInicio.php");
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

                <form action="./registro.php" method="post" name="formularioRegistro" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="userRegistro" class="form-label lblReg">Usuario</label>
                        <input type="text" id="userRegistro" name="userRegistro" class="form-control mx-auto inputReg">
                    </div>

                    <div class="mb-3">
                        <label for="passRegistro" class="form-label lblReg">Contraseña</label>
                        <input type="password" id="passRegistro" name="passRegistro" class="form-control mx-auto inputReg">
                    </div>

                    <div class="mb-3">
                        <label for="passRepetida" class="form-label lblReg">Repetir Contraseña</label>
                        <input type="password" id="passRepetida" name="passRepetida" class="form-control mx-auto inputReg">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label lblReg">Email</label>
                        <input type="text" id="email" name="email" class="form-control mx-auto inputReg">
                    </div>

                    <div class="mb-3">
                        <label for="fechaN" class="form-label lblReg">Fecha Nacimiento</label>
                        <input type="date" id="fechaN" name="fechaN" class="form-control mx-auto inputReg">
                    </div>

                    <br>

                    <button type="submit" id="crearCuenta" name="crearCuenta" class="btn btn-dark formu" style="width: 40%;">Crear Cuenta</button>
                </form>

                <br>
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