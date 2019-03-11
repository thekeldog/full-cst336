$(document).ready(function() {
   let zipCodes = [];
   let cities = [];
   let currLat = "";
   let currLong = "";
   let userNames = ["john","sal","kellen"];
   
   let zipCodeApiAddr = 'http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php';
   let countyFromStateApiAddr = 'http://itcdland.csumb.edu/~milara/ajax/countyList.php';
   
   function updateLatLong(data) {
       currLat = data.latitude;
       currLong = data.longitude;
       $('#latitude').html(" "+currLat);
       $('#longitude').html(" "+currLong)
       return;
   }
   function updateState(state) {
       //$('#chooseState').hide();
       $('#inputState').append("<option value ="+state+" selected>"+ state + "</option>");
   }
   function updateCity(city) {
       $('#inputCity').val(city)
   }
   function loadCounties(data) {
       console.log(data.length);
       var county = "";
       for(var i=0; i<data.length;i++) {
           county = data[i].county;
           $('#inputCounty').append("<option value="+county+" >" + county + "</option>");
       }
   }
   function isValidUser(userName){
       console.log("user name " + userName);
       $.ajax({
            type: "GET",
            url: "./php/formAPI.php",
            dataType: "json",
            data: {"userName": userName},
            success: function(data) {
                if((data === undefined || data.length == 0) ){
                    console.log('username available');
                }else{
                    if(data['username_available']===true){
                        $('#nameAvailable').css("color","green");
                        $('#nameAvailable').html("username available");
                    }else{
                        $('#nameAvailable').css("color","red");
                        $('#nameAvailable').html("username unavailable");
                        
                    }
                }
            },
            error: function(err) {
                console.log(arguments);  
            },
            complete: function(data, status) {
              // Called whether success or error
              //console.log(status);
            }
        });
       
       return true;
   }
   
   function isValidSubmit(){
       let password = $("#inputPassword").val();
       let verifyPass = $('#verifyPassword').val();
       let firstName = $('#firstNameInput').val();
       let lastName = $('#lastNameInput').val();
       let phoneNum = $('#inputPhone').val();
       let userName = $('#inputUsername').val();
       if(firstName === ""){
           return false;
       }
       if(lastName === ""){
           return false;
       }
       if(phoneNum === ""){
           return false;
       }
       if( password === "") {
           //alert("no password");
           $('#passHelp').html("Please enter a password");
           $('#passHelp').css("color","red");
          
           return false;
       }
       if( password !== verifyPass){
           //alert("they don't match");
           $('#passHelp').html("Passwords don't match");
           $('#passHelp').css("color","red");
           
           return false;
       }
       if ( password.includes(userName) ) {
            $('#passHelp').html("Password cannot contain user name");
            $('#passHelp').css("color","red");
       }
       else{
           console.log("valid submit!");
            return true;
       }
   }
   
   /**
    * When first loading the page we will suggest a password to the user
    * Update password field with auto-generated password
    */
    $.ajax({
        type: "get",
        url: "./php/formAPI.php",
        dataType: "json",
        data: { "password_suggest": true },
        success: function(data) {
            console.log(data);
            $('#inputPassword').val(data);
            $('#helpPassword').html("Here's a possible password");
            $('small#password').show();
        },
        error: function(err) {
            console.log(err);
        },
        complete: function(data, status) {
            //updateLatLong(data);
        }
    });
    // hides auto-gen password if modified
   $('#inputPassword').keydown(function() {
      $('#helpPassword').hide(); 
   });
  
  
   
   $('#inputUsername').change(function() {
       let userName = $('#inputUsername').val();
       //let valid_user = 
       if(isValidUser(userName)) {
           $('#nameAvailable').css("color","green");
           $('#nameAvailable').html("username available");
           
       }else{
           $('#nameAvailable').css("color","red");
           $('#nameAvailable').html("username unavailable");
       }
   })
   
   $('#inputZip').change(function() {
       $('#zipLabel').html("Zip Code");
       $('#zipLabel').css("color","black");
       
       let zipEntered = $('#inputZip').val();
       console.log("zip :" + zipEntered);
       if( zipEntered !== "" && zipEntered.length === 5) {
           $.ajax({
               type: "get",
               url: zipCodeApiAddr,
               dataType: "json",
               data: {"zip": zipEntered},
               success: function(data) {
                   updateLatLong(data);
                   //updateState(data.state);
                   updateCity(data.city);
               },
               error: function() {
                   alert("I don't feel so well");
               },
               complete: function(data, status){
                    //updateLatLong(data);
                }
               });
           }
           else{
               $('#zipHelp').html("Zip Code Not Found");
               $('#zipHelp').css("color","red");
           }
    });
    
    $('#inputState').change(function() {
          let selectedState = $('#inputState').val();
          console.log(selectedState)
          $.ajax({
               type: "get",
               url: countyFromStateApiAddr,
               dataType: "json",
               data: {"state": selectedState},
               success: function(data) {
                   console.log(data);
                   loadCounties(data);
               },
               error: function() {
                   alert("I don't feel so well");
               },
               complete: function(data, status){
                    //updateLatLong(data);
                }
               }); 
    });
   
   $('#submitButton').on('click', function(e) {
       let forms = document.getElementsByClassName('needs-validation');
       console.log(isValidSubmit());
       
       if(isValidSubmit()){
           let userName = $('#inputUsername').val();
           let password = $("#inputPassword").val();
          
           $.ajax({
               type: "GET",
               url: "./php/formAPI.php",
               dataType: "json",
               data: {"userName": userName, "password": password},
               success: function(data) {
                   console.log(data);
                
               },
               error: function() {
                   alert("I don't feel so well");
               },
               complete: function(data, status){
                    //updateLatLong(data);
                }
               }); 
           
        alert("Welcome to the team "+ $('#firstNameInput').val()+"!");
       }else{
           e.preventDefault();
           let validation = Array.prototype.filter.call(forms, function(form) {
           if (form.checkValidity() === false) {
               
            }
            })
           
           
           return;
       }
   })
   
});