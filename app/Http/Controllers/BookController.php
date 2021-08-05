<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Services\BookService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    protected $service;
    protected $authorService;

    public function __construct(BookService $service, AuthorService $authorService)
    {
        $this->service = $service;
        $this->authorService = $authorService;
    }

    public function index(Request $request) {
        $books = $this->service->index();
        $authors = $this->authorService->index();
        
        return view('books', [
            'books' => $books['items'],
            'authors' => $authors['items']
        ]);
    }

    public function destroy(Request $request, $id) {
        return new Response(view('redirect', [
            'message' => $this->service->destroy($id)
        ]));
    }

    public function store(Request $request) {
        return new Response(view('redirect', [
            'message' => $this->service->store($request->input())
        ]));
    }

}