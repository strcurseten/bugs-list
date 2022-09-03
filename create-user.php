<?php

include "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

$client = new Client();
$headers = [
  'Authorization' => 'SAUTtK3z13qcsJnVQlaj_rbmva9MOUuE',
  'Content-Type' => 'application/json'
];
$body = '{
  "username": "kirsten",
  "password": "123",
  "real_name": "Kirsten Pear Fernandez",
  "email": "fernandez.kirstenpearl@auf.edu.ph",
  "access_level": {
    "name": "updater"
  },
  "enabled": false,
  "protected": false
}';
$request = new Request('POST', 'https://ipt10-2022.mantishub.io/api/rest/users/', $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();
