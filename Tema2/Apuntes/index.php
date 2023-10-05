<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Apuntes Tema 2</title>

    <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
        <link rel="stylesheet" href="../../../css/estilos.css">
    </head>

    <body>
        <div class="container-fluid">
            
            <?php
                include("./html/header.php");
            ?>

            <!-- NAV -->
            <nav class="navbar navbar-expand-md navbar-dark bg-dark bg-gradient lg-sticky-top d-flex">

                <div class="navbar row container-fluid d-flex text-center">

                    <ul class="navbar-nav row row-cols">

                        <div class="col-md-3 col-lg">
                            <li class="nav-item">
                                <a class="nav-link navTema" href="../index.php" id="anterior">Tema 2</a>
                            </li>
                        </div>

                        <div class="col-md-3 col-lg">
                            <li class="nav-item">
                                <a class="nav-link navTema" href="28Septiembre.php">28 Septiembre</a>
                            </li>
                        </div>

                        <div class="col-md-3 col-lg">
                            <li class="nav-item">
                                <a class="nav-link navTema" href="3Octubre.php">3 Octubre</a>
                            </li>                      
                        </div>

                        <div class="col-md-3 col-lg">
                            <li class="nav-item">
                                <a class="nav-link navTema" href="MipaginaEntera/oferta.php">Mi Pagina Entera</a>
                            </li>                      
                        </div>

                        <div class="col-md-3 col-lg">
                            <li class="nav-item">
                                <a class="nav-link navTema" href="fechas.php">Fechas</a>
                            </li>                      
                        </div>
                    </ul>
                </div>
            </nav>

            <?php
                include("../../html/footer.html");
            ?>
        </div>
            
            
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>

</html>