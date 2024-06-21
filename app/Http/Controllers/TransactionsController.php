<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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

        if ($validated) {
            $cart = Cart::where('cashier_id', Auth::user()->user_id)
                ->Leftjoin('products', 'carts.product_id', "=", 'products.product_id')->get(); //Returns all item added to cart by cashier

            Cart::where('cashier_id', Auth::id())->delete();
            Transactions::create($validated);

            $receiptData = [
                'total' => $validated['total'], // Total amount
                'cash' => $validated['cash'], // Cash received
                'change' => $validated['change'], // Change amount
                'payment' => $validated['payment'],
                'date' => now()//date now
            ];
            return view('cashier.receipt', compact('receiptData', 'cart'));
        }
        return redirect('/cashier')->with('message_error', 'Error');
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

        if ($validated){
            $transactions::find($id)->update($validated);
            toast('Transaction updated successfully.','success');
            return redirect('/admin/transactions');
        }
        else
        {
            toast('Error updating transaction.','error');
            return redirect('/admin/transactions');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transactions $transactions, $id)
    {
        $transactions::destroy($id);
        return redirect('/admin/transactions');
    }
}
