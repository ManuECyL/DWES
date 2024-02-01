<?php

require('./config/config.php');

session_start();

if(isset($_REQUEST['login']))
{
    $_SESSION['vista'] = VIEW.'login.php';
    $_SESSION['controller'] = CON.'LoginController.php';
    //require $_SESSION['vista'] ;
    //exit;
}elseif(isset($_REQUEST['home']))
{
    $_SESSION['vista'] = VIEW.'home.php';
}elseif(isset($_REQUEST['logout'])){
    session_destroy();
    header('Location: ./index.php');
}elseif(isset($_REQUEST['User_verPerfil'])){
    $_SESSION['vista'] = VIEW.'verUsuario.php';
    $_SESSION['controller'] = CON.'UserController.php';
}elseif(isset($_REQUEST['Citas_verCitas'])){
    $_SESSION['vista'] = VIEW.'verCitas.php';
    $_SESSION['controller'] = CON.'CitasController.php';
}elseif(isset($_REQUEST['Citas_verCitasToda'])){
    $_SESSION['vista'] = VIEW.'verCitas.php';
    $_SESSION['controller'] = CON.'CitasController.php';
}
if(isset($_SESSION['controller']))
    require($_SESSION['controller']);
require('./views/layout.php');



/* *************************************




***********************************

$usuario = UserDAO::buscarPorNombre('ma');
print_r($usuario);
UserDAO::delete($usuario);
$usuario = UserDAO::findById('1');



print_r(UserDAO::findAll());
$usuario = UserDAO::findById('3');
print_r($usuario);
$user2 = new User('4','Luis','Luis','2024-01-16');
$usuario->descUsuario = 'Lucia';
UserDAO::update($usuario);
UserDAO::insert($user2);
print_r(UserDAO::findAll());

$usuario = UserDAO::findById('1');
UserDAO::activar($usuario);
$usuario = UserDAO::validarUser('maria','maria');
print_r($usuario);

echo "<pre>";
$usuario = UserDAO::findById(2);
print_r( CitaDAO::findByPacienteH($usuario));
*/
