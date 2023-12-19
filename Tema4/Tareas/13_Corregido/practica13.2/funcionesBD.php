<?php
require("./conexionBD.php");

function crearBase()
{
    $DSN = "pgsql:host=" . IP . ';dbname=postgres';
    try {
        try {
            // CREAR LA BASE NUEVA 'PR13'
            $con = new PDO($DSN, USER, PASS);
            $sql = "create database pr13";
            $result = $con->exec($sql);
        } catch (\Throwable $th) {
            switch ($th->getCode()) {
                default:
                // echo $th->getMessage();
                // echo $th->getCode();
            }
        }
        // CONECTAR A ESA BASE Y CREAR TABLA
        $DSN = "pgsql:host=" . IP . ';dbname=pr13';
        $con = new PDO($DSN, USER, PASS);
        $script = file_get_contents("./clientes.sql");
        $con->exec($script);

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            // ERRORES CONEXION
            case '2002':
                echo "Dirección de servidor erronea";
                break;
            case '1045':
                echo "Usuario o contraseña no válidos";
                break;

            case '7':
                echo "<p>Error: No se puede conectar al servidor</p>";
                break;
            case '42P04':
                echo "<p class='warning'>La base de datos ya existe:</p>";
                break;
            case '42P07':
                echo "<p class='warning'>La tabla ya existe:</p>";
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}

function validaUsuario()
{
    $datos = [];
    try {
        $DSN = "pgsql:host=" . IP . ';dbname=pr13';
        $con = new PDO($DSN, USER, PASS);

        $sql = "select * from clientes";

        $result = $con->query($sql);
        while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
            array_push($datos, $fila);
        }
        return $datos;

    } catch (\Throwable $th) {

        switch ($th->getCode()) {
            // ERRORES CONEXION
            case '2002':
                echo "Dirección de servidor erronea";
                break;
            case '1045':
                echo "Usuario o contraseña no válidos";
                break;

            case '1049':
                echo "<p>La base de datos no existe ¿Quieres crearla? </p>";
                echo '<form action=""><input type="submit" name="crear" value="crear"></form>';
                break;

            // NO EXISTE BASE
            case '08006':
                echo "<p>Error en el host</p>";
                echo '<form action=""><input type="submit" name="crear" value="crear"></form>';
                break;
            case '7':
                echo "<p>Error: La base de datos no existe ¿Quieres crearla? </p>";
                echo '<form action=""><input type="submit" name="crear" value="crear"></form>';
                break;

            case '42P01':
                echo "<p>La tabla no existe ¿Quieres crearla? </p>";
                echo '<form action=""><input type="submit" name="crear" value="crear"></form>';
                break;

            // case '1146':
            //     echo "<p>La tabla no existe ¿Quieres crearla? </p>";
            //     echo '<form action=""><input type="submit" name="crear" value="crear"></form>';
            //     break;

            // ERRORES CONSULTAS
            case '1062':
                echo "Id duplicado";
                break;

            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }

}

function findByID($id)
{
    $DSN = "pgsql:host=" . IP . ';dbname=pr13';
    try {
        $con = new PDO($DSN, USER, PASS);

        $sql = "select * from clientes where id=?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($id));
        $row = $stmt->fetch();

        return $row;

    } catch (\Throwable $th) {

        switch ($th->getCode()) {
            // ERRORES CONEXION
            case '2002':
                echo "Dirección de servidor erronea";
                break;
            case '1045':
                echo "Usuario o contraseña no válidos";
                break;

            case '1049':
                echo "<p>La base de datos no existe ¿Quieres crearla? </p>";
                echo '<form action=""><input type="submit" name="crear" value="crear"></form>';
                break;

            case '1146':
                echo "<p>La tabla no existe ¿Quieres crearla? </p>";
                echo '<form action=""><input type="submit" name="crear" value="crear"></form>';
                break;


            // ERRORES CONSULTAS
            case '1062':
                echo "Id duplicado";
                break;

            default:
                echo $th->getMessage();
        }
    } finally {
        unset($con);
    }
}

function findByName($nombre)
{
    $DSN = "pgsql:host=" . IP . ';dbname=pr13';
    try {
        $con = new PDO($DSN, USER, PASS);

        $sql = "select * from clientes where nombre=?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($nombre));
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $row;

    } catch (\Throwable $th) {

        switch ($th->getCode()) {
            // ERRORES CONEXION
            case '2002':
                echo "Dirección de servidor erronea";
                break;
            case '1045':
                echo "Usuario o contraseña no válidos";
                break;

            case '1049':
                echo "<p>La base de datos no existe ¿Quieres crearla? </p>";
                echo '<form action=""><input type="submit" name="crear" value="crear"></form>';
                break;

            case '1146':
                echo "<p>La tabla no existe ¿Quieres crearla? </p>";
                echo '<form action=""><input type="submit" name="crear" value="crear"></form>';
                break;


            // ERRORES CONSULTAS
            case '1062':
                echo "Id duplicado";
                break;

            default:
                echo $th->getMessage();
        }
    } finally {
        unset($con);
    }
}

function update()
{
    $DSN = "pgsql:host=" . IP . ';dbname=pr13';
    try {
        $con = new PDO($DSN, USER, PASS);

        $sql = "update clientes set nombre = ?, ciudad = ?, fecha_registro = ?, numero_compras = ?, dinero_gastado = ? where id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($_REQUEST['nombre'], $_REQUEST['ciudad'], $_REQUEST['fecha'], $_REQUEST['compras'], $_REQUEST['dinero'], $_REQUEST['id']));

    } catch (\Throwable $th) {

        switch ($th->getCode()) {
            // ERRORES CONEXION
            case '2002':
                echo "Dirección de servidor erronea";
                break;
            case '1045':
                echo "Usuario o contraseña no válidos";
                break;

            case '1049':
                echo "<p>La base de datos no existe ¿Quieres crearla? </p>";
                echo '<form action=""><input type="submit" name="crear" value="crear"></form>';
                break;

            case '1146':
                echo "<p>La tabla no existe ¿Quieres crearla? </p>";
                echo '<form action=""><input type="submit" name="crear" value="crear"></form>';
                break;

            // ERRORES CONSULTAS
            case '1062':
                echo "Id duplicado";
                break;

            default:
                echo $th->getMessage();
        }
    } finally {
        unset($con);
    }
}

function delete()
{
    $DSN = "pgsql:host=" . IP . ';dbname=pr13';
    try {
        $con = new PDO($DSN, USER, PASS);

        $sql = "delete from clientes where id = ?";

        $stmt = $con->prepare($sql);
        $stmt->execute(array($_REQUEST['id']));


    } catch (\Throwable $th) {

        switch ($th->getCode()) {
            // ERRORES CONEXION
            case '2002':
                echo "Dirección de servidor erronea";
                break;
            case '1045':
                echo "Usuario o contraseña no válidos";
                break;

            case '1049':
                echo "<p>La base de datos no existe ¿Quieres crearla? </p>";
                echo '<form action=""><input type="submit" name="crear" value="crear"></form>';
                break;

            case '1146':
                echo "<p>La tabla no existe ¿Quieres crearla? </p>";
                echo '<form action=""><input type="submit" name="crear" value="crear"></form>';
                break;

            // ERRORES CONSULTAS
            case '1062':
                echo "Id duplicado";
                break;

            default:
                echo $th->getMessage();
        }
    } finally {
        unset($con);
    }
}

function insert()
{
    $DSN = "pgsql:host=" . IP . ';dbname=pr13';
    try {
        $con = new PDO($DSN, USER, PASS);

        $sql = "insert into clientes (nombre, ciudad, fecha_registro, numero_compras, dinero_gastado) values (?,?,?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($_REQUEST['nombre'], $_REQUEST['ciudad'], $_REQUEST['fecha'], $_REQUEST['compras'], $_REQUEST['dinero']));

    } catch (\Throwable $th) {

        switch ($th->getCode()) {
            // ERRORES CONEXION
            case '2002':
                echo "Dirección de servidor erronea";
                break;
            case '1045':
                echo "Usuario o contraseña no válidos";
                break;

            case '1049':
                echo "<p>La base de datos no existe ¿Quieres crearla? </p>";
                echo '<form action=""><input type="submit" name="crear" value="crear"></form>';
                break;

            case '1146':
                echo "<p>La tabla no existe ¿Quieres crearla? </p>";
                echo '<form action=""><input type="submit" name="crear" value="crear"></form>';
                break;

            // ERRORES CONSULTAS
            case '1062':
                echo "Id duplicado";
                break;

            default:
                echo $th->getMessage();
        }
    } finally {
        unset($con);
    }
}

?>