
<?php
$api_key='597639c0a78e76fe';
$secret_key = 'MjdiZmMxY2Q4YmUzMGM1ZWIzMDk0Yzg5MGE1YWYwYmY3MDc4ZjYyOGUzZmM1ZmYxNDZkYWM3M2I4NzNkMThjZA==';

$postData = array(
    'source_addr' => 'INFO',
    'encoding'=>0,
    'schedule_time' => '',
    'message' => '[web]Deus is greeting you...',
    'recipients' => [array('recipient_id' => '1','dest_addr'=>'255755405492'),array('recipient_id' => '2','dest_addr'=>'255714242630')]
);

$Url ='https://apisms.beem.africa/v1/send';

$ch = curl_init($Url);
error_reporting(E_ALL);
ini_set('display_errors', 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => array(
        'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
        'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode($postData)
));

$response = curl_exec($ch);

if($response === FALSE){
        echo $response;

    die(curl_error($ch));
}
var_dump($response);

