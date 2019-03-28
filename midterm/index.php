<!DOCTYPE html>
<html>
    <head>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
          integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
       <link href='./css/index.css' rel='stylesheet' type='text/css' />
        <script type="text/javascript" src="js/index.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row" id="navbarRow">
                <a href="#" id="matchLink" >Match</a> | 
                <a href="./pages/history.php" id="historyLink" >History</a> 
            </div>
            <div class="row">
                <h1 id="pageTitle">Match</h1>
            </div>
            <br>
            
            <div id="matchCard">
              
            </div>
            <div class="row justify-content-around" id="buttonRow">
                <button class="likeDislike"><i class="far fa-thumbs-down"></i>Dislike</button>
                <button class="likeDislike">?</button>
                <button class="likeDislike"><i class="far fa-thumbs-up"></i>Like</button>
            </div>
            
        </div>
    </body>
    
</html>