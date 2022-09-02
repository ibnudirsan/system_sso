<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        abort(403, 'Unauthorized action.');
    }
    public function Auth(Request $request)
    {
        $user = User::Where('MobilePhone','=', $request->MobilePhone)
                    ->first();

        $Auth = Auth::attempt(['MobilePhone' => $request->get('MobilePhone'), 'pswd' =>md5($request->Password)]);

        if(!$user || !$Auth) {

            $resultError = [
                'httpcode'  =>  403,
                'error'     =>  true,
                'data'      =>  ['message'   =>'The provided credentials password are incorrect.']
            ];

                return response()->json($resultError,403);

        } elseif ($user && $Auth) {

            $result = [
                'httpcode'  =>  200,
                'error'     =>  false,
                'data'      =>  $user
            ];

                return response()->json($result,200);

        } else {

            $resultError = [
                'httpcode'  =>  500,
                'error'     =>  true,
                'data'      =>  ['message'   =>'Internal Server Error.']
            ];

                return response()->json($resultError,500);
        }
    }
}
