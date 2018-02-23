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
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request)
     {
       $conferences = DB::table('conferences')->select('acronym')->get();
       $conference_checked = collect([]);
       $start_date = '';
       $end_date = '';
       $entire_start_date = '';
       $entire_end_date = '';

       if ($request->session()->has('conference_checked')) {
          $conference_checked = $request->session()->get('conference_checked');
       }

       if ($request->session()->has('start_date')) {
          $start_date = $request->session()->get('start_date');
       }

       if ($request->session()->has('end_date')) {
          $end_date = $request->session()->get('end_date');
       }

       if ($request->session()->has('entire_start_date')) {
          $entire_start_date = $request->session()->get('entire_start_date');
       }

       if ($request->session()->has('entire_end_date')) {
          $entire_end_date = $request->session()->get('entire_end_date');
       }

       return view('index', compact('conferences','conference_checked','start_date','end_date','entire_start_date','entire_end_date'));
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

          $persons = DB::select('select people.first_name, people.middle_name, people.last_name, GROUP_CONCAT(DISTINCT institutions.institution_name) as institution_name, count(papers.id) as numPapers from people
            inner join authors on authors.person_id = people.id
            inner join institutions on institutions.id = authors.institution_id
            inner join papers on papers.id = authors.paper_id
            inner join editions on editions.id = papers.edition_id
              and editions.started_at >= '. '"' .$start_date['start_date']. '"' .
              ' and editions.ended_at <= '. '"' .$end_date['end_date']. '"' .
            ' inner join conferences on conferences.id = editions.conference_id
              and ('.$conf.
            ') group by people.id;');


        $entire_start_date = $start_date['start_date'];
        $entire_end_date = $end_date['end_date'];
        $start_date = substr($start_date['start_date'],0,4).'-';
        $end_date = substr($end_date['end_date'],0,4);

        $request->session()->set('persons',$persons);
        $request->session()->set('conference_checked',$conference_checked);
        $request->session()->set('start_date',$start_date);
        $request->session()->set('end_date',$end_date);
        $request->session()->set('entire_start_date',$entire_start_date);
        $request->session()->set('entire_end_date',$entire_end_date);

        return view('index', compact('conferences','conference_checked','start_date','end_date','entire_start_date','entire_end_date'));
    }
}
