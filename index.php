<?php

include "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

$client = new Client();
$headers = [
  'Authorization' => 'SAUTtK3z13qcsJnVQlaj_rbmva9MOUuE'
];

$request = new Request('GET', 'https://ipt10-2022.mantishub.io/api/rest/issues?page_size=10&page=1', $headers);
$res = $client->sendAsync($request)->wait();
$bugs = $res->getBody()->getContents();

define('TOKEN', 'SAUTtK3z13qcsJnVQlaj_rbmva9MOUuE');
define('MANTISHUB_URL', 'https://ipt10-2022.mantishub.io/');

$bugs_list = json_decode($bugs);

?>

<html>
    <title>IPT10 Bugs</title>
    <head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <h1>IPT10 Bugs List</h1>
            <h2><a href="">KIRSTEN PEARL FERNANDEZ</a></h2>
            <div class="container-fluid">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Summary</th>
                        <th scope="col">Severity</th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($bugs_list->issues as $bug)
                        {
                        echo '<tr>' . 
                        '<th scope="row">' . $bug->id . '</th>' .
                        '<td>' . $bug->summary . '</td>' .
                        '<td>' . $bug->severity->name . '</td>' .
                        '<td>' . $bug->status->name . '</td>' . 
                        '</tr>';
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>


