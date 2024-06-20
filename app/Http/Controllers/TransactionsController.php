<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transactions.index');
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

        if($validated){
            Cart::where('cashier_id', Auth::id())->delete();
            Transactions::create($validated);

            $receiptData = [
                'total' => $validated['total'], // Total amount
                'cash' => $validated['cash'], // Cash received
                'change' => $validated['change'], // Change amount
            ];
            return view('cashier.receipt', compact('receiptData'));
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
    public function edit(Transactions $transactions)
    {
        return view('transactions.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transactions $transactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transactions $transactions)
    {
        //
    }
}
