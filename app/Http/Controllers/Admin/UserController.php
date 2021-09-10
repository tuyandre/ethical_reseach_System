<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('backend.users.userList');
    }

    public function un_role(){
        return view('backend.users.temporary_users');
    }
    public function getUnRoleUser(){
        $users=User::with(['Role'])
            ->doesntHave('roles')->get();

        return response()->json(['users' => $users], 200);
    }

    public function getUserList(){
        $users=User::with(['Role'])
            ->whereHas(
                'roles', function($q){
                $q->where('name', 'supervisor');
                $q->orWhere('name', 'admin');
                $q->orWhere('name', 'enumerator');
                $q->orWhere('name', 'moderator');
                $q->orWhere('name', 'project_manager');
                $q->orWhere('name', 'senior_manager');
                $q->orWhere('name', 'manager');
            }
            )->get();

        return response()->json(['users' => $users], 200);
    }
    public function userDetail($id){
        $user=User::find($id);
        return view('backend.users.userDetail',['user'=>$user])->with('user',$user);
    }
    public function getUserPermission($id){
        $user=User::find($id);
        if ($user){
            $perms=$user->permissions()->get();
            return response()->json(['permission' => $perms], 200);
        }
    }
    public function attach_permission(Request $request){
        $user=User::find($request['user']);
        if ($user){
            $perm=Permission::find($request['permission']);
            if ($perm){
                $user->attachPermission($perm);
                return response()->json(['user' => "ok"], 200);
            }
        }
        return response()->json(['user' => "not"], 500);
    }
    public function remove_permission(Request $request){
        $user=User::find($request->user);
        if ($user){
            $perm=Permission::find($request->permission);
            if ($perm){
                $user->detachPermission($perm);
                return response()->json(['user' => "ok"], 200);
            }
        }
        return response()->json(['user' => "not"], 500);
    }
    public function save_user(Request $request){
        $request->validate([
            'email' => 'required|email|string|max:255|unique:users',
        ]);

        $user=new User();
        $user->role_id=$request['role'];
        $user->first_name=$request['first_name'];
        $user->last_name=$request['last_name'];
        $user->full_name=$request['last_name']." ".$request['first_name'];
        $user->email=$request['email'];
        $user->telephone=$request['phone'];
        $user->date=$request['date'];
        $user->district1=$request['district1'];
        $user->district2=$request['district2'];
        $user->district3=$request['district3'];
        $user->education=$request['education'];
        $user->fields=$request['fields'];
        $user->gender=$request['gender'];
        $user->country=$request['country'];
        $user->confirmed=true;
        $user->activated=true;
        $user->password=bcrypt($request['password']);
        $user->save();

        $role=Role::find($request['role']);
        $user->attachRole($role);
        event(new Registered($user));

        return response()->json(['user' => "ok"], 200);
    }
    public function deactivate_user($id){
        $user=User::find($id);
        if ($user){
            $user->activated=false;
            $user->save();
            return response()->json(['user' => "ok"], 200);
        }
        return response()->json(['user' => "not"], 500);

    }
    public function activate_user($id){
        $user=User::find($id);
        if ($user){
            $user->activated=true;
            $user->save();
            return response()->json(['user' => "ok"], 200);
        }
        return response()->json(['user' => "not"], 500);
    }

    public function members(){
        return view('backend.users.members');
    }
    public function getMemberList(){
        $users=User::with(['Role'])
            ->whereHas(
                'roles', function($q){
                $q->where('name', 'member');
            }
            )->get();

        return response()->json(['users' => $users], 200);
    }

    public function fileImport(Request $request)
    {
        Excel::import(new UsersImport, $request->file('file_upload')->store('temp'));
        return back();
    }
    public function fileExport()
    {
        return Excel::download(new UsersExport, 'users-collection.xlsx');
    }





    public function controlRole(Request $request){
        $rol=$request['role'];
        $dat=$request['user'];
        $user=User::find($dat);
        if ($rol==0){
            $role=Role::find($user->role_id);
            $user->role_id=null;
            $user->save();
            $user->detachRole($role);
        }else{
            $role1=Role::find($rol);
            $user->role_id=$role1->id;
            $user->save();
            $user->attachRole($role1);
        }
        return response()->json(['role' => "ok"], 200);
    }

}
