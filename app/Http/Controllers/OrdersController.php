<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
class OrdersController extends Controller
{

	//payment_status 0 = Pendiente
	//payment_status 1 = Cobrado ok
	//payment_status 2 = Rechazado


	public function index()
	{
		$orders = Order::paginate(20);
		return View('backend.orders.all', ['orders' => $orders, 'title_page' => 'All orders']);
	}

	public function declined()
	{
		$orders = Order::where('payment_status', 2)->get();
		return View('backend.orders.all', ['orders' => $orders, 'title_page' => 'All declined orders']);
	}


	public function pending()
	{
		$orders = Order::where('payment_status', 0)->get();
		return View('backend.orders.all', ['orders' => $orders, 'title_page' => 'All pending orders']);
	}

	public function successfully()
	{
		$orders = Order::where('payment_status', 1)->get();
		return View('backend.orders.all', ['orders' => $orders, 'title_page' => 'All successfully orders']);
	}
  
}
