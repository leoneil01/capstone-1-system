<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Role;
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
        $users = User::leftjoin('genders', 'users.gender_id', '=', 'genders.gender_id')
            ->leftjoin('roles', 'users.role_id', '=', 'roles.role_id')
            ->orderBy('users.first_name')
            ->where('isDeleted', false);

            if(request()->has('search')){
                $searchTerm = request()->get('search');
                if($searchTerm){
                    $users = $users->where(function($query) use($searchTerm){
                        $query->where('users.first_name', 'like', "%$searchTerm")
                        ->orwhere('users.first_name', 'like', "%$searchTerm")
                        ->orwhere('users.middle_name', 'like', "%$searchTerm")
                        ->orwhere('users.last_name', 'like', "%$searchTerm")
                        ->orwhere('genders.gender', 'like', "%$searchTerm")
                        ->orwhere('roles.role', 'like', "%$searchTerm")
                        ->orwhere('users.address', 'like', "%$searchTerm")
                        ->orwhere('users.birth_date', 'like', "%$searchTerm")
                        ->orwhere('users.email_address', 'like', "%$searchTerm")
                        ->orwhere('users.username', 'like', "%$searchTerm");
                    });
                }
            }

            $roles = Role::all();
            $genders = Gender::all();
            $users = $users->paginate(10)
            ->appends(['search' => request()->get('search')]);

        return view('users.index', compact('users', 'roles', 'genders'));
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
    public function edit(User $user, $id)
    {
        $genders = Gender::all();
        $roles = Role::all();
        $user = $user::find($id);
        return view('users.edit', compact('user', 'genders', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, $id)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'middle_name' => ['required'],
            'last_name' => ['required'],
            'gender_id' => ['required'],
            'role_id' => ['required'],
            'address'=> ['required'],
            'birth_date' => ['required'],
            'email_address' => ['required'],
            'username' => ['required'],
        ]);

        if($validated){
            $user::find($id)->update($validated);
            toast('User updated successfully.','success');
            return redirect('/admin/users');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        $user::where('user_id', $id)->update(['isDeleted' => true]);
        toast('User deleted successfully.','success');
        return redirect('/admin/users');
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

    public function proccesLogout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
