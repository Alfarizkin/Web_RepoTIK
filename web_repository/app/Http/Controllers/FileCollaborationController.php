<?php

namespace App\Http\Controllers;

use App\Models\Collaboration;
use Illuminate\Http\Request;

class FileCollaborationController extends Controller
{
    public function index(Request $request)
    {
        $paginatedCollab = Collaboration::paginate(10); 

        $paginatedCollab->onEachSide(2);

        return view('auth.collaboration', compact('paginatedCollab'));
    }
}
