<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        #$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.page-grid-filter-left-sidebar-1');//return view('home');
    }


    /**
     * Show the application dtempalte.
     *
     * @return \Illuminate\Http\Response
     */
    public function pruebatemplate()
    {
        return view('layouts.page-grid-filter-left-sidebar-1');
    }
    
}
