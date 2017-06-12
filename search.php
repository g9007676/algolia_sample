<?php
require(__DIR__ . '/vendor/autoload.php');
$filter_names = array(
    'lancome氣墊', '雪花秀氣墊', 'chanel果凍', '蘭芝唇膜', '妙巴黎粉底',
    'lancome 氣墊', '雪花秀 氣墊', 'chanel 果凍', '蘭芝 唇膜', '妙巴黎 粉底'
);

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
