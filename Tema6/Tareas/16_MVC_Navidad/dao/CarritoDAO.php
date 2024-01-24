<?php
    
    class CarritoDAO {

        public static function consultarCarrito($id) {

            $sql = "SELECT Carrito.cod_Prod, Productos.titulo, Productos.precio, Carrito.cantidad, round((Productos.precio * Carrito.cantidad), 2) AS total FROM Carrito JOIN Productos ON Carrito.cod_Prod = Productos.cod_Prod WHERE Carrito.id_Usuario = ?";

            // En findById se necesita pasarle el parámetro del id por el que hay que buscar
            $parametros = array($id); 

            // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            // Si encuentra resultados entra en la condición
            if ($result -> rowCount() == 1) {

                // El resultado lo devuelve como un objeto. Este objeto se guarda en la variable $usuarioStd
                $carritoStd = $result -> fetchObject();

                // Hay que crear un nuevo usuario con todos los campos de la tabla de Usuario. Para poder mostrarlo, lo guardamos en la variable $usuario
                $carrito = new Carrito(
                    $carritoStd -> id_Usuario,
                    $carritoStd -> cod_Prod,
                    $carritoStd -> cantidad,
                );
            
                // return de un objeto usuario 
                return $carrito;

            } else {
                // No muestra nada
                return null;
            }
        }


        public static function insert($carrito) {

            $sql = "INSERT INTO Carrito (id_Usuario, cod_Prod, cantidad) VALUES (?, ?, ?)";

            // Lo mismo que lo instrucción siguiente, pero haciéndolo a mano
            $parametros = array(
                $carrito -> id_Usuario, 
                $carrito -> cod_Prod, 
                $carrito -> cantidad
            );

            $result = FactoryBD::realizaConsulta($sql, $parametros);

            if ($result -> rowCount() > 0) {
                return true;
            }

            return false;
        }


        public static function update($carrito) {

            $sql = "UPDATE Carrito SET cantidad = ? WHERE id_Usuario = ? AND cod_Prod = ?";

            $parametros = array( 
                $carrito -> cantidad, 
                $carrito -> id_Usuario,
                $carrito -> cod_Prod
            );

            $result = FactoryBD::realizaConsulta($sql, $parametros);

            if ($result -> rowCount() > 0) {
                return true;
            }

            return false;
        }

        
        public static function eliminarProductoCarrito($usuario, $producto) {
            
            $sql = "DELETE FROM Carrito WHERE id_Usuario = ? AND cod_Prod = ?";
            
            $parametros = array($usuario -> id_Usuario, $producto -> cod_Prod);
            
            $result = FactoryBD::realizaConsulta($sql, $parametros);
            
            if ($result -> rowCount() > 0) {
                return true;
            }
        }


        public static function vaciarCarrito($producto) {

            $sql = "DELETE FROM Carrito WHERE cod_Prod = ?";

            $parametros = array($producto -> cod_Prod);

            $result = FactoryBD::realizaConsulta($sql, $parametros);

            if ($result -> rowCount() > 0) {
                return true;
            }
        }
        
    }
?>