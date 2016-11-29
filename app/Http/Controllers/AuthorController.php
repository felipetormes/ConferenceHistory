<?php

namespace App\Http\Controllers;

use App\Author;
use App\Paper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    private $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    public function index()
    {
        $authors = Author::all();

        return view('authors.index', compact('authors'));
    }

    public function papers($id)
    {
        $author = Author::find($id);

        $papers = $author->papers;
        
        return view('search.papers.index', compact('papers'));
    }

    public function search(Request $request){
        $input_search = $request->only('fname');

        $authors = Author::where([
            ['first_name', 'like', '%'.$input_search['fname'].'%']
        ])->get();

        return view('search.authors.index', compact('authors'));
    }
}



