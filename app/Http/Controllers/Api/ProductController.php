<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $product   = Product::all();

        return new ProductResource(true, 'List data produk', $product);
    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3148',
        'name' => 'required',
        'price' => 'required|numeric',
        'kategory' => 'required',
        'subkategory' => 'required',
    ]);

    if ($validator->fails()){
        return response()->json(['success' => false, 'message' => 'Validation errors', 'errors' => $validator->errors()], 422);
    }

    $product = new Product();

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $file_name = $product->storeImage($file); // Save the image to the directory storage/app/public/images and get the file name
        $product->image = $file_name;
    }

    $product->name = $request->name;
    $product->price = $request->price;
    $product->kategorys_id = $request->kategory; // Make sure the 'kategorys' column matches in the table
    $product->subKategorys_id = $request->subkategory; // Make sure the 'subkategorys' column matches in the table

    $product->save();

    return response()->json(['success' => true, 'message' => 'Product successfully created', 'product' => $product], 201);
}

}
