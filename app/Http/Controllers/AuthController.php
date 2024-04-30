<?php

namespace App\Http\Controllers;

// USED MODEL
use App\Models\User;
use App\Models\Log;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function login(){
        return view('auth/login');
    }

    public function login_validate(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $remember_me = $request->has('remember_me') ? true : false; 

        // $credentials = $request->only('email', 'password');

        // if(Auth::attempt($credentials)){
        //     return redirect('/');
        // }else{
        //     return redirect('login')->with('failed', 'Kombinasi tidak cocok');
        // }

        $login_type = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL ) 
        ? 'email' 
        : 'username';

        $request->merge([
            $login_type => $request->input('email')
        ]);
        
        if(Auth::attempt($request->only($login_type, 'password'), $remember_me)){
            return redirect('/');
        }else{
            return redirect('login')->with('failed', 'Kombinasi tidak cocok');
        }
    }

    public function logout(Request $request){
        Session::flush();

        Auth::logout();

        return redirect('login')->with('success', 'Logout Berhasil');;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
