$(document).ready(function(){
  /* global $*/
  console.log("I'm ready!");
  
  // function pickNine(dataLength){
  //   var randos = Array();
  //   if (dataLength < 9) {
  //     for (var i = 0; i <= dataLength; i++) {
  //       randos[i] = i;  
  //     }
  //     return randos;
  //   } 
  //   else {
  //       for (var i = 0; i < 9; i++) {
  //         var pick = Math.floor(Math.random() * dataLength);
  //         if (!randos.includes(pick)) {
  //           randos[i] = pick;
  //         }else{
  //           // try again, number selected was already picked
  //           i--;
  //         }
  //       }
  //   }
  //   return randos; 
  // }
  
  $('#searchButton').click(function(event){
      //event.preventDefault();
      let searchParam = $('#searchText').val();
      console.log(searchParam);
      $.ajax({
        type: "GET",
        url: "./api/api.php",
        dataType: "html",
        data: {
          "param": searchParam
        },
        success: function(data) {
         
          $("#cardContainer").html(data);
        },
        error: function(data) {
          console.log("that didn't go well");
        },
        complete: function(data, status) { //optional, used for debugging purposes
          //console.log(status);
        }
      });
      return false;
  });
  
});