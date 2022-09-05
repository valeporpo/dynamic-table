<?php

$curlSES = curl_init(); 

curl_setopt($curlSES,CURLOPT_URL,"https://imdb-api.com/en/API/Top250Movies/k_n0syenze");
curl_setopt($curlSES,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curlSES,CURLOPT_HEADER, false); 

$result = curl_exec($curlSES);

curl_close($curlSES);

echo $result;

?>