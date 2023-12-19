<?php
require("./conexionBD.php");

function validaUsuario()
{
    try {
        $con = mysqli_connect(IP, USER, PASS, "pr13");

        $sql = "select * from clientes";

        $result = mysqli_query($con, $sql);

        echo '<table>';
        // echo "<tr>";
        // echo "<th>Nombre</th>";
        // echo "<th>Edad</th>";
        // echo "<th>Id</th>";
        // echo "<tr>";
        // CARGAR DATOS DE LA TABLA
        while ($fila = mysqli_fetch_assoc($result)) {
            $id = $fila['id'];
            echo "<tr>";
            foreach ($fila as $valor) {
                echo "<td>";
                echo $valor;
                echo "</td>";
            }
            echo '<form action="">';
            echo '<td>';
            echo '<input type="submit" name="enviar" value="modificar">';
            echo '</td>';
            echo '<td>';
            echo '<input type="submit" name="enviar" value="eliminar">';
            echo '</td>';
            echo '<input type="hidden" name="id" value="' . $id . '">';
            echo '</form>';
            echo '</tr>';

        }

        echo "</table>";

        echo '<form action="">';
        echo '<input type="submit" name="enviar" value="nuevo">';
        echo '</form>';



        mysqli_close($con);

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
    }

}


function crearBase()
{
    $con = new mysqli();

    try {
        $con->connect(IP, USER, PASS);

        // CARGA SCRIPT
        $script = file_get_contents("./clientes.sql");
        $con->multi_query($script);
        do {
            $con->store_result();
            if (!$con->next_result()) {
                break;
            }
        } while (true);

        $con->close();

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

            default:
                echo $th->getMessage();
        }
    }
}

function findByID()
{

    try {
        $con = mysqli_connect(IP, USER, PASS, "pr13");

        $sql = "select * from clientes where id=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $_REQUEST["id"]);
        $stmt->execute();
        $stmt->bind_result($id, $nombre, $fecha, $dinero);
        $stmt->fetch();

        $lectura = "";
        $accion = "guardar";
        if (isset($_REQUEST["id"])) {
            $lectura = "readonly";
            $accion = "modificar";
        }

        echo '<form action="">';
        echo '<td><input type="text"  ' . $lectura . '  name="id" id="id" value="' . $id . '"></td>';
        echo '<td><input type="text" name="nombre" id="nombre" value="' . $nombre . '"></td>';
        echo '<td><input type="text" name="fecha" id="fecha" value="' . $fecha . '"></td>';
        echo '<td><input type="text" name="dinero" id="dinero" value="' . $dinero . '"></td>';

        echo '<input type="submit" name="'.$accion.'" value="'.$accion.'">';
        echo '</form>';



        mysqli_close($con);

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
    }


}



function update()
{

    try {
        $con = mysqli_connect(IP, USER, PASS, "pr13");



        $sql = "update clientes set nombre = ?, fecha_registro = ?, dinero_gastado = ? where id = ?";
        $stmt = $con->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param("ssdi", $_REQUEST['nombre'], $_REQUEST['fecha'], $_REQUEST['dinero'], $_REQUEST['id']);
        $stmt->execute();
        $con->close();




        mysqli_close($con);

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
    }


}


function delete()
{

    try {
        $con = mysqli_connect(IP, USER, PASS, "pr13");

        $sql = "delete from clientes where id = ?";
        $stmt = $con->stmt_init();
        $stmt->prepare($sql);
        $stmt->bind_param("i", $_REQUEST['id']);
        $stmt->execute();
        $con->close();


        mysqli_close($con);

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
    }


}

function insert()
{

    try {
        $con = mysqli_connect(IP, USER, PASS, "pr13");

        $sql = "insert into clientes (nombre, fecha_registro, dinero_gastado) values (?,?,?)";

        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ssd", $_REQUEST["nombre"], $_REQUEST["fecha"],$_REQUEST["dinero"]);
        mysqli_stmt_execute($stmt);

        echo "se añadio";

        mysqli_close($con);

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
    }


}



?>