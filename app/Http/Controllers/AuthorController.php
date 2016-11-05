<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    public function index()
    {
        $authors = $this->author->all();

        return view('authors.index')->with('authors', $authors);
    }
}
