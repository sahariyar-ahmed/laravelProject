<?php


namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GuestAuthentication extends Controller
{
    public function register()
    {
        return view('frontend.auth.register');
    }

    public function register_post(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
        ]);
        return redirect()->route('guest.login')->with('register_success', "Registration Complete");
    }

    public function login()
    {
        return view('frontend.auth.login');
    }

    public function login_post(Request $request)
    {
        $resource = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if(Auth::attempt($resource)){
            return redirect()->route('dashboard');
        }else{
            return back()->withErrors(['email' => 'user is not valid'])->withInput();
        }


    }
}
