<?php
    require('./conexionBD.php');
    require('./validaciones.php');
    require('./funcionesBD.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Leer Tabla</title>

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

        #divBuscar {
            text-align: right;
            margin-right: 15%;
        }

        form {
            text-align:center;
        }

        input {
            margin: 5px;
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
                            <a class="nav-link navTema" href="./index.php" id="anterior">Tarea 13 A</a>
                        </li>
                    </div>
                </ul> 
            </div>
        </nav>

        <main>

            <div style="border: 1px black solid; margin: 10px;">

                <h3 style="text-align: center">Leer Tabla</h3>

                <div id="divBuscar">
                    <input type="text" name="buscar" id="buscar" placeholder="Buscar Dato">
                    <input type="button" value="Buscar">                    
                </div>

                <br>

                <?php

                    if (existe("modificar")) {
                        header('Location: ./Modificar.php');
                        exit;
                    
                    } elseif (existe("borrar")) {
                        borrarBD($con, $id);

                    } else if (existe("volver")) {                                      
                        header('Location: ./interfazUsuario.php');
                        exit;

                    } elseif (existe("insertar")) {
                        header('Location: ./InsertarRegistro.php');
                        exit;
                    } 

                    try {

                        // Iniciamos la conexion
                        $con -> connect(IP, USER, PASS, 'tienda');

                        $consulta = consultarBD($con, 'videojuegos');

                        // Comprobamos si hay resultados
                        if ($consulta -> num_rows > 0) {
                            
                            // Obtenemos los nombres de los campos que contiene la tabla
                            $camposTabla = array();

                            while ($campo = $consulta -> fetch_field()) {
                                $camposTabla[] = $campo -> name;
                            }

                            echo "<table>";

                                echo "<tr>";

                                // Mostrar los campos en el encabezado de la tabla
                                foreach ($camposTabla as $columna) {
                                    echo "<th>" . $columna . "</th>";
                                }
                                    echo "<th> Modificar </th>";
                                    echo "<th> Borrar </th>";

                                echo "</tr>";

                                // Mostrar los datos de la tabla
                                while ($fila = $consulta -> fetch_assoc()) {
                                    
                                    echo "<tr>";

                                    foreach ($camposTabla as $columna) {
                                        echo "<td>" . $fila[$columna] . "</td>";
                                    }

                                    echo "<td>";
                                        ?>
                                            <form action="./Modificar.php" method="post" name="formularioT13" enctype="multipart/form-data">
                                                
                                                <input type="submit" value="Modificar" name="modificar">
                                            </form>
                                        <?php
                                    echo "</td>";

                                    echo "<td>";
                                        ?>
                                            <form action="./LeerTabla.php" method="post" name="formularioT13_Borrar" enctype="multipart/form-data">
                                                <input type="submit" value="Borrar" name="borrar">
                                            </form>                                               
                                        <?
                                    echo "</td>";

                                    echo "</tr>";
                                }

                            echo "</table>";

                        } else {
                            echo "No se encontraron resultados en la base de datos";
                        }
                        
                            
                    } catch (\Throwable $th) {

                        switch ($th->getCode()) {
                            // Manejo de errores según tu código
                        }
                    
                        mysqli_close($con);
                    }      
                    
                ?>

                <br>

                <form action="./LeerTabla.php" method="post" name="formularioT13" enctype="multipart/form-data">

                    <input type="submit" value="Volver" name="volver">
                    <input type="submit" value="Insertar Registro" name="insertar">

                </form>

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
