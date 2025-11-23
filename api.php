<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

$response_data = [
    "status" => "success",
    "message" => "API is working!",
    "timestamp" => time(),
    "server_info" => [
        "name" => "k1no.fun",
        "players_online" => 156,
        "status" => "online",
        "version" => "2.1.0"
    ]
];

$json_response = json_encode($response_data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

if ($json_response === false) {
    $error_response = [
        "status" => "error",
        "message" => "JSON encoding failed",
        "json_error" => json_last_error_msg()
    ];
    $json_response = json_encode($error_response);
}

echo $json_response;

exit();
?>
