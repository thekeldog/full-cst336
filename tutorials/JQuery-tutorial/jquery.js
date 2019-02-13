$(document).ready(function() {
            //JQuery Code section
            console.log('running on ready');
            $("#weekday").css("color","red");
            $(".smallFont").css("color","blue");
            
            $('#box').click( function() {
                
                $('#box').animate({left:'250px'});
                $('#box').css("background","green");
                setTimeout( function() {
                   $('#box').animate({right:'250px'});
                   $('#box').css("background", "red");
                }, 2000);
                
            });
        })