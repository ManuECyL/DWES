<?php
    // require('confBD.php');

// Función que comprueba si la base de datos existe
    function comprobarBD() {

        // Establecemos la conexion
        $con = new mysqli();

        try {
            // Iniciamos la conexion
            $con = mysqli_connect(IP, USER, PASS);

            // Consulta para obtener la lista de bases de datos
            $consultaBD = $con -> query('SHOW databases');

            // Comprobar si la base de datos existe
            while ($array = $consultaBD -> fetch_assoc()) {

                // Si existe, devuelve true
                if ($array['Database'] == BD) {
                    return true;
                }
            }

            return false;

        } catch (\Throwable $th) {
            // Si hay un error lo muestra
            erroresBD($th);
            
        } finally {
            // Cerramos la conexion
            mysqli_close($con);
        }
    }


// Función para generar un script de creación para la Base de Datos
    function crearScript() {

        $con = new mysqli();

        try {   
            $con = mysqli_connect(IP, USER, PASS);

            // Obtenemos el contenido del fichero sql
            $script = file_get_contents('./gameshop.sql');

            // Lee el contenido del script
            $con -> multi_query($script);

            // Comprobamos si hay un error de sintaxis y nos lo muestra
            do {
                $con -> store_result();

                if (!$con -> next_result()) {
                    break;
                }

            } while(true);

            // if (true) {
            //     echo "<p style='text-align:center;color:green'>Base de datos creada con éxito";
            // }
            
        } catch (\Throwable $th) {
            // Si hay un error, borra la BBDD
            $sql = "DROP database " . BD;
            $con -> query($sql);

            erroresBD($th);

        } finally {
            // Cerramos la conexion
            mysqli_close($con);
        }
    }



// Función para comprobar si el usuario existe y es correcto
    function validaUsuario($user, $pass) {

        try {
            $con = mysqli_connect(IP, USER, PASS, BD);
        
            // Consulta a la tabla Usuarios para comprobar si el usuario existe mediante su id y contraseña
            $sql = 'SELECT * FROM Usuarios WHERE id_Usuario = ? AND contraseña = ?';

            // Preparamos la consulta
            $stmt = mysqli_prepare($con, $sql);

            // Encriptamos la contraseña
            // $pass = sha1($pass); 

            // Vinculamos los parámetros
            mysqli_stmt_bind_param($stmt, 'ss', $user, $pass);

            // Ejecutamos la consulta preparada
            mysqli_stmt_execute($stmt);

            // Obtenemos el resultado de la consulta
            $resultado = mysqli_stmt_get_result($stmt);

            // Lo guardamos en un array asociativo para trabajar posteriormente con él
            $usuario = mysqli_fetch_assoc($resultado);
            
            // Comprueba si tiene contenido, sino, devuelve false
            if ($usuario) {
                return $usuario;
            }
            
            return false;

        } catch (\Throwable $th) {
            erroresBD($th);
        
        } finally {
            mysqli_close($con);
        }
    }


// Función para consultar los datos de la base de datos por id
    function consultarId($tabla, $idSQL, $id) {

        try {
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Consultamos los datos de la tabla seleccionada mediante el id correspondiente
            $sql = "SELECT * FROM $tabla WHERE $idSQL = ?";
            
            $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, "s", $id);
                mysqli_stmt_execute($stmt);
    
            $resultado = mysqli_stmt_get_result($stmt);
            $usuario = mysqli_fetch_assoc($resultado);

            if ($usuario) {
                return $usuario;
            }
            
            return false;
            
        } catch (\Throwable $th) {
            erroresBD($th);
            
        } finally {
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }

        return $resultado;
    }


