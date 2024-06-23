<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Product;
use App\Models\Sales;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $firstName = Auth::user()->first_name;
        Alert::toast('Welcome, ' . $firstName . '!', 'Toast Type');

        $users = User::leftjoin('genders', 'users.gender_id', '=', 'genders.gender_id')
            ->orderBy('users.first_name');

        $totalSales = Transactions::sum('total'); //Get the total salels
        $totalTransactions = Transactions::count(); //Get Total Transactions made
        $totalProducts = Product::count(); //Get total of producst
        $lowStockProduct = Product::orderBy('unit_in_stock', 'asc')->first(); //Gets product with low stock
        $topSellingProduct = Sales::select('product_name', DB::raw('SUM(qty) as total_qty'))
            ->groupBy('product_name')
            ->orderBy('total_qty', 'desc')
            ->first();//Get the product with highest quantity sold

        return view('admin.index', compact(
            'users',
            'totalSales',
            'totalProducts',
            'totalTransactions',
            'lowStockProduct',
            'topSellingProduct'
        ));
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
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
