<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('backend.privilege.permission');
    }

    public function getPermission(){
        $permission=Permission::all();

        return response()->json(['permission' => $permission], 200);
    }

    public function savePermission(Request $request){

        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
        ]);

        $permission=new Permission();
        $permission->name=$request['name'];
        $permission->display_name=$request['display_name'];
        $permission->description=$request['description'];
        $permission->save();
        return response()->json(['permission' => "ok"], 200);
    }
    public function updatePermission(Request $request){
        $permission=Permission::find($request['id']);
        if (!$permission){
            return response()->json(['permission' => "not"], 200);
        }
        $permission->name=$request['permission_name'];
        $permission->display_name=$request['display_name'];
        $permission->description=$request['description'];
        try{
            $permission->save();
        }catch (QueryException $exception){
            return response()->json(['ex'=>$exception->errorInfo],500);
        }
        return response()->json(['permission' => "ok"], 200);
    }


    public function showPermission($id){
        $permission=Permission::find($id);
        return response()->json(['permission' => $permission], 200);
    }

    public function deletePermission($id){
        $permission=Permission::find($id);
        if ($permission){
            $permission->delete();
            return response()->json(['permission' => "ok"], 200);
        }
        return response()->json(['permission' => "not"], 500);
    }
}
