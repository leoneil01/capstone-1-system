<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request) {
        $product = Product::where('barcode', $request->barcode)->first();
        
        if ($product) {
            Cart::create([
                'product_id' => $product->product_id,
                'cashier_id' => Auth::id()
            ]);
        } else {
            return redirect('/cashier')->with('message_error', 'Product not found.');
        }
    
        return redirect('/cashier');
    }
    

    public function update(Request $request, $id){
        $validated = $request->validate(['qty' => ['required', 'numeric']]);
        if($validated){
            Cart::find($id)->update($validated);
        }

        return redirect('/cashier');
    }

    public function destroy($id){
        Cart::find($id)->delete();
        return redirect('/cashier');
    }
}
