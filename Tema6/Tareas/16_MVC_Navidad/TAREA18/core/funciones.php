<?php
//FUNCION CARGAR SCRIPT
function cargarScript(){
    $con = new mysqli(); 

try {

        $con->connect(IP, USER, PASS);
        $script = file_get_contents('./config/script.sql');
        $con->multi_query($script);


        //Parte de codigo para comprobar si hay algun error en el Script
        do {
                $con->store_result();
                if (!$con->next_result()) {
                        break;
                }
        } while (true);
        
        $con->close();
        
        echo 'Script cargado correctamente.';
       echo  '<p><a  href="./">Volver</a></p>';
        
        
    } catch (\Throwable $th) {

        // Switch para recoger los codigos de errores que nos devuelve y asingarle un mensaje de texto a cada uno de ellos
        switch ($th->getCode()){
            case 0:
                echo "No encuentra todos los parámetros de la secuencia";
                break;
            case 2002:
                echo "La IP de acceso a la BD es incorrecta";
                break;
            case 1045:
                echo "Usuario o contraseña incorrectos";
                break;
            case 1049:
                echo "Error al conectarse a la base de datos indicada";
                break;
            case 1146:
                echo "Error al encontrar la tabla indicada";
                break;
            case 1064:
                echo "No se han indicado los valores a insertar en la BD";
                break;
            default:
                echo "Error no identificado: " . $th->getMessage();
        }
        
    }
}

//COMPRUEBA SI EXISTE A BASE DE DATOS
function existeBD(){
    $DSN = 'mysql:host='.IP.';dbname='.BBDD;
    try {
        $con = new PDO($DSN,USER,PASS);
        return true;
    } catch (PDOException $e) {
        switch ($e->getCode()) {
            case 1045:
            echo 'Error acceso a la base datos <br>';
                break;
            case 1049:
                echo 'Conexión correcta. No existe la base de datos. <br>';
                break;
            default:
                echo $e->getMessage();
                echo $e->getCode();
                break;
        }
        return false;
    } finally{
        unset($con);
    }
}


function textoVacio($name){
    if (empty($_REQUEST[$name]))
        return true;
    else
        return false;
}

//INSERTAR COOKIE
function insertarCookie($id){

    //Si no existe la cookie la creamos
    if (!isset($_COOKIE['usuario'])) {
        setcookie('usuario', $id, time() + 3600 * 24);

    }

    //Si existe la cookie la borramos y la creamos
    if (isset($_COOKIE['usuario'])) {

        setcookie('usuario', $id, time() - 3600 * 24);
        setcookie('usuario', $id, time() + 3600 * 24);
    }
}


//REGISTRO
function validaFormulario(&$errores){

    if (textoVacio("user")) $errores['user'] = "El usuario no puede estar vacío.";
    if (!textoVacio("user")&& UserDAO::findByUser($_REQUEST['user'])) $errores['existeuser'] = "Este usuario ya existe. Elija otro nombre de usuario";
    if (textoVacio("pass")) $errores['pass'] = "La contraseña no puede estar vacía.";
    if (!textoVacio("pass")&& !repetirPass($_REQUEST['pass'], $_REQUEST['repitepass'])) $errores['coincidepass'] = "Las contraseñas deben coincidir.";
    if (!textoVacio("pass")&& !validarPass($_REQUEST['pass']))$errores['validapass'] = "La contraseñas debe tener mínimo 8 caracteres, al menos una mayúscula, al menos una minúscula y al menos un número.";
    if (textoVacio("repitepass")) $errores['repitepass'] = "Debe repetir la contraseña.";
    if (textoVacio("email"))$errores['email'] = "El email no puede estar vacío.";
    if (textoVacio("fecha"))$errores['fecha'] = "La fecha no puede estar vacía.";

    if (count($errores) == 0)
        return true;
    return false;
}

function recuerda($name){
    if (registrar() && !empty($_REQUEST[$name]))
        echo $_REQUEST[$name];
    if (isset($_REQUEST['Borrar']))
        echo '';
}


function errores($errores, $name){
    if (isset($errores[$name]))
        echo $errores[$name];


}

function registrar()
{
    if (isset($_REQUEST['registro']))
        return true;
    return false;
}

function validarPass($pass){
    $exp = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/'; //mínimo 8 caracteres, al menos una mayúscula, al menos una minúscula y al menos un número.
    if (preg_match($exp, $pass))
        return true;
    return false;

}

