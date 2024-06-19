<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request){
        $product = Product::where('barcode', $request->barcode)->first();
        $cashier_id = Auth::id();
        
        if($product){
            echo($product->product_id);
            Cart::create([
                'product_id' => $product->product_id,
                'cashier_id' => $cashier_id
            ]);
        }
        else{
            return redirect('/cashier')->with('message_error', 'Product not found.');
        }
        


        return redirect('/cashier');

    }
}
