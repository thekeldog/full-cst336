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
       console.log("user names: " + userNames.length);
       for(var i=0; i<userNames.length; i++) {
           if(userName === userNames[i]) {
               return false;
           }
       }
       return true;
   }
   
   function isValidSubmit(){
       let password = $("#inputPassword").val();
       let verifyPass = $('#verifyPassword').val();
       let firstName = $('#firstNameInput').val();
       let lastName = $('#lastNameInput').val();
       let phoneNum = $('#inputPhone').val();
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
       else{
            return true;
       }
   }
   
   $('#inputUsername').change(function() {
       let userName = $('#inputUsername').val();
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
       //console.log("zip :" + zipEntered);
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
       if(isValidSubmit()){
        alert("Welcome to the team "+ $('#firstNameInput').val()+"!");
       }else{
           e.preventDefault();
           return;
       }
   })
   
});