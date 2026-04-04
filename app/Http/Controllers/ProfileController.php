<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeProfile;
use App\Http\Requests\UpdateProfile;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
   public function store(storeProfile $request)
   {
      $user_id = Auth::user()->id;
      // $user_id = User::find($user_id);

      $validateData = $request->validated();
      $validateData['user_id'] = $user_id;
      $profile = profile::create($validateData);
      return response()->json($profile, 201);
   }

   

   public function UpdateUser(UpdateProfile $request)
   {
      $user_id = Auth::user()->id;
      $userProfile = profile::where('user_id', $user_id)->first();
      $userProfile->update($request->validated());
      return response()->json($userProfile, 200);
   }

   public function getUser($id)
   {
      $user = profile::find($id)->user;
      return response()->json($user);
   }

}
