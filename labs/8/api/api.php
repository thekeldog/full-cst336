<?php
    session_start();
    require_once 'curler.php';
    
    require __DIR__ . '/../../../vendor/autoload.php';

    $log = new Monolog\Logger('testing');
    $log->pushHandler(new Monolog\Handler\StreamHandler(__DIR__ . '/../../../vendor/monolog/app.log', Monolog\Logger::INFO));
    $log->info('I am inside the upload file form stuff');

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
      
      $json = json_decode($return, true);
      
      echo('<div class="card-deck">');
      foreach($json['hits'] as $result) {
      echo('
        <div class ="card p-3">
        <div class="card text-white bg-dark" style="width: 18rem;"> 
        <img class="card-img-top" src="'.$result['previewURL'].'" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">'.$result['tags'].'</p>
          <button id="'.$result['id'].'" search = "'.$search_params[0].'" value = "'.$result['previewURL'].'"type="submit" class="btn btn-primary favorite-button" style = "color:black; border:black;">Favorite</button>
        </div>
        </div>
        </div>
      ');
    }
    echo('</div>');
      //echo $return;
        
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