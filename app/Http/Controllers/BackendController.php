<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Product;
use App\ImagesProduct;
use App\Slider;
use App\Order;
use App\User;

class BackendController extends Controller
{

	public function index()
	{
		$orders 										= Order::orderBy('id', 'desc')->take(10)->get();;
		$users 											= User::all();
		$categories 								= Category::all();
		$categories_outstandings 		= Category::where('outstanding', 1);
		$products_outstandings 			= Product::where('outstanding', 1)->get();

		return View('backend.dashboard',[
				'orders' 									=> $orders, 
				'users' 									=> $users,
				'categories' 							=> $categories,
				'categories_outstandings' => $categories_outstandings,
				'products_outstandings'  	=> $products_outstandings
				]);
	}
}
