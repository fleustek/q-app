<?php

namespace App\Services;

use App\Utils\Apis\SymfonySkeleton;

class AuthorService
{
  public function index()
  {
    return SymfonySkeleton::getAuthors();
  }

  public function read($id)
  {
    return SymfonySkeleton::getAuthor($id);
  }

  public function destroy($id)
  {
    $author = $this->read($id);
    
    return empty($author['books']) ? SymfonySkeleton::deleteAuthor($id) : "Please delete all of author's books first!";
  }
}
