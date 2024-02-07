<?php


class EstadisitcaPDO
{

    public static function findAll()
    {
        return file_get_contents(URI_API . "/estadistica");
    }

    public static function findByUser($id)
    {
        return file_get_contents(URI_API . "estadistica?usuario=".$id);
    }

    public static function insert($estadistica)
    {
        

        $fields = array('id_usuario' => $estadistica->id_usuario, 
        'id_palabra' => $estadistica->id_palabra, 
        'resultado' => $estadistica->resultado,
        'intentos' => $estadistica->intentos,
        'fecha' => $estadistica->fecha);
        $fields_string = json_encode($fields);
                
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, URI_API . "/estadistica");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_HEADER,true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        $data = curl_exec($ch);
        curl_close($ch);
        //return $data;
        
    }
}
