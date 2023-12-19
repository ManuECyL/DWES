<?php
    require('./funciones/confBD.php');

    function validaUsuario($user, $pass) {

        try {

            // Data Source Name -> Contiene la información necesaria para conectarse a la base de datos
            $DSN = 'mysql:host='.IP.';dbname='.BD;

            // Generamos un objeto PDO para realizar la conexión
            $con = new PDO($DSN, USER, PASS);
        
            // Consulta a la BBDD con PDO
            $sql = 'select * from usuarios where usuario = ? and clave = ?';

            $stmt = $con -> prepare($sql);

            $pass = sha1($pass); // Desencriptamos la contraseña

            $stmt -> execute([$user, $pass]);
            
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC); // Lo guardamos en un array asociativo para trabajar posteriormente con él

            if ($usuario) {
                return $usuario;
            }
            
            return false;

        } catch (PDOException $e) {
            echo $e -> getMessage();
        
        } finally {
            // Cerramos la conexion
            unset($con);
        }
    }


    function muestraPaginas($codigoPerfil, $codigoPagina) {

        try {

            // Data Source Name -> Contiene la información necesaria para conectarse a la base de datos
            $DSN = 'mysql:host='.IP.';dbname='.BD;

            // Generamos un objeto PDO para realizar la conexión
            $con = new PDO($DSN, USER, PASS);
        
            // Consulta a la BBDD con PDO
            $sql = 'select codigoPagina from accede where codigoPerfil = ?';

            $stmt = $con -> prepare($sql);

            $stmt -> execute([$codigoPerfil, $codigoPagina]);
            
            $paginas = $stmt->fetch(PDO::FETCH_ASSOC); // Lo guardamos en un array asociativo para trabajar posteriormente con él

            if ($paginas) {
                return $paginas;
            }
            
            return false;

        } catch (PDOException $e) {
            echo $e -> getMessage();
        
        } finally {
            // Cerramos la conexion
            unset($con);
        }
    }
    

?>