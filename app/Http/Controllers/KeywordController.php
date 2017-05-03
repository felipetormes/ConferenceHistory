<?php

namespace App\Http\Controllers;

use App\Keyword;
use Illuminate\Http\Request;
use App\Paper;

class KeywordController extends Controller
{

    public function index()
    {
        return view('/create2');
    }

    public function create()
    {
        return view('/create2');
    }

    public function store(Request $request)
    {

        $input_paper = $request->only('paper_title');

        $paper_exists = Paper::where([
            ['paper_title', '=', $input_paper['paper_title']]
        ])->get();

        $paper = $paper_exists->first();

        $input_keyword = $request->only('keyword');

        $keyword_exists = Keyword::where([
            ['keyword', '=', $input_keyword['keyword']]
        ])->get();

        if ($keyword_exists == '[]'){
            $keyword = Keyword::create($input_keyword);
            $paper->keywords()->attach($keyword);
        }
        else{
            $keyword = Keyword::find($keyword_exists->first()->id);
            $paper->keywords()->attach($keyword);
        }

        return redirect()->back();
    }

    public function papers($id)
    {
        $keyword = Keyword::find($id);

        $papers = $keyword->papers;

        return view('search.conferences.index', compact('papers'));
    }
}
