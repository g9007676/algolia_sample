<?php
require(__DIR__ . '/vendor/autoload.php');
$client = new \AlgoliaSearch\Client("WKDDRK70D7", "71d5ed293564487794308eb423204d14");

$index = $client->initIndex('test');
$res = $index->deleteObjects(["201705290000000002"]);
