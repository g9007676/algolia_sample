<?php
require(__DIR__ . '/vendor/autoload.php');
$client = new \AlgoliaSearch\Client("WKDDRK70D7", "71d5ed293564487794308eb423204d14");
$index = $client->initIndex('test');

var_Dump(123);
$result = $index->browseFrom('果漾特調', ['filters' => '42');
var_dump($result);
