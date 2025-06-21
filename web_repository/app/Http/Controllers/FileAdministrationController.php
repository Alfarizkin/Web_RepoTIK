<?php

namespace App\Http\Controllers;

use App\Models\Administration;
use Illuminate\Http\Request;

class FileAdministrationController extends Controller
{
    public function index(Request $request)
    {
        $paginatedAdmins = Administration::paginate(10); 

        $paginatedAdmins->onEachSide(2);

        return view('auth.administration', compact('paginatedAdmins'));
    }
}
