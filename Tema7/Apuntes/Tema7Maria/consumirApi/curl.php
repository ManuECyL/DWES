<?
function get ($recurso){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, URI_API.$recurso);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if( $http_code != 200)
        echo "Ha habido algun error con la api";
    curl_close($ch);
    return $response;
}  

function post ($recurso,$array){
    $array = json_encode($array);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, URI_API.$recurso);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, 
    array('Content-Type: application/json','Content-Length: ' . strlen($array)));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $array);    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if( $http_code != 201)
        echo "No se ha podido insertar el recurso";
    curl_close($ch);
    return $response;
}  

function put ($recurso,$id,$array){
    $array = json_encode($array);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, URI_API.$recurso."/".$id);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, 
    array('Content-Type: application/json','Content-Length: ' . strlen($array)));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $array);    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if( $http_code != 201)
    echo "No se ha podido modificar el recurso";
        if( $http_code == 400)
        echo " no existe el id";
      
    curl_close($ch);
    return $response;
} 

