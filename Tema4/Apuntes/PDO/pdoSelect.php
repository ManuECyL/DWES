<?php

    require ('../MySQL/confBD.php');

    // Data Source Name -> Contiene la información necesaria para conectarse a la base de datos
    $DSN = 'pgsql:host='.IP.';dbname=prueba';

    try {
        // Generamos un objeto PDO para realizar la conexión
        $con = new PDO($DSN, USER, PASS);

        // Leemos la BBDD con PDO
        $sql = 'select * from tiempo';
        $result = $con -> query($sql);
        
        // Bucle para recorrer los datos y mostrarlos en un array asociativo y con claves numéricas 
        while ($row = $result -> fetch(PDO::FETCH_BOTH)) {
            echo "<br>El tiempo es ". $row[1] . " y hace " . $row[2] . " grados";
        }
        
    } catch (PDOException $e) {
        echo $e -> getMessage();
    
    } finally {
        // Cerramos la conexion
        unset($con);
    }


    try {
        // Generamos un objeto PDO para realizar la conexión
        $con = new PDO($DSN, USER, PASS);

        // Leemos la BBDD con PDO para que muestre solo las filas con menos de 5 grados
        $sql = 'select * from tiempo where grados < 5';
        $stmt = $con -> prepare($sql);
        $stmt -> execute();
        $stmt -> bindColumn(2, $desc);
        $stmt -> bindColumn(3, $grad);
        
        // Bucle para recorrer los datos y mostrarlos en un array asociativo y con claves numéricas 
        while ($row = $stmt -> fetch(PDO::FETCH_BOUND)) {
            echo "<br>El tiempo es ". $desc . " y hace " . $grad . " grados";
        }
        
    } catch (PDOException $e) {
        echo $e -> getMessage();
    
    } finally {
        // Cerramos la conexion
        unset($con);
    }
?>