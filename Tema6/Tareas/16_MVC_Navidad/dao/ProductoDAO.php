<?php


?><?php
// Cada modelo tiene su DAO

class ProductoDAO {

    // Es static porque no se desea crear(instanciar) un objeto de UserDAO, es decir, se busca que la función sirva para todos los Usuarios
    public static function findAll() {

        $sql = "SELECT * FROM Productos ORDER BY 2 DESC";

        // En findAll no se necesitan parámetros
        $parametros = array(); 

        // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        
        // Aquí guardaremos el array de la consulta
        $array_productos = array();
        
        // Recorre el resultado  y lo devuelve como un objeto. Este objeto se guarda en la variable $productoStd, ya que el resultado anterior devuelvía un stdObject, es decir un Objeto Standard
        while ($productoStd = $result -> fetchObject()) {

            $producto = new Producto(
                $productoStd -> cod_Prod,
                $productoStd -> titulo,
                $productoStd -> compañia,
                $productoStd -> stock,
                $productoStd -> precio,
                $productoStd -> ruta_Imagen
            );
            
            // Añadimos cada producto al array de productos
            array_push($array_productos, $producto);
        }
        
        // return de un array con todos los User
        return $array_productos;
    }


    public static function findById($id) {

        $sql = "SELECT * FROM Productos WHERE cod_Prod = ?";

        // En findById se necesita pasarle el parámetro del id por el que hay que buscar
        $parametros = array($id); 

        // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        
        // Si encuentra resultados entra en la condición
        if ($result -> rowCount() == 1) {

            // El resultado lo devuelve como un objeto. Este objeto se guarda en la variable $productoStd
            $productoStd = $result -> fetchObject();

            // Hay que crear un nuevo producto con todos los campos de la tabla de Productos. Para poder mostrarlo, lo guardamos en la variable $producto
            $producto = new Producto(
                $productoStd -> cod_Prod,
                $productoStd -> titulo,
                $productoStd -> compañia,
                $productoStd -> stock,
                $productoStd -> precio,
                $productoStd -> ruta_Imagen
            );
        
            // return de un objeto producto 
            return $producto;

        } else {
            // No muestra nada
            return null;
        }
    }


    public static function insert($producto) {

        $sql = "INSERT INTO Productos (cod_Prod, titulo, compañia, stock, precio, ruta_Imagen) VALUES (?,?,?,?,?,?)";

        // Lo mismo que lo instrucción siguiente, pero haciéndolo a mano
        $parametros = array(
            $producto -> cod_Prod, 
            $producto -> titulo, 
            $producto -> compañia, 
            $producto -> stock,
            $producto -> precio,
            $producto -> ruta_Imagen
        );

        $result = FactoryBD::realizaConsulta($sql, $parametros);

        if ($result -> rowCount() > 0) {
            return true;
        }

        return false;
    }


    public static function update($producto) {

        $sql = "UPDATE Productos SET compañia = ?, stock = ?, precio = ? WHERE cod_Prod = ?";

        $parametros = array( 
            $producto -> compañia, 
            $producto -> stock,
            $producto -> precio,
            $producto -> cod_Prod
        );

        $result = FactoryBD::realizaConsulta($sql, $parametros);

        if ($result -> rowCount() > 0) {
            return true;
        }

        return false;
    }

    public static function updateStock($producto) {

        $sql = "UPDATE Productos SET stock = ? WHERE cod_Prod = ?";

        $parametros = array( 
            $producto -> stock,
            $producto -> cod_Prod
        );

        $result = FactoryBD::realizaConsulta($sql, $parametros);

        if ($result -> rowCount() > 0) {
            return true;
        }

        return false;
    }


    public static function borrar($producto) {

        $sql = "DELETE FROM Productos WHERE cod_Prod = ?";

        $parametros = array($producto -> cod_Prod);

        $result = FactoryBD::realizaConsulta($sql, $parametros);

        if ($result -> rowCount() > 0) {
            return true;
        }
    }


    public static function buscarPorNombre($nombre) {

        // LIKE para que contenga parte del nombre
        $sql = "SELECT * FROM Productos WHERE titulo LIKE ?";

        $nombre = '%'. $nombre .'%';

        $parametros = array($nombre); 

        // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
        $result = FactoryBD::realizaConsulta($sql, $parametros);
                    
        if($result->rowCount()==1){
            $productoStd  = $result->fetchObject();
            $producto = new Producto(
                            $productoStd -> cod_Prod,
                            $productoStd -> titulo,
                            $productoStd -> compañia,
                            $productoStd -> stock,
                            $productoStd -> precio,
                            $productoStd -> ruta_Imagen
                        );

            return $producto;

        //return 1 objeto producto
        } else {
            return null;
        }
    }


    public static function validarUser($nombre, $pass) {

        $sql = "SELECT * FROM Usuarios WHERE id_Usuario = ? AND contraseña = ?";

        // $pass = sha1($pass);

        $parametros = array($nombre, $pass); 

        // Llamamos a la función realizaConsulta() del fichero FactoryBD.php y la guardamos en la variable $result para tratarla posteriormente
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        
        // Si encuentra resultados entra en la condición
        if ($result -> rowCount() == 1) {

            // El resultado lo devuelve como un objeto. Este objeto se guarda en la variable $productoStd
            $usuarioStd = $result -> fetchObject();

            // Hay que crear un nuevo usuario con todos los campos de la tabla de Usuario. Para poder mostrarlo, lo guardamos en la variable $producto
            $usuario = new User(
                $usuarioStd -> id_Usuario,
                $usuarioStd -> contraseña,
                $usuarioStd -> email,
                $usuarioStd -> fecha_Nacimiento,
                $usuarioStd -> rol
            );
                                                
            return $usuario;                    
        
        } else {
            // No muestra nada
            return null;
        }
    }

}

?>