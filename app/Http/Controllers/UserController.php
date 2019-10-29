<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //
    function login(Request $rq) {
        $user_data = array(
            'name' => $rq->name,
            'password' => $rq->password
        );
        if(Auth::attempt($user_data)){
            echo "Success";
        } else{
            return Redirect::to('/');
        }
    }
}
