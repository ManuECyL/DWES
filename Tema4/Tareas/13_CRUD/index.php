<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 13 - CRUD BBDD</title>

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

            form {
                text-align:center;
                margin: 40px;
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
                                <a class="nav-link navTema" href="../index.php" id="anterior">Tareas Tema 4</a>
                            </li>
                        </div>

                        <div class="col-md col-lg">
                            <li class="nav-item">
                                <a class="nav-link navTema" href="./interfazUsuario.php" >Interfaz Usuario</a>
                            </li>
                        </div>
                    </ul> 
                </div>
            </nav>

            <main>
                <div style="border: 1px black solid; margin: 10px;">

                    <h3 style="text-align: center">Tarea 13 - CRUD BBDD</h3>

                    <br>

                    <h6>1. Realiza un fichero conexiónBD.php con los datos de la conexión a la base de datos</h6>

                    <br>
                    
                    <h6>2. Realiza un fichero funcionesBD.php con las funciones necesarias para realizar un CRUD</h6>

                    <br>
                    
                    <h6>3. Realiza un index donde pueda elegir:</h6>
                
                        <p>
                            a. Si no hubiera base de datos, habilitar botón con un script de creación.
                        </p>

                        <p>
                            b. Leer tabla
                        </p>

                        <p>
                            c. Insertar registro: con su formulario perfectamente validado
                        </p>
                    <br>

                    <h6>4. Desde la tabla de lectura habrá una columna más que permitirá: Modificar o Borrar.
                            Además de un buscador por uno de los campos de tipo varchar.
                            En la página de lectura también habrá opción de insertar nuevo registro</h6>

                    <br>

                    <h6>5. Tanto el insertar como el modificar, cuando hayan actualizado la base de datos se redigirá a leer tabla.</h6>

                    <p> Los errores deben estar recogidos </p>
                        
                        <p>- Fallo de conexión y por qué</p>
                        <p>- Fallo al hacer la query y por qué</p>

                    <p>El tema de la tabla es libre: Debe haber al menos un entero, un varchar, un decimal y una fecha</p>

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