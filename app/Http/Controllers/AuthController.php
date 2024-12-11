<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
   public function register(Request $request)
   {
       $validateData = $request->validate([
           'first_name' => 'required|max:255|string',
           'last_name' => 'required|max:255|string',
           'location' => 'required|max:255|string',
           'phone' => 'required|min:10|max:10|unique:users',
           'password' => 'required|min:6|confirmed',
           'profile_Image' => 'required|nullable|max:255|string',
       ]);

       $user = User::create([
           'first_name' => $validateData['first_name'],
           'last_name' => $validateData['last_name'],
           'location' => $validateData['location'],
           'phone' => $validateData['phone'],
           'password' => bcrypt($validateData['password']),
           'profile_Image' => $validateData['profile_Image'],
       ]);

       $token = auth('api')->login($user);
       return $this->respondWithToken($token);
   }
   public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails())
            return response()->json($validator->errors(), 400);
        $credentials = request(['phone', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'The phone or password incorrect'], 401);
        }
        return response()->json([
            'message' => 'User successfully login',
            'token' => $token,
            'expires_in' => auth('api')->factory('api')->getTTL() * 60
        ], 201);
    }


    public function profile()
    {
        return response()->json(auth('api')->user());
    }



    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Successfully logged out']);
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'message' => 'User successfully registered',

            'expires_in' => auth('api')->factory('api')->getTTL() * 60
        ]);
    }
}
