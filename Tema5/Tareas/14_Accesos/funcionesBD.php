<?php
    require("./conexionBD.php");

// Función para consultar los datos de la base de datos
    function consultar($tabla) {

        try {

            $con = mysqli_connect(IP, USER, PASS, "tienda");

            // Creamos la sentencia
            $sql = "select * from $tabla";
    
            // Ejecutamos la sentencia
            $result = mysqli_query($con, $sql);
    
            return $result;
    
            mysqli_close($con);

        } catch (\Throwable $th) {

            switch ($th -> getCode()) {
    
                case 1062:
                    echo "<p style='text-align:center;color:red'> Ha introducido el mismo id </p>";
                    break;
    
                case 1136:
                    echo "<p style='text-align:center;color:red'> El número de campos introducido no coincide </p>";
                    break;
    
                case 0:
                    echo "<p style='text-align:center;color:red'> No encuentra todos los parámetros de la secuencia </p>";
                    break;
    
                case 2002:
                    echo "<p style='text-align:center;color:red'> La IP de acceso a la BD es incorrecta </p>";
                    break;
    
                case 1045:
                    echo "<p style='text-align:center;color:red'> Usuario o contraseña incorrectos </p>";
                    break;
    
                case 1049:
                    echo "<p style='text-align:center;color:red'> Error al conectarse a la base de datos indicada </p>";
                    break;
    
                case 1146:
                    echo "<p style='text-align:center;color:red'> Error al encontrar la tabla indicada </p>";
                    break;
    
                case 1064:
                    echo "<p style='text-align:center;color:red'> Error de sintaxis en la Base de Datos </p>";
                    break;
                
                default:
                    echo $th -> getMessage();
                    break;
            }
            
            mysqli_close($con);
        }
    }


// Función para consultar los datos de la base de datos por id
    function consultarId($tabla) {

        try {
            
            $con = mysqli_connect(IP, USER, PASS, "tienda");

            // Creamos la sentencia
            $sql = "select * from $tabla where id = ?";
            
            $stmt = mysqli_prepare($con, $sql);
    
            mysqli_stmt_bind_param($stmt, "s", $_REQUEST['id']);

            mysqli_stmt_execute($stmt);
    
            $result = mysqli_stmt_get_result($stmt);

            return $result;

            mysqli_stmt_close($stmt);
            mysqli_close($con);
            
        } catch (\Throwable $th) {
            switch ($th -> getCode()) {
    
                case 1062:
                    echo "<p style='text-align:center;color:red'> Ha introducido el mismo id </p>";
                    break;
    
                case 1136:
                    echo "<p style='text-align:center;color:red'> El número de campos introducido no coincide </p>";
                    break;
    
                case 0:
                    echo "<p style='text-align:center;color:red'> No encuentra todos los parámetros de la secuencia </p>";
                    break;
    
                case 2002:
                    echo "<p style='text-align:center;color:red'> La IP de acceso a la BD es incorrecta </p>";
                    break;
    
                case 1045:
                    echo "<p style='text-align:center;color:red'> Usuario o contraseña incorrectos </p>";
                    break;
    
                case 1049:
                    echo "<p style='text-align:center;color:red'> Error al conectarse a la base de datos indicada </p>";
                    break;
    
                case 1146:
                    echo "<p style='text-align:center;color:red'> Error al encontrar la tabla indicada </p>";
                    break;
    
                case 1064:
                    echo "<p style='text-align:center;color:red'> Error de sintaxis en la Base de Datos </p>";
                    break;
                
                default:
                    echo $th -> getMessage();
                    break;
            }
            
            mysqli_close($con);
        }
    }


