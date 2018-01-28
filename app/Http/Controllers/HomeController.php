<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conference;
use App\Person;
use App\Edition;
use DB;

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
       $conferences = DB::table('conferences')->select('acronym')->get();

       return view('home', compact('conferences'));
     }

    public function store(Request $request)
    {

        $input_conference = collect([]);
        $conference_checked = collect([]);
        $persons = collect([]);
        $start_date = $request->only('start_date');
        $end_date = $request->only('end_date');

        $conferences = DB::table('conferences')->select('acronym')->get();

        foreach($conferences as $conference) {
          $input_conference = $input_conference->merge($request->only($conference->acronym));

          $conference_checked = $conference_checked->merge(DB::table('conferences')->where([
              ['acronym', '=', $input_conference[$conference->acronym]]
          ])->get());
        }

        foreach($conference_checked as $conference) {
          $persons = $persons->merge(DB::select('select people.first_name, people.middle_name, people.last_name, institutions.institution_name, count(papers.id) as numPapers from people
                                         inner join authors on authors.person_id = people.id
                                         inner join institutions on institutions.id = authors.institution_id
                                         inner join papers on papers.id = authors.paper_id
                                         inner join editions on editions.id = papers.edition_id
                                            and editions.started_at >= ?
                                            and editions.ended_at <= ?
                                        inner join conferences on conferences.id = editions.conference_id
                                            and conferences.acronym = ?
                                        group by people.id, institutions.institution_name;', array($start_date['start_date'], $end_date['end_date'], $conference->acronym)));
        }

        $start_date = substr($start_date['start_date'],0,4);
        $end_date = substr($end_date['end_date'],0,4);

        return view('search.conferences.index', compact('conferences','persons','conference_checked','start_date','end_date'));
    }
}
