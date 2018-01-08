<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conference;
use App\Person;
use App\Edition;

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
        $editions_checked = collect([]);
        $start_date = $request->only('start_date');
        $end_date = $request->only('end_date');

        $conferences = Conference::all();
        foreach($conferences as $conference) {
          $input_conference = $input_conference->merge($request->only($conference->acronym));

          $conference_checked = $conference_checked->merge(Conference::where([
              ['acronym', '=', $input_conference[$conference->acronym]]
          ])->get());
        }

        foreach($conference_checked as $conference) {
          foreach($conference->edition as $edition) {
            $editions_checked = $editions_checked->merge($edition->where([
                ['started_at', '>', $start_date['start_date']],
                ['ended_at', '<', $end_date['end_date']],
                ['edition_name', '=', $edition->edition_name]
            ])->get());
          }
        }

        $persons = Person::all();

        return view('search.conferences.index', compact('conferences','persons','conference_checked','editions_checked'));
    }
}
