<?php
error_reporting(false);
header('Content-type: application/json;'); 

$urlkobs=$_GET['url'];
$langkobs=$_GET['lang'];

$qwe=file_get_contents('https://onlineocrconverter.com/static/js/main.12f0ba0b.chunk.js');

preg_match_all('#"value":"(.*?)","name":"(.*?)","url":"(.*?)"#is',$qwe,$sidepath1);

$t2t=array_search($langkobs,$sidepath1[2]);

if($t2t!=null && is_numeric($t2t)){

$data['language'] = $sidepath1[1][$t2t];
$data['url'] = $urlkobs;

}else{
echo json_encode(['ok' => false, 'channel' => '@SIDEPATH','writer' => '@meysam_s71', 'Results' =>'wrong language' , 'languages'=>$sidepath1[2]], 448);

}

$ip_long = Array (
Array (' 607649792 ', ' 608174079 '),//36.56.0.0-36.63.255.255
Array (' 1038614528 ', ' 1039007743 '),//61.232.0.0-61.237.255.255
Array (' 1783627776 ', ' 1784676351 '),//106.80.0.0-106.95.255.255
Array (' 2035023872 ', ' 2035154943 '),//121.76.0.0-121.77.255.255
Array (' 2078801920 ', ' 2079064063 '),//123.232.0.0-123.235.255.255
Array ('-1950089216 ', '-1948778497 '),//139.196.0.0-139.215.255.255
Array ('-1425539072 ', '-1425014785 '),//171.8.0.0-171.15.255.255
Array ('-1236271104 ', '-1235419137 '),//182.80.0.0-182.92.255.255
Array ('-770113536 ', '-768606209 '),//210.25.0.0-210.47.255.255
Array ('-569376768 ', '-564133889 '),//222.16.0.0-222.95.255.255
);
$rand_key = Mt_rand (0, 9);
$ip = Long2ip(Mt_rand($ip_long[$rand_key][0], $ip_long[$rand_key][1]));

$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($data));
curl_setopt($ch, CURLOPT_URL,"https://api.ocr.arkayapps.com/url");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
//curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");
//curl_setopt($ch, CURLOPT_HEADER, true);

$headers = array();

$headers[] = 'Accept: application/json';
$headers[] = 'Accept-Encoding: gzip, deflate, br';
$headers[] = 'Accept-Language: en-US,en;q=0.9,fa;q=0.8';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Content-Length: 60';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Host: api.ocr.arkayapps.com';
$headers[] = 'Origin: https://onlineocrconverter.com';
$headers[] = 'Referer: https://onlineocrconverter.com/';
$headers[] = 'sec-ch-ua: " Not A;Brand";v="99", "Chromium";v="98", "Google Chrome";v="98"';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'sec-ch-ua-platform: "Windows"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: cross-site';
$headers[] = 'token: null';
$headers[] = 'mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; WOW64; trident/6.0)';
$headers[] = "Client-ip: $ip";
$headers[] = "x-forwarded-for: $ip";

curl_setopt($ch, CURLOPT_HTTPHEADER, json_encode($headers));
$meysam1= curl_exec($ch);
curl_close($ch);    

$ttt=json_decode($meysam1,true);

//echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@meysam_s71', 'Results' =>$ttt['text'] , 'languages'=>$sidepath1[2]], 448);


print_r($meysam1);










