<?php

namespace App\Traits;

class handleHttp {

    public static function HandleCode($statusCode)
    {
        if ($statusCode == 400) { //400

            $errorStatus = true;
            $status      = "Bad Request";
            $message     = "Access Bad Request";

            $response = [
                'error'     =>$errorStatus,
                'info'      => [
                    'Status'    => $status ,
                    'httpcode'  => 400,
                    'Message'   => $message
                    ]
                ];

            return response()->json($response, 400);
            exit;
        } elseif ($statusCode == 401) { //401

            $errorStatus = true;
            $status      = "Unauthorized";
            $message     = "Unauthorized Access or Empty Token Key or Invalid Access Token.";

            $response = [
                    'error'     =>$errorStatus,
                    'info'      => [
                        'status'    =>$status,
                        'httpcode'  =>401,
                        'message'   =>$message
                        ]
                    ];


            return response()->json($response, 401);
            exit;
        } elseif ($statusCode == 403) { //403

            $errorStatus = true;
            $status      = "Forbidden";
            $message     = "API access is not allowed.";

            $response = [
                        'error'     =>$errorStatus,
                        'info'      => [
                            'status'    =>$status,
                            'httpcode'  =>403,
                            'message'   =>$message
                            ]
                        ];


            return response()->json($response, 403);
            exit;
        } elseif ($statusCode == 404) { //404

            $errorStatus = true;
            $status      = "Not Fount Endpoint.";
            $message     = "Check Incorrect URL.";

            $response = [
                            'error'     =>$errorStatus,
                            'info'      => [
                                'status'    =>$status,
                                'httpcode'  =>404,
                                'message'   =>$message
                                ]
                            ];

            return response()->json($response, 404);
            exit;
        } elseif ($statusCode == 405) { //405

            $errorStatus = true;
            $status      = "Method Not Allowed";
            $message     = "Check Incorrect Method";

            $response = [
                                'error'     =>$errorStatus,
                                'info'      => [
                                    'status'    =>$status,
                                    'httpcode'  =>405,
                                    'message'   =>$message
                                    ]
                                ];

            return response()->json($response, 405);
            exit;
        } elseif ($statusCode == 500) { //500

            $errorStatus = true;
            $status      = "Internal Server Error.";
            $message     = "Access Internal Server Error or Fatal Error - Contact the Administrator.";

            $response = [
                                    'error'     =>$errorStatus,
                                    'info'      => [
                                        'status'    =>$status,
                                        'httpcode'  =>500,
                                        'message'   =>$message
                                        ]
                                    ];


            return response()->json($response, 500);
            exit;
        }
    }
}
