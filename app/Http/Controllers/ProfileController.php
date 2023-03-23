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
    public function edit(Profile $profile)
    {
        //
        return view('subscriber.profiles.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request, Profile $profile)
    {
        //
        // $user = User::find(Auth::user()->id);

        $user = Auth::user();

        if($request->hasFile('photo')){
            File::delete(public_path('storage/' . $profile->photo));
            $photo = $request['photo']->store('profiles');
        }
        else{
            $photo = $user->profile->photo;
        }

        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->profile->photo = $photo;
        $user->profile->save();
        $user->save();
      


        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
