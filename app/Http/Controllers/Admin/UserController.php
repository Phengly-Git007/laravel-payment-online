<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(15);
        return view('admin.users.index',['users' => $users]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserRequest $request)
    {
       $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role
       ]);
       if($user){
        return redirect('users')->with('status','User Created Successfully');
       }
       else{
        return redirect()->back()->with('status','something went wrong...');
    }
    }

    public function show($id)
    {
        //
    }

    public function edit( User $user)
    {
        return view('admin.users.edit',['user'=>$user]);
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);
        return redirect('users')->with('status','User Updated Successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('users')->with('status','User Deleted Successfully');
    }
}
