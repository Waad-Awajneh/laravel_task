<?php

namespace App\Http\Controllers;

use App\Models\User; //new
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; //new
use Illuminate\Support\Facades\Session; //new
use Illuminate\Support\Facades\Auth; //new

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }


    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $remember = $request->remember;
        $credentials = $request->only('email', 'password');
        // dd($credentials); [ "email" => "a@gmail.com", "password" => "123456"]
        if (Auth::attempt($credentials, $remember)) {
            return redirect("/index")
                ->withSuccess('Signed in');
        }


        return redirect("login")->withSuccess('Login details are not valid');
    }



    public function registration()
    {
        return view('auth.registration');
    }


    public function customRegistration(Request $request)
    {
        $user = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $u = User::create($request->all());

        return response()->json($u);
        // $data = $request->all();
        // $check = $this->create($data)->only('email', 'password');// withou only cant work 

        // // dd($check);
        //   return CustomAuthController::customLogin($request);
        // return redirect("dashboard")->withSuccess('have signed-in');
    }


    // public function create(array $data)
    // {
    //   return User::create([
    //     'name' => $data['name'],
    //     'email' => $data['email'],
    //     'password' => Hash::make($data['password'])
    //   ]);
    // }    


    public function dashboard()
    {
        if (Auth::check()) {
            return view('/index');
        }

        return redirect("login")->withSuccess('are not allowed to access');
    }


    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}