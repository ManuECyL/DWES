<?php
    require('confBD.php');

    function findAll() {

        try {

            // Data Source Name -> Contiene la información necesaria para conectarse a la base de datos
            $DSN = 'mysql:host='.IP.';dbname='.BD;

            // Generamos un objeto PDO para realizar la conexión
            $con = new PDO($DSN, USER, PASS);
        
            // Consulta a la BBDD
            $sql = 'select * from producto';

            $stmt = $con -> prepare($sql);

            
            $stmt -> execute();
            
            $array_productos = array();

            while($producto = $stmt -> fetch(PDO::FETCH_ASSOC)) {
                array_push($array_productos, $producto);
            }

            return $array_productos;


        } catch (PDOException $e) {
            echo $e -> getMessage();
        
        } finally {
            // Cerramos la conexion
            unset($con);
        }
    }


    function findById($id) {

        try {

            // Data Source Name -> Contiene la información necesaria para conectarse a la base de datos
            $DSN = 'mysql:host='.IP.';dbname='.BD;

            // Generamos un objeto PDO para realizar la conexión
            $con = new PDO($DSN, USER, PASS);
        
            // Consulta a la BBDD
            $sql = 'select * from producto where codigo = ?';

            $stmt = $con -> prepare($sql);
            
            $stmt -> execute(array($id));
            
            $producto = $stmt -> fetch(PDO::FETCH_ASSOC);
             
            if ($producto) {
                unset($con);
                return $producto;
            }

            return false;


        } catch (PDOException $e) {
            echo $e -> getMessage();
        
        } finally {
            // Cerramos la conexion
            unset($con);
        }
    }

    function usuarioPermitido($url)
{
    if (in_array($url, $_SESSION['usuario']['paginas'])) {
        return true;
    }
    return false;
}
    

?>