<?php


//step1
$cSession = curl_init();

//step2
curl_setopt($cSession,CURLOPT_URL,"http://www.google.com/search?q=curl");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false);

//step3
$jsonData = curl_exec($cSession);
$err = curl_error($cSession);

//step4
curl_close($cSession);

//step5
echo $jsonData;

?>