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

    public function index()
    {
        $institutions = $this->institution->all();

        return view('institutions.index')->with('institutions', $institutions);
    }
}
