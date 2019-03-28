/*global $*/
$(document).ready(function(){
    $.ajax({
        type:"GET",
        url: './api/getUserMatches.php',
        data: [],
        dataType: 'json',
        success: function(data, status){
            let randomUser = data[Math.floor(Math.random()*data.length)];
            $("#matchCard").append("<div class=card mb-3 style='max-width: 540px;'"
                +"<div class='row no-gutters'>"
                +"<div class='col-md-4'>"+
                  "<img src='" + randomUser['picture_url']+ "' class='card-img' id ='cardImage'>"+
                "</div>"+
                "<div class='col-md-8'>"+
                 " <div class='card-body'>"+
                    "<h2 class='card-title' id='cardTitle'> About @"+randomUser['username']+"</h2>"+
                    "<p class='card-text' id='cardText'>"+randomUser['about_me']+ "</p>"+
                    "<p class='card-text'><small class='text-muted'></small></p>"+
                 "</div>"+
                "</div>"+
              "</div>" 
              );
        },
        error: function(){
             console.log("error in calling getCategory API");
        }
    });
});