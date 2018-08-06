<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use App\ProductStock;
use App\Http\Requests\ProductForm;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();

        return view('products.index', compact('products'))->withModel($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductForm $request)
    {
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();
        $id = $product->id;

        $originalImage = $request->file('image');
        $image = time(). $originalImage->getClientOriginalExtension();
        $originalImage->move(public_path('images'), $image);
        $productImage = new ProductImage;
        $productImage->product_id = $product->id;
        $productImage->url = '\images' . "\\" . $image;
        $productImage->save();  

        $productStock = new ProductStock;
        $productStock->product_id = $product->id;
        $productStock->count = $request->input('stock');
        $productStock->save();
        
        return redirect()->route('product.show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if($product == null){
            abort(404); 
        }

        return view('products.show', compact('product'))->withModel($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $product = Product::find($id);

        return view('products.edit', compact('product'))->withModel($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();

        $product->image->delete();
        $originalImage = $request->file('image');
        $image = time(). $originalImage->getClientOriginalExtension();
        $originalImage->move(public_path('images'), $image);
        $productImage = new ProductImage;
        $productImage->product_id = $id;
        $productImage->url = '\images' . "\\" . $image;
        $productImage->save();  

        return redirect()->route('product.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if(isset($product->stock)){
            $product->stock->delete();
        }

        if(isset($product->image)){
            $product->image->delete();
        }

        $product->delete();

        return redirect()->route('admin');
    }
}
