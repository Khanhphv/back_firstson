<?php

namespace App\Http\Controllers;

use App\Http\Resources\Failed;
use App\Http\Resources\Success;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    function registerAccount(Request $rq){
        $user = new User();
        $user->name = $rq->name;
        $user->password = $rq->password;

        if($user->save()){
            return new Success('');
        } else {
            return new Failed('');
        }

    }
}
