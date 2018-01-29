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
        $conf = '';
        $start_date = $request->only('start_date');
        $end_date = $request->only('end_date');

        $conferences = DB::table('conferences')->select('acronym')->get();

        foreach($conferences as $conference) {
          $input_conference = $input_conference->merge($request->only($conference->acronym));

          $conference_checked = $conference_checked->merge(DB::table('conferences')->where([
              ['acronym', '=', $input_conference[$conference->acronym]]
          ])->get());
        }

        $i = 1;
        $len = count($conference_checked);

        foreach($conference_checked as $conference) {
          if ($i == $len) {
            $conf = $conf. ' conferences.acronym = '. '"' . $conference->acronym . '" ';
          }
          else {
            $conf = $conf. ' conferences.acronym = '. '"' . $conference->acronym . '"'. ' or ';
          }
          $i++;
        }

          $persons = DB::select('select people.first_name, people.middle_name, people.last_name, institutions.institution_name, count(papers.id) as numPapers from people
            inner join authors on authors.person_id = people.id
            inner join institutions on institutions.id = authors.institution_id
            inner join papers on papers.id = authors.paper_id
            inner join editions on editions.id = papers.edition_id
              and editions.started_at >= '. '"' .$start_date['start_date']. '"' .
              ' and editions.ended_at <= '. '"' .$end_date['end_date']. '"' .
            ' inner join conferences on conferences.id = editions.conference_id
              and ('.$conf.
            ') group by people.id, institutions.institution_name;');


        $start_date = substr($start_date['start_date'],0,4);
        $end_date = substr($end_date['end_date'],0,4);

        return view('search.conferences.index', compact('conferences','persons','conference_checked','start_date','end_date'));
    }
}
