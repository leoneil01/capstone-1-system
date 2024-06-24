<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

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
            ->where('isDeleted', false);

        if (request()->has('search')) {
            $searchTerm = request()->get('search');
            if ($searchTerm) {
                $products = $products->where(function ($query) use ($searchTerm) {
                    $query->where('products.product_name', 'like', "%$searchTerm")
                        ->orwhere('categories.category_name', 'like', "%$searchTerm")
                        ->orwhere('brands.brand_name', 'like', "%$searchTerm")
                        ->orwhere('products.barcode', 'like', "%$searchTerm")
                        ->orwhere('products.unit_price', 'like', "%$searchTerm")
                        ->orwhere('products.unit_in_stock', 'like', "%$searchTerm");
                });
            }
        }

        $products = $products->orderBy('products.product_name')
            ->select('products.*', 'suppliers.supplier_name as supplier_name', 'categories.category_name as category_name', 'brands.brand_name as brand_name')
            ->paginate(7)
            ->appends(['search' => request()->get('search')]);

        $suppliers = Supplier::all();
        $categories = Category::all();
        $brands = Brand::all();

        return view('products.index', compact('products', 'suppliers', 'categories', 'brands'));
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
    public function edit(Product $product, $id)
    {
        $suppliers = Supplier::all();
        $categories = Category::all();
        $brands = Brand::all();
        $product = $product::find($id);
        return view('products.edit', compact('product', 'suppliers', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, $id)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:55',
            'supplier_id' => 'required|integer|exists:suppliers,supplier_id',
            'category_id' => 'required|integer|exists:categories,category_id',
            'brand_id' => 'required|integer|exists:brands,brand_id',
            'barcode' => 'required|string|max:255',
            'unit_price' => 'required|numeric',
            'unit_in_stock' => 'required|integer',
            'product_image' => 'nullable|mimes:jpg,jpeg,png,biff,bmp',
        ]);

        if(request()->hasFile('product_image')) {
            $filenameWithExtension = $request->file('product_image');

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file('product_image')->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            $request->file('product_image')->storeAs('public/img/product/' . $filenameToStore);

            $validated['product_image'] = $filenameToStore;
        }

        $product::find($id)->update($validated);
        toast('Product created successfully.', 'success');
        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        // Find the product by id
        $product = Product::findOrFail($id);
    
        // Check if the product has an image and if it exists in storage
        if ($product->product_image && Storage::disk('public')->exists('img/product/' . $product->product_image)) {
            // Delete the image from storage
            Storage::disk('public')->delete('img/product/' . $product->product_image);
        }
    
        // Update the product's isDeleted attribute
        $product->update(['isDeleted' => true]);
    
        // Display a success message
        toast('Product deleted successfully.', 'success');
    
        // Redirect to the products page
        return redirect('/admin/products');
    }
}
