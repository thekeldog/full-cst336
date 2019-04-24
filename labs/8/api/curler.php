<?php

function make_curl($api_key, $search_param, $url){

    
    // default header shit
    $headers = array("Accept: application/json", "Content-Type: application/json");
    
    //step1
    $cSession = curl_init();
    
    /*
    //step2
    curl_setopt($cSession,CURLOPT_URL,"https://pixabay.com/api/?key=12230562-329c20fbe0bcb275979149d5a&q=" . $searchTerm . "&image_type=photo&pretty=true");
    curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($cSession,CURLOPT_HEADER, false);
    
    curl_setopt($cSession,CURLOPT_HTTPHEADER, array(
        "Accept: application/json",
        "Content-Type: application/json",
    ));
    */
    $terms = "";
    if(count($search_param) > 1){
        foreach($search_param as $term){
            //echo $term;
            $terms= $terms."+".$terms;
        }
    }else{
        $terms=$search_param[0];
    }
    
    
    //step2
    curl_setopt($cSession,CURLOPT_URL, $url."?key="."$api_key"."&q=".$terms."&image_type=photo&pretty=true");
    curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($cSession,CURLOPT_HEADER, false);
    curl_setopt($cSession,CURLOPT_HTTPHEADER, $headers);
    
    //step3
    $jsonData = curl_exec($cSession);
    $err = curl_error($cSession);
    
    //step4
    curl_close($cSession);
    
    //step5
    return ($jsonData);
}
?>