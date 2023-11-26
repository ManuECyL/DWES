<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 11 - Ficheros XML</title>

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

            #divImagen {
                display: flex;
                justify-content: center;
                align-items: center;
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

                        <div class="col-md col-lg">
                            <li class="nav-item">
                                <a class="nav-link navTema" href="../index.php" id="anterior">Tareas Tema 3</a>
                            </li>
                        </div>

                        <div class="col-md col-lg">
                            <li class="nav-item">
                                <a class="nav-link navTema" href="./TransformaFichero.php?">Transforma Fichero</a>
                            </li>                      
                        </div>
                    </ul> 
                </div>
            </nav>

            <main>
                <div style="border: 1px black solid; margin: 10px;">

                    <h3 style="text-align: center">Tarea 11</h3>

                    <h6>1. Realiza una página TransformaFichero.php que lea el fichero notas.csv a notas.xml:</h6>
                
                        <p>
                            a) El formato es:
                                <div id="divImagen"><img src="./imagenes/Tarea11_Ejercicio1.png" alt="Tarea11_Ejercicio1.png"></div>
                        </p>

                        <p>
                            Cuando lo haya transformado redirige a LeeFicheroXML 
                        </p>
                    <br>

                    <h6>2. Realiza una página LeeFicheroXML.php que lea el fichero anterior y lo muestre igual que en la tabla del ejercicio anterior</h6>

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