// Función para actualizar los datos de la base de datos    
    function actualizar($id, $nombre, $compañia, $stock, $precio, $fecha_Lanzamiento) {

        try {
            
            $con = mysqli_connect(IP, USER, PASS, "tienda");
        
            // Creamos la sentencia
            $sql = "update videojuegos set nombre = ?, compañia = ?, stock = ?, precio = ?, fecha_Lanzamiento = ? where id = ?";
    
            $stmt = mysqli_prepare($con, $sql);
    
            mysqli_stmt_bind_param($stmt, "ssidss", $nombre, $compañia, $stock, $precio, $fecha_Lanzamiento, $id);
            
            mysqli_stmt_execute($stmt);
    
            mysqli_stmt_close($stmt);
            mysqli_close($con);
            
        } catch (\Throwable $th) {

            switch ($th -> getCode()) {
    
                case 1062:
                    echo "<p style='text-align:center;color:red'> Ha introducido el mismo id </p>";
                    break;
    
                case 1136:
                    echo "<p style='text-align:center;color:red'> El número de campos introducido no coincide </p>";
                    break;
    
                case 0:
                    echo "<p style='text-align:center;color:red'> No encuentra todos los parámetros de la secuencia </p>";
                    break;
    
                case 2002:
                    echo "<p style='text-align:center;color:red'> La IP de acceso a la BD es incorrecta </p>";
                    break;
    
                case 1045:
                    echo "<p style='text-align:center;color:red'> Usuario o contraseña incorrectos </p>";
                    break;
    
                case 1049:
                    echo "<p style='text-align:center;color:red'> Error al conectarse a la base de datos indicada </p>";
                    break;
    
                case 1146:
                    echo "<p style='text-align:center;color:red'> Error al encontrar la tabla indicada </p>";
                    break;
    
                case 1064:
                    echo "<p style='text-align:center;color:red'> Error de sintaxis en la Base de Datos </p>";
                    break;
                
                default:
                    echo $th -> getMessage();
                    break;
            }
            
            mysqli_close($con);
        }
    }


// Función para insertar datos en la base de datos
    function insertar($id, $nombre, $compañia, $stock, $precio, $fecha_Lanzamiento){

        try {

            $con = mysqli_connect(IP, USER, PASS, "tienda");

            // Consultas preparadas
            $sql = "insert into videojuegos (id,nombre,compañia,stock,precio,fecha_Lanzamiento) values (?,?,?,?,?,?)";
    
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "sssids", $id, $nombre, $compañia, $stock, $precio, $fecha_Lanzamiento);
            mysqli_stmt_execute($stmt);
    
            mysqli_stmt_close($stmt);
            mysqli_close($con);
            
        } catch (\Throwable $th) {

            switch ($th -> getCode()) {
    
                case 1062:
                    echo "<p style='text-align:center;color:red'> Ha introducido el mismo id </p>";
                    break;
    
                case 1136:
                    echo "<p style='text-align:center;color:red'> El número de campos introducido no coincide </p>";
                    break;
    
                case 0:
                    echo "<p style='text-align:center;color:red'> No encuentra todos los parámetros de la secuencia </p>";
                    break;
    
                case 2002:
                    echo "<p style='text-align:center;color:red'> La IP de acceso a la BD es incorrecta </p>";
                    break;
    
                case 1045:
                    echo "<p style='text-align:center;color:red'> Usuario o contraseña incorrectos </p>";
                    break;
    
                case 1049:
                    echo "<p style='text-align:center;color:red'> Error al conectarse a la base de datos indicada </p>";
                    break;
    
                case 1146:
                    echo "<p style='text-align:center;color:red'> Error al encontrar la tabla indicada </p>";
                    break;
    
                case 1064:
                    echo "<p style='text-align:center;color:red'> Error de sintaxis en la Base de Datos </p>";
                    break;
                
                default:
                    echo $th -> getMessage();
                    break;
            }
            
            mysqli_close($con);
        }
    }



// Función para borrar datos de la base de datos
    function borrar() {

        try {
            
            $con = mysqli_connect(IP, USER, PASS, "tienda");

            // Creamos la sentencia
            $sql = "delete from videojuegos where id = ?";
   
           $stmt = $con -> stmt_init();
           $stmt -> prepare($sql);
           $stmt -> bind_param("s", $_REQUEST["id"]);
           $stmt -> execute();
    
           mysqli_close($con);

        } catch (\Throwable $th) {

            switch ($th -> getCode()) {
    
                case 1062:
                    echo "<p style='text-align:center;color:red'> Ha introducido el mismo id </p>";
                    break;
    
                case 1136:
                    echo "<p style='text-align:center;color:red'> El número de campos introducido no coincide </p>";
                    break;
    
                case 0:
                    echo "<p style='text-align:center;color:red'> No encuentra todos los parámetros de la secuencia </p>";
                    break;
    
                case 2002:
                    echo "<p style='text-align:center;color:red'> La IP de acceso a la BD es incorrecta </p>";
                    break;
    
                case 1045:
                    echo "<p style='text-align:center;color:red'> Usuario o contraseña incorrectos </p>";
                    break;
    
                case 1049:
                    echo "<p style='text-align:center;color:red'> Error al conectarse a la base de datos indicada </p>";
                    break;
    
                case 1146:
                    echo "<p style='text-align:center;color:red'> Error al encontrar la tabla indicada </p>";
                    break;
    
                case 1064:
                    echo "<p style='text-align:center;color:red'> Error de sintaxis en la Base de Datos </p>";
                    break;
                
                default:
                    echo $th -> getMessage();
                    break;
            }
            
            mysqli_close($con);
        }
    }

    

    function comprobarBD() {

        // Establecemos la conexion
        $con = new mysqli();

        try {
            // Iniciamos la conexion
            $con = mysqli_connect(IP, USER, PASS);

            // Consulta para obtener la lista de bases de datos
            $consultaBD = $con -> query('show databases');

            // Comprobar si la base de datos existe
            while ($array = $consultaBD -> fetch_assoc()) {

                if ($array['Database'] == 'tienda') {
                    return true;
                }
            }

            return false;

            mysqli_close($con);

            
        } catch (\Throwable $th) {

            switch ($th -> getCode()) {
    
                case 1062:
                    echo "<p style='text-align:center;color:red'> Ha introducido el mismo id </p>";
                    break;
    
                case 1136:
                    echo "<p style='text-align:center;color:red'> El número de campos introducido no coincide </p>";
                    break;
    
                case 0:
                    echo "<p style='text-align:center;color:red'> No encuentra todos los parámetros de la secuencia </p>";
                    break;
    
                case 2002:
                    echo "<p style='text-align:center;color:red'> La IP de acceso a la BD es incorrecta </p>";
                    break;
    
                case 1045:
                    echo "<p style='text-align:center;color:red'> Usuario o contraseña incorrectos </p>";
                    break;
    
                case 1049:
                    echo "<p style='text-align:center;color:red'> Error al conectarse a la base de datos indicada </p>";
                    break;
    
                case 1146:
                    echo "<p style='text-align:center;color:red'> Error al encontrar la tabla indicada </p>";
                    break;
    
                case 1064:
                    echo "<p style='text-align:center;color:red'> Error de sintaxis en la Base de Datos </p>";
                    break;
                
                default:
                    echo $th -> getMessage();
                    break;
            }
            
            mysqli_close($con);
        }
    }



// Función para generar un script de creación para la Base de Datos
    function crearScript() {

        // Establecemos la conexion
        $con = new mysqli();

        try {   
            // Iniciamos la conexion
            $con = mysqli_connect(IP, USER, PASS);

            // Obtenemos el contenido del fichero sql
            $script = file_get_contents('./tienda.sql');
    
            // Lee el contenido del script
            $con -> multi_query($script);
                
            // Comprobamos si hay un error de sintaxis y nos lo muestra
            do {
                $con -> store_result();
    
                if (!$con -> next_result()) {
                    break;
                }
    
            } while(true);

            if (true) {
                echo "<p style='text-align:center;color:green'>Base de datos creada con éxito";
            }

            // Cerramos la conexion
            mysqli_close($con);
            
        } catch (\Throwable $th) {

            // Si hay un error, borra la BBDD
            $sql = "drop database tienda";
            $con -> query($sql);
    
            switch ($th -> getCode()) {
    
                case 1062:
                    echo "<p style='text-align:center;color:red'> Ha introducido el mismo id </p>";
                    break;
    
                case 1136:
                    echo "<p style='text-align:center;color:red'> El número de campos introducido no coincide </p>";
                    break;
    
                case 0:
                    echo "<p style='text-align:center;color:red'> No encuentra todos los parámetros de la secuencia </p>";
                    break;
    
                case 2002:
                    echo "<p style='text-align:center;color:red'> La IP de acceso a la BD es incorrecta </p>";
                    break;
    
                case 1045:
                    echo "<p style='text-align:center;color:red'> Usuario o contraseña incorrectos </p>";
                    break;
    
                case 1049:
                    echo "<p style='text-align:center;color:red'> Error al conectarse a la base de datos indicada </p>";
                    break;
    
                case 1146:
                    echo "<p style='text-align:center;color:red'> Error al encontrar la tabla indicada </p>";
                    break;
    
                case 1064:
                    echo "<p style='text-align:center;color:red'> Error de sintaxis en la Base de Datos </p>";
                    break;
                
                default:
                    echo $th -> getMessage();
                    break;
            }
            
            mysqli_close($con);
        }
    }