// Función para actualizar los datos de la base de datos    
    function actualizarUsuario() {

        try {
            $con = mysqli_connect(IP, USER, PASS, BD);
        
            // Actualizamos los datos del usuario
            $sql = "UPDATE Usuarios SET contraseña = ?, email = ?, fecha_Nacimiento = ?, rol = ? WHERE id_Usuario = ?";
    
            $stmt = mysqli_prepare($con, $sql);

            // Formateamos la fecha para que sea compatible con la base de datos
            $fechaOriginal = $_REQUEST["fecha_Nacimiento"];
            $fechaFormateada = date("Y-m-d", strtotime($fechaOriginal));
    
            mysqli_stmt_bind_param($stmt, "sssss", $_REQUEST["contraseña"], $_REQUEST["email"], $fechaFormateada, $_REQUEST["rol"], $_REQUEST["id_Usuario"]);
            mysqli_stmt_execute($stmt);
            
        } catch (\Throwable $th) {
            erroresBD($th);
            
        } finally {
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }
    }


// Función para insertar Usuarios
    function insertarUsuario(){

        try {
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Consultas preparadas
            $sql = "INSERT INTO Usuarios (id_Usuario, contraseña, email, fecha_Nacimiento, rol) VALUES (?,?,?,?,'cliente')";

            // Formateamos la fecha para que sea compatible con la base de datos
            $fechaOriginal = $_REQUEST["fecha_Nacimiento"];
            $fechaFormateada = date("Y-m-d", strtotime($fechaOriginal));
    
            $stmt = mysqli_prepare($con, $sql);
                // mysqli_stmt_bind_param($stmt, "ssss", $_REQUEST["id_Usuario"], sha1($_REQUEST["contraseña"]), $_REQUEST["email"], $fechaFormateada); --> Si se formatea la contraseña
                mysqli_stmt_bind_param($stmt, "ssss", $_REQUEST["id_Usuario"], $_REQUEST["contraseña"], $_REQUEST["email"], $fechaFormateada);
                mysqli_stmt_execute($stmt);
            
        } catch (\Throwable $th) {
            erroresBD($th);
            
        } finally {
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }
    }


// Función para consultar los productos de la base de datos
    function consultarProductos() {

        try {
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Consultamos los productos y los ordena de forma descendente por el segundo campo (titulo)
            $sql = "SELECT * FROM Productos ORDER BY 2 DESC";
    
            $resultado = mysqli_query($con, $sql);
    
        } catch (\Throwable $th) {
            erroresBD($th);
        
        } finally {
            mysqli_close($con);
        }

        return $resultado;
    }


// Función para insertar Productos 
    function insertarProducto(){

        try {
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Insertamos un nuevo producto en la tabla Productos
            $sql = "INSERT INTO Productos (cod_Prod, titulo, compañia, stock, precio, ruta_Imagen) VALUES (?,?,?,?,?,?)";

            $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, "sssids", $_REQUEST["cod_Prod"], $_REQUEST["titulo"], $_REQUEST["compañia"], $_REQUEST["stock"], $_REQUEST["precio"], $_REQUEST["ruta_Imagen"]);
                mysqli_stmt_execute($stmt);
            
        } catch (\Throwable $th) {
            erroresBD($th);
            
        } finally {
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }
    }


// Función para actualizar el stock de los Productos
    function actualizarStock() {
        
        try {
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Recogemos los datos del formulario
            $stocks = $_POST['stocks'];
            $cod_Prods = $_POST['cod_Prods'];

            for ($i = 0; $i < count($stocks); $i++) {

                $stock = $stocks[$i];
                $cod_Prod = $cod_Prods[$i];

                // Actualizamos la tabla Productos (stock)
                $sql = "UPDATE Productos SET stock = ? WHERE cod_Prod = ?";
        
                $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "is", $stock, $cod_Prod);
                    mysqli_stmt_execute($stmt);
            }
        
            // Generamos una línea en la tabla Albaranes
            generarAlbaran();

        } catch (\Throwable $th) {
            erroresBD($th);
            
        } finally {
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }

    }


