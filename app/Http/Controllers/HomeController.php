<?php

namespace App\Http\Controllers;

use App\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function token(Request $request)
    {

        $token = Str::random(60);
        $hashed_token = hash('sha256', $token);

        $request->user()->forceFill([
            'api_token' => $hashed_token,
        ])->save();

        return view('token', ['token' => $hashed_token]);
    }
    public function adafruit()
    {
        return view('sensor');
    }
}
