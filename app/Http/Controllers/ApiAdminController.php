<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ApiAdminController extends Controller
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
        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::guard('admin')->user();
            $token = $user->createToken('My-App',['admin'])->plainTextToken;

            return response(['user' => $user, 'token' => $token], 200);
        }

        return response(['error' => 'Unauthorized'], 401);
  }

  public function adminDetails()
  {
    $user = Auth::user();
    return response()->json(['data' => $user]);

  }
    
}
