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

foreach($filter_names as $val) {
    $curl->post('http://makeups.adbert.com.tw/api/v1/api/searchPTName', array(
        'uid' => '5913c5c3c6011',
        'token' => 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjBkNDI5Y2I1M2Q4YTFlZjA5ZjFhZTY1ODc1N2JlMjFlNzZhNjEzN2IifQ.eyJhenAiOiI0Mzc3MTAxNzAzNzktcHMxNXBnYzM1Zml0cWkydThvc2NjbTNibHIwbHVpN3EuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJhdWQiOiI0Mzc3MTAxNzAzNzktNnI2Mmp1MnZpMW50aXZxYWplZHRpanVlM2Ztb2dhcTQuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMTgwNzU0NDI1MjkyODEyMDA0MzUiLCJlbWFpbCI6ImFkYmVydGZtMDAxQGdtYWlsLmNvbSIsImVtYWlsX3ZlcmlmaWVkIjp0cnVlLCJpc3MiOiJodHRwczovL2FjY291bnRzLmdvb2dsZS5jb20iLCJpYXQiOjE0OTY3MTQ3ODQsImV4cCI6MTQ5NjcxODM4NCwibmFtZSI6IuiJvue-juWmnSIsInBpY3R1cmUiOiJodHRwczovL2xoNS5nb29nbGV1c2VyY29udGVudC5jb20vLU5MTEU3UWh3dnlZL0FBQUFBQUFBQUFJL0FBQUFBQUFBQUFBL0FBeVlCRjdnMnFwRjU0d1UxSDIxenljdzhIN192djE5LVEvczk2LWMvcGhvdG8uanBnIiwiZ2l2ZW5fbmFtZSI6Iue-juWmnSIsImZhbWlseV9uYW1lIjoi6Im-IiwibG9jYWxlIjoiemgtVFcifQ.anwUVs1gZMmiYUKSIYhZlOO9e-ar64Q0xP6VGKQldvQp1T3f5NIuV32PL1vwybGRE-O-yp1R_lhTjmDDQ5XqVMybwKpWwBsGh0coeAT3GGPGv-3vrrj2QV17FB7juiTS-rmCkXtIutznxtd-xRZiv8p8Z-WH17c5wHUQUFwouHHr9W5L2q0ebHHlRFptKBi-Z00axiG2umAfHSkDwHC6gN-GBqlPa7v5JnNq15urphI69CHH44Rgg9aOmxV2PzvFRQA4pk0GoQ90mm65iGylfUVHAoaiJ6TFqzd0ACw26jU_KYiHkI9Xnq4rwI9e0c4I0ZsJb70Hkw-pl2tUOD7d6Q',
        'keyword' => $val
    ));

    $data = json_decode($curl->response, true);

    foreach($data['list'] as $dval) {
        $arts[$dval['pid']] = array(
            'name' => $dval['product_name'],
            'time' => $dval['photoDate'],
            'photo' => $dval['product_photoURL'],
            'count' => $dval['search_count'],
            'price' => $dval['price'],
            'objectID' => $dval['pid']
        );
    }
}

$arts = array_values($arts);
$index->addObjects($arts);

var_dump($arts);
