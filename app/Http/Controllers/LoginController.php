<?php

namespace App\Http\Controllers;

use App\Http\Resources\Failed;
use App\Http\Resources\Success;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function login(Request $rq){
        $user = [
            'email' => $rq->email,
            'password' => $rq->password,
        ];
        if(Auth()->attempt($user)){
            return new Success('');
        } else {
            return new Failed('');
        }

    }
}
