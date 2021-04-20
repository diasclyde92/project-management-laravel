<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Small Basket | List Products</title>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">

        <style>
        </style>
    </head>
    <body class="antialiased">      
    
   <!-- LIST -->
   <div class=col-md-12>
       
       <form id="form-list-client">
               <legend>List of products</legend>
       
       <div class="pull-right">
           <a href="/list-products" class="btn btn-default-btn-xs btn-primary"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
           <a class="btn btn-default-btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> New</a>
       </div>
       <table class="table table-bordered table-condensed table-hover">
           <thead>
               <tr>
                   <td>Product Name</td>
                   <th>Price</th>
                   <th>description</th>
                   <th>Actions</th>
               </tr>
                   
           </thead>
           <tbody id="form-list-client-body">
               <tr>
                   <td>Eduardo</td>
                   <td>eluz@counterpath.com</td>
                   <td>Active</td>
                   <td>
                       <a title="view this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-eye-open text-primary"></i> </a>
                       <a title="edit this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-edit text-primary"></i> </a>
                       <a title="delete this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-trash text-danger"></i> </a>
                      
                   </td>
               </tr>
           </tbody>
       </table>
       </form>
   
       
   </div>
         
       </div>
   </div>

    </body>
</html>
