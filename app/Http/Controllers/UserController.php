<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
     public function login(Request $request)
  {
      $input = $request->all();

      // Validate the input
      $validator = Validator::make($input, [
          'email' => 'required',
          'password' => 'required',
      ]);

      if ($validator->fails()) {
          return response()->json(['error' => $validator->errors()], 422);
      }

      // Attempt authentication with the 'admin' guard
     if (auth()->guard('users')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::guard('users')->user();
            $token = $user->createToken('My-App',['user'])->plainTextToken;
            return response(['users' => $user, 'token' => $token], 200);
        }else {
          return response()->json(['error' => 'Authentication failed'], 401);
      }
  }

    public function userDetails()
    {
        $user = Auth::user();
        return response()->json(['data' => $user]);
    }
}
