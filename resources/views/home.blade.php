<html>
<head>
        <meta charset="utf-8">

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <title>Small Basket | Home</title>
<!--Export table button CSS-->

     
    </head>

@extends('layouts.app')


@section('content')


  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product List</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">
 
 <!-- LIST -->
 <div class=col-md-12>
       
       <form id="form-list-client">

       <div class="pull-right">
           <a href="/home" class="btn btn-default-btn-xs btn-primary"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
           <a href="/add-product" class="btn btn-default-btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> New</a>
       </div>
       <table class="table table-bordered table-condensed table-hover">
           <thead>
               <tr>
                   <th>Product Name</th>
                   <th>Price</th>
                   <th>description</th>
                   <th>Actions</th>
               </tr>
                   
           </thead>
           <tbody id="form-list-client-body">
            @foreach($products as $product)
             
             <tr>
                   <td>{{$product['name']}}</td>
                   <td>{{$product['price']}}</td>
                   <td> 
                    @if(strlen($product['description']) > 10)
                        {{substr($product['description'], 0 , 10)}} ...
                    @else 
                        {{$product['description']}}
                    @endif
                        </td>
                   <td>
                       <a title="view this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-eye-open text-primary"></i> </a>
                       <a href="fetch-product/{{$product['id']}}" title="edit this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-edit text-primary"></i> </a>
                       <a title="delete this user" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-trash text-danger"></i> </a>
                      
                   </td>
               </tr>
            @endforeach

           </tbody>
       </table>
       </form>
   
 
   </div>
         
       </div>
   </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
$(document).ready( function () {
    //$('#navbarDropdown').css('margin-left','1710%');
    //$('.dropdown-item').css('margin-left','1710%');
    
} );
</script> 

</body>

</html>