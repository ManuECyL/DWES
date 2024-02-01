<?php
class CitaDAO {
    public static function findAll(){
        $sql = "select * from Cita";
        $parametros = array();
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        
        $array_citas = array();
        while($citaStd  = $result->fetchObject()){
            $cita = new Cita($citaStd->id,
                        $citaStd->especialista,
                        $citaStd->motivo,
                        $citaStd->fecha,
                        $citaStd->activo,
                        $citaStd->paciente);
            array_push($array_citas,$cita);
        }

        //return array con todos los User
        return $array_citas;
    }

    public static function findById($id){
        $sql = "select * from Cita where id = ?";
        $parametros = array($id);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount()==1){
            $citaStd  = $result->fetchObject();
                $cita = new Cita($citaStd->id,
                $citaStd->especialista,
                $citaStd->motivo,
                $citaStd->fecha,
                $citaStd->activo,
                $citaStd->paciente);
            return $cita;
        }
        //return 1 objeto usuario
        else    
            return null;
    }

    public static function insert($cita){
        $sql = "insert into Cita (especialista,motivo,fecha,
         activo,paciente) values (?,?,?,?,?)";
        //insertar todos los atributos
        $parametros = array($cita->especialista,
        $cita->motivo,
        $cita->fecha, 
        $cita->activo,
        $cita->paciente    
        );
        
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0)
            return true;
        return false;
    }

    public static function update($cita){
        $sql = "update Cita set
        especialista = ?, motivo = ? , 
        fecha = ? , paciente = ?
        where id = ?";
        //insertar todos los atributos
        $parametros = array($cita->especialista,
        $cita->motivo,
        $cita->fecha, 
        $cita->paciente,
        $cita->id    
        );
        
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0)
            return true;
        return false;
    }

    public static function delete($cita){
        $sql = "update Cita set activo = false
        where id = ?";
        //insertar todos los atributos
        $parametros = array($cita->id);        
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        if($result->rowCount() > 0)
            return true;
    }

    public static function findByPaciente($usuario){
        $sql = "select * from Cita where paciente = ?  
        and activo = 1 and fecha >= now()
        order by fecha";
        $parametros = array($usuario->codUsuario);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        
        $array_citas = array();
        while($citaStd  = $result->fetchObject()){
            $cita = new Cita($citaStd->id,
                        $citaStd->especialista,
                        $citaStd->motivo,
                        $citaStd->fecha,
                        $citaStd->activo,
                        $citaStd->paciente);
            array_push($array_citas,$cita);
        }

        //return array con todos los User
        return $array_citas;
    }

    public static function findByPacienteH($usuario){
        $sql = "select * from Cita where paciente = ?  
        and activo = 1 and fecha < now()
        order by fecha desc";
        $parametros = array($usuario->codUsuario);
        $result = FactoryBD::realizaConsulta($sql,$parametros);
        
        $array_citas = array();
        while($citaStd  = $result->fetchObject()){
            $cita = new Cita($citaStd->id,
                        $citaStd->especialista,
                        $citaStd->motivo,
                        $citaStd->fecha,
                        $citaStd->activo,
                        $citaStd->paciente);
            array_push($array_citas,$cita);
        }

        //return array con todos los User
        return $array_citas;
    }
}