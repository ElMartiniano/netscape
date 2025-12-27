<?php

header('Content-Type: text/html; charset=UTF-8');

$API_KEY = "";
$city = "";

$url = "";

/* cURL */
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, "MyNetscape/1.0");

$response = curl_exec($ch);

if ($response === false) {
    header("Content-Type: application/json");
    echo json_encode(["error" => "No se pudo obtener clima"]);
    exit;
}

curl_close($ch);

header("Content-Type: application/json");
echo $response;
?>

