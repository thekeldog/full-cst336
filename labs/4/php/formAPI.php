<?php
include('./Users.php');
if(!class_exists('User')){
  include('./User.php');
}
    
  session_start();
    $_SESSION['user_array'] = array();
    array_push($_SESSION['user_array'], new User('kellen','2infinite'));
    
    $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);

    switch($httpMethod) {
      case "OPTIONS":
        // Allows anyone to hit your API, not just this c9 domain
        header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
        header("Access-Control-Allow-Methods: POST, GET");
        header("Access-Control-Max-Age: 3600");
        exit();
      case "GET":
        onGet();
        break;
      case 'POST':
        // Get the body json that was sent
        $rawJsonString = file_get_contents("php://input");

        //var_dump($rawJsonString);

        // Make it a associative array (true, second param)
        $jsonData = json_decode($rawJsonString, true);

        // TODO: do stuff to get the $results which is an associative array
        $results = array();

        // Allow any client to access
        header("Access-Control-Allow-Origin: *");
        // Let the client know the format of the data being returned
        header("Content-Type: application/json");

        // Sending back down as JSON
        echo json_encode($results);

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
    
    function onGet(){
        // Allow any client to access
        header("Access-Control-Allow-Origin: *");
        // Let the client know the format of the data being returned
        header("Content-Type: application/json");
        // Get the body json that was sent
        $rawJsonString = file_get_contents("php://input");

        // Make it a associative array (true, second param)
        $jsonData = json_decode($rawJsonString, true);
        echo ($jsonData);
         // TODO: do stuff to get the $results which is an associative array
        $results = array();
        //array_push($results, "Passed from onGet Method in my php");

        
        switch ($_GET['password_suggest']) {
            case true:
              echo json_encode(Users::suggest_password());
              return;
            
        }  
        if( !empty($_GET['userName']) ) {
          $user_name = $_GET['userName'];
          foreach ($_SESSION['user_array'] as $user) {
            //echo $user->user_name;
          }
          //if username already in system, return false
          foreach($_SESSION['user_array'] as $user) {
            
            if($user->user_name === $user_name){
              //echo "user name found!";
              $results['username_available'] = false;
              echo json_encode($results);
              return;
            }else{
              $results['username_available'] = true;
              echo json_encode($results);
              return;
            }
          }
        }
        
       
        // Sending back down as JSON
        echo json_encode($results);
    
    }

    

?>