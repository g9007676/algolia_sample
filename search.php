<?php
require(__DIR__ . '/vendor/autoload.php');
$client = new \AlgoliaSearch\Client("WKDDRK70D7", "71d5ed293564487794308eb423204d14");

$index = $client->initIndex('test');
//$res = $index->search('山茶奎', [
//        'attributesToRetrieve' => 'name,photo,count',
//      //  'typoTolerance' => 'min',
//      //  'minWordSizefor2Typos' => 20,
////        'queryType' => 'prefixAll' //prefixLast//prefixNone//prefixAll
//    ]
//);
$res = $index->searchForFacetValues("name", "山茶保濕CHANEL");
var_dump($res);
