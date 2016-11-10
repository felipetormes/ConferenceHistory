<?php

namespace App\Http\Controllers;

use App\Author;
use App\Institution;
use App\Paper;
use Illuminate\Http\Request;

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
        $paper = Paper::create($input_paper);

        $input_author = $request->only('first_name', 'middle_name', 'last_name', 'author_country');
        $paper->authors()->create($input_author);

        $input_institution = $request->only('institution_name', 'institution_country');
        $institution = $paper->institutions()->create($input_institution);
        $input_department = $request->only('department_name');
        $institution->department()->create($input_department);

        return redirect()->back();
    }
}
