<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 02 - Idiomas</title>

    <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
        <link rel="stylesheet" href="../../../css/estilos.css">

        <style>
            body {
                text-align: center;
            }

            img {
                height: 200px;
                width: 350px;
                margin: 10px;
                border: 1px solid black;
            }

        </style>
    </head>

    <body>
        <div class="container-fluid">
            
            <?php
                include("../../../html/header.php");
            ?>

            <!-- NAV -->
            <nav class="navbar navbar-expand-md navbar-dark bg-dark bg-gradient lg-sticky-top d-flex">

                <div class="navbar row container-fluid d-flex text-center">

                    <ul class="navbar-nav row row-cols">

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="../index.php" id="anterior">Tareas</a>
                        </li>
                        </div>

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="HolaMundoIdioma.php?idioma=es">Español</a>
                        </li>
                        </div>

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="HolaMundoIdioma.php?idioma=por">Portugués</a>
                        </li>                      
                        </div>

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="HolaMundoIdioma.php?idioma=ita">Italiano</a>
                        </li>                    
                        </div>              

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="HolaMundoIdioma.php?idioma=gri">Griego</a>
                        </li>
                        </div>

                        <div class="col-md-2 col-lg"> 
                        <li class="nav-item">
                            <a class="nav-link navTema" href="HolaMundoIdioma.php?idioma=en">Inglés</a>
                        </li>
                        </div>
                    </ul> 
                </div>
            </nav>

            <main>
                <a href="HolaMundoIdioma.php?idioma=es"><img src="imagenes/España.jpg" alt=""><br>Español</a>
                <br>
                <a href="HolaMundoIdioma.php?idioma=por"><img src="imagenes/Portugal.jpg" alt=""><br>Portugués</a>
                <br>
                <a href="HolaMundoIdioma.php?idioma=ita"><img src="imagenes/Italia.jpg" alt=""><br>Italiano</a>
                <br>
                <a href="HolaMundoIdioma.php?idioma=gri"><img src="imagenes/Grecia.jpg" alt=""><br>Griego</a>
                <br>
                <a href="HolaMundoIdioma.php?idioma=en"><img src="imagenes/Gran Bretaña.jpg" alt=""><br>Inglés</a>

                <br><br>
            </main>

            <?php
                include("../../../html/footer.html");
            ?>

        </div>
    </body>
</html>