// Función para actualizar el stock de los Productos
    function actualizarProductos() {
        
        try {
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Recogemos los datos del formulario
            $compañias = $_POST['compañias'];
            $stocks = $_POST['stocks'];
            $precios = $_POST['precios'];
            $cod_Prods = $_POST['cod_Prods'];

            for ($i = 0; $i < count($stocks); $i++) {
                $compañia = $compañias[$i];
                $stock = $stocks[$i];
                $precio = $precios[$i];
                $cod_Prod = $cod_Prods[$i];

                if (!is_numeric($precio)) {
                    throw new Exception();
                }

                // Actualizamos la tabla Productos (stock)
                $sql = "UPDATE Productos SET compañia = ?, stock = ?, precio = ? WHERE cod_Prod = ?";
        
                $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "sids", $compañia, $stock, $precio, $cod_Prod);
                    mysqli_stmt_execute($stmt);
            }

            // Generamos una línea en la tabla Albaranes
        
        } catch (\Throwable $th) {
            echo "<div class='alert alert-danger text-center'><b>El precio del producto ". $cod_Prod ." no es un número</b></div>";
            // erroresBD($th);
            
        } finally {

            if (isset($stmt)) {
                mysqli_stmt_close($stmt);    
            }

            mysqli_close($con);
        }
    }


// Función para borrar un producto
    function eliminarProducto($cod_Prod) {
            
            try {
                $con = mysqli_connect(IP, USER, PASS, BD);
    
                // Insertamos un nuevo producto en la tabla Productos
                $sql = "DELETE FROM Productos WHERE cod_Prod = ?";
    
                $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "s", $cod_Prod);
                    mysqli_stmt_execute($stmt);

                echo "<div class='alert alert-success text-center'><b>Producto '". $cod_Prod ."' eliminado correctamente</b></div>";
                
            } catch (\Throwable $th) {
                echo "<div class='alert alert-danger text-center'><b>Error al eliminar el producto ". $_REQUEST["cod_Prod"] ."</b></div>";
                // erroresBD($th);
                
            } finally {
                mysqli_stmt_close($stmt);
                mysqli_close($con);
            }
    }


// Función para consultar los datos necesarios de la tabla Carrito
    function consultarCarrito(){

        try {
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Consultas preparadas
            $sql = "SELECT Carrito.cod_Prod, Productos.titulo, Productos.precio, Carrito.cantidad, round((Productos.precio * Carrito.cantidad), 2) AS total FROM Carrito JOIN Productos ON Carrito.cod_Prod = Productos.cod_Prod WHERE Carrito.id_Usuario = ?";
    
            $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, "s", $_SESSION['usuario']['id_Usuario']);
                mysqli_stmt_execute($stmt);

            // Obtenemos el resultado de la consulta
            $resultado = mysqli_stmt_get_result($stmt);
            
        } catch (\Throwable $th) {
            erroresBD($th);
            
        } finally {
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }

        return $resultado;
    }


