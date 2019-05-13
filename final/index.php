<?php
    session_start();
    if (!isset($_SESSION["username"])) {

        header("Location: login.php");

    }
?>
<!DOCTYPE html>

<html>
    <head>
        <!---bootstrap imports --->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Scheduler</title>
        <link href='./styles/index.css' rel='stylesheet' type='text/css' />
        <script src="scripts/moment.js"></script>
        <script src='scripts/dashboard.js'></script>
        
    </head>
        <div class="btn btn-secondary" id='logoutButton'>Logout</div>
        <div class = "container">
            <div class="row">
                <h1>The Scheduler App</h1>
            </div>
            <br>
            <div class ="row" id="inviteRow">
                <label for="inviteLink">Invitation Link: </label>
                <input type="text" id="inviteLink" ></input>
            </div>
            <div class="row" id="appTable">
            <!--<table class="table">-->
            <!--  <thead class="thead-dark">-->
            <!--    <tr>-->
            <!--      <th scope="col">Date</th>-->
            <!--      <th scope="col">Start</th>-->
            <!--      <th scope="col">Duration</th>-->
            <!--      <th scope="col">Booked By</th>-->
            <!--      <th scope="col">        <!-- Button trigger modal -->-->
            <!--        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">-->
            <!--          Add Appointment-->
            <!--        </button>-->
            <!--      </th>-->
            <!--    </tr>-->
            <!--  </thead>-->
            <!--      <div class="row" ></div>-->
            <!--  </table>-->
            </div>
            
        </div>
        <div class ="row" id="deleteModal"></div>
        

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Apointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="addAppForm">
                <div class="form-group row">
                    <label for="selectDate">Date: </label>
                    <input type="date" id="selectDate"></input>
                </div>
                <div class="form-group row">
                    <label for="startTime">Start: </label>
                    <input type="time" id="startTime"></input>
                </div>
                <div class="form-group row">
                    <label for="endTime">End: </label>
                    <input type="time" id="endTime"></input>
                </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" class="btn btn-primary" id="addAppBut">Add</button>
              </div>
            </div>
          </div>
        </div>

    
</html>