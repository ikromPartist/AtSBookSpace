<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RulesController extends Controller
{
    public function index()
    {
        return view('rules_index');
    }
}