// Función para insertar datos en la tabla Carrito
    function añadirCarrito(){

        // Comprobamos si alguno de los valores es NULL
        if ($_SESSION['usuario']['id_Usuario'] === NULL || $_REQUEST['cod_Prod'] === NULL || $_REQUEST['cantidad'] === NULL) {
            // Si alguno de los valores es NULL, salimos de la función sin hacer nada
            return; 
        }

        try {
            $con = mysqli_connect(IP, USER, PASS, BD);
    
            // Consulta para visualizar los datos de la tabla Carrito
            $sql = "SELECT * FROM Carrito WHERE id_Usuario = ? AND cod_Prod = ?";

            $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, "ss", $_SESSION['usuario']['id_Usuario'], $_REQUEST['cod_Prod']);
                mysqli_stmt_execute($stmt);

            $resultado = mysqli_stmt_get_result($stmt);
            $dato = mysqli_fetch_assoc($resultado);

            // Comprobamos si el producto ya está en el carrito
            if ($dato) {

                // Si el producto ya está en el carrito, actualizamos la cantidad
                $sql = "UPDATE Carrito SET cantidad = cantidad + 1 WHERE id_Usuario = ? AND cod_Prod = ?";

                $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "ss", $_SESSION['usuario']['id_Usuario'], $_REQUEST['cod_Prod']);
                    mysqli_stmt_execute($stmt);
            
            } else {

                // Si el producto no está en el carrito, lo añadimos
                $sql = "INSERT INTO Carrito (id_Usuario, cod_Prod, cantidad) VALUES (?, ?, ?)";
                
                $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "ssi", $_SESSION['usuario']['id_Usuario'], $_REQUEST['cod_Prod'], $_REQUEST['cantidad']);
                    mysqli_stmt_execute($stmt);
            }
        
            echo "<div class='alert alert-success text-center'><b>Producto '". $_REQUEST['cod_Prod'] ."' añadido correctamente al carrito</b></div>";
                
        } catch (\Throwable $th) {
            echo "<div class='alert alert-danger text-center'><b>Error al añadir el producto ". $_REQUEST['cod_Prod'] ." al carrito</b></div>";
            // erroresBD($th);
            
        } finally {
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }
    }


// Función para actualizar la cantidad de productos en el carrito
    function actualizarCantidadCarrito() {

        try {
            $con = mysqli_connect(IP, USER, PASS, BD);

             // Recogemos los datos del formulario
             $cantidades = $_POST['cantidades'];
             $cod_Prods = $_POST['cod_Prods'];
 
            for ($i = 0; $i < count($cantidades); $i++) {
                 $cantidad = $cantidades[$i];
                 $cod_Prod = $cod_Prods[$i];
 
                // Actualizamos la tabla Carrito (cantidad, precio * cantidad = (total))
                $sql = "UPDATE Carrito SET cantidad = ? WHERE id_Usuario = ? AND cod_Prod = ?";
            
                $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "iss", $cantidad, $_SESSION['usuario']['id_Usuario'], $cod_Prod);
                    mysqli_stmt_execute($stmt);
            }

            echo "<div class='alert alert-success text-center'><b>Se ha actualizado la cantidad del producto ". $cod_Prod ." en el carrito correctamente</b></div>";
                
        } catch (\Throwable $th) {
            echo "<div class='alert alert-danger text-center'><b>Error al actualizar la cantidad del producto ". $cod_Prod ." en el carrito</b></div>";
            // erroresBD($th);
            
        } finally {
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }
    }


// Función para borrar datos de la base de datos
    function eliminarProductoCarrito($cod_Prod) {

        try {
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Insertamos un nuevo producto en la tabla Productos
            $sql = "DELETE FROM Carrito WHERE id_Usuario = ? AND cod_Prod = ?";

            $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, "ss", $_SESSION['usuario']['id_Usuario'], $cod_Prod);
                mysqli_stmt_execute($stmt);

             echo "<div class='alert alert-success text-center'><b>Se ha eliminado el producto ". $cod_Prod ." del carrito correctamente</b></div>";
                        
        } catch (\Throwable $th) {
            echo "<div class='alert alert-danger text-center'><b>Error al eliminar el producto ". $cod_Prod ." del carrito</b></div>";
            // erroresBD($th);
            
            
        } finally {
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }
    }

// Función para borrar datos de la base de datos
    function vaciarCarrito() {

        try {
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Insertamos un nuevo producto en la tabla Productos
            $sql = "DELETE FROM Carrito WHERE id_Usuario = ?";

            $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, "s", $_SESSION['usuario']['id_Usuario']);
                mysqli_stmt_execute($stmt);

            echo "<div class='alert alert-success text-center'><b>Se ha vaciado el carrito correctamente</b></div>";
            
        } catch (\Throwable $th) {
            echo "<div class='alert alert-danger text-center'><b>Error al vaciar el carrito</b></div>";
            // erroresBD($th);
            
        } finally {
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }
    }


