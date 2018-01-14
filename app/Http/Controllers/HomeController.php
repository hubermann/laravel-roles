<?php

namespace App\Http\Controllers;

use Request;
use App\Category;
use App\Subcategory;
use App\Product;
use App\ImagesProduct;
use Cart;
use Auth;
use MP;

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
        $data['category'] = Category::find($id);
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
        $subcategory = Subcategory::find($id);
        $data['category'] = Category::find($subcategory->category_id);
        $data['subcategory'] = $subcategory; 
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
            return \App::make('redirect')->back()->with('success', 'Product added to cart.');;
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

    public function contact()
    {
        $data['categories'] = Category::all();
        $data['outstandings'] = Product::where('outstanding', 1)->get();
        $data['products'] = Product::where('outstanding', 0)->take(9)->get();

        return view('frontend_common.contact', $data );//return view('home');
    }

    public function process_contact(Request $request)
    {

        $this->validate($request, [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'message' => 'required' 
        ]);

        ContactUS::create($request->all()); 
   
        Mail::send('email',
           array(
               'name' => $request->get('name'),
               'email' => $request->get('email'),
               'user_message' => $request->get('message')
           ), function($message)
           {
               $message->from('hubermann@gmail.com');
               $message->to('hubermann@gmail.com', 'Admin')->subject('Website Feedback');
           });
 
        return back()->with('success', 'Thanks for contacting us!'); 
   
    }


    public static function get_product_images($id)
    {
        return ImagesProduct::where('product_id', $id)->get();   
    }

    public static function get_categories_outstandings()
    {
        return Category::where('outstanding', 1)->get();   
    }

    public static function get_categories()
    {
        return Category::All();   
    }


    public function checkout()
    {
        if( Auth::user() ){ echo "CheckOut"; }else{ return redirect('login')->with('warning', 'Please login.');}
        if( Cart::total() != 0.00 ){ echo "okay todo";  var_dump( Cart::total() ); }else{ return redirect('/')->with('warning', 'No hay productos en su orden.');}


        $items = [];
        foreach(Cart::content() as $row)
        {
            #var_dump($row);
            #exit();
            array_push($items, ["id" => $row->id, "title" => $row->name, "quantity" => $row->qty, "currency_id" => "ARS", "unit_price" => $row->price ]);
        }
        //  $preference_data = array (
        //     "items" => array (
        //         array (
        //             "title" => "Test2",
        //             "quantity" => 1,
        //             "currency_id" => "BRL",
        //             "unit_price" => 10.41
        //         )
        //     )
        // );

        $preference_data = [
            "items" => $items, 
            "payer" => [ 
                "name" => Auth::user()->name,
                "surname" => "",
                "email" => Auth::user()->email
            ],
            "back_urls" => [],
            ];


         dd($preference_data);

        // try {
        //     $preference = MP::create_preference($preference_data);
        //     return redirect()->to($preference['response']['init_point']);
        // } catch (Exception $e){
        //     dd($e->getMessage());
        // }



//https://www.mercadopago.com.ar/developers/es/solutions/payments/basic-checkout/receive-payments/additional-info/



// BIEN armado
// https://github.com/mercadopago/sdk-php/blob/master/examples/checkout-buttons/basic-preference/button_full.php

// lo de la vista es para hacer el boton de checkout.




// Aplicación: 1463908 - MercadoPago application (mp-app-1463908)   Renovar credenciales
// Checkout personalizado

// Checkout básico

// Modo Sandbox

// Public key: TEST-80707703-e072-459f-b5a2-992726548ee2
// Access token: TEST-1523568522842496-010920-d89e0f19b091bf4fac843dee32cbbb07__LB_LC__-1463908
// Modo Producción

// Tus credenciales de producción aún no están habilitadas, homologate primero para poder usarlas.
// ¿Qué necesito para ir a producción? Quiero ir a producción
// Public key: APP_USR-bf77922b-6230-4af7-9659-343a2d04b81a
// Access token: APP_USR-1523568522842496-010920-7701973615ade0071f31a932623d799d__LA_LC__-1463908



// checkout basico:
// CLIENT_ID: 1523568522842496
// CLIENT_SECRET: rPxUtAvrc2CDh8a1FXvgEwSoPOwpPxg2




        //$data['preference'] = MP::create_preference($preference_data);

        //return view('frontend_common.checkout_view', $data );
#$mp = new MP('1523568522842496', 'rPxUtAvrc2CDh8a1FXvgEwSoPOwpPxg2');




    }
    
}
