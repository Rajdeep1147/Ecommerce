<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //create Role
        // Role::create(['name'=>'publisher']);

        //create Permission
        // $permission = Permission::create(['name'=>'write post']);
      

        //give permission to a Role
        
        // $role = Role::find(5);
        // $permission = Permission::find(17);

        // $role->givePermissionTo($permission);

        $user = User::find(3);

        $user->givePermissionTo('write post');

        // give permission to role end 

        //Revoke the role
        // $permission->revokeRole($role);
        //end Revoke role

        //assign the role and permission to user
            // auth()->user()->givePermissionTo('write post');
            // auth()->user()->assignRole('writer');
        //end assign the role and permission to user

        // $role = Permission::findByName('write post');
        // $role->delete();

        // return auth()->user()->permissions;
        // return User::permission('write post')->get();
        return view('home');
    }
}
