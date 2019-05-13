

$(document).ready(function(){
    console.log("ready")
    console.log(moment())
    
    $.ajax({
        type:"GET",
        url: "api/reservations.php",
        dataType:"html",
        data: {
            "request" : "getAll"
        },
        success: function(data) {
            $('#appTable').html(data)
            //console.log(data)
        },
        error: function(data) {
            console.log("couldn't get resis")
        }
    })
    
    
});