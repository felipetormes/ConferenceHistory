<?php

namespace App\Http\Controllers;

use App\Conference;
use App\Edition;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    private $conference;

    public function __construct(Conference $conference)
    {
        $this->conference = $conference;
    }

    public function index()
    {
        $conferences = Conference::all();

        return view('search.conferences.index', compact('conferences'));
    }

    public function editions($id)
    {
        $conference = Conference::find($id);

        $editions = $conference->edition;

        return view('search.conferences.editions', compact('editions'));
    }

    public function papers($id)
    {
        $edition = Edition::find($id);

        $papers = $edition->paper;

        return view('search.papers.index', compact('papers'));
    }

    public function search(Request $request){
        $input_search = $request->only('conference_name');

        $conferences = Conference::where([
            ['conference_name', 'like', '%'.$input_search['conference_name'].'%']
        ])->get();

        return view('search.conferences.index', compact('conferences'));
    }
}
