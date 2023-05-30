<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(){
    if(Auth::id()){
        return redirect('login');
    }else{
        return view('home.userpage');
    }
}

    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype=='admin'){
            return view('admin.home');
        }
        else{
            return view('home.userpage');
        }
    }

}
