<?php

function get($recurso)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, URI_API . $recurso);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}
function getMin($recurso)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, URI_API . $recurso);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

function post($recurso, $array)
{
    $array = json_encode($array);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, URI_API . $recurso);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json', 'Content-length: ' . strlen($array)));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $array);

    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}