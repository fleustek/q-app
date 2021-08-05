<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    protected $service;

    public function __construct(AuthorService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request) {
        $authors = $this->service->index();

        return view('authors', ['authors' => $authors['items']]);
    }

    public function read(Request $request, $id)
    {
        $author = $this->service->read($id);

        return view('author', ['author' => $author]);
    }

    public function destroy(Request $request, $id) {
        $message = $this->service->destroy($id);
       
        return new Response(view('redirect', [
            'message' => $message
        ]));
     }
}