<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function Auth(Request $request)
    {
        dd(Auth::attempt(['MobilePhone' => $request->get('MobilePhone'), 'pswd' =>md5($request->Password)]));
    }
}
