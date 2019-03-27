/*global $*/
$(document).ready( function () {
    
    $.ajax({
        type: 'GET',
        url: './api/getCategories.php',
        data: [],
        dataType: 'json',
        success: function(data, status){
            data.forEach(function(key){
                $("[name=category]").append("<option value="+key["catID"] +">"
                  +key["catName"] + "</option>"); 
                });
              
        },
        error: function(){
             console.log("error in calling getCategory API");
        }
    });
    
    $("#searchForm").on('click', function() {
       $.ajax({
           type: "GET",
           url: "./api/getSearchResults.php",
           dataType: "json",
           data: {
               "product" : $("[name=product]").val(),
               "category": $("[name=category]").val(),
               "priceFrom": $("[name=priceFrom]").val(),
               "priceTo": $("[name=priceTo]").val(),
               "orderBy": $("[name=orderBy]:checked").val()
           },
           success: function(data, status){
               console.log("success");
               $("#results").html("<h3> Products Found: </h3>");
               data.forEach(function(key){
                   $("#results").append(key['productName'] + " " +
                   key['productDescription'] + " $" + key['price'] + "<br>");
               });
           },
           error: function(){
               console.log("failed search call");
           }
       }); 
    });
    
    
    
});