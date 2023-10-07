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
                include("../../html/header.php");
            ?>

            <!-- NAV -->
            <nav class="navbar navbar-expand-md navbar-dark bg-dark bg-gradient lg-sticky-top d-flex">

                <div class="navbar row container-fluid d-flex text-center">

                    <ul class="navbar-nav row row-cols">

                        <div class="col-md col-lg">
                            <li class="nav-item">
                                <a class="nav-link navTema" href="./index.php" id="anterior">Apuntes Tema 2</a>
                            </li>
                        </div>
                    </ul>
                </div>
            </nav>

            <main>
                <div style="border: 1px black solid; margin: 10px; text-align: center;">
                    <pre>
                        <?php
                            print_r($_SERVER);
                            print_r($_GET);

                        ?>
                    </pre>

                    <?php
                    // AMBITO DE LAS VARIABLES
                        echo "<h1>Ambito de las variables</h1>";
                        $contador = 5;

                        function PruebaVariable() {
                            echo $contador;
                        }

                        function PruebaVariableParametro($contador) {
                            echo $contador;
                            $contador++;
                            echo "<br>";
                            echo $contador;
                        }

                        function PruebaVariableReferencia(&$contador) {
                            echo $contador . "<br>";
                            $contador++;
                            echo $contador;
                        }

                        function PruebaVariableGlobal() {
                            global $contador;
                            echo $contador . "<br>";
                            $contador++;
                            echo $contador;
                        }

                        echo "<p>No puede acceder</p>";
                        PruebaVariable();

                        echo "<p>Pasado como parametro</p>";
                        PruebaVariableParametro($contador);
                        echo "<p>¿Qué le pasa a contador?</p>";
                        echo $contador;

                        echo "<p>Pasado como parametro con referencia</p>";
                        PruebaVariableReferencia($contador);
                        echo "<p>¿Qué le pasa a contador?</p>";
                        echo $contador;

                        echo "<p>Sin parametro pero llama a la variable global</p>";
                        PruebaVariableGlobal($contador);
                        echo "<p>¿Qué le pasa a contador?</p>";
                        echo $contador;

                        echo "<br>";

                    // STATIC
                        function contador() {
                            static $c = 0;
                            $c++;
                            echo "<br>" . $c;
                        }

                        contador();
                        contador();
                        contador();
                        contador();
                        contador();

                        echo "<br>";

                    // CONSTANTES
                        define("USER","Maria");
                        echo USER;

                        echo "<br><br>";

                    // Ver Código del fichero actual
                        echo "<a href='http://". $_SERVER['SERVER_ADDR'] ."/verCodigo.php?fichero=". $_SERVER['SCRIPT_FILENAME'] . "' target='_blank'>Ver Código PHP</a>";
                    ?>
                </div>
            </main>

            <?php
                include("../../html/footer.html");
            ?>
        </div>
            
            
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>

</html>






    