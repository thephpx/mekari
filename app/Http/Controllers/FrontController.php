<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    /**
     * Show the landing page.
     *
     * @return Response
     */
    public function index()
    {
        return view('home.index', []);
    }
}