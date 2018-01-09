<?php

namespace App\Http\Controllers;

use Request;
use App\Category;
use App\Subcategory;
use App\Product;
use App\ImagesProduct;
use Cart;

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
        $data['outstandings'] = Product::where('outstanding', 1)->get();
        $data['products'] = Product::where('outstanding', 0)->take(9)->get();

        return view('frontend_common.home', $data );//return view('home');
    }


    /**
     * Show the application dtempalte.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_detail($id)
    {   
        $data['categories'] = Category::all();
        $data['product'] = Product::findOrfail($id);
        $data['outstandings'] = Product::where('outstanding', 1)->get();
        return view('frontend_common.product_detail', $data);
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
        $data['outstandings'] = Product::where('outstanding', 1)->get();
        return view('frontend_common.products_list', $data);
    }

    /**
     * Show the application dtempalte.
     *
     * @return \Illuminate\Http\Response
     */
    public function outstandings()
    {
        $data['categories'] = Category::all();
        $data['products'] = Product::where('outstanding', 1)->paginate(10);

        return view('frontend_common.products_outstandings', $data);
    }



    /**
     * Show the application dtempalte.
     *
     * @return \Illuminate\Http\Response
     */
    public function by_category($id)
    {
        $data['categories'] = Category::all();
        $data['products'] = Product::where('category_id', $id)->paginate(3);
        $data['outstandings'] = Product::where('outstanding', 1)->get();
        return view('frontend_common.products_by_category', $data);
    }

    /**
     * Show the application dtempalte.
     *
     * @return \Illuminate\Http\Response
     */
    public function by_subcategory($id)
    {
        $data['categories'] = Category::all();
        $data['products'] = Product::where('subcategory_id', $id)->paginate(3);
        $data['outstandings'] = Product::where('outstanding', 1)->get();
        return view('frontend_common.products_by_subcategory', $data);
    }

    public function cart() {

        $categories = Category::all();
        //update/ add new item to cart
        if (Request::isMethod('post')) {
            $product_id = Request::get('product_id');
            $product = Product::find($product_id);
            Cart::add(array('id' => $product_id, 'name' => $product->title, 'qty' => 1, 'price' => $product->price));
        }

        //increment the quantity
        if (Request::get('product_id') && (Request::get('increment')) == 1) {
            $rowId = Cart::search(function($key, $value) { return $key->id == Request::get('product_id'); });
            $new_quantity = $rowId->first()->qty + 1;
            Cart::update($rowId->first()->rowId, ['qty' => $new_quantity]);
            return \App::make('redirect')->back();
        }

        //decrease the quantity
        if (Request::get('product_id') && (Request::get('decrease')) == 1) {
            $rowId = Cart::search(function($key, $value) { return $key->id == Request::get('product_id'); });
            $new_quantity = $rowId->first()->qty - 1;
            Cart::update($rowId->first()->rowId, ['qty' => $new_quantity]);
            return \App::make('redirect')->back();
        }

        //Remove item
        if (Request::get('product_id') && (Request::get('delete')) == 1) {
            $rowId = Cart::search(function($key, $value) { return $key->id == Request::get('product_id'); });
            Cart::remove($rowId->first()->rowId);
            return \App::make('redirect')->back();
        }

        $cart = Cart::content();

        return view('frontend_common.cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home', 'categories' => $categories));
    }
    
}
