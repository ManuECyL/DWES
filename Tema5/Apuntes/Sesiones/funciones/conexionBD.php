<?php
    require('./funciones/confBD.php');

    function validaUsuario($user, $pass) {

        try {

            // Data Source Name -> Contiene la información necesaria para conectarse a la base de datos
            $DSN = 'mysql:host='.IP.';dbname='.BD;

            // Generamos un objeto PDO para realizar la conexión
            $con = new PDO($DSN, USER, PASS);
        
            // Consulta a la BBDD
            $sql = 'select * from usuarios where usuario = ? and clave = ?';

            $stmt = $con -> prepare($sql);

            $pass = sha1($pass); // Encriptamos la contraseña

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


    function misPaginas() {

        try {

            // Data Source Name -> Contiene la información necesaria para conectarse a la base de datos
            $DSN = 'mysql:host='.IP.';dbname='.BD;

            // Generamos un objeto PDO para realizar la conexión
            $con = new PDO($DSN, USER, PASS);
        
            // Consulta a la BBDD
            $sql = 'select url from paginas where codigo in (select codigoPagina from accede where codigoPerfil = ?)'; // Mejor hacer un JOIN

            $stmt = $con -> prepare($sql);

            $stmt -> execute([$_SESSION['usuario']['perfil']]);
            
            $paginas = array();

            // Lo guardamos en un array asociativo y lo recorremos
            while ($pagina = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($paginas, $pagina['url']);
            }

            // Comprueba si tiene contenido, sino, devuelve false
            if (count($paginas) > 0) {
                $_SESSION['usuario']['paginas'] = $paginas;
                return $paginas;   

            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo $e -> getMessage();
        
        } finally {
            // Cerramos la conexion
            unset($con);
        }
    }
    

?>