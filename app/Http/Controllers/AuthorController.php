<?php

namespace App\Http\Controllers;

use App\Person;
use App\Paper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    private $author;

    public function __construct(Person $author)
    {
        $this->author = $author;
    }

    public function index(Request $request)
    {
      $conferences = DB::table('conferences')->select('acronym')->get();
      $persons = collect([]);
      $conference_checked = collect([]);
      $start_date = '';
      $end_date = '';
      $entire_start_date = '';
      $entire_end_date = '';

      if ($request->session()->has('persons')) {
         $persons = $request->session()->get('persons');
      }

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

      return view('search.authors.index', compact('conferences','persons','conference_checked','start_date','end_date','entire_start_date','entire_end_date'));
    }

    public function store(Request $request)
    {

        $input_conference = collect([]);
        $conference_checked = collect([]);
        $persons = collect([]);
        $conf = '';
        $start_date = $request->only('start_date');
        $end_date = $request->only('end_date');
        $entire_start_date = '';
        $entire_end_date = '';

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

          $persons = DB::select('select people.id, people.first_name, people.middle_name, people.last_name, institutions.institution_name, count(papers.id) as numPapers from people
            inner join authors on authors.person_id = people.id
            inner join institutions on institutions.id = authors.institution_id
            inner join papers on papers.id = authors.paper_id
            inner join editions on editions.id = papers.edition_id
              and editions.started_at >= '. '"' .$start_date['start_date']. '"' .
              ' and editions.ended_at <= '. '"' .$end_date['end_date']. '"' .
            ' inner join conferences on conferences.id = editions.conference_id
              and ('.$conf.
            ') group by people.id, institutions.institution_name;');


        $entire_start_date = $start_date['start_date'];
        $entire_end_date = $end_date['end_date'];
        $start_date = substr($start_date['start_date'],0,4).'-';
        $end_date = substr($end_date['end_date'],0,4);

        $request->session()->put('persons',$persons);
        $request->session()->put('conference_checked',$conference_checked);
        $request->session()->put('start_date',$start_date);
        $request->session()->put('end_date',$end_date);
        $request->session()->put('entire_start_date',$entire_start_date);
        $request->session()->put('entire_end_date',$entire_end_date);

        //print_r($persons);

        return view('search.authors.index', compact('conferences','persons','conference_checked','start_date','end_date','entire_start_date','entire_end_date'));
    }
}
