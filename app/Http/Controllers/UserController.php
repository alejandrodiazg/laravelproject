<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = DB::table('users')
        ->simplePaginate(5);

        return view('admin.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function edit(User $User)
    {
        //

        $roles = Role::all();

        return view('admin.users.edit', compact('User', 'roles'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $User)
    {
        //
        $User->roles()->sync($request->role);
        return redirect()->action([UserController::class, 'index'])
        ->with('success-update', 'Rol actualizado con exito');
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $User)
    {
        //
        $User->delete();
        return redirect()->action([UserController::class, 'index'])
        ->with('success-destroy', 'Usuario eliminado con exito');
    }
}
