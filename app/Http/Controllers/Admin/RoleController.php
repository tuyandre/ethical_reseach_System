<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('backend.privilege.roles');
    }
    public function getRoles(){
        $roles=Role::all();

        return response()->json(['roles' => $roles], 200);
    }

    public function saveRole(Request $request){

        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
        ]);

        $role=new Role();
        $role->name=$request['name'];
        $role->display_name=$request['display_name'];
        $role->description=$request['description'];
        $role->save();
        return response()->json(['role' => "ok"], 200);
    }
    public function updateRoles(Request $request){
        $role=Role::find($request['id']);
        if (!$role){
            return response()->json(['role' => "not"], 200);
        }
        $role->name=$request['role_name'];
        $role->display_name=$request['display_name'];
        $role->description=$request['description'];
        try{
            $role->save();
        }catch (QueryException $exception){
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['role' => "ok"], 200);
    }


    public function showRoles($id){
        $role=Role::find($id);
        return response()->json(['role' => $role], 200);
    }

    public function deleteRoles($id){
        $role=Role::find($id);
        if ($role){
//            $users=$role->user();
            $role->delete();
            return response()->json(['role' => "ok"], 200);
        }
        return response()->json(['role' => "not"], 500);
    }

    public function roleDetail($id){
        $role=Role::find($id);
        if ($role){
            return view('backend.privilege.roleDetail',['role'=>$role])->with('role',$role);
//            return response()->json(['role' => "ok"], 200);
        }
        return redirect()->back();
    }

    public function getRoleUser($id){

        $role=Role::find($id);
        if ($role){
            $users = User::whereRoleIs($role->name)->get();
//            return view('backend.privilege.roleDetail',['role'=>$role])->with('role',$role);
            return response()->json(['user' => $users], 200);
        }
        return redirect()->back();


    }
    public function remove_user($id,$role){
        $user=User::find($id);
        if ($user){
            $role=Role::find($role);
            if ($role){
//                $user->role_id=$role->id;
//                $user->save();
                $user->detachRole($role);
                return response()->json(['role' => "ok"], 200);
            }
        }
        return response()->json(['role' => "not"], 500);
    }
    public function attach_user($id,$role){
        $user=User::find($id);
        if ($user){
            $role=Role::find($role);
            if ($role){
                $user->role_id=$role->id;
                $user->save();
                $user->attachRole($role);
                return response()->json(['role' => "ok"], 200);
            }
        }
        return response()->json(['role' => "not"], 500);
    }
    public function attach_permission(Request $request){
        $roles=Role::find($request['role']);
        if ($roles){
            $perm=Permission::find($request['permission']);
            if ($perm){
                $roles->attachPermission($perm);
                return response()->json(['role' => "ok"], 200);
            }
        }
        return response()->json(['role' => "not"], 500);

    }
    public function remove_permission(Request $request){
        $roles=Role::find($request->role);
        if ($roles){
            $perm=Permission::find($request->permission);
            if ($perm){
                $roles->detachPermission($perm);
                return response()->json(['role' => "ok"], 200);
            }
        }
        return response()->json(['role' => "not"], 500);
    }

    public function getRolePermission($id){
        $role=Role::find($id);
        if ($role){
//            $users = User::whereRoleIs($role->name)->get();
//            return view('backend.privilege.roleDetail',['role'=>$role])->with('role',$role);
            $permission=$role->permissions()->get();
            return response()->json(['permission' => $permission], 200);
        }
        return redirect()->back();

    }
}
