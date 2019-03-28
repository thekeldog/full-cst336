<?php

function get_database_connection($dbname = "cinder") {
    $host = "localhost"; //cloud 9
    $user_name = 'root';
    $password = "";
    
    //create db connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $user_name, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}

?>