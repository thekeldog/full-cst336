

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

    
    $("#addAppBut").click(function(){
        console.log("add clicked")
        let date = $("#selectDate").val()
        let start = $("#startTime").val()
        let end = $("#endTime").val()
       
        $.ajax({
            type:"POST",
            url:"api/reservations.php",
            dataType:"json",
            data:{
                "request" : "addApp",
                "date" : date,
                "start" : start,
                "end" : end
            },
            success: function(data) {
                if (data['success'] == true){
                    console.log("update successfull")
                    window.location.href = "index.php"
                }else{
                    console.log("didn't update")
                }
            },
            error: function(data){
                console.log("Ajax failed")
            }
        })
    })
    

    
    
});

$(document).on('click', "#detailButton", function(){
    console.log("details")
    console.log($(this).attr("data-app-id"))
})
$(document).on('click', "#deleteButton", function(){
    let appId = ($(this).attr("data-app-id"))
    $.ajax({
        type: "GET",
        url: "api/reservations.php",
        dataType: "html",
        data:{
            "request" : "getApp",
            "appId" : appId
        },
        success: function(data){
            $("#deleteModal").html(data)
            $('#deleteThisModal').show()
        },
        error: function(data) {
            console.log("something wrong");
        }
        
    })
    
})

$(document).on('click', "#removeAppButton", function() {
    let appId = $(this).attr("data-appId")
    console.log(appId)
    $.ajax({
        type: "POST",
        url: "api/reservations.php",
        dataType: "json",
        data:{
            "request" : "deleteApp",
            "appId" : appId
        },
        success: function(data){
            if(data["success"] === true){
                console.log("success!")
                window.location.href = "index.php"
            }else{
                console.log("unsuccessful")
            }
        },
        error: function(data) {
            console.log("something wrong");
        }
        
    })    
    
})