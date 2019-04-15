$(document).ready(function(){
 
    $('#registerButton').click(function(){
        
       
        
        let userName = $('#userName').val();
        let userPassword = $('#userPassword').val();
        let confirmPassword = $('#confirmPassword').val();
        
        console.log(userName + ' ' + userPassword+' '+confirmPassword);
        
        if(userName.length === 0){
            $('#failMessage').html('Please Provide a Username')
            $('#failMessage').css('color','red')
            $('#failMessage').css('font-size','15px')
            $('#failMessage').show()  
            return;
        }
        if(userPassword.length === 0){
            $('#failMessage').html('Please Provide a Password')
            $('#failMessage').css('color','red')
            $('#failMessage').css('font-size','15px')
            $('#failMessage').show()  
            return;
        }
        if(confirmPassword.length === 0){
            $('#failMessage').html('Please Confirm Password')
            $('#failMessage').css('color','red')
            $('#failMessage').css('font-size','15px')
            $('#failMessage').show()  
            return;
        }
        
        
        
        $.ajax({
                type: "post",
                url: "api/signUp.php",
                dataType: "json",
                data: {
                    "userName": userName,
                    "password": [userPassword, confirmPassword]
                },
                success: function(data) {
                    if(data['success'] === true){
                        window.location.href = '../otter-mart/index.php';
                    }else{
                        $('#failMessage').html(data['message'])
                        $('#failMessage').css('color','red')
                        $('#failMessage').css('font-size','15px')
                        $('#failMessage').show()  
                    }
                    
                },
                error: function(data){
                
                }, 
                complete: function(data, status) { //optional, used for debugging purposes
                    //console.log(status);
                }
        });
        
    })
    
});