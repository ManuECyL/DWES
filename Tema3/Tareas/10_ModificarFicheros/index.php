<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 10 - Modificar Ficheros</title>

    <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
        <link rel="stylesheet" href="../../../css/estilos.css">

        <style>
            h3 {
                margin: 20px;
            }

            h6 {
                margin-left: 40px;
            }

            p {
                margin-left: 70px;
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

                        <div class="col-md-6 col-lg">
                            <li class="nav-item">
                                <a class="nav-link navTema" href="../index.php" id="anterior">Tareas Tema 3</a>
                            </li>
                        </div>

                        <div class="col-md-6 col-lg">
                            <li class="nav-item">
                                <a class="nav-link navTema" href="./Ejercicio1/EligeFichero.php?">Ejercicio 1</a>
                            </li>                      
                        </div>

                        <div class="col-md-6 col-lg">
                            <li class="nav-item">
                                <a class="nav-link navTema" href="./Ejercicio2/notas.php?">Ejercicio 2</a>
                            </li>                      
                        </div>
                    </ul> 
                </div>
            </nav>

            <main>
                <div style="border: 1px black solid; margin: 10px;">

                    <h3 style="text-align: center">Tarea 10</h3>

                    <h6>1. Realiza una página EligeFichero.php que rellenes el nombre de un fichero y puedas elegir:</h6>

                        <p>Editar (si no existe lo crea) o Leer.</p>

                        <p>
                            a) La página EditaFichero.php lee lo que hay en un fichero y lo escribe en un textarea 
                                editable, en el que se puede escribir y darle a un botón modificar. Al guardar me 
                                envía otra página donde lo lee denominada LeeFichero.php.
                        </p>

                        <p>
                            b) En esta página LeeFichero.php lee lo que tiene escrito y lo escribe en un textarea no 
                                editable, y un botón Editar, que vuelve a la página donde se puede editar. 
                        </p>

                    <br>

                    <h6>2. Lee el fichero notas.csv</h6>

                        <p>
                            a) Muéstralo como una tabla: Alumno, nota1, nota2, nota3, Editar.
                        </p>

                        <p>
                            b) Abre una nueva página que muestre el nombre del alumno de forma no editable y 
                                tres inputs que si podamos modificar. Al guardar los cambios volverá a la página 
                                anterior y mostrará en la tabla los cambios 
                        </p>

                        <p>
                            c) El tamaño de la tabla es variable en función de los alumnos que hubiera.
                        </p>

                    <br>
                </div>
            </main>

            <?php

                include("../../../html/footer.html");
            ?>
        </div>
            
            
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>

</html>