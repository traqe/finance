<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DecisionController extends Controller
{
    public function index()
    {
        return view('decisions.index');
    }
}