function repetirPass($pass, $repitepass){
    if ($_REQUEST['pass'] === $_REQUEST['repitepass'])
        return true;
    return false;

}

function validaPedido(&$errores){
    if (textoVacio("producto")) $errores['producto'] = "Introduzda un numero de producto.";
    if (!textoVacio("producto") && !ProductoDAO::findByCodigo($_REQUEST['producto'])) $errores['productonoexiste'] = "No se ha encontrado ningún producto con ese identificador.";
    if (textoVacio("cantidad")) $errores['cantidad'] = "Introduzca una cantidad.";
    if (textoVacio("fecha")) $errores['fecha'] = "Introduzca una fecha.";
    if (textoVacio("total")) $errores['total'] = "Introduzca un total.";
    if (preg_match('/^\d+\,\d{2}$/', $_REQUEST['total'])) $errores['totaltipo'] = "Introduzca un precio con dos decimales.";
    if (count($errores) == 0)
        return true;
    return false;
}
function validaPedido2(&$errores){
    if (textoVacio("productom")) $errores['productom'] = "Introduzda un numero de producto.";
    if (!textoVacio("productom") && !ProductoDAO::findByCodigo($_REQUEST['productom'])) $errores['productonoexiste'] = "No se ha encontrado ningún producto con ese identificador.";
    if (textoVacio("cantidad")) $errores['cantidad'] = "Introduzca una cantidad.";
    if (textoVacio("fecha")) $errores['fecha'] = "Introduzca una fecha.";
    if (textoVacio("total")) $errores['total'] = "Introduzca un total.";
    if (preg_match('/^\d+\,\d{2}$/', $_REQUEST['total'])) $errores['totaltipo'] = "Introduzca un precio con dos decimales.";
    if (count($errores) == 0)
        return true;
    return false;
}

function validaAlbaran(&$errores){
    if (textoVacio("productocod")) $errores['producto'] = "Introduzda un numero de producto.";
    if (!textoVacio("productocod") && !ProductoDAO::findByCodigo($_REQUEST['productocod'])) $errores['productonoexiste'] = "No se ha encontrado ningún producto con ese identificador.";
    if (textoVacio("cantidad")) $errores['cantidad'] = "Introduzca una cantidad.";
    if (textoVacio("fecha")) $errores['fecha'] = "Introduzca una fecha.";
    if (count($errores) == 0)
        return true;
    return false;
}

function validaProducto(&$errores)
{
    if (textoVacio("titulo")) $errores['titulo'] = "Introduzca un titulo.";
    if (textoVacio("descripcion")) $errores['descripcion'] = "Introduzca una descripcion.";
    if (textoVacio("precio")) $errores['precio'] = "Introduzca un precio.";
    if (preg_match('/^\d+\,\d{2}$/', $_REQUEST['precio'])) $errores['preciotipo'] = "Introduzca un precio con dos decimales.";
    if (textoVacio("stock")) $errores['stock'] = "Introduzca un stock.";
    if (!filter_var($_REQUEST['stock'], FILTER_VALIDATE_INT)) $errores['errordetipostock'] = "Introduzca un número entero para el stock.";
    if (textoVacio("imagen")) $errores['imagen'] = "La imagen no puede estar vacia.";
    if (count($errores) == 0)
        return true;
    return false;
}
function validaSubirProducto(&$errores)
{
    if (textoVacio("titulo")) $errores['titulo'] = "Introduzca un titulo.";
    if (textoVacio("descripcion")) $errores['descripcion'] = "Introduzca una descripcion.";
    if (textoVacio("precio")) $errores['precio'] = "Introduzca un precio.";
    if (preg_match('/^\d+\,\d{2}$/', $_REQUEST['precio'])) $errores['preciotipo'] = "Introduzca un precio con dos decimales.";
    if (textoVacio("stock")) $errores['stock'] = "Introduzca un stock.";
    if (!filter_var($_REQUEST['stock'], FILTER_VALIDATE_INT)) $errores['errordetipostock'] = "Introduzca un número entero para el stock.";
    if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] == UPLOAD_ERR_NO_FILE) $errores['imagen'] = "La imagen no puede estar vacia.";
    elseif (!preg_match('/\.jpg$/i', $_FILES['imagen']['name'])) {
        $errores['imagenjpg'] = "La imagen debe tener una extensión JPG.";}
    if (count($errores) == 0)
        return true;
    return false;
}
?>