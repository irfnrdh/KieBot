<?php 
$apiToken = "api";
$data = [
    'chat_id' => 'chatid/channel',
    'text' => 'pesan'
];
$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );

// php tele.php
