<?php
    session_start();
    require_once 'curler.php';

    $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);
    

  switch($httpMethod) {
    case "OPTIONS":
      // Allows anyone to hit your API, not just this c9 domain
      header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
      header("Access-Control-Allow-Methods: POST, GET");
      header("Access-Control-Max-Age: 3600");
      exit();
    case "GET":
      // TODO: Access-Control-Allow-Origin
      // Allow any client to access
      header("Access-Control-Allow-Origin: *");
      // Let the client know the format of the data being returned
      header("Content-Type: application/json");

      // Get the body json that was sent
      $rawJsonString = file_get_contents("php://input");

      // Make it a associative array (true, second param)
      $jsonData = json_decode($rawJsonString, true);
      
      // Curl params to be passed into curl function
      $search_params = explode('/\s+/', $_GET["param"]);
      //echo "search params:".$search_params;
        
      $pixa_api_key = "12230553-78b5c73b6f2d77a123442cc1c";    
      $pixa_url = "https://pixabay.com/api/";

      $return = make_curl($pixa_api_key, $search_params, $pixa_url);

      echo $return;
        
      break;
     
    case 'POST':
      http_response_code(401);
      echo "Not Supported";
      break;    
        

    case 'PUT':
      // TODO: Access-Control-Allow-Origin
      http_response_code(401);
      echo "Not Supported";
      break;
    case 'DELETE':
      // TODO: Access-Control-Allow-Origin
      http_response_code(401);
      break;
  }

?>