// Función para insertar datos en la base de datos
    function realizarPedido(){

        try {
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Guaradamos los productos del carrito en un array
            $productos = consultarCarrito();

            // Comprobamos que el stock de los productos sea suficiente
            foreach ($productos as $producto) {

                $sql = "SELECT stock FROM Productos WHERE cod_Prod = ?";

                $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "s", $producto['cod_Prod']);
                    mysqli_stmt_execute($stmt);

                $resultado = mysqli_stmt_get_result($stmt);
                $dato = mysqli_fetch_assoc($resultado);

                // Si el stock es menor que la cantidad, devuelve una excepción
                if ($dato['stock'] < $producto['cantidad']) {
                    echo "<div class='alert alert-danger text-center'><b>Stock insuficiente del producto " . $producto['cod_Prod'] . " para realizar el pedido. Stock actual: " . $dato['stock'] . "</b></div>";
                    throw new Exception();
                }
            }
    
            // Inicia una transacción
            $con -> begin_transaction();

            // Insertas un nuevo registro en la tabla Compra
            $sql = "INSERT INTO Compra (id_Usuario, fecha_Compra) VALUES (?, NOW())";

            $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, "s", $_SESSION['usuario']['id_Usuario']);
                mysqli_stmt_execute($stmt);

            // Obtienes el ID de la compra que acabas de insertar
            $idCompra = mysqli_insert_id($con);

            // Recorres los productos del carrito
            foreach ($productos as $producto) {
                
                // Insertas los productos del carrito en la tabla Contiene
                $sql = "INSERT INTO Contiene (id_Compra, cod_Prod, cantidad, total) VALUES (?, ?, ?, ?)";

                $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "isid", $idCompra, $producto['cod_Prod'], $producto['cantidad'], $producto['total']);
                    mysqli_stmt_execute($stmt);


                // Reduce el stock de los productos comprados en la tabla Productos
                $sql = "UPDATE Productos SET stock = stock - ? WHERE cod_Prod = ?";
    
                $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "is", $producto['cantidad'], $producto['cod_Prod']);
                    mysqli_stmt_execute($stmt);
            }


            // Borras los productos del carrito
            $sql = "DELETE FROM Carrito WHERE id_Usuario = ?";

            $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, "s", $_SESSION['usuario']['id_Usuario']);
                mysqli_stmt_execute($stmt);

            // Si todas las consultas se ejecutaron correctamente, confirma la transacción
            $con -> commit();

            echo "<div class='alert alert-success text-center'><b>Se ha realizado el pedido con éxito</b></div>";
            
        } catch (\Throwable $th) {
            // Si hay algún error, deshace la transacción
            $con -> rollback();
            // erroresBD($th);
            
        } finally {
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }
    }


// Función para consultar los pedidos realizados por el usuario
    function consultarPedidosUsuario() {

        try {
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Consultamos los datos de una tabla y los ordena de forma descendente por el segundo campo
            $sql = "SELECT Contiene.id_Compra, Contiene.cod_Prod, Productos.precio AS precio_Un, Contiene.cantidad, Contiene.total, DATE_FORMAT(Compra.fecha_Compra, '%d-%m-%Y') AS fecha_Compra
                    FROM Contiene 
                    JOIN Compra ON Contiene.id_Compra = Compra.id_Compra 
                    JOIN Productos ON Contiene.cod_Prod = Productos.cod_Prod
                    WHERE Compra.id_Usuario = ? ORDER BY Compra.fecha_Compra DESC";
    
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "s", $_SESSION['usuario']['id_Usuario']);
            mysqli_stmt_execute($stmt);

            // Obtenemos el resultado de la consulta
            $resultado = mysqli_stmt_get_result($stmt);

        } catch (\Throwable $th) {
            erroresBD($th);
        
        } finally {
            mysqli_close($con);
        }

        return $resultado;
    }


// Función para consultar los pedidos realizados por todos los usuarios
    function consultarVentas() {

        try {
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Consultamos los datos de una tabla y los ordena de forma descendente por el segundo campo
            $sql = "SELECT Compra.id_Usuario, Contiene.id_Compra, Contiene.cod_Prod, Productos.precio AS precio_Un, Contiene.cantidad, Contiene.total, DATE_FORMAT(Compra.fecha_Compra, '%d-%m-%Y') AS fecha_Compra
                    FROM Contiene 
                    JOIN Compra ON Contiene.id_Compra = Compra.id_Compra 
                    JOIN Productos ON Contiene.cod_Prod = Productos.cod_Prod
                    ORDER BY Compra.fecha_Compra DESC";

            $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_execute($stmt);

            // Obtenemos el resultado de la consulta
            $resultado = mysqli_stmt_get_result($stmt);

        } catch (\Throwable $th) {
            erroresBD($th);
        
        } finally {
            mysqli_close($con);
        }

        return $resultado;
    }


// Función para actualizar los datos de las tablas Compra y Contiene
    function actualizarVentas() {

        try {
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Recogemos los datos del formulario
            $id_Usuarios = $_POST['id_Usuarios'];
            $id_Compras = $_POST['id_Compras'];
            $cod_Prods = $_POST['cod_Prods'];
            $cantidades = $_POST['cantidades'];

            for ($i = 0; $i < count($cod_Prods); $i++) {
                $id_Usuario = $id_Usuarios[$i];
                $id_Compra = $id_Compras[$i];
                $cod_Prod = $cod_Prods[$i];
                $cantidad = $cantidades[$i];
                
                // Comprobamos si el nuevo cod_Prod existe en la tabla Productos
                $sql = "SELECT * FROM Productos WHERE cod_Prod = ?";

                $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "s", $cod_Prod);
                    mysqli_stmt_execute($stmt);

                $c = "<div class='alert alert-danger text-center'><b>El cod_Prod: ". $cod_Prod ." no existe en los Productos</b></div>";

                // Si no existe, devuelve una excepción
                if (mysqli_stmt_get_result($stmt) -> num_rows == 0) {
                    throw new Exception('cod_Prod_incorrecto');
                }


                // Actualizamos la tabla Compra
                $sql = "UPDATE Compra  SET fecha_Compra = ? WHERE id_Usuario = ? AND id_Compra = ? ";
        
                $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "sss", $fechaFormateada, $id_Usuario, $id_Compra);
                    mysqli_stmt_execute($stmt);


                // Obtenemos el precio_Un del producto de la tabla Productos
                $sql = "SELECT precio FROM Productos WHERE cod_Prod = ?";

                $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "s", $cod_Prod);
                    mysqli_stmt_execute($stmt);

                $resultado = mysqli_stmt_get_result($stmt);

                // Lo guardamos en un array asociativo para trabajar posteriormente con él
                $producto = mysqli_fetch_assoc($resultado);

                // Calculamos el total
                $precio_Un = $producto['precio'];
                $total = $precio_Un * $cantidad;
                
                // Actualizamos la tabla Contiene
                $sql = "UPDATE Contiene SET cantidad = ?, total = ? WHERE id_Compra = ? AND cod_Prod = ?";

                $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "idss", $cantidad, $total, $id_Compra, $cod_Prod);
                    mysqli_stmt_execute($stmt);
            }

        } catch (\Throwable $th) {

            switch ($th -> getMessage()) {

                case 'cod_Prod_incorrecto':
                    echo $c;
                    break;
                
                default:
                    erroresBD($th);
                    break;
            }
                        
        } finally {

            if (isset($stmt)) {
                mysqli_stmt_close($stmt);
            }

            mysqli_close($con);
        }
    }


// Función para borrar una venta
    function eliminarVenta($id_Usuario, $id_Compra, $cod_Prod){

        try {
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Eliminamos una venta de la tabla Contiene, ya que esta tabla tiene una clave foránea de la tabla Compra
            $sql = "DELETE FROM Contiene WHERE id_Compra = ? AND cod_Prod = ?";

            $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, "ss", $id_Compra, $cod_Prod);
                mysqli_stmt_execute($stmt);


            // Comprobamos si la venta tiene más productos
            $sql = "SELECT * FROM Contiene WHERE id_Compra = ?";

            $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, "s", $id_Compra);
                mysqli_stmt_execute($stmt);

            $resultado = mysqli_stmt_get_result($stmt);

            // Si no tiene más productos, eliminamos la venta de la tabla Compra
            if ($resultado -> num_rows == 0) {
                $sql = "DELETE FROM Compra WHERE id_Usuario = ? AND id_Compra = ?";
    
                $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "ss", $id_Usuario, $id_Compra);
                    mysqli_stmt_execute($stmt);
            }

            echo "<div class='alert alert-success text-center'><b>Se ha eliminado la venta ". $id_Compra ." correctamente</b></div>";
                        
        } catch (\Throwable $th) {
            echo "<div class='alert alert-danger text-center'><b>Error al eliminar la venta ". $id_Compra ."</b></div>";
            // erroresBD($th);
            
        } finally {
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }

    }


// Función para generar una línea en la tabla Albaranes
    function generarAlbaran() {

        try {
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Recogemos los datos del formulario
            $cantidades = $_POST['stocks'];
            $cod_Prods = $_POST['cod_Prods'];

            for ($i = 0; $i < count($cantidades); $i++) {
                    $cantidad = $cantidades[$i];
                    $cod_Prod = $cod_Prods[$i];


                // Consultamos el valor original del stock para compararlo con el nuevo y solo insertar los valores modificados
                $sql = "SELECT stock FROM Productos WHERE cod_Prod = ?";

                $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "s", $cod_Prod);
                    mysqli_stmt_execute($stmt);

                $resultado = mysqli_stmt_get_result($stmt);
                $dato = mysqli_fetch_assoc($resultado);

                // Si el stock es diferente, insertamos una línea en la tabla Albaranes
                if ($dato['stock'] != $cantidad) {

                    // Consultamos los datos de una tabla y los ordena de forma descendente por el segundo campo
                    $sql = "INSERT INTO Albaranes (fecha_Albaran, cod_Prod, cantidad, id_Usuario) VALUES (NOW(), ?, ?, ?)";
            
                    $stmt = mysqli_prepare($con, $sql);
                        mysqli_stmt_bind_param($stmt, "sis", $cod_Prod, $cantidad, $_SESSION['usuario']['id_Usuario']);
                        mysqli_stmt_execute($stmt);
                }
            }

        } catch (\Throwable $th) {
            erroresBD($th);
        
        } finally {
            mysqli_close($con);
        }
    }


// Función para consultar los datos de la tabla Albaranes
    function consultarAlbaranes() {
            
        try {
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Consultamos los datos de una tabla y los ordena de forma descendente por el segundo campo
            $sql = "SELECT * FROM Albaranes ORDER BY fecha_Albaran DESC";
    
            $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_execute($stmt);

            // Obtenemos el resultado de la consulta
            $resultado = mysqli_stmt_get_result($stmt);

        } catch (\Throwable $th) {
            erroresBD($th);
        
        } finally {
            mysqli_close($con);
        }

        return $resultado;
    }


