<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\InstallationStep;

class InstallationStepController extends Controller
{
    public function index()
    {
        return view('installation-step.index', ['installation_steps' => InstallationStep::get()]);
    }
}
