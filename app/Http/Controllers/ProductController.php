<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::leftjoin('suppliers', 'products.supplier_id', '=', 'suppliers.supplier_id')
                            ->leftjoin('categories', 'products.category_id', '=', 'categories.category_id')
                            ->leftjoin('brands', 'products.brand_id', '=', 'brands.brand_id')
                            ->orderBy('products.product_name')
                            ->select('products.*', 'suppliers.supplier_name as supplier_name', 'categories.category_name as category_name', 'brands.brand_name as brand_name')
                            ->paginate(7)
                            ->appends(['search' => request()->get('search')]);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
