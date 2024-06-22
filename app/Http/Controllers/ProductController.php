<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

        $categories = Category::all();
        $brands = Brand::all();

        return view('products.index', compact('products', 'categories', 'brands'));
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
        // Validate the request
        $request->validate([
            'product_name' => 'required|string|max:55',
            'supplier_id' => 'required|integer|exists:suppliers,supplier_id',
            'category_id' => 'required|integer|exists:categories,category_id',
            'brand_id' => 'required|integer|exists:brands,brand_id',
            'barcode' => 'required|string|max:255',
            'unit_price' => 'required|numeric',
            'unit_in_stock' => 'required|integer',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png,biff,bmp',
        ]);

        // Handle the file upload
        if ($request->hasFile('product_image')) {
            $fileName = time() . '.' . $request->product_image->extension();
            $request->product_image->move(public_path('images/products'), $fileName);
        } else {
            $fileName = 'default.jpg';
        }

        // Create the product
        Product::create([
            'product_name' => $request->product_name,
            'supplier_id' => $request->supplier_id,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'barcode' => $request->barcode,
            'unit_price' => $request->unit_price,
            'unit_in_stock' => $request->unit_in_stock,
            'product_image' => $fileName,
        ]);

        toast('Product created successfully.', 'success');

        return redirect('/admin/products');
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
        return view('products.edit');
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
