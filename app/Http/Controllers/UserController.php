<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
use LaravelSanctumHasApiTokens;
use IlluminateNotificationsNotifiable;
use Laravel\Sanctum\HasApiTokens;
class UserController extends Controller
{

public function register(Request $request){
$request->validate(['name'=>'required|string|max:255',
'email' => 'required|string|max:255|unique:users,email',
'password' => 'required|string|min:8|confirmed']);
$user = User::create(['name'=>$request->name,'email'=>$request->email,'password' => Hash::make($request->password)]);
return response()->json([ 'message' => 'Register Successfully' , 'User' => $user] , 201);
}


//User Token && middlwere with auth sanctum && where to verify 

public function login(Request $request){

    $request->validate([
        'email'=>'required|string|email',
        'password'=>'required|string'
    ]);

if(!FacadesAuth::attempt(['email' => $request->email, 'password' => $request->password]))
    //undefined method attempt : search how to fix that 
    return response()->json([
        'message'=>'Invalid Email Or Password'
        ],
        401);
    // note : status code must be out of array brackets
   $user1 = User::where('email',$request->email)->firstOrFail();    
   $token = $user1->createToken('auth_Token')->plainTextToken;
 //  $plainTextToken = $token->plainTextToken;
   return response()->json(['message'=>'Login Successfully','User'=>$user1,'Token'=>$token], 201); 
}

public function logout(Request $request){
$request->user()->currentAccessToken()->delete();
return response()->json(['message' =>'Logout Successfully']);
}



public function getUserTasks($id){
       $tasks = User::findOrFail($id)->tasks;
       return response()->json($tasks, 200);

}

public function getProfile($id){

  $profile = User::find($id)->Profile;
 return response()->json($profile, 200);

}


    public function store(StoreUserRequest $request)
    {
        $user =
            User::create($request->validated());
        return response()->json($user, 201);
    }

     public function index()
    {
        $user = User::all();
        return response()->json($user, 200);
    }

}