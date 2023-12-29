<?php
    require("./conexionBD.php");

// Función para consultar los datos de la base de datos
    function consultar($tabla) {

        try {

            $con = new PDO($DSN, USER, PASS);

            // Creamos la sentencia
            $sql = "select * from $tabla";
    
            // Ejecutamos la sentencia
            $result = $con -> query($sql);
    
            return $result;
    

        } catch (PDOException $e) {

            switch ($e -> getCode()) {
    
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
                    echo $e -> getMessage();
                    break;
            }
        
        } finally {
            unset($con);
        }
    }


// Función para consultar los datos de la base de datos por id
    function consultarId($tabla) {

        try {

            $con = new PDO($DSN, USER, PASS, BD);
            
            // Creamos la sentencia
            $sql = "select * from $tabla where id = ?";
            
            $stmt = $con -> prepare( $sql);
    
            $stmt -> execute(array($id));
            $row = $stmt -> fetch();

            return $row;

            unset($con);
            
        } catch (PDOException $e) {

            switch ($e -> getCode()) {
    
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
                    echo $e -> getMessage();
                    break;
            }
       
        } finally {
            unset($con);
        }
    }


// Función para actualizar los datos de la base de datos    
    function actualizar($id, $nombre, $compañia, $stock, $precio, $fecha_Lanzamiento) {

        try {

            $con = new PDO($DSN, USER, PASS);
                    
            // Creamos la sentencia
            $sql = "update videojuegos set nombre = ?, compañia = ?, stock = ?, precio = ?, fecha_Lanzamiento = ? where id = ?";
    
            $stmt = $con -> prepare($sql);
            $stmt -> execute(array($nombre, $compañia, $stock, $precio, $fecha_Lanzamiento, $id));
            
        } catch (PDOException $e) {

            switch ($e -> getCode()) {
    
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
                    echo $e -> getMessage();
                    break;
            }

        } finally {
            unset($con);
        }
    }


// Función para insertar datos en la base de datos
    function insertar($id, $nombre, $compañia, $stock, $precio, $fecha_Lanzamiento){

        try {

            $con = new PDO($DSN, USER, PASS);

            // Consultas preparadas
            $sql = "insert into videojuegos (id,nombre,compañia,stock,precio,fecha_Lanzamiento) values (?,?,?,?,?,?)";
    
            $stmt = $con -> prepare($sql);
            $stmt -> execute(array($id, $nombre, $compañia, $stock, $precio, $fecha_Lanzamiento));
            
        } catch (PDOException $e) {

            switch ($e -> getCode()) {
    
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
                    echo $e -> getMessage();
                    break;
            }
        
        } finally {
            unset($con);
        }
    }



// Función para borrar datos de la base de datos
    function borrar() {

        try {
            
            $con = new PDO($DSN, USER, PASS, BD);

            // Creamos la sentencia
            $sql = "delete from videojuegos where id = ?";
   
           $stmt -> $con -> prepare($sql);
           $stmt -> execute(array($_REQUEST['id']));
    

        } catch (PDOException $e) {

            switch ($e -> getCode()) {
    
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
                    echo $e -> getMessage();
                    break;
            }
            
        } finally {
            unset($con);
        }
    }

    

    function comprobarBD() {

        $DSN = 'pgsql:host='.IP.';dbname=postgres';

        try {
         
            // Establecemos la conexion
            $con = new PDO($DSN, USER, PASS);

            // Consulta para obtener la lista de bases de datos
            $consultaBD = $con -> query('select datname from pg_database');

            // Comprobar si la base de datos existe
            while ($array = $consultaBD -> fetch(PDO::FETCH_ASSOC)) {

                if ($array['datname'] == 'tienda') {
                    return true;
                }
            }
            
        } catch (PDOException $e) {
            
            switch ($e -> getCode()) {
    
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
                    echo $e -> getMessage();
                    return $e -> getCode();
                    break;
               
            }

        } finally {
            unset($con);
        }
    }



// Función para generar un script de creación para la Base de Datos
    function crearScript() {

        $DSN = 'pgsql:host='.IP.';dbname=tienda';

        try {   

            // Establecemos la conexion
            $con = new PDO($DSN, USER, PASS);

            // Creamos la base de datos
            $sql = "create database " .  BD;

            $result = $con -> exec($sql);

            $con = new PDO($DSN, USER, PASS);

            // Obtenemos el contenido del fichero sql
            $script = file_get_contents('./tienda.sql');

            if ($con -> exec($script)) {
                echo "Datos insertados correctamente.";
            
            } else {
                echo "Error en la inserción:";
            }

            unset($con);
            
        } catch (PDOException $e) {

            switch ($e -> getCode()) {
    
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
                    echo $e -> getMessage();
                    break;
            }

        } finally {
            unset($con);
        }
    }


// Función para buscar en la Base de Datos datos mediante un campo
    function buscar($busqueda) {

        try {
            
            $con = new PDO($DSN, USER, PASS, BD);

            // Creamos la sentencia
            $sql = "select * from videojuegos where id like ? or nombre like ? or compañia like ? or stock like ? or precio like ? or fecha_Lanzamiento like ?";

            $stmt -> $con -> prepare($sql);

            $busqueda = "%" . $busqueda . "%";
            
            $stmt -> execute(array($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['compañia'], $_REQUEST['stock'], $_REQUEST['precio'], $_REQUEST['fecha_Lanzamiento']));

            $result = $stmt -> fetchAll();

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

            
        } catch (PDOException $e) {
            switch ($e -> getCode()) {
    
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
                    echo $e -> getMessage();
                    break;
            }

        } finally {
            unset($con);
        }
    }


    function existe($name) {

        if (isset($_REQUEST[$name])) {
            return true;
        }

        return false;
    }
?>