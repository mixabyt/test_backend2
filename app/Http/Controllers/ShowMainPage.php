<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowMainPage extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($locale)
    {
        return view('main', compact('locale'));
    }
}
