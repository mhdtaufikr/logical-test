<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetail;

class DashboardController extends Controller
{
    //
    public function index(Request $request)
    {       
        $product = Product::get();
        return view('home',compact('product'));
        
    }
    public function show($id)
    {       
        $product = ProductDetail::where('product_id',$id)->get();
        return view('detail',compact('product'));
        
    }
}
