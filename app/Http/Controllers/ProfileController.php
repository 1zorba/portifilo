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
        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profiles', 'public');
            $validateData['profile_image'] = $path;
        }
        $validateData['user_id'] = $user_id;

        $profile = profile::create($validateData);
        return response()->json($profile, 201);
    }



    public function update(Request $request)
    {
        $user = $request->user();
        $profile = $user->profile;

        // تحديث البيانات النصية
        $profile->job_title = $request->job_title;
        $profile->bio = $request->bio;
        $profile->borrow = $request->borrow;
        $profile->phone = $request->phone;
        $profile->social_links = $request->social_links;
        $profile->cv_url = $request->cv_url;
        $profile->social_links2 = $request->social_links2;



        if ($request->hasFile('profile_image')) {

            $path = $request->file('profile_image')->store('profiles', 'public');

            $profile->profile_image = $path;
        }

        $profile->save();

        return response()->json([
            'message' => 'تم تحديث البروفايل بنجاح',
            'data' => $profile
        ]);
    }
}