// Función para buscar en la Base de Datos datos mediante un campo
    function buscar($busqueda) {

        try {
            
            $con = mysqli_connect(IP, USER, PASS, "tienda");

            // Creamos la sentencia
            $sql = "select * from videojuegos where id like ? or nombre like ? or compañia like ? or stock like ? or precio like ? or fecha_Lanzamiento like ?";

            $stmt = mysqli_prepare($con, $sql);

            $busqueda = "%" . $busqueda . "%";
            
            mysqli_stmt_bind_param($stmt, "sssids", $busqueda, $busqueda, $busqueda, $busqueda, $busqueda, $busqueda);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_affected_rows($con) == 0){
                echo "La búsqueda ha devuelto 0 resultados<br>";
            
            } else {

                // Obtenemos los nombres de los campos que contiene la tabla
                $camposTabla = array();

                while ($campo = mysqli_fetch_field($result)) {
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
                    while ($fila = mysqli_fetch_assoc($result)) {

                        echo "<tr>";

                            foreach ($camposTabla as $columna) {
                                echo "<td>" . $fila[$columna] . "</td>";
                            }

                            echo "<td>";
                                ?>
                                    <form action="./Modificar.php" method="get" name="formularioT13_Modificar" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $fila['id']?>">
                                        <input type="submit" value="Modificar" name="modificar">
                                    </form>
                                <?php
                            echo "</td>";

                            echo "<td>";
                                ?>
                                    <form action="./LeerTabla.php" method="post" name="formularioT13" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $fila['id']?>">
                                        <input type="submit" value="Borrar" name="borrar">
                                    </form>                                               
                                <?
                            echo "</td>";

                        echo "</tr>";
                    }

                echo "</table>";
            }

            mysqli_close($con);
            
        } catch (\Throwable $th) {
            switch ($th -> getCode()) {
    
                case 1062:
                    echo "<p style='text-align:center;color:red'> Ha introducido el mismo id </p>";
                    break;
    
                case 1136:
                    echo "<p style='text-align:center;color:red'> El número de campos introducido no coincide </p>";
                    break;
    
                case 0:
                    echo "<p style='text-align:center;color:red'> No encuentra todos los parámetros de la secuencia </p>";
                    break;
    
                case 2002:
                    echo "<p style='text-align:center;color:red'> La IP de acceso a la BD es incorrecta </p>";
                    break;
    
                case 1045:
                    echo "<p style='text-align:center;color:red'> Usuario o contraseña incorrectos </p>";
                    break;
    
                case 1049:
                    echo "<p style='text-align:center;color:red'> Error al conectarse a la base de datos indicada </p>";
                    break;
    
                case 1146:
                    echo "<p style='text-align:center;color:red'> Error al encontrar la tabla indicada </p>";
                    break;
    
                case 1064:
                    echo "<p style='text-align:center;color:red'> Error de sintaxis en la Base de Datos </p>";
                    break;
                
                default:
                    echo $th -> getMessage();
                    break;
            }
            
            mysqli_close($con);
        }
    }


    function existe($name) {

        if (isset($_REQUEST[$name])) {
            return true;
        }

        return false;
    }
?>