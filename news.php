
<?php

header('Content-Type: text/html; charset=UTF-8');

$API_KEY = "a0eb4bf017014d18b2791a08ca616dec";
$url = "https://newsapi.org/v2/top-headlines?sources=bbc-mundo,cnn-es,el-mundo,la-nacion&pageSize=5&apiKey=$API_KEY";


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/* ✅ USER-AGENT OBLIGATORIO */
curl_setopt($ch, CURLOPT_USERAGENT, "MyNetscape/1.0 (localhost)");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Accept: application/json"
]);

$response = curl_exec($ch);

/* ✅ CONTROL DE ERROR */
if ($response === false) {
    header("Content-Type: application/json");
    echo json_encode(["articles" => []]);
    exit;
}

curl_close($ch);

header("Content-Type: application/json");
echo $response;
?>
