import 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js';

$(document).ready(function() {
            //JQuery Code section
            console.log('running on ready');
            $("#weekday").css("color","red");
            $(".smallFont").css("color","blue");
            
            $('#box').click( function() {
                
                $('#box').animate({left:'250px'});
                $('#box').css("background","green");
                setTimeout( function() {
                   $('#box').css("left","inherit")
                   $('#box').css("background", "red");
                }, 2000);
                
            });
        })