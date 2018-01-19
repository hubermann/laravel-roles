<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Order;
use Session;

class UsersController extends Controller
{
    //

	public function editUsers()
	{
		return View('backend/users/edit', [ 'users' => User::all() ]);	
	}


	public function updateUsers(Request $request)
	{
		$user = User::where( 'email', $request['email'] )->first();
		$user->roles()->detach();
		if($request['role_superadmin'])
		{
			$user->roles()->attach(Role::where('name', 'Superadmin')->first());
		}
		if($request['role_frontend'])
		{
			$user->roles()->attach(Role::where('name', 'Frontend')->first());
		}
		Session::flash('message', 'User updated!'); 
		return redirect()->back();
	}


	public function viewUsers()
	{
		return View('backend/users/all', [ 'users' => User::all() ]);	
	}

	public function user_detail($id)
	{
		$user = User::findOrfail($id);
		$orders = Order::where('user_id', $user->id);
		return View('backend/users.detail', [ 'user' => $user, 'orders' =>$orders] );	
	}

}
