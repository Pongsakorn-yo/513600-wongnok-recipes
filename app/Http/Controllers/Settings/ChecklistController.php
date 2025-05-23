<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function index()
    {
        return view('settings.checklist.index');
    }

    public function show($id)
    {
        return view('settings.checklist.show');
    }
}
