<?php

require __DIR__.'/vendor/autoload.php';

use Guzzle\Http\Client;

// create our http client (Guzzle)
$client = new Client('http://localhost:8000', array(
    'request.options' => array(
        'exceptions' => false,
    )
));


$nickname = 'ObjectOrienter' . rand(0, 999);
$data = [
    'nickname' => $nickname,
    'avatarNumber' => 5,
    'tagLine' => 'a test dev!',
];

$request = $client->post('/api/programmers', ['Accept' => 'application/json'], json_encode($data));
$response = $request->send();

echo $response;
echo "\n\n";

$url = $response->getHeader('Location');
$request = $client->get($url);
$response = $request->send();

echo $response;
echo "\n\n";


$request = $client->get('/api/programmers');
$response = $request->send();

echo $response;
echo "\n\n";
