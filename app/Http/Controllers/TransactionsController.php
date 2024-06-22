<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Sales;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transactions::all();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'payment' => ['required'],
            'cash' => ['required', 'numeric', 'gt:total'],
            'change' => ['required'],
            'total' => ['required', 'gt:0'],
        ]);

        $transaction = Transactions::create($validated);

        $cart = Cart::where('cashier_id', Auth::user()->user_id)
            ->Leftjoin('products', 'carts.product_id', "=", 'products.product_id')->get(); //Returns all item added to cart by cashier
        foreach ($cart as $item) {
            $salesItem = new Sales();
            $salesItem->product_name = $item['product_name'];
            $salesItem->qty = $item['qty'];
            $salesItem->unit_price = $item['unit_price'];
            $salesItem->transaction_id = $transaction->transaction_id;
            $salesItem->save();

            $product = Product::find($item->product_id);
            $product->unit_in_stock -= $item['qty'];
            $product->save();
        }

        Cart::where('cashier_id', Auth::id())->delete();

        $receiptData = [
            'total' => $validated['total'], // Total amount
            'cash' => $validated['cash'], // Cash received
            'change' => $validated['change'], // Change amount
            'payment' => $validated['payment'],
            'date' => now() //date now
        ];

        $salesRecords = Sales::where('transaction_id', $transaction->transaction_id)->get();
        return view('cashier.receipt', compact('receiptData', 'salesRecords'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Transactions $transactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transactions $transactions, $id)
    {
        $transaction = $transactions::find($id);
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transactions $transactions, $id)
    {
        $validated = $request->validate([
            'payment' => ['required'],
            'cash' => ['required', 'numeric', 'gt:total'],
            'change' => ['required'],
            'total' => ['required', 'gt:0'],
        ]);

        if ($validated) {
            $transactions::find($id)->update($validated);
            toast('Transaction updated successfully.', 'success');
            return redirect('/admin/transactions');
        } else {
            toast('Error updating transaction.', 'error');
            return redirect('/admin/transactions');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transactions $transactions, $id)
    {
        $transactions::destroy($id);
        toast('User deleted successfully.', 'success');
        return redirect('/admin/transactions');
    }
}
