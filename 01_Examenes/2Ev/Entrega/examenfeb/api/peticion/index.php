<?php
$ch = curl_init();
/*
curl_setopt($ch, CURLOPT_URL, "http://localhost/clase/UD7/api/miapi/usuarios");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
echo "<pre>";
$res = curl_exec($ch);
$res = json_decode($res);
print_r($res);
curl_close($ch);



$fields = array('codUsuario' => 'curl', 'descUsuario'=> 'curl', 'password'=>'curl' );
$fields_string = http_build_query($fields);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/api/miapi/usuarios");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string );
$data = curl_exec($ch);
print_r($data);
curl_close($ch);
*/
/*
$fields = array( 'descUsuario'=> 'curlput', 'password'=>'curl' );
$fields_string = json_encode($fields);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/api/miapi/usuarios/curl");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($fields_string)));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
print_r($data);
curl_close($ch);*/
/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/api/miapi/usuarios/curl");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response  = curl_exec($ch);
curl_close($ch);
*/