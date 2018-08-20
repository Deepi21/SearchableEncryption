<?php

include("sftp.util.php");
$array=$_POST["keyword"];
file_put_contents('keywordSearch.txt', $array);

$src_file = "/var/www/html/server1/keywordSearch.txt";
$dest_file = "/var/www/html/server2/keywordSearch.txt";
upload_ssh2file($src_file,$dest_file);
$url= "http://139.59.15.153:82/receive_search.php";
$ch=curl_init($url);
curl_exec($ch);
unlink('keywordSearch.txt');

?>
