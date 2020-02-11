<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('main');
    }

    public function test()
    {
        $user = User::find(1);
        $count = $user->link()->count();

        $pad = 1 . str_pad($user->id,11,0,STR_PAD_LEFT);
        $code = $pad . $count;
        $dec = dechex($code);
        dd($dec);
        //////////////////////////////////////////////////////////////////
        $dec = dechex('0000000123');
        $hex = hexdec($dec);
        dd($dec,$hex);
    }
}
