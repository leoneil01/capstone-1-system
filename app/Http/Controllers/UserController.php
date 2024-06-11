<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $users = User::leftjoin('genders', 'users.gender_id', '=', 'genders.gender_id')
            ->leftjoin('roles', 'users.role_id', '=', 'roles.role_id')
            ->orderBy('users.first_name')
            ->get();

        return view('users.index', compact('users'));
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function login()
    {
        return view('index');
    }

    public function processLogin(Request $request, $role)
    {
        //This code sets the 'showLoginModal" session variable to the value of $role.
        //This allows the $role to be accessed in the view if the validation fails.
        //The $role will be used to ensure that only the appropriate modal is toggled.
        session(['showLoginModal' => $role]);
        $validated = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        $user = User::join('genders', 'users.gender_id', '=', 'genders.gender_id')
            ->where('username', $validated['username'])
            ->first();

        if ($user && auth()->attempt($validated)) {
            if ($user->role_id == $role) {
                auth()->login($user);
                $request->session()->regenerate();
                return redirect('/' . ($role == 1 ? 'admin' : 'cashier'));
            } else {
                alert()->error('Error', 'Your role does not have access to this system.');
                return back();
            }
        } else {
            alert()->error('Error', 'The provided credentials do not match our records.');
            return back();
        }
    }
}
