<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $products = Product::latest()->get();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request['slug'] = Str::slug($request['title']);
        $request['categoryId']->defaut = 'P001';
        $products = Product::all($request->all());
        return response()->json($products);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
    $product = Product::findOrFail($id);
    return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
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
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json([
            'success' => true,
            'message'=> 'Data berhasil dihapus',
            'data' => $product

        ]);
    }
}
