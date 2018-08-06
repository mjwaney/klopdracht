<?php

namespace App\Http\Controllers;

use Auth;
use App\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show()
    {
    	if(\Auth::check()){
    		$user = Auth::user();

    		$userProducts = $user->products()->get();

    		$products = Product::get();

    		return view('admin', compact('userProducts', 'products'))->withModel($products, $userProducts);
    	}else{
    		return redirect()->route('login');
    	}
    }
}
