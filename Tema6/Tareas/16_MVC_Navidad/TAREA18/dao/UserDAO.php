<?php

class UserDAO
{

    public static function findAll(){
        $sql = "SELECT * FROM USUARIO WHERE activo = 1";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        $array_usuarios = array();
        while ($usuario = $result->fetchObject()) {
            $usuario = new User(
                $usuario->user,
                $usuario->pass,
                $usuario->email,
                $usuario->fecha_nac,
                $usuario->rol,
                $usuario->activo
            );

            array_push($array_usuarios, $usuario);
        }
        return $array_usuarios;
    }


    public static function findByUser($user) {
        $sql = "SELECT * FROM USUARIO WHERE user = ? AND activo = 1";
        $parametros = array($user);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {

            $usuario = $result->fetchObject();
            $usuario = new User(
                $usuario->user,
                $usuario->pass,
                $usuario->email,
                $usuario->fecha_nac,
                $usuario->rol,
                $usuario->activo
            );
            return $usuario;
        } else {
            return null;
        }
    }

    public static function insert($usuario) {
        $sql = "INSERT INTO USUARIO (user, pass, email, fecha_nac, rol, activo) VALUES (?,?,?,?,?,?)";
        //insertar todos los atributos
        $parametros = array(
            $usuario->user,
            password_hash($usuario->pass, PASSWORD_BCRYPT),
            $usuario->email,
            $usuario->fecha_nac,
            $usuario->rol,
            $usuario->activo
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function update($usuario) {
        $sql = "UPDATE USUARIO SET pass=?, email=?, fecha_nac=?, rol=?, activo=? WHERE user=?";
        $parametros = array(
            password_hash($usuario->pass, PASSWORD_BCRYPT),
            $usuario->email,
            $usuario->fecha_nac,
            $usuario->rol,
            $usuario->activo,
            $usuario->user
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function delete($usuario) {
        $sql = "UPDATE USUARIO SET activo=0 WHERE user=?";
        $parametros = array(
            $usuario->user
        );
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function validaUsuario($user, $pass) {
        $sql = "SELECT * FROM USUARIO WHERE user = ? AND activo = 1";
        $parametros = array($user);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $usuario = $result->fetchObject();
            if (password_verify($pass, $usuario->pass)) {
                $usuario = new User(
                    $usuario->user,
                    $usuario->pass,
                    $usuario->email,
                    $usuario->fecha_nac,
                    $usuario->rol,
                    $usuario->activo
                );
                return $usuario;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    
    public static function isAdmin($user){
        $sql = "SELECT * FROM USUARIO WHERE user = ? AND activo = 1";
        $parametros = array($user);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $usuario = $result->fetchObject();
            if ($usuario->rol == 'admin') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function isModerador($user){
        $sql = "SELECT * FROM USUARIO WHERE user = ? AND activo = 1";
        $parametros = array($user);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $usuario = $result->fetchObject();
            if ($usuario->rol == 'moderador') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function isCliente($user){
        $sql = "SELECT * FROM USUARIO WHERE user = ? AND activo = 1";
        $parametros = array($user);
        $result = FactoryBD::realizaConsulta($sql, $parametros);
        if ($result->rowCount() == 1) {
            $usuario = $result->fetchObject();
            if ($usuario->rol == 'cliente') {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    
    
}
?>