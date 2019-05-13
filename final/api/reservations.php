<?php
session_start();
  require_once 'connection.php';
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
      switch($_GET["request"]){
          case "getAll":
              get_apps_for_user($_SESSION["user_id"]);
              break;
      }
      break;
    
    case "POST":
      // TODO: Access-Control-Allow-Origin
      // Allow any client to access
      header("Access-Control-Allow-Origin: *");
      // Let the client know the format of the data being returned
      header("Content-Type: application/json");
            // Get the body json that was sent
      $rawJsonString = file_get_contents("php://input");
      // Make it a associative array (true, second param)
      $jsonData = json_decode($rawJsonString, true);
      break;
  }
        
  
  function get_apps_for_user($user_id){
      try{
          $dbConn = get_database_connection();
          $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
          $sql = "SELECT * FROM appointments " .
                 "WHERE host_id = :user_id";
          $stmt = $dbConn->prepare($sql);
          $stmt->execute(array(":user_id"=>$user_id));
          
          $rows = $stmt->fetchAll();
          //echo json_encode($rows);
          echo("<table class='table'>
              <thead class='thead-dark'>
                <tr>
                  <th scope='col'>Date</th>
                  <th scope='col'>Start</th>
                  <th scope='col'>Duration</th>
                  <th scope='col'>Booked By</th>
                  <th scope='col'>        <!-- Button trigger modal -->
                    <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>
                      Add Appointment
                    </button>
                  </th>
                </tr>
              </thead>");
          
          echo("<tbody>");
          foreach($rows as $row){

              echo("<tr><td>".$row['date']."</td>
                   <td>".$row['start']."</td>
                   <td>".$row['end']."</td>
                   <td>".$row['booked_by']."</td>
                   <td> <button type='button' class='btn btn-outline-primary'>Details</button>
                   <button type='button' class='btn btn-outline-danger'>Delete</button></td></tr>"
              );
          }
          echo("</tbody></table>");
          
      } catch (PDOException $ex) {
        switch ($ex->getCode()) {
          case "23000":
            echo json_encode(array(
              "success" => false, 
              "message"=> "email taken, try another",
              "details" => $ex->getMessage()));
            break;
          default:
            echo json_encode(array(
              "success" => false, 
              "message"=> $ex->getMessage(),
              "details" => $ex->getMessage()));
            break;
        }
        }
  }
?>