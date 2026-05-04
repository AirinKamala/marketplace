<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Http\Request;
use Illumimate\Http\Response;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with('categories');
        $products = $query->filter(request(['search']))->latest()->paginate(8);
        $products->withPath('/');
        return view("home", compact("products"));
        // return response()->json((['products' => $products]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request['slug'] = Str::slug($request['productName'], '-' );
        $request['categoryId'] = 'P001';
        Product::create($request->all());
        return redirect('/')->with(['message'=> 'Berhasil menambahkan produk'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('test', compact('product'));
        // return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validateData = $request->validate([
            'productName'=> 'required|max:255',
            'price'=> 'required|numeric',
            'stock'=> 'required|numeric'
        ],
        [
            'productName.required' => 'Nama produk wajib di isi!',
            'productName.max' => 'Nama produk maksimal 200 karakter!',
            'price.required' => 'Harga wajib di isi!',
            'price.numeric' => 'Harga wajib berupa angka',
            'stock.required' => 'Stok wajib di isi!',
            'stock.numeric' => 'Stok wajib berupa angka'
        ]);
        $product = Product::findOrFail($id);
        $product->update($validateData);
        return redirect('/');

    }

    public function edit(string $id) {
        $product= Product::findOrFail($id);
        return view('edit', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/');
    }
}



