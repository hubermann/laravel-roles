<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Product;
use App\ImagesProduct;

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
        $data['categories'] = Category::all();
        $data['products'] = Product::paginate(20);
        return view('frontend_common.products', $data );//return view('home');
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

    /**
     * Show the application dtempalte.
     *
     * @return \Illuminate\Http\Response
     */
    public function products_list()
    {
        $data['categories'] = Category::all();
        $data['products'] = Product::paginate(3);
        return view('frontend_common.products_list', $data);
    }
    
}
