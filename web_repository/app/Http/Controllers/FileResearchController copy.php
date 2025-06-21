<?php

namespace App\Http\Controllers;

use App\Models\Research;
use Illuminate\Http\Request;

class FileResearchController extends Controller
{
    public function index(Request $request)
    {
        $paginatedResearch = Research::paginate(10); 

        $paginatedResearch->onEachSide(2);

        return view('auth.research', compact('paginatedResearch'));
    }
}