// Función para actualizar los datos de la tabla Albaranes
    function actualizarAlbaranes() {
            
        try {
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Recogemos los datos del formulario
            $cantidades = $_POST['cantidades'];
            $cod_Prods = $_POST['cod_Prods'];
            $id_Albaranes = $_POST['id_Albaranes'];

            for ($i = 0; $i < count($cantidades); $i++) {
                $cantidad = $cantidades[$i];
                $cod_Prod = $cod_Prods[$i];
                $id_Albaran = $id_Albaranes[$i];

                // Comprobamos si el nuevo cod_Prod existe en la tabla Productos
                $sql = "SELECT * FROM Productos WHERE cod_Prod = ?";

                $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "s", $cod_Prod);
                    mysqli_stmt_execute($stmt);

                $c = "<div class='alert alert-danger text-center'><b>El cod_Prod: ". $cod_Prod ." no existe en los Productos</b></div>";

                // Si no existe, devuelve una excepción
                if (mysqli_stmt_get_result($stmt) -> num_rows == 0) {
                    throw new Exception('cod_Prod_incorrecto');
                }

                // Actualizamos la tabla Albaranes (cantidad)
                $sql = "UPDATE Albaranes SET cod_Prod = ?, cantidad = ? WHERE id_Albaran = ?";
        
                $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "sis", $cod_Prod, $cantidad, $id_Albaran);
                    mysqli_stmt_execute($stmt);

                // Actualizamos el stock de la tabla Productos
                $sql = "UPDATE Productos SET stock = ? WHERE cod_Prod = ?";

                $stmt = mysqli_prepare($con, $sql);
                    mysqli_stmt_bind_param($stmt, "is", $cantidad, $cod_Prod);
                    mysqli_stmt_execute($stmt);
            }

        } catch (\Throwable $th) {

            switch ($th -> getMessage()) {
                
                case 'cod_Prod_incorrecto':
                    echo $c;
                    break;
                
                default:
                    erroresBD($th);
                    break;
            }
            
        } finally {
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }
        
    }


// Función para borrar un albarán
    function eliminarAlbaran($id_Albaran) {
            
        try {
            $con = mysqli_connect(IP, USER, PASS, BD);

            // Insertamos un nuevo producto en la tabla Productos
            $sql = "DELETE FROM Albaranes WHERE id_Albaran = ?";
    
            $stmt = mysqli_prepare($con, $sql);
                mysqli_stmt_bind_param($stmt, "i", $id_Albaran);
                mysqli_stmt_execute($stmt);

            echo "<div class='alert alert-success text-center'><b>Se ha eliminado el albarán ". $id_Albaran ." correctamente</b></div>";
                        
        } catch (\Throwable $th) {
            echo "<div class='alert alert-danger text-center'><b>Error al eliminar el albarán ". $id_Albaran ."</b></div>";
            // erroresBD($th);
            
        } finally {
            mysqli_stmt_close($stmt);
            mysqli_close($con);
        }
    }



    
// Función para mostrar los errores que pueden generarse en la base de datos
    function erroresBD($th) {

        switch ($th -> getCode()) {

            case 1062:
                $mensaje = "Ha introducido el mismo id";
                break;

            case 1136:
                $mensaje = "El número de campos introducido no coincide";
                break;

            case 0:
                $mensaje = "No encuentra todos los parámetros de la secuencia";
                break;

            case 2002:
                $mensaje = "La IP de acceso a la BD es incorrecta";
                break;

            case 1045:
                $mensaje = "Usuario o contraseña incorrectos";
                break;

            case 1049:
                $mensaje = "Error al conectarse a la base de datos indicada";
                break;

            case 1146:
                $mensaje = "Error al encontrar la tabla indicada";
                break;

            case 1064:
                $mensaje = "Error de sintaxis en la Base de Datos";
                break;

            case 2031:
                $mensaje = "Algunos parametros no se han pasado a la funcion";
                break;
            
            default:
            $mensaje = "Error en la base de datos";
                break;
        }

        echo "<div class='alert alert-danger'><b>Error: " . $th->getCode() . " -> " . $mensaje . "</b> (" . $th->getMessage() . ") </div>";
    }
?>