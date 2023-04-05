<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;


class ProductController extends Controller
{
    // shows all the products
    // public function index(){

    //     // dd(Product::latest());
    //     return view(
    //         'home',
    //         [
    //             'products' => Product::all()
    //         ]
    //         );
    // }

    public function index(Request $request){
        $search = $request->query('search');
        $products = Product::where('name', 'like', '%'.$search.'%')
                            ->orWhere('description', 'like', '%'.$search.'%')
                            ->paginate(10);
        return view('home', compact('products'));
    }

    // shows form for creating new product
    public function create(){
        return view('addProduct');
    }

    // Delete product
    public function confirm($id){

        $res = Product::find($id)->delete();

        if(!$res){
            return redirect()
                ->route('home')
                ->with('failure', 'Failed to delete the Product!');
        }

        return redirect()
        ->route('home')
        ->with('success', 'Product Deleted Successfully');

    }

    // edit product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('edit', ['product' => $product]);
    }
    // update product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->save();

        return redirect()
            ->route('home')
            ->with('success', 'Product Updated Successfully');
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
