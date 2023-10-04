<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Servidor de Manu</title>

    <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
        <link rel="stylesheet" href="css/estilos.css">
    </head>

    <body>
        <div class="container-fluid">

        <?php
                include("./html/header.html");
        ?>

        <!-- NAV -->
            <nav class="navbar navbar-expand-md navbar-dark bg-dark bg-gradient lg-sticky-top d-flex">

                <div class="navbar row container-fluid d-flex text-center">

                    <ul class="navbar-nav row row-cols">

                        <div class="col-md-3 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="Tema1">Tema 1</a>
                        </li>
                        </div>

                        <div class="col-md-3 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="Tema2">Tema 2</a>
                        </li>
                        </div>

                        <div class="col-md-3 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="Tema3">Tema 3</a>
                        </li>                      
                        </div>

                        <div class="col-md-3 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="Tema4">Tema 4</a>
                        </li>                    
                        </div>              

                        <div class="col-md-3 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="Tema5">Tema 5</a>
                        </li>
                        </div>

                        <div class="col-md-3 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="Tema6">Tema 6</a>
                        </li>
                        </div>

                        <div class="col-md-3 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="Tema7">Tema 7</a>
                        </li>
                        </div>
                    </ul>
                </div>
            </nav>

        <main>
            <div class="divImagen">
            
            </div>
        </main>

            <?php
                include("./html/footer.html");
            ?>
        </div>
            
            
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>

</html>