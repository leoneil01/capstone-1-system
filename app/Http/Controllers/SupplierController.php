<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();

        return view('supplier.index', compact('suppliers'));
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
        $validated = $request->validate([
            'supplier_name' => ['required'],
            'contact_name' => ['required'],
            'address' => ['required'],
            'postal_code' => ['required', 'numeric'],
            'country' => ['required'],
            'contact_number' => ['required', 'numeric'],
        ]);

        if($validated){
            Supplier::create($validated);
            toast('Supplier added successfuly!', 'success');
            return redirect('/admin/suppliers');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier, $id)
    {
        $supplier = $supplier::find($id);
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier, $id)
    {
        $validated = $request->validate([
            'supplier_name' => ['required'],
            'contact_name' => ['required'],
            'address' => ['required'],
            'postal_code' => ['required', 'numeric'],
            'country' => ['required'],
            'contact_number' => ['required', 'numeric']
        ]);

        if($validated){
            $supplier::find($id)->update($validated);
            toast('Supplier updated successfully.','success');
            return redirect('/admin/suppliers');
        }
        else{
            toast('Transaction updating error.','error');
            return redirect('/admin/suppliers/edit/' . $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier, $id)
    {
        $supplier::destroy($id);
        return redirect('/admin/suppliers');
    }
}
