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
        $user = User::with('Employee')->select('name','email','MobilePhone','group_intranet')
                    ->Where('MobilePhone','=', $request->MobilePhone)
                    ->first();

        $Auth = Auth::attempt(['MobilePhone' => $request->get('MobilePhone'), 'pswd' =>md5($request->Password)]);

        if(!$user || !$Auth) {

            $errorStatus = true;
            $status      = "Forbidden";
            $message     = "The provided credentials password are incorrect.";

            $response = [
                        'error'     =>$errorStatus,
                        'info'      => [
                            'status'    =>$status,
                            'httpcode'  =>403,
                            'message'   =>$message
                            ]
                        ];

                return response()->json($response, 403);

        } elseif ($user && $Auth) {

            $result = [
                'httpcode'  =>  200,
                'error'     =>  false,
                'data'      =>  $user
            ];

                return response()->json($result,200);

        $errorStatus = false;
        $status      = "Data Found.";
        $message     = "Successfully displaying logged in employee data.";

        $response = [
                        'error'     =>$errorStatus,
                        'info'      =>  [
                                            'status'    =>$status,
                                            'httpcode'  =>200,
                                            'message'   =>$message
                                        ],
                        'data'      => $user
                    ];

                return response()->json($response, 200);

        } else {

            $errorStatus = true;
            $status      = "Server Error";
            $message     = "Internal Server Error.";

            $response = [
                        'error'     =>$errorStatus,
                        'info'      => [
                            'status'    =>$status,
                            'httpcode'  =>500,
                            'message'   =>$message
                            ]
                        ];

                return response()->json($response, 500);
        }
    }
}
