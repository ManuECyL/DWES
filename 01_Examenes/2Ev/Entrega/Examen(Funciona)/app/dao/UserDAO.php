<?php

class UserDAO
{
 
    public static function validarUsuario($usuario, $pass)
    {
        $sql = "select * from usuarios where username = ? and password = ?";
        $parametros = array($usuario, sha1($pass));
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $usuarioStd = $result->fetchObject();
            $usuario = new User(
                $usuarioStd->id_usuario,
                $usuarioStd->username,
                $usuarioStd->password,
                $usuarioStd->tipo
            );
            return $usuario;
        }
        return null;
    }

}

?>