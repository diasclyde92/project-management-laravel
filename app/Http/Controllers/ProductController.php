<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for adding a product.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
        ]);
    }

    /**
     * Adds a new product
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addProduct(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'price'=>'required'
        ]);
        $product =  new Product;
        $product->name = $req->name; 
        $product->price = $req->price; 
        $product->description = $req->description; 
        $product->save();
        $controller = new HomeController;
        return $controller->index();
    }

    /**
     * Fetches product
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function fetchProduct(Product $id)
    {
        return view('edit_product',['product_data'=>$id]);
    }

        /**
     * Updates a products details
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editProduct(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'price'=>'required'
        ]);
        $product = Product::find($req->id);
        $product->name = $req->name; 
        $product->price = $req->price; 
        $product->description = $req->description; 
        $result = $product->save();
        $controller = new HomeController;
        return $controller->index();
    }

            /**
     * Deletes a product 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deleteProduct(Request $req)
    {
        $product = Product::find($req->id);
        $product->delete();
        $controller = new HomeController;
        return $controller->index();
    }
}
