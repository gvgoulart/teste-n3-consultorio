<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Consult;
use App\Models\Pacients;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function profile(){
        $user = User::where('id', Auth::user()->id)->first();

        return view('profile/show');
    }

    public function consults(){
        $consults = '';
        $consults = Consult::where('user_id', Auth::user()->id)->get();

        return view('consults', ['consults' => $consults]);
    }

    public function pacients(){
        $pacients = '';
        $pacients = Pacients::all();

        return view('pacients', ['pacients' => $pacients]);
    }
}
