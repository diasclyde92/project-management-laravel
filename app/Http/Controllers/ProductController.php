<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

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
        $product =  new Product;
        $product->name = $req->name; 
        $product->price = $req->price; 
        $product->description = $req->description; 
        $product->save();
        return redirect()->route('home');
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
        $product = Product::find($req->id);
        $product->name = $req->name; 
        $product->price = $req->price; 
        $product->description = $req->description; 
        $result = $product->save();
        return redirect()->route('home');
    }
}
