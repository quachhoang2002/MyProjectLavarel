<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\User\RegisterRequest;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function create(){
        return view('user.Register');

    }
    public function store(RegisterRequest $request){
        $formFeild= $request->except(['_token']);
        $formFeild['password']=bcrypt($formFeild['password']);
        $user=User::create($formFeild);
        Auth::login($user);
        return redirect(route('register'))->with('status','create and login');
    }
}
