<?php

namespace App\Http\Controllers\Api\v1;

use App\Common\Responses;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\imageRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\updateProfile;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   public function login(AuthRequest $request){

    // Check email exist in the system 
    $user = User::where('email',$request->email)->first();
    if(is_null($user)){
        return Responses::error('Your email is not a part of system');
    }

    // Check credentails
    if(!Auth::attempt($request->validated())){
        return Responses::error('Invalid credentails');
    }

    $user->auth_token = $user->createToken('auth_token')->plainTextToken;
    $user=  new UserResource($user);
    return Responses::success('Successfully login',$user);
    

   }

   public function register(RegisterRequest $request){
    
    $user = User::create($request->validated());
    $user->auth_token = $user->createToken('auth_token')->plainTextToken;
    $user=  new UserResource($user);
    return Responses::success('user details',$user);

   }


    public function logout(Request $request){
        $user = $request->user();
        $user->tokens()->delete();
        return Responses::success('Successfully logout');

   }

 public function update(updateProfile $request){

    $user = $request->user();
    $user->update($request->validated());
    $user=  new UserResource($user);
    return Responses::success('user details',$user);
 }   

// Image UPloading 
function upload(imageRequest $request){

    dd($request->all());

}



}
