<?php
$api_key = "BQAX7madfZD3IC-Jemls9rf3JNeaodKDR1bQ_QnDy7x6amsK8pqM35hIp783q8zCXFWEeeWWJIaZPdBTrV3nCCd_FYmkvQxwArZbp1__xixUNWao7g0U02D_o5JxHZCGvDWRI8WX8tld7Z62RA";

$headers = array("Accept: application/json", "Content-Type: application/json" ,"Authorization: Bearer BQAX7madfZD3IC-Jemls9rf3JNeaodKDR1bQ_QnDy7x6amsK8pqM35hIp783q8zCXFWEeeWWJIaZPdBTrV3nCCd_FYmkvQxwArZbp1__xixUNWao7g0U02D_o5JxHZCGvDWRI8WX8tld7Z62RA");

//step1
$cSession = curl_init();



//step2
curl_setopt($cSession,CURLOPT_URL, "https://api.spotify.com/v1/browse/featured-playlists");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false);
curl_setopt($cSession,CURLOPT_HTTPHEADER, $headers);

//step3
$jsonData = curl_exec($cSession);
$err = curl_error($cSession);

//step4
curl_close($cSession);

//$results = json_decode($jsonData);
//var_dump($results);
//step5
echo ($jsonData);

?>