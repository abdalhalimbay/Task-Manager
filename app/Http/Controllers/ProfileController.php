<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function store(StoreProfileRequest $request)
    {
        $profile =
            Profile::create($request->validated());

        return response()->json([
            'message' => 'Profile Created Successfully',
            'profile'=>$profile,], 201);
    }
    public function show($id){
          $profile = Profile::where('user_id',$id)->firstOrfail();
         
            return response()->json([
            'message' => 'Profile Data Based On User Id Is : ',
            'profile'=>$profile,], 200);
    }

 public function update(UpdateProfileRequest $request,$id)
    {
        $profile = Profile::where('user_id',$id)->firstOrfail();
        
         $profile->update($request->validated());
        return response()->json($profile, 200);
    }

}
