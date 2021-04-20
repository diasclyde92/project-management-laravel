<html>
<head>
        <meta charset="utf-8">

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <title>Small Basket | Home</title>
<!--Export table button CSS-->
    <style>
        #myTable .sortable-header:hover{
            cursor:pointer;
            background:#AAA;
            
        }
    </style>
     
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
       

       <div class="pull-right">
           <a href="/home" class="btn btn-default-btn-xs btn-primary"><i class="glyphicon glyphicon-refresh"></i> Refresh</a>
           <a href="/add-product" class="btn btn-default-btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> New</a>
       </div>
       <input style="margin-top:5px;" id="myInput" type="text" placeholder="Search..">
       <table style="margin-top:20px;" id="myTable" class="table table-bordered table-condensed table-hover">
           <thead>
               <tr>
                   <th>#</th>
                   <th class="sortable-header" id="header-name">Product Name <span class="glyphicon glyphicon-sort"></span></th>
                   <th class="sortable-header" id="header-price">Price<span class="glyphicon glyphicon-sort"></span></th>
                   <th class="sortable-header" id="header-description">description <span class="glyphicon glyphicon-sort"></span></th>
                   <th>Actions</th>
               </tr>
                   
           </thead>
           <tbody id="form-list-client-body">
            @foreach($products as $index => $product)
             
             <tr>
                   <td>{{ $index + 1 }}</td>
                   <td>{{$product['name']}}</td>
                   <td>{{$product['price']}}</td>
                   <td> 
                    @if(strlen($product['description']) > 10)
                        {{substr($product['description'], 0 , 10)}} ...
                        <span style="display:none;">{{$product['description']}}</span>
                    @else 
                        {{$product['description']}}
                    @endif
                        </td>
                   <td>
                       <a onclick="fillProductDetails('{{$product->name}}','{{$product->price}}','{{$product->description}}')" data-toggle="modal" data-target="#modalViewDetails" title="view product details" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-eye-open text-primary"></i> </a>
                       <a href="fetch-product/{{$product['id']}}" title="edit this product" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-edit text-primary"></i> </a>
                       <a onclick="deleteProduct({{$product['id']}})" title="delete this product" data-toggle="modal" data-target="#myModal" class="btn btn-default btn-sm "> <i class="glyphicon glyphicon-trash text-danger"></i> </a>
                      
                   </td>
               </tr>
            @endforeach

           </tbody>
       </table>

   
 
   </div>
         
       </div>
   </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog" style="margin-top:150px;">
      <div class="modal-dialog" style="z-index:2000 !important;">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4  class="modal-title">Confirm Delete</h4>
            <button  type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <p>The product will be permanently deleted.</p>
            <p>Are you sure you want to delete this product?</p>
          </div>
          <div class="modal-footer">
            <form style="display:inline;" class="form-horizontal" id="delete-product" method="POST" action="{{url('delete-product')}}">
                @csrf
                <input type="hidden" id="id_to_delete" name="id" >
            </form>
            <button onclick="submitForm()" type="button" class="btn btn-success" data-dismiss="modal">Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalViewDetails" role="dialog" style="margin-top:150px;">
      <div class="modal-dialog" style="z-index:2000 !important;">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4  class="modal-title">Product Details</h4>
            <button  type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <table class="table">
                <thead>
                    <tr>
                    <td scope="col">First</td>
                    <td scope="col">Last</td>
                    <td scope="col">Handle</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><span id="product_name"></span></td>
                    <td id="product_price"></td>
                    <td id="product_description"></td>
                    </tr>
                </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <form style="display:inline;" class="form-horizontal" id="delete-product" method="POST" action="{{url('delete-product')}}">
                @csrf
                <input type="hidden" id="id_to_delete" name="id" >
            </form>
            <button onclick="submitForm()" type="button" class="btn btn-success" data-dismiss="modal">Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>

<script>
    function fillProductDetails(product_name, product_price, product_description) {
        $('#product_name').text(product_name);
        $('#product_price').text(product_price);
        $('#product_description').text(product_description);
    }

    function submitForm() {
        $("#delete-product").submit();
    }

    function deleteProduct(id_to_delete) {
        $("#id_to_delete").val(id_to_delete);
    }

    $(document).ready( function () {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        }); 
        var f_sl = 1;
        var f_nm = 1;
        $("#header-name").click(function(){
            f_sl *= -1;
            var n = $(this).prevAll().length;
            sortTable(f_sl,n);
        });
        $("#header-price").click(function(){
            f_nm *= -1;
            var n = $(this).prevAll().length;
            sortTable(f_nm,n);
        });
        $("#header-description").click(function(){
            f_nm *= -1;
            var n = $(this).prevAll().length;
            sortTable(f_nm,n);
        });
    } );


    function sortTable(f,n){
        var rows = $('#myTable tbody  tr').get();

        rows.sort(function(a, b) {

            var A = getVal(a);
            var B = getVal(b);

            if(A < B) {
                return -1*f;
            }
            if(A > B) {
                return 1*f;
            }
            return 0;
        });

        function getVal(elm){
            var v = $(elm).children('td').eq(n).text().toUpperCase();
            if($.isNumeric(v)){
                v = parseInt(v,10);
            }
            return v;
        }

        $.each(rows, function(index, row) {
                $('#myTable').children('tbody').append(row);
        });
    }



</script> 

</body>

</html>