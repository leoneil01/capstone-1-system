<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cashier;
use App\Models\Discount;
use App\Models\Gender;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class CashierController extends Controller
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

        $payments = Payment::all();
        $discounts = Discount::all();
        $genders = Gender::all();

        $products = Product::where('isDeleted', false)->get();

        $cart = Cart::where('cashier_id', Auth::user()->user_id)
            ->Leftjoin('products', 'carts.product_id', "=", 'products.product_id')->get(); //Returns all item added to cart by cashier

        $totalPrice = 0.00;
        foreach ($cart as $item) {
            $totalPrice += $item->unit_price * $item->qty;
        }

        return view('cashier.index', compact(
            'users',
            'payments',
            'discounts',
            'products',
            'cart',
            'totalPrice',
            'genders'
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
    public function show(Cashier $cashier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cashier $cashier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, $id)
    {
        // Validate the request
        $validated = $request->validate([
            'user_image' => 'nullable|mimes:jpg,jpeg,png,bmp',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender_id' => 'required|integer|exists:genders,gender_id',
            'address' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'email_address' => 'required|string|email|max:255|unique:users,email_address,' . $id . ',user_id',
            'username' => 'required|string|max:255|unique:users,username,' . $id . ',user_id',
        ]);
    
        // Handle file upload
        if ($request->hasFile('user_image')) {
            $file = $request->file('user_image');
            $filenameWithExtension = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
    
            // Store the file in the public storage
            $file->storeAs('public/img/user', $filenameToStore);
    
            // Add the filename to the validated data
            $validated['user_image'] = $filenameToStore;
        }
    
        // Check if the password field is filled
        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($request->password);
        } else {
            // Remove password from validated data to avoid updating it
            unset($validated['password']);
        }
    
        // Update the user
        User::where('user_id', $id)->update($validated);
    
        // Show success message
        toast('User updated successfully.', 'success');
    
        // Redirect to the users page
        return redirect('/cashier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cashier $cashier)
    {
        //
    }
}
