<?php

namespace App\Http\Controllers;

use App\Paper;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function index()
    {
        $papers = Paper::all();

        return view('papers.index', compact('papers'));
    }

    public function show($id)
    {
        $paper = Paper::find($id);
        
        return view('papers.info', compact('paper'));
    }
}
