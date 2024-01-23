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

        <title>Alta de Producto</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        <link rel="stylesheet" href="css/estilos.css">
    </head>

    <body>

        <?php

            $errores = array();

            if (existe("crearProducto") && validarAltaProducto($errores)) {
                subirImagen('imagen');
                insertarProducto();
                header('Location: ./productos.php');
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

                <h3>Alta de Producto</h3>

                <br>

                <form action="./altaProducto.php" method="post" name="formularioAltaProducto" enctype="multipart/form-data" class="formularioRegistro mx-auto">

                    <div class="mb-2">
                        <label for="cod_Prod" class="form-label lblForm">Cod_Prod
                            <input type="text" id="cod_Prod" name="cod_Prod" class="form-control mx-auto inputForm" placeholder="cod_Prod" value="<?php recuerda('cod_Prod')?>">
                        </label>
                        
                        <span class="error">
                            <?php            
                                errores($errores,'cod_Prod');
                            ?>
                        </span>
                    </div>

                    <div class="mb-2">
                        <label for="titulo" class="form-label lblForm">Título
                            <input type="text" id="titulo" name="titulo" class="form-control mx-auto inputForm" placeholder="Título" value="<?php recuerda('titulo')?>">
                        </label>

                        <span class="error">
                            <?php            
                                errores($errores,'titulo');
                            ?>
                        </span>
                    </div>

                    <div class="mb-2">
                        <label for="compañia" class="form-label lblForm">Compañía
                            <input type="text" id="compañia" name="compañia" class="form-control mx-auto inputForm" placeholder="Compañia" value="<?php recuerda('compañia')?>">
                        </label>


                        <span class="error">
                            <?php            
                                errores($errores,'compañia');
                            ?>
                        </span>
                    </div>

                    <div class="mb-2">
                        <label for="stock" class="form-label lblForm">Stock
                            <input type="text" id="stock" name="stock" class="form-control mx-auto inputForm" placeholder="Stock" value="<?php recuerda('stock')?>">
                        </label>

                        <span class="error">
                            <?php            
                                errores($errores,'stock');
                            ?>
                        </span>
                    </div>

                    <div class="mb-2">
                        <label for="precio" class="form-label lblForm">Precio
                            <input type="text" id="precio" name="precio" class="form-control mx-auto inputForm" placeholder="00.00" value="<?php recuerda('precio')?>">
                        </label>

                        <span class="error">
                            <?php            
                                errores($errores,'precio');
                            ?>
                        </span>
                    </div>

                    <div class="mb-2">
                        <label for="ruta_Imagen" class="form-label lblForm">Ruta Imagen
                            <input type="text" id="ruta_Imagen" name="ruta_Imagen" class="form-control mx-auto inputForm" placeholder="imagenes/productos/imagen.jpg" value="<?php recuerda('ruta_Imagen')?>">
                        </label>

                        <span class="error">
                            <?php            
                                errores($errores,'ruta_Imagen');
                            ?>
                        </span>
                    </div>

                    <div class="mb-2">
                        <label for="imagen" class="form-label lblForm">Imagen
                            <input type="file" id="imagen" name="imagen" class="form-control mx-auto inputForm">
                        </label>

                        <span class="error">
                            <?php            
                                errores($errores,'imagen');
                            ?>
                        </span>
                    </div>

                    <br>

                    <button type="submit" id="crearProducto" name="crearProducto" class="btn btn-dark formu" style="width: 40%;">Crear Producto</button>
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