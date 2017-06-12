<?php
require(__DIR__ . '/vendor/autoload.php');
$client = new \AlgoliaSearch\Client("WKDDRK70D7", "71d5ed293564487794308eb423204d14");
$index = $client->initIndex('test');
foreach ($index->browse('', ['filters' => 'i<42']) as $hit) {
        print_r($hit);
}


var_Dump(123);
$result = $index->browseFrom('', ['filters' => 'i<42']);
var_dump($result['cursor']);
