<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request){
        $query = Product::query();
        if($request->has('search')) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }
        $products = $query->orderBy('id','desc')->paginate(10);
        return view('client.home', compact('products'));
    }
}
