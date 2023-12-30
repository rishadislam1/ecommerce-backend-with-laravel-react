<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use App\Http\Requests\ForgetRequest;
use DB;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\ForgetMail;

class ForgetController extends Controller
{
    public function ForgetPassword(ForgetRequest $request){
        $email = $request->email;

        if(User::where('email',$email)->doesntExist()){
            return response([
                'message' => 'Email Invalid'
            ],404);
        }
        $token = rand(10,100000);

        try{
            DB::table('password_reset_tokens')->insert([
                'email' => $email,
                'token' => $token
            ]);

            Mail::to($email)->send(new ForgetMail($token));

            return response([
                'message' => 'Reset Password Mail Send On Your Email'
            ],200);
        }catch(Exception $exception){
            return response([
                'message' => $exception->getMessage()
            ],400);
        }
    }
    // end method
}
