<?php
    include("./validaciones.php");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 10 - 2 - Notas.csv</title>

    <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
        <link rel="stylesheet" href="../../../../css/estilos.css">

        <style>
            h3 {
                margin-top: 30px;
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

                include("../../../../html/header.php");
            ?>

            <!-- NAV -->
            <nav class="navbar navbar-expand-md navbar-dark bg-dark bg-gradient lg-sticky-top d-flex">

                <div class="navbar row container-fluid d-flex text-center">

                    <ul class="navbar-nav row row-cols">

                        <div class="col-md col-lg">
                            <li class="nav-item">
                                <a class="nav-link navTema" href="../index.php" id="anterior">Tarea 10</a>
                            </li>
                        </div>
                    </ul> 
                </div>
            </nav>

            <main>

                <?php
                    if (existe('volver')) {
                        header('Location: ./notas.php');
                        exit;
                    }

                    if (enviado() && existe("añadir")) {

                        // Obtener datos del formulario
                        $alumno = $_POST['alumno'];
                        $nota1 = $_POST['nota1'];
                        $nota2 = $_POST['nota2'];
                        $nota3 = $_POST['nota3'];

                        // Comprueba que los campos no están vacíos
                        if (!empty($alumno) && !empty($nota1) && !empty($nota2) && !empty($nota3)) {

                            // Nombre del archivo original
                            $archivo_original = "notas.csv";

                            // Abre el archivo original para escritura al final
                            if ($escritura = fopen($archivo_original,'a')){
                            
                                // Escribe la nueva línea al archivo 
                                fwrite($escritura, "\n$alumno;$nota1;$nota2;$nota3");
                                
                                // Cierra el archivo 
                                fclose($escritura);

                                // Redirige a notas.php después de guardar
                                header('Location: ./notas.php');
        
                                exit();

                            } else {
                                echo "Error al abrir el archivo original para lectura.";
                            }

                        // Si los campos están vacíos y se pulsa "Añadir", vuelve al fichero notas.php sin añadir ningún alumno
                        } else {
                            
                            header('Location: ./notas.php');
        
                            exit();
                        }
                    }
                ?>

                <div style="border: 1px black solid; margin: 10px;">

                    <h3 style="text-align: center">Añadir</h3>

                    
                    <form action="./añadir.php" method="post" name="formularioT10_2" enctype="multipart/form-data">

                        <label for="alumno">Alumno:</label> <input type="text" name="alumno" id="alumno">

                        <br><br>

                        <label for="nota1">Nota 1:</label> <input type="text" name="nota1" id="nota1">

                        <br><br>

                        <label for="nota2">Nota 2:</label> <input type="text" name="nota2" id="nota2">

                        <br><br>

                        <label for="nota3">Nota 3:</label> <input type="text" name="nota3" id="nota3">

                        <br><br>

                        <input type="submit" value="Volver" name="volver">
                        <input type="submit" value="Añadir" name="añadir">

                    </form>

                </div>
            </main>

            <?php
                // Ver Código del fichero actual
                echo "<center><a href='http://". $_SERVER['SERVER_ADDR'] ."/verCodigo.php?fichero=". $_SERVER['SCRIPT_FILENAME'] . "' target='_blank'>Ver Código PHP</a></center>";

                echo "<br>";

                include("../../../../html/footer.html");
            ?>
        </div>
            
            
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>

</html>