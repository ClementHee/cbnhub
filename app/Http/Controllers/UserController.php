<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $roles = Role::all();
        $users = User::all();
        return view('pages.sba.user.users', compact('roles','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('pages.sba.user.user-create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users')->with('success', 'User deleted successfully.');

    }

    public function editRole($id){

        return view('pages.sba.user.user-roles', compact('id'));
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('pages.sba.user.profile', compact('user'));
    }
    public function editProfile()
    {
       
        return view('pages.sba.user.edit-profile', compact('user'));
    }
    
    public function updateProfile(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    public function audit_log()
    {
   
        return view('pages.sba.superadmin.audit_log');
    }

    //** permission:read tpp/read super5/read sba*/
}
