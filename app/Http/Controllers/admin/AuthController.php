<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Models\House;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $data=$request->validated();
        if(!Auth::attempt($data))
            return back()->with('error','invalid data');
        if(!Auth::user()->role==1)
            return back()->with('error',"You don't have Admin authority");
        return redirect()->route('dashboard');
    }


    public function dashboard(){
        $users=User::count();
        $houses=House::count();
        return view('Admin.dashboard',compact('houses','users'));
    }
}
