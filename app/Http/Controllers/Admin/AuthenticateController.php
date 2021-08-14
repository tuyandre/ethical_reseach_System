<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function adminRegister(){
        $user=User::all();
        $count=$user->count();
        if ($count>0) {
            return view('auth.login');
        }else {
            return view('auth.admin_register');
        }

    }
    public function saveFirstRegister(Request $request){
        $role = new Role();
        $role->name = "admin";
        $role->display_name = "Administrator";    // optional
        $role->description  = "Survey all activities of company";  // optional
        $role->save();

        $user=new User();
        $user->role_id=$role->id;
        $user->first_name=$request['first_name'];
        $user->last_name=$request['last_name'];
        $user->full_name=$request['last_name']." ".$request['first_name'];
        $user->email=$request['email'];
        $user->telephone=$request['phone'];
        $user->country=$request['country'];
        $user->confirmed=true;
        $user->activated=true;
        $user->password=bcrypt($request['password']);
        $user->save();

        $user->attachRole($role);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
//        return response()->json(['user' => $user,'message'=>'ok'], 200);
    }
}
