<?php

namespace App\Http\Controllers;

use App\Author;
use App\Institution;
use App\Paper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AppController extends Controller
{
    public function index()
    {
        return view('/index');
    }

    public function create()
    {
        return view('/create');
    }

    public function store(Request $request)
    {
        $input_paper = $request->only('paper_title');

        $paper_exists = Paper::where([
            ['paper_title', '=', $input_paper['paper_title']]
        ])->get();

        if (empty($paper_exists)){
            $paper = Paper::create($input_paper);
        }
        else{
            $paper = Paper::find($paper_exists->first()->id);
        }

        $input_author = $request->only('first_name', 'middle_name', 'last_name', 'author_country');

        $author_exists = Author::where([
            ['first_name', '=', $input_author['first_name']],
            ['middle_name', '=', $input_author['middle_name']],
            ['last_name', '=', $input_author['last_name']],
            ['author_country', '=', $input_author['author_country']]
        ])->get();

        if (empty($author_exists)) {
            $paper->authors()->attach($author_exists->first()->id);
        }
        else{
            $paper->authors()->create($input_author);
        }

        $input_conference = $request->only('conference_name');
        $conference = $paper->conferences()->create($input_conference);
        $input_edition = $request->only('edition', 'host_city', 'host_country', 'year');
        $conference->edition()->create($input_edition);

        $input_institution = $request->only('institution_name', 'institution_country');
        $institution = $paper->institutions()->create($input_institution);
        $input_department = $request->only('department_name');
        $institution->department()->create($input_department);

        return redirect()->back();
    }
}
