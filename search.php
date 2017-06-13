<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require(__DIR__ . '/vendor/autoload.php');
$filter_names = array(
    'lancome氣墊', '雪花秀氣墊', 'chanel果凍', '蘭芝唇膜', '妙巴黎粉底',
    'lancome 氣墊', '雪花秀 氣墊', 'chanel 果凍', '蘭芝 唇膜', '妙巴黎 粉底'
);

$client = new \AlgoliaSearch\Client("MFVSX53O5D", "77aa47bb06fec4d86fbabdfe72129008");

$index = $client->initIndex('ATF_product');
$res = $index->search($_POST['keyword'], array(
    'attributesToRetrieve' => 'objectID,name,keyword'
));
if (empty($res['hits'])) {
    echo 'no';
    exit;
}

echo json_encode($res['hits']);
exit;
