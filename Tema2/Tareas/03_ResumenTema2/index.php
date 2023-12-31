<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 03 - Resumen Tema 2</title>

    <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
        <link rel="stylesheet" href="../../../css/estilos.css">

        <style>
            h6 {
                font-weight: bold;
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
                            <a class="nav-link navTema" href="../index.php" id="anterior">Tareas Tema 2</a>
                        </li>
                        </div>

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="./Ejercicios/ejercicio1.php">Ejercicio 1</a>
                        </li>
                        </div>

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="./Ejercicios/ejercicio2.php?variable=">Ejercicio 2</a>
                        </li>                      
                        </div>

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="./Ejercicios/ejercicio3.php?fecha=03/10/2023">Ejercicio 3</a>
                        </li>                    
                        </div>              

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="./Ejercicios/ejercicio4.php?fecha1=1998/04/30&fecha2=1996/03/22">Ejercicio 4</a>
                        </li>
                        </div>
                    </ul> 
                </div>
            </nav>

            <main>
                <div style="border: 1px black solid; margin: 10px;">
                    <pre>
                        <h3 style="text-align: center">Enunciados de los ejercicios de la Tarea 03</h3>
                        <h5>    1. Crea una página que:</h5>

                            a. Muestra el nombre del fichero que se está ejecutando. 
                            <br>
                            b. Muestra la dirección IP del equipo desde el que estás accediendo.
                            <br>
                            c. Muestra el path donde se encuentra el fichero que se está ejecutando. 
                            <br>
                            d. Muestra la fecha y hora actual formateada en 2022-09-4 19:17:18. 
                            <br>
                            e. Muestra la fecha y hora actual en Oporto formateada en (día de la semana, día de mes de año, hh:mm:ss , Zona horaria). 
                            <br>
                            f. Inicializa y muestra una variable en timestamp y en fecha con formato dd/mm/yyyy de tu cumpleaños
                            <br>
                            g. Calcular la fecha y el día de la semana de dentro de 60 días. 
                            <br>

                        <h6>    2. Crea una página a la que se le pase por url una variable con el nombre que quieras y muestre el valor de la variable, el tipo, si es numérico o no y si lo es, si es entero o float. (No hace falta usar if)</h6>

                        <h6>    3. Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) y muestre el día de la semana de dicho día. (Por defecto, dale el valor de 03/10/2023)</h6>

                        <h6>    4. Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) de dos personas y muestre las fechas de nacimiento de ambos y la diferencia de edad en años.</h6> 
                    </pre>
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