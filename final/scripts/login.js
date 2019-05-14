$(document).ready(function(){
   
   $("#loginButton").click(function(){
      console.log('in log-in onClick'); 
      
      let userName = $('#userName').val();
      let userPassword = $('#userPassword').val();
      console.log(userName+userPassword)
      
    //   $.ajax({
    //             type: "GET",
    //             url: "api/user_login.php",
    //             dataType: "json",
    //             data: {
    //                 "userName": userName,
    //                 "passWord": userPassword
    //             },
    //             success: function(data) {
    //                 if(data['success'] === true){
    //                     console.log("you logged in you savage!")
    //                     window.location.href = 'index.php'
    //                 }else{
    //                     console.log("you messed something up, bro")
    //                 }

    //             },
    //             error: function(data){
    //               console.log("that didn't go well");  
    //             },
    //             complete: function(data, status) { //optional, used for debugging purposes
    //                 //console.log(status);
    //             }
    //         });
      
   });
   
   $('#registerButton').click(function(){
      window.location.href = 'register.php'
   });
    
});