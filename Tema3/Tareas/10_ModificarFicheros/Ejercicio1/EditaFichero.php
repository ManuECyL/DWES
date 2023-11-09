<?php
    include("./Validaciones.php");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 10 - Modificar Ficheros</title>

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
                        header('Location: ./EligeFichero.php');
                        exit;
                    }

                    if (enviado()) {
                        
                        if (($abrir = fopen($_REQUEST['fichero'],'w')) && existe("guardar")){

                            $escribir = $_REQUEST['area'];
                            fwrite($abrir,$escribir,strlen($escribir));
                            fclose($abrir);
                        }
        
                        header('Location: ./LeeFichero.php?fichero='. $_REQUEST['fichero']);
        
                        exit();
                        
                    }
                ?>

                <div style="border: 1px black solid; margin: 10px;">

                    <h3 style="text-align: center">Editar Fichero</h3>

                    
                    <form action="./EditaFichero.php" method="post" name="formularioT09" enctype="multipart/form-data">

                        <input type="hidden" name="fichero" value="<?php
                            echo $_REQUEST['fichero'];
                        ?>">

                        <textarea name="area" id="idArea" cols="80" rows="10"><?php

                            // Si el fichero NO existe que lo abra con opción de solo escritura 'w'
                                if (!existeFichero('fichero')) {

                                    if ($abrir = fopen($_REQUEST['fichero'], 'w')) {
                                        fclose($abrir);    
                                    }
                                   
                            // Si el fichero existe que lo abra con opción de lectura y escritura 'r+'
                                } else {

                                    if ($abrir = fopen($_REQUEST['fichero'], 'r+')) {
                                    
                                        if (filesize($_REQUEST['fichero']) == 0) {
                                            echo "El fichero está vacío, escribe algo";
                                        
                                        } else {
                                            
                                            while($linea = fgets($abrir,filesize($_REQUEST['fichero']))){
                                                echo $linea;
                                            }
                                        }
                                
                                        fclose($abrir);
                                    }
                                }
                        ?></textarea>

                        <br><br>

                        <input type="submit" value="Volver" name="volver">
                        <input type="submit" value="Guardar" name="guardar">

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