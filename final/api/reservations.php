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
          case "getApp":
              get_app_modal($_GET["appId"]);
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
      switch($_POST["request"]){
        case "addApp":
          add_appointment($_POST["date"], $_POST["start"], $_POST["end"], $_SESSION["user_id"], "Not Booked");
          break;
        case "deleteApp":
          delete_appointment($_POST["appId"]);
          break;
      }
      
      break;
  }
  
  function delete_appointment($appId){
    try{
        $dbConn = get_database_connection();
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM appointments " .
               "WHERE Id = :Id";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute(array(":Id"=>$appId));
        
        echo json_encode(array("success"=>true));
        
    } catch(PDOException $ex) {
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
  
  function get_app_modal($appId){
      try{
        $dbConn = get_database_connection();
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM appointments " .
               "WHERE Id = :Id";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute(array(":Id"=>$appId));
        
        $row = $stmt->fetch();
        echo ("<div class='modal' tabindex='-1' role='dialog' id='deleteThisModal' aria-labelledby='modal'>
                <div class='modal-dialog' role='document'>
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <h5 class='modal-title'>Delete Appointment?</h5>
                      <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>
                    <div class='modal-body'>
                      <div class ='row'>
                        <p> Start Time: ".$row['date']." ".$row['start']."</p>
                      </div>
                      <div class ='row'>
                        <p> End Time: ".$row['date']." ".$row['end']."</p>
                      </div>
                      <div class ='row'>
                        <p>Are you sure you want to remove the time slot? This cannot be undone.</p>
                      </div>
                    </div>
                    <div class='modal-footer'>
                      <button type='button' class='btn btn-danger' id='removeAppButton' data-appId='".$row["Id"]."'>Yes, Remove it!</button>
                      <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                    </div>
                  </div>
                </div>
              </div>");
        
      }catch(PDOException $ex) {
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
        
  function add_appointment($date, $startTime, $endTime, $user_id, $booked_by){
      try{
        $dbConn = get_database_connection();
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "INSERT INTO appointments (date, start, end, booked_by, host_id) ".
               "VALUES (:date, :start, :end, :booked_by, :host_id)";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute(array(":date"=>$date,":start"=>$startTime,":end"=>$endTime,":booked_by"=>$booked_by,":host_id"=>$user_id));
        
        echo json_encode(array("success"=>true));
        
      } catch(PDOException $ex) {
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
                  <th scope='col'>Duration (hours)</th>
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
              if( strtotime($row['date']) > strtotime(date("Y-m-d"))){
                $duration = round(abs(strtotime($row['end']) - strtotime($row['start']))/3600,2);
                echo("<tr><td>".$row['date']."</td>
                     <td>".$row['start']."</td>
                     <td>".$duration."</td>
                     <td>".$row['booked_by']."</td>
                     <td> <button class='btn btn-outline-primary' id='detailButton' data-app-id=".$row['Id'].">Details</button>
                     <button class='btn btn-outline-danger' id='deleteButton' data-app-id=".$row['Id'].">Delete</button></td></tr>"
                );
              }
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