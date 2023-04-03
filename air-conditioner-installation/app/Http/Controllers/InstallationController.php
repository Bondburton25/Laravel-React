<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class InstallationController extends Controller
{
    public function create()
    {
        return view('installation.create', [
            'projects' => Project::get()
        ]);
    }
}
