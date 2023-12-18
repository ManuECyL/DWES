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

    <title>Insertar Registro</title>

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

        #divForm {

            text-align:justify;
            margin: 0px;
        }
        
        #registros {
            display: flex;
            text-align: center;
            align-items: center;
            justify-content: center;
        }

        form {
            text-align: center;
            margin: 30px;
        }

        input {
            margin: 5px;
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

            <div style="border: 1px black solid; margin: 10px;" id="divMain">

                <h3 style="text-align: center">Insertar Registro</h3>

                <?php

                    if (existe("volver")) {                                      
                        header('Location: ./LeerTabla.php');
                        exit;

                    } elseif (existe("insertar")) {
                        header('Location: ./LeerTabla.php');
                        exit;
                    }

                    try {
                        
                        // Iniciamos la conexion
                        $con -> connect(IP, USER, PASS, 'tienda');

                        $consulta = consultarBD($con, 'videojuegos');

                        // Comprobamos si hay resultados
                        if ($consulta -> num_rows > 0) {

                            echo "<form action='./InsertarRegistro.php' method='post' id='registros' name='formularioT13' enctype='multipart/form-data'>";
                            
                            // Obtenemos los nombres de los campos que contiene la tabla
                            $camposTabla = array();

                            while ($campo = $consulta -> fetch_field()) {
                                $camposTabla[] = $campo -> name;
                            }

                                echo "<div id='divForm'>";


                                    // Mostrar los campos en el encabezado de la tabla
                                    foreach ($camposTabla as $columna) {
                                        echo "<label><b>" . $columna . "</b></label>: ";
                                        echo "<input type='text' name='". $columna ."'>";
                                        echo "<br>";
                                    }
                                    
                                echo "</div>";

                                    // Verificar si se ha enviado el formulario
                                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['insertar'])) {

                                        // Validar los datos del formulario aquí...

                                        // Recupera los datos del formulario
                                        $id = $_POST['id'];
                                        $nombre = $_POST['nombre'];
                                        $compañia = $_POST['compañia'];
                                        $stock = $_POST['stock'];
                                        $precio = $_POST['precio'];
                                        $fecha_Lanzamiento = $_POST['fecha_Lanzamiento'];

                                        // Insertamos los datos en la base de datos
                                        if (insertarBD($con, $id, $nombre, $compañia, $stock, $precio, $fecha_Lanzamiento)) {
                                            echo "Registro insertado correctamente.";

                                        } else {
                                            echo "Error al insertar el registro.";
                                        }
                                    }
                                
                            echo "</form>";
        

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

                <form action="./InsertarRegistro.php" method="post" name="formularioT13" enctype="multipart/form-data">

                    <input type="submit" value="Volver" name="volver">
                    <input type="submit" value="Insertar" name="insertar">

                </form>
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