<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandownerController extends Controller
{
    public function index()
    {
        return view('settings.landowner.index');
    }
}
