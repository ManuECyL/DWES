<?php

    require ('../MySQL/confBD.php');

    // Data Source Name -> Contiene la información necesaria para conectarse a la base de datos
    $DSN = 'pgsql:host='.IP.';dbname=prueba';

    try {
        // Generamos un objeto PDO para realizar la conexión
        $con = new PDO($DSN, USER, PASS);

        // Insertamos en la BBDD con PDO
        $sql = 'insert into tiempo (descripcion, grados) values (?,?)';
        $stmt = $con -> prepare($sql);
        // Ejecutamos la sentencia
        // $stmt -> execute(array('Hace niebla', 5)); Lo comentamos para que no se ejecute cada vez que recargamos
        
    } catch (PDOException $e) {
        echo $e -> getMessage();
    
    } finally {
        // Cerramos la conexion
        unset($con);
    }


    try {
        // Generamos un objeto PDO para realizar la conexión
        $con = new PDO($DSN, USER, PASS);

        // Insertamos en la BBDD con PDO
        $sql = 'insert into tiempo (descripcion, grados) values (:desc,:grad)';
        $stmt = $con -> prepare($sql);

        // Declaramos los datos que queremos insertar
        $desc = 'Esta nevando';
        $grad = 0;

        // Modificamos los parámetros de values por el valor que queremos insertar
        $stmt -> bindParam(':desc', $desc);
        $stmt -> bindParam(':grad', $grad);
        // Ejecutamos la sentencia
        // $stmt -> execute();
        
    } catch (PDOException $e) {
        echo $e -> getMessage();
    
    } finally {
        // Cerramos la conexion
        unset($con);
    }
?>