<?php

function get_database_connection($dbname = "ottermart") {
    $host = "localhost"; //cloud 9
    $user_name = 'root';
    $password = "";
    
    /*
    Host 	bfjrxdpxrza9qllq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com 	
    Username 	sf1qzp17uzk5ms6f 	
    Password 	p6n7qso52n2og7b7 	
    Port 	3306 	
    Database 	lbkixx7usdyvo8hh
    */
    
    if(strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("mysql://sf1qzp17uzk5ms6f:p6n7qso52n2og7b7@bfjrxdpxrza9qllq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/lbkixx7usdyvo8hh"));
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 

    
    //create db connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $user_name, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}

?>