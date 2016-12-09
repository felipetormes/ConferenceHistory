<?php

namespace App\Http\Controllers;

use App\Author;
use App\Conference;
use App\Department;
use App\Edition;
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
        $input_conference = $request->only('conference_name');
        $conference_exists = Conference::where([
            ['conference_name', '=', $input_conference['conference_name']]
        ])->get();

        if ($conference_exists == '[]'){
            $conference = Conference::create($input_conference);
        }
        else{
            $conference = Conference::find($conference_exists->first()->id);
        }

        $input_edition = $request->only('edition', 'host_city', 'host_country', 'year');

        $edition_exists = $conference->edition()->where([
            ['edition', '=', $input_edition['edition']]
        ])->get();

        if ($edition_exists == '[]'){
            $edition = $conference->edition()->create($input_edition);
        }
        else{
            $edition = $conference->edition()->find($edition_exists->first()->id);
        }

        $input_paper = $request->only('paper_title');

        $paper_exists = Paper::where([
            ['paper_title', '=', $input_paper['paper_title']]
        ])->get();

        if ($paper_exists == '[]'){
            $paper = $edition->paper()->create($input_paper);
            $paper->conferences()->attach($conference);
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

        if ($author_exists == '[]') {
            $author = $paper->authors()->create($input_author);
        }
        else{
            $author = $paper->authors()->attach($author_exists->first()->id);
        }


        $input_institution = $request->only('institution_name', 'institution_country');

        $institution_exists = Institution::where([
            ['institution_name', '=', $input_institution['institution_name']],
            ['institution_country', '=', $input_institution['institution_country']]
        ])->get();

        if($institution_exists == '[]'){
            $institution = $paper->institutions()->create($input_institution);
            $institution->authors()->attach($author);
        }
        else{
            $institution = $institution_exists->first();
            $author->institutions()->attach($institution);
        }

        $input_department = $request->only('department_name');

        $department_exists = Department::where([
            ['department_name', '=', $input_department['department_name']]
        ])->get();

        if($department_exists == '[]') {
            $institution->department()->create($input_department);
        }

        return redirect()->back();
    }
}
