<?php

    class CompraDAO {

        public static function insert($compra) {

            $sql = "INSERT INTO Compra (id_Usuario, fecha_Compra) VALUES (?, NOW())";

            // Lo mismo que lo instrucción siguiente, pero haciéndolo a mano
            $parametros = array(
                $compra -> id_Usuario, 
                $compra -> fecha_Compra
            );

            $result = FactoryBD::realizaConsulta($sql, $parametros);

            if ($result -> rowCount() > 0) {
                return true;
            }

            return false;
        }
    }

?>