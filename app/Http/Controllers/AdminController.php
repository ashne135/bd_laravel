<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin;
class AdminController extends Controller
{
    public function register(){
        $users = Admin::all();
        return view('admin.register',compact('users'));
    }

    public function login(){
        return view('admin.login');
    }

    public function enregistrer(Request $request){
     $input =$request->validate([
         'name'=>'required|string',
         'age'=>'required|integer',
         'email'=>'required|string',
         'password'=>'required|string',       
     ]) ; 
            
        Admin::create([
           'name' => $request->name,
           'email' => $request->email,
           'age' => $request->age,
           'password' => Hash::make($request->password)
        ]);
           //Admin::create ($input);
           return 'ok';
    }
}
