<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;


class ProductController extends Controller
{
    // shows all the products
    public function index(){

        // dd(Product::latest());
        return view(
            'home',
            [
                'products' => Product::all()
            ]
            );
    }


    // shows form for creating new product
    public function create(){
        return view('addProduct');
    }


    // create new product
    public function store(Request $request){
        $fields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => ['required', 'min:0'],
            'quantity' => ['required', 'min:0']
        ]);

        Product::create($fields);

        return redirect('/');
    }
}
