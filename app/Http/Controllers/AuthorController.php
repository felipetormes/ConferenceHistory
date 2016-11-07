<?php

namespace App\Http\Controllers;

use App\Author;
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

        return view('authors.index')->with('authors', $authors);
    }

    public function papers(Request $request, $id)
    {
        $author = Author::find($id);

        $papers = $author->papers->first();

        /*$papers = DB::table('institutions')
            ->join('institutions_has_authors', 'institutions.id', '=', 'institutions_has_authors.institution_id')
            ->join('authors', 'institutions_has_authors.author_id', '=', 'authors.id')
            ->select('institutions.institution_name')
            ->where('authors.id', '=', $id)
            ->get();*/

        return view('authors.papers', compact('papers'));
    }
}



