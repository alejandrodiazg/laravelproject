<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProfileRequest;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function edit(Profile $Profile)
    {
        //
        return view('subscriber.profiles.edit', compact('Profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request, Profile $Profile)
    {
        //
        // $user = User::find(Auth::user()->id);

        $user = Auth::user();

        if($request->hasFile('photos')){
            File::delete(public_path('storage/' . $Profile->photo));
            $photo = $request['photos']->store('profiles');
        }
        else{
            $photo = $user->profile->photo;
        }

        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->profile->photos = $photo;
        $user->profile->save();
        $user->save();
      

        return redirect()->action([HomeController::class, 'index'])
        ->with('success-update', 'Perfil actualizado con exito');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
