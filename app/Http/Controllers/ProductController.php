<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product; 

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view("products.index", ["products"=> $products]);
    }
    public function create(){
        return view("products.create");
    }
    public function store(Request $request){
        $request->validate([
            'image'=> 'required|image|mimes:jpeg,jpg,png|max:2048',
            "name"=> "required",
            "quantity"=> "required|numeric",
            "price"=> "required|decimal:0,2",
            "description"=> "nullable",
        ]);
        $image = $request->file('image');
        $image->storeAs('products', $image->hashName());

        Product::create([
            'image'         => $image->hashName(),
            'name'          => $request->name,
            'quantity'      => $request->quantity,
            'price'         => $request->price,
            'description'   => $request->description
        ]);

        return redirect(route('products.index'))->with('success','Product Added Successfully');
    }
    public function edit(Product $product){
        return view("products.edit", ["product"=> $product]);
    }
    public function update(Product $product, Request $request){
        $request->validate([
            'image'=> 'image|mimes:jpeg,jpg,png|max:2048',
            "name"=> "required",
            "quantity"=> "required|numeric",
            "price"=> "required|decimal:0,2",
            "description"=> "nullable",
        ]);
        
        if ($request->hasFile('image')) {

            Storage::delete(paths: 'products/'.$product->image);

            $image = $request->file('image');
            $image->storeAs('products', $image->hashName());

            $product->update([
                'image'         => $image->hashName(),
                'name'          => $request->name,
                'quantity'      => $request->quantity,
                'price'         => $request->price,
                'description'   => $request->description
            ]);
        } else {
            $product->update([
                'name'          => $request->name,
                'quantity'      => $request->quantity,
                'price'         => $request->price,
                'description'   => $request->description
            ]);
        }
        return redirect(route('products.index'))->with('success','Product Updated Successfully');
    }
    public function confirmDelete(Product $product){
        return view('products.confirmDelete', ["product"=> $product]);
    }

    public function destroy(Product $product){
        Storage::delete(paths: 'products/'. $product->image);
        $product->delete();
        return redirect(route('products.index'))->with('success','Product Deleted Successfully');
    }
}