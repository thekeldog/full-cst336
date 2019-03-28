<!DOCTYPE html>
<html>
    <head>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
          integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
       <link href='../css/index.css' rel='stylesheet' type='text/css' />
        
    </head>
    <body>
        <div class="container">
            <div class="row" id="navbarRow">
                <a href="./pages/history.php" id="matchLink" >Match</a> | 
                <a href="#" id="historyLink" >History</a> 
            </div>
            <div class="row">
                <h1 id="pageTitle">History</h1>
            </div>
            <br>
        </div>
        <div class="row" id="historyHeader">
            <h2>Username</h2>
            <h2>Status</h2>
            <h2>When</h2>
        </div>
        <div id="matchHistoryRows"></div>
        <script>
            /*global $*/
            $(document).ready(function() {
                $.ajax({
                    type:"GET",
                    url: '../api/getMatchHistory.php',
                    dataType: 'json',
                    success: function(data, status){
                        console.log(data);
                        //data.forEach(function(key){
                        //    $("#matchHistoryRows").append(
                        //        "<h3>"+key['username']+"<h3>"
                        //        +"<h3>Status<h3>"
                        //        +"<h3>"+key['tm']+"<h3>");
                        //});
                    },
                    error: function(){
                         console.log("error in calling getMatchHistory API");
                    }
                });
            });
        </script>
        
    </body>
</html>