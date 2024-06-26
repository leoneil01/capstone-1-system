<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

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
            $users = $users->paginate(5)
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
        // Validate the request
        $validated = $request->validate([
            'user_image' => 'nullable|image|mimes:jpg,jpeg,png,bmp',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender_id' => 'required|integer|exists:genders,gender_id',
            'role_id' => 'required|integer|exists:roles,role_id',
            'address' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'email_address' => 'required|string|email|max:255|unique:users,email_address',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8|confirmed',
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
        } else {
            // No image uploaded, use default image path
            $validated['user_image'] = 'images/default_profile_image.jpg';
        }
    
        // Hash the password before storing
        $validated['password'] = bcrypt($validated['password']);
    
        // Create the user
        User::create($validated);
    
        // Show success message (assuming you're using Toastr or similar for toast messages)
        toast()->success('User created successfully.');
    
        // Redirect to the users page
        return redirect('/admin/users');
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
        // Validate the request
        $validated = $request->validate([
            'user_image' => 'nullable|mimes:jpg,jpeg,png,bmp',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender_id' => 'required|integer|exists:genders,gender_id',
            'role_id' => 'required|integer|exists:roles,role_id',
            'address' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'email_address' => 'required|string|email|max:255|unique:users,email_address,' . $id . ',user_id',
            'username' => 'required|string|max:255|unique:users,username,' . $id . ',user_id'
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
        $user::where('user_id', $id)->update($validated);
    
        // Show success message
        toast('User updated successfully.', 'success');
    
        // Redirect to the users page
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        // Find the user by id
        $user = User::findOrFail($id);
    
        // Check if the user has an image and if it exists in storage
        if ($user->user_image && Storage::disk('public')->exists('img/user/' . $user->user_image)) {
            // Delete the image from storage
            Storage::disk('public')->delete('img/user/' . $user->user_image);
        }

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
