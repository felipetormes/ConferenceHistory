<?php

namespace App\Http\Controllers;

use App\Paper;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    private $paper;

    public function __construct(Paper $paper)
    {
        $this->paper = $paper;
    }

    public function index()
    {
        $papers = Paper::all();

        return view('search.papers.index', compact('papers'));
    }

    public function authors($id)
    {
        $paper = Paper::find($id);

        $authors = $paper->authors;

        return view('search.authors.index', compact('authors'));
    }

    public function search(Request $request){
        $input_search = $request->only('paper_title');

        $papers = Paper::where([
            ['paper_title', 'like', '%'.$input_search['paper_title'].'%']
        ])->get();

        return view('search.papers.index', compact('papers'));
    }
}
