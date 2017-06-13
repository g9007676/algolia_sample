<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require(__DIR__ . '/vendor/autoload.php');

$client = new \AlgoliaSearch\Client("MFVSX53O5D", "77aa47bb06fec4d86fbabdfe72129008");

$index = $client->initIndex('ATF_article');
$res = $index->search($_POST['keyword'], array(
    'attributesToRetrieve' => 'objectID,name,keyword,type',
    'facetFilters' => array("type:{$_POST['type']}"),
    'restrictSearchableAttributes' => array(
        'name', 'keyword'
    )
));
if (empty($res['hits'])) {
    echo 'no';
    exit;
}

echo json_encode($res['hits']);
exit;
