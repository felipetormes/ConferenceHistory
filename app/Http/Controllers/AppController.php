<?php

namespace App\Http\Controllers;

use App\Author;
use App\Conference;
use App\Department;
use App\Edition;
use App\Institution;
use App\Paper;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\User;
use App\Role;

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
        $input_conference = $request->only('conference_title', 'acronym');
        $conference_exists = Conference::where([
            ['conference_title', '=', $input_conference['conference_title']],
            ['acronym', '=', $input_conference['acronym']]
        ])->get();

        if ($conference_exists == '[]'){
            $conference = Conference::create($input_conference);
        }
        else{
            $conference = Conference::find($conference_exists->first()->id);
        }

        $input_edition = $request->only('edition_name', 'host_city', 'host_country');


        $edition_exists = $conference->edition()->where([
            ['edition_name', '=', $input_edition['edition_name']]
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
            $paper = $edition->papers()->create($input_paper);
        }
        else{
            $paper = Paper::find($paper_exists->first()->id);
        }

        $input_author = $request->only('first_name', 'middle_name', 'last_name');

        $author_exists = Person::where([
            ['first_name', '=', $input_author['first_name']],
            ['middle_name', '=', $input_author['middle_name']],
            ['last_name', '=', $input_author['last_name']]
        ])->get();

        if($author_exists == '[]') {
            $author = Person::create($input_author);
        }
        else{
            $author = Person::find($author_exists->first()->id);
        }

        $input_institution = $request->only('institution_name','department', 'country');

        $institution_exists = Institution::where([
            ['institution_name', '=', $input_institution['institution_name']],
            ['department', '=', $input_institution['department']],
            ['country', '=', $input_institution['country']]
        ])->get();

        if($institution_exists == '[]'){
            $institution = Institution::create($input_institution);
            $institution->persons()->attach($author, ['paper_id' => $paper->id]);
        }
        else {
            $found = 0;
            $institution = $institution_exists->first();
            $persons = $institution->persons;
            foreach ($persons as $person) {

                if ($person->id == $author->id) {
                    $found =  1;
                }
            }

            if($found == 0) {
                $author->institutions()->attach($institution, ['paper_id' => $paper->id]);
            }
            else {
                $author->papers()->attach($paper, ['institution_id' => $institution->id]);
            }
        }


        return redirect()->back();
    }

    public function getAdminPage()
    {
        $users = User::all();
        return view('admin', ['users' => $users]);
    }

    public function postAdminAssignRoles(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
        if ($request['role_user']) {
            $user->roles()->attach(Role::where('name', 'user')->first());
        }
        if ($request['role_admin']) {
            $user->roles()->attach(Role::where('name', 'admin')->first());
        }
        return redirect()->back();
    }
}
