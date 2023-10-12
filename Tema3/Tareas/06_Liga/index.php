<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Tarea 05 - Arrays Básicos</title>

    <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
        <link rel="stylesheet" href="../../../css/estilos.css">

        <style>
            .rojo {
                background-color: red;
            }

            .verde {
                background-color: rgb(102, 209, 102);
                padding: 1px;
                padding-left: 33px;
                padding-right: 33px;
            }

            .amarillo {
                background-color: yellow;
            }

            .naranja {
                background-color: orange;
            }

            #equi {
                background-color: red;
            }

            span {
                display: inline;
                padding: 10px;
                margin: 1px;
            }

            table {
                margin: auto;
            }

            td {
                padding: 16px;
                text-align: center;
                border: gray 1px solid;
            }

            th {
                padding: 10px;
                text-align: center;
                border: gray 1px solid;
            }

            thead td {
                font-weight: bold;
            }

            .equi {
                font-weight: bold;
            }

            body {
                margin: 150px;
            }

            p {
                text-align: center;
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
                    </ul> 
                </div>
            </nav>

            <main>

                <p>
                    <?php
                        $liga =
                            array(
                                "Zamora" =>  array(
                                    "Salamanca" => array(
                                        "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                                    ),
                                    "Avila" => array(
                                        "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                                    ),
                                    "Valladolid" => array(
                                        "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 1
                                    )
                                ),
                                "Salamanca" =>  array(
                                    "Zamora" => array(
                                        "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                                    ),
                                    "Avila" => array(
                                        "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                                    ),
                                    "Valladolid" => array(
                                        "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 2, "Penalti" => 1
                                    )
                                ),
                                "Avila" =>  array(
                                    "Zamora" => array(
                                        "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 2
                                    ),
                                    "Salamanca" => array(
                                        "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 3, "Penalti" => 0
                                    ),
                                    "Valladolid" => array(
                                        "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 0, "Penalti" => 1
                                    )
                                ),
                                "Valladolid" =>  array(
                                    "Zamora" => array(
                                        "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
                                    ),
                                    "Salamanca" => array(
                                        "Resultado" => "3-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
                                    ),
                                    "Avila" => array(
                                        "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 2
                                    )
                                ),
                            )
                    ?>

                    <table border="1">
                        <thead>
                            <?php

                                echo "<th id='equi'>Equipos</th>";

                                $locales = array();
                        
                                // Valores fila superior
                                foreach ($liga as $equipoF => $value) {
                                    echo "<th>$equipoF</th>";
                                    array_push($locales, $equipoF);
                                }
                            ?>
                        </thead>

                        <tbody>
                            <?php
                                // Valores 1ª columna
                                foreach ($liga as $equipoC => $partidos) {
                                    echo "<tr>";
                                    $i = 0;

                                    echo "<th>$equipoC</th>";
                                    
                                        foreach ($partidos as $equipoRival => $resultado) {
                                        
                                            if ($equipoC == $locales[$i]) {
                                                echo "<td> </td>";
                                            }

                                            echo "<td>";

                                            $cont = 0;

                                            foreach ($resultado as $estadisticas => $marcador) {

                                                if ($cont == 0) {
                                                    echo "<p><span class=verde>$marcador</span></p>";
                                                
                                                } elseif ($cont == 1){
                                                    echo "<span class=rojo>$marcador</span>";
                                                
                                                } elseif ($cont == 2) {
                                                    echo "<span class=amarillo>$marcador</span>";
                                                
                                                } elseif ($cont == 3) {
                                                    echo "<span class=naranja>$marcador</span>";
                                                }   
                                                
                                                $cont ++;
                                            }

                                            echo "</td>";

                                            $i++;
                                        }

                                    echo "</tr>";
                                }

                            ?>
                        </tbody>
                    </table>

                    <br><br>

                    <?php
                        $clasificacion = array("Puntos", "Goles a favor", "Goles en contra")
                    ?>

                    <table border="1">
                        <thead>
                            <?php

                                echo "<th id='equi'>Equipos</th>";
                        
                                // Valores fila superior
                                foreach ($clasificacion as $clave) {
                                    echo "<th>$clave</th>";
                                }
                            ?>
                        </thead>

                        <tbody>
                            <?php
                                // Valores 1ª columna
                                foreach ($liga as $equipoC => $partidos) {
                                    
                                    $ganado = 0;

                                    echo "<tr>";

                                    echo "<th>$equipoC</th>";
                                    
                                    echo "<td>";
                                        foreach ($partidos as $equipoRival => $resultado) {

                                            $cont = 0;
                                            $golesF = 0;
                                            $golesC = 0;

                                            foreach ($resultado as $estadisticas => $marcador) {
                                                
                                                if ($cont == 0 && ($marcador[0] > $marcador[2])) {
                                                    $ganado += 3;
                                                }
                                                
                                                $golesF += int($marcador[0]);
                                                $golesC += int($marcador[2]);

                                                $cont ++;
                                            }
                                        }

                                        echo $ganado;
                                        // echo $golesF;
                                        // echo $golesC;

                                        echo "</td>";

                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>

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

