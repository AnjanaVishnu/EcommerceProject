<?php

namespace App\Http\Controllers\Api;

use App\Models\Client as ModelsClient;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login_user()
    {
        try {

            $user = ModelsClient::where('email', request('email'))->first();

            if (Hash::check(request('password'), $user->password)) {
                $token = $user->createToken('mobile-app')->plainTextToken;

                return response()->json([
                    'email' => request('email'),
                    'password' => request('password'),
                    'token' => $token,
                    'message' => 'login sucess',
                    'status' => 200,
                ]);
                return redirect()->intended('/shop');
            } else {

                return response()->json([
                    'email' => request('email'),
                    'password' => request('password'),
                    'message' => 'login failed',
                    'status' => 250
                ]);
            }
        } catch (Exception $e) {
            return $e->getMessage('catch error');
        }
    }
}
