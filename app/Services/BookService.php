<?php

namespace App\Services;

use App\Utils\Apis\SymfonySkeleton;

class BookService
{
  public function index()
  {
    return SymfonySkeleton::getBooks();
  }

  public function destroy($id)
  {
    return SymfonySkeleton::deleteBook($id);
  }

  public function store($data)
  {
    $payload = [
      'author' => [
        'id' => $data['author_id']
      ],
      'title' => $data['title'],
      // placeholder data (not really important for this preview)
      'release_date' => '2021-08-04T12:28:17.860Z',
      'description'=> 'string',
      'isbn'=> '978-3-16-148410-0',
      'format'=> 'string',
      'number_of_pages'=> 0
    ];
    
    return SymfonySkeleton::createBook($payload);
  } 
}
