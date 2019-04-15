<?php
session_start();
    if (!isset($_SESSION['email'])) {

        header("Location: login.php");

    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Otter Mart, Boi!</title>
        <link href='./css/mart.css' rel='stylesheet' type='text/css' />
        <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous">
        </script>
        <script type="text/javascript" src="js/mart.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>

    <body>
        <div>
            <header id="pageTop">
                <h1>Otter-Mart Product Search</h1>
                <button id="logOutButton" class="btn btn-primary">Logout</button>
            </header>
            <form>
              Product: <input type="text" name="product" />
              <br>
              Category: <select name='category'>
                  <option value=''>Select One</option>
              </select>
              <br>
              Price: From <input type='text' name='priceFrom' size='7'/>
                     To <input type='text' name='priceTo' size='7'/>
              <br>
              Order Result By:
              <br>
              <input type='radio' name="orderBy" value='price'/> Price <br>
              <input type='radio' name='orderBy' balue='name' /> Name <br>
            </form>
            <br>
            <button id="searchForm">Search</button>
        </div>
        <div id="results"></div>
        
        <!-- -->
        <div id="addProductDiv">
            <h2>Add New Product</h2>
            <form id="newProductForm">
                Product Name <input type="text" name="newProduct" />
                <br>
                Category: <select name='selectCategory'>
                    <option value=''>Select One</option>
                </select>
                <br>
                Price: <input type='text' name='newPrice' size='7' />
                <br>
                Description: <textarea rows='3' cols='50' name='newDescription'></textarea>
                <br>
                Image Link: <input type='text' name='imgLink'/>
                <br>
            </form>
            <br>
            <button id="addItem">Add Item</button>
        </div>
        
        
        <div class="modal" id="purchaseHistoryModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Product History</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="history"></div>
                    </div>
                    <div class = "modal-footer">
                        <button type="button" class = "btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal" id="editProductModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Product</h5>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="product"></div>
                    </div>
                    <div class = "modal-footer">
                        <button type="button" class="btn btn-primary" id="deleteButton" aria-label="Delete Item">Delete</button>
                        <button type="button" class="btn btn-primary" id="updateProduct" aria-label="Update">Update</button>
                        <button type="button" class = "btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <p id="productIdHolder"></p>
    </body>
    
</html>

