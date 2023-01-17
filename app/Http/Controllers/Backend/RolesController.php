<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function index(){
        $roles= Role::all();
        return view('admin.pages.roles.role_index',compact('roles'));
    }

    public function create(){
        $permissions= Permission::all();
        return view('admin.pages.roles.role_create',compact('permissions'));
    }

    public function store(Request $request){
        $request->validate([
         'name'=>'required|max:100|unique:roles'
        ],[
            'name.requried'=>'Please give a role name'
        ]);
        $role=Role::create(['name' => $request->name]);
        // $role=DB::table('roles')->where('name',$request->name)->first();
        $permissions=$request->input('permissions');
        if(!empty($permissions)){
            $role->syncPermissions($permissions);

        }
        return back();
    }
}
