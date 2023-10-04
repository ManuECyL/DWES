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
    </head>

    <body>
        <div class="container-fluid">
            
            <?php
                include("../../../html/header.html");
            ?>

            <!-- NAV -->
            <nav class="navbar navbar-expand-md navbar-dark bg-dark bg-gradient lg-sticky-top d-flex">

                <div class="navbar row container-fluid d-flex text-center">

                    <ul class="navbar-nav row row-cols">

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="../index.php">Tareas</a>
                        </li>
                        </div>

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="Tema2">Ejercicio 1</a>
                        </li>
                        </div>

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="Tema3">Ejercicio 2</a>
                        </li>                      
                        </div>

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="Tema4">Ejercicio 3</a>
                        </li>                    
                        </div>              

                        <div class="col-md-2 col-lg">
                        <li class="nav-item">
                            <a class="nav-link navTema" href="Tema5">Ejercicio 4</a>
                        </li>
                        </div>

                        <div class="col-md-2 col-lg"> 
                        <li class="nav-item">
                            <a class="nav-link navTema" href="Tema6">Ejercicio 5</a>
                        </li>
                        </div>
                    </ul> 
                </div>
            </nav>

            <main>
                <p>
                    1. Crea una página que:
                        a. Muestra el nombre del fichero que se está ejecutando. 
                        b. Muestra la dirección IP del equipo desde el que estás accediendo. 
                        c. Muestra el path donde se encuentra el fichero que se está ejecutando. 
                        d. Muestra la fecha y hora actual formateada en 2022-09-4 19:17:18. 
                        e. Muestra la fecha y hora actual en Oporto formateada en (día de la semana, día de 
                        mes de año, hh:mm:ss , Zona horaria). 
                        f. Inicializa y muestra una variable en timestamp y en fecha con formato dd/mm/yyyy 
                        de tu cumpleaños
                        g. Calcular la fecha y el día de la semana de dentro de 60 días. 
                    2. Crea una página a la que se le pase por url una variable con el nombre que quieras y 
                        muestre el valor de la variable, el tipo, si es numérico o no y si lo es, si es entero o float. (No 
                        hace falta usar if)
                    3. Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) y muestre 
                        el día de la semana de dicho día. (Por defecto, dale el valor de 03/10/2023) 
                    4. Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) de dos 
                        personas y muestre las fechas de nacimiento de ambos y la diferencia de edad en años. 
                    5. Crea un enlace a una página en cada página anterior que muestre el contenido del fichero 
                        que se está ejecutando."
                </p>
            </main>

            <?php
                include("../../../html/footer.html");
            ?>
        </div>
            
            
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>

</html>