<?php
require(__DIR__ . '/vendor/autoload.php');

$filter_names = array(
    'lancome氣墊', '雪花秀氣墊', 'chanel果凍', '蘭芝唇膜', '妙巴黎粉底',
    'lancome 氣墊', '雪花秀 氣墊', 'chanel 果凍', '蘭芝 唇膜', '妙巴黎 粉底'
);
$curl = new Curl\Curl();
$arts = array();
$client = new \AlgoliaSearch\Client("WKDDRK70D7", "71d5ed293564487794308eb423204d14");
$index = $client->initIndex('test');

$res = $index->search('lancome哈氣墊', ['attributesToRetrieve' => 'name', 'hitsPerPage' => 50]);
var_Dump($res);
//foreach($res['hits'] as $val) {
//    var_dump($val['name']);
//}
