<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    protected $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function login(Request $request)
    {
        $user = $this->service->login($request->input());
        $response = new Response(view('login', $user['user']));

        return $response->withCookie('token_key', $user['token_key'] , 180);
    }

    public function logout(Request $request)
    {
        $response = new Response(view('login'));

        return $response->withCookie(Cookie::forget('token_key'));
    }

}