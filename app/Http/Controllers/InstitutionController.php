<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function __construct(Institution $institution)
    {
        $this->institution = $institution;
    }
    
    public function search(Request $request){
        $input_search = $request->only('institution_name');

        $institutions = Institution::where([
            ['institution_name', 'like', '%'.$input_search['institution_name'].'%']
        ])->get();

        return view('search.institutions.index', compact('institutions'));
    }

    public function authors($id)
    {
        $institution = Institution::find($id);

        $authors = $institution->authors;

        return view('search.authors.index', compact('authors'));
    }

    public function papers($id)
    {
        $institution = Institution::find($id);

        $papers = $institution->papers;

        return view('search.papers.index', compact('papers'));
    }
}
