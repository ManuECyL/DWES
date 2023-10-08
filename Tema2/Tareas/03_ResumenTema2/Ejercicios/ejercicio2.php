<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 03 - Ejecicio 2</title>

    <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
        <link rel="stylesheet" href="../../../../css/estilos.css">

        <style>
            h5 {
                font-weight: bold;
                margin-top: 30px;
                margin-left: 50px;
            }

            p {
                margin-left: 190px;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid">
            
            <?php
                include("../../../../html/header.php");
            ?>

            <!-- NAV -->
            <nav class="navbar navbar-expand-md navbar-dark bg-dark bg-gradient lg-sticky-top d-flex">

                <div class="navbar row container-fluid d-flex text-center">

                    <ul class="navbar-nav row row-cols">

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="../index.php" id="anterior">Tarea 03</a>
                        </li>
                        </div>

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="./ejercicio1.php">Ejercicio 1</a>
                        </li>
                        </div>

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="./ejercicio3.php">Ejercicio 3</a>
                        </li>                      
                        </div>

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="./ejercicio4.php">Ejercicio 4</a>
                        </li>                    
                        </div>              

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="./ejercicio5.php">Ejercicio 5</a>
                        </li>
                        </div>
                    </ul> 
                </div>
            </nav>

            <main>
                <div style="border: 1px black solid; margin: 10px;">
                    
                    <h5>2. Crea una página a la que se le pase por url una variable con el nombre que quieras y muestre el valor de la variable, el tipo, si es numérico o no y si lo es, si es entero o float. (No hace falta usar if)</h5>

                        <br>

                        <p>
                            <?php
                                $valor = $_GET["variable"];
                                echo "<strong>Valor de la variable:</strong> " . $valor . "<br><strong>Tipo:</strong> " . gettype($valor) . "<br><strong>Númerico:</strong> " . is_numeric($valor) . "<br><strong>Entero:</strong> " . is_int($valor) . "<br><strong>Float:</strong> " . is_float($valor);
                                echo "<br><br>";
                            ?>
                        </p>
                </div>
            </main>

            <?php
                include("../../../../html/footer.html");
            ?>

        </div>
    </body>
</html>