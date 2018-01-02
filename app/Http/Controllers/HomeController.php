<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conference;
use App\Person;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
       $conferences = Conference::all();
       $persons = Person::all();

       return view('home', compact('conferences','persons'));
     }

    public function store(Request $request)
    {

        $input_conference = collect([]);
        $conference_checked = collect([]);

        $conferences = Conference::all();
        foreach($conferences as $conference) {
          $input_conference = $input_conference->merge($request->only($conference->acronym));

          $conference_checked = $conference_checked->merge(Conference::where([
              ['acronym', '=', $input_conference[$conference->acronym]]
          ])->get());
        }
        $persons = Person::all();

        return view('search.conferences.index', compact('conferences','persons','conference_checked'));
    }
}
