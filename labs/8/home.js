$(document).ready(function(){
  /* global $*/
  console.log("I'm ready!");
  
  $('#searchButton').click(function(event){
      //event.preventDefault();
      let searchParam = $('#searchText').val();
      console.log(searchParam);
      $.ajax({
        type: "GET",
        url: "./api/api.php",
        dataType: "json",
        data: {
          "param": searchParam
        },
        success: function(data) {
          console.log("successfull call!");
          console.log(data['hits'][1]["previewURL"]);
          
          $("#33").append("<div class='card'>");
                      $("#33").append("<img src="+data['hits'][1]['previewURL']+" class='card-img-top' alt='face'>");
                      $("#33").append("<div class='card-body'></div></div>");
                      
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