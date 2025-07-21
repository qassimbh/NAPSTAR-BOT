<?php
$API_KEY = "6663550850:AAF7Pzh3913JDRJYiDgNAnBsGwIz8z6QhKg"; // ضع التوكن الخاص بك هنا
define('API_KEY', $API_KEY);

function bot($method, $data = []){
    $url = "https://api.telegram.org/bot" . API_KEY . "/$method";
    $options = [
        'http' => [
            'method'  => 'POST',
            'header'  => "Content-Type: application/json",
            'content' => json_encode($data)
        ]
    ];
    file_get_contents($url, false, stream_context_create($options));
}

$update = json_decode(file_get_contents("php://input"), true);

$message = $update["message"];
$text = $message["text"];
$chat_id = $message["chat"]["id"];

if ($text == "/start") {
    bot("sendMessage", [
        "chat_id" => $chat_id,
        "text" => "أهلاً بك في بوت ناب ستار 🌟"
    ]);
}
