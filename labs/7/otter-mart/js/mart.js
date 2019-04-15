/*global $*/
$(document).ready( function () {
    
    var isAdmin = 0;
    
    //load modal if history clicked
    $(document).on('click', '.historyLink', function(){
        $('#purchaseHistoryModal').modal("show"); 
        $.ajax({
            type: "GET",
            url: "./api/getPurchaseHistory.php",
            dataType: "json",
            data: {"productId" : $(this).attr("id")},
            success: function(data, status){
                if(data.length !=0){
                    $("#history").html("");
                    $("#history").append(data[0]['productName'] + "<br/>");
                    $('#history').append("<img src='"+data[0]['productImage'] + "' width = '200' /><br/>");
                    data.forEach(function(key){
                        $("#history").append("Purchase Date: " +key['purchaseDate'] +"<br/>");
                        $("#history").append("Unit Price: $" +key['unitPrice'] + "<br/>");
                        $("#history").append("Quantity: " + key['quantity'] +"<br/>");
                    });
                }else{
                    $("#history").html("No purchase history for this item.");
                }
            }
        })
    });
    
    $.ajax({
        type: 'GET',
        url: './api/getCategories.php',
        data: [],
        dataType: 'json',
        success: function(data, status){
            data.forEach(function(key){
                $("[name=category]").append("<option value="+key["catID"] +">"
                  +key["catName"] + "</option>"); 
                $("[name=selectCategory]").append("<option value="+key["catID"] +">"
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
               isAdmin = data['isAdmin'];
               
               
               $("#results").html("<h3> Products Found: </h3>");
               data['products'].forEach(function(key){
                   $("#results").append("<a href='#' class='historyLink' id='"
                                        + key['productId'] + "'>History</a> ");
                   if(data['isAdmin'] === 1){
                       $("#results").append("<a href='#' class='editLink' id='"
                                         + key['productId']+ "'>Edit</a> ");
                   }
                   $("#results").append(key['productName'] + " " +
                   key['productDescription'] + " $" + key['price'] + "<br>");
               });
           },
           error: function(){
               console.log("failed search call");
           }
       }); 
    });
    
    $(document).on('click','.editLink', function(){
        $('#editProductModal').modal("show"); 
        console.log($(this).attr("id"));
        $.ajax({
            type: "GET",
            url: "./api/getPurchaseHistory.php",
            dataType: "json",
            data: {"productId" : $(this).attr("id")},
            success: function(data, status){
                console.log(data);
                $('#productIdHolder').data('prodId', data[0]['productId']);
                if(data.length !=0){
                    console.log("should display modal");
                    $('#productIdHolder').data('prodId',data[0]['productId']);
                    $("#product").html("");
                    $("#product").append("Edit " + data[0]['productName'] + "<br/>");
                    $('#product').append("<img src='"+data[0]['productImage'] + "' width = '200' /><br/>");
                    data.forEach(function(key){
                        
                        $("#product").append("Current Price: $" +key['unitPrice'] + "<br>New Price: <input type='text' id='newPrice'><br/>");
                        $("#product").append("Name: " + key['productName'] +"<br>New Name: <input type='text' id='newName'><br/>");
                        $("#product").append("Description: " + key['productDescription'] +"<br>New Description: <input type='text' id='newDesc'><br/>");
                        $("#product").append("Image URL: " + key['productImage'] +"<br>New URL: <input type='text' id='newURL'><br/>");
                    });
                    
                }else{
                    $("#product").html("Cannot edit this item.");
                }
            }
        });
    });
    
    $(document).on('click', '#updateProduct', function(){
        let newPrice = $('#newPrice').val();
        let newName = $('#newQuant').val();
        let newURL = $('#newURL').val();
        let newDesc = $('#newDesc').val();
        
        $.ajax({
            type: "POST",
            url: "./api/editItem.php",
            dataType: "json",
            data: {"productId" : $('#productIdHolder').data('prodId'),
                   "newPrice" : newPrice,
                   "newName" : newName,
                   "newURL" : newURL,
                   "newDesc" : newDesc
            },
            success: function(data, status){
                console.log(data);
                if(data['success'] === true){
                    if(confirm("Succesfully updated product")){
                        return;
                    }
                }else{
                    console.log("update failed");
                }
            }
        });
        
        
    });
    
    $(document).on('click', '#deleteButton', function(){
        if(confirm("Are you sure you want to delete this item?")){
            console.log($('#productIdHolder').data('prodId') + " will be deleted.");
            $.ajax({
            type: "POST",
            url: "./api/deleteItem.php",
            dataType: "json",
            data: {"productId" : $('#productIdHolder').data('prodId'),
                   
            },
            success: function(data, status){
                console.log(data);
                if(data['success'] === true){
                    if(confirm("Succesfully deleted product")){
                        return;
                    }
                }else{
                    console.log("update failed");
                }
            }
        });
            
        }
        
    });
    
    
    
});