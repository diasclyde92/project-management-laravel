
<x-header />
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Small Basket | Add Products</title>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">

    </head>

    <body class="antialiased">      
<!-- FORM  -->	    
<div class="col-md-12">
	       
           <form action="add-product" class="form-horizontal" id="form-edit-client" method="POST">
           @csrf
   <fieldset>
   
   <!-- Form Name -->
   <div style="text-align:center;">
        <legend>Add Product</legend>
   </div>
   
   <!-- Text input-->
   <div class="form-group">
     <label class="col-md-4 control-label" for="client-name">Product Name</label>  
     <div class="col-md-4">
     <input id="product-name" name="name" type="text" placeholder="Enter product name" class="form-control input-md"> 
     </div>
   </div>
   
   <!-- Text input-->
   <div class="form-group">
     <label class="col-md-4 control-label" for="client-name">Product Price</label>  
     <div class="col-md-4">
     <input onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' id="product-price" name="price" type="text" placeholder="Enter product price" class="form-control input-md"> 
     </div>
   </div>

    <!-- Text input-->
    <div class="form-group">
     <label class="col-md-4 control-label" for="client-name">Product description</label>  
     <div class="col-md-4">
     
     <textarea class="form-control" id="product-description" name="description" rows="4" cols="50" placeholder="Enter product description">
     </textarea> 
     </div>
   </div>
   
   <!-- Button -->
   <div class="form-group">
     <label class="col-md-4 control-label" for="btn-save"></label>
     <div class="col-md-4">
       <button id="btn-save" name="btn-save" class="btn btn-success">Add</button>
     </div>
   </div>
   
   </fieldset>
   </form>
   
   
            </div> 
        </div>
    </div>
    </div>
    <script>
    </script>
    </body>
</html>
