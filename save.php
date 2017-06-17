<?php


require(__DIR__ . '/vendor/autoload.php');
$client = new \AlgoliaSearch\Client("WKDDRK70D7", "71d5ed293564487794308eb423204d14");

$index = $client->initIndex('test');

$index->saveObject(
    [
        'objectID' => '201705290000000002',
        'name'  => 'CHANEL 香奈兒 山茶花保濕'
    ]
);
