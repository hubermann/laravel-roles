<?php

namespace App\Http\Controllers;
use Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Order;
use App\Slider;
use App\ImagesProduct;
use Cart;
use Auth;
use MP;
use App\TodoPagoWrap;

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
        $data['sliders'] = Slider::all();
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
        if( !Auth::user() ){ return redirect('login')->with('warning', 'Please login.');}
        if( Cart::total() == 0.00 ){ return redirect('/')->with('warning', 'No hay productos en su orden.');}


        return view('frontend_common.new_order')->with('states',TodoPagoWrap::get_all_state_code());
    }


    public function process_new_order()
    {
        $rules = [
            'name' => 'required|max:80',
            'surname' => 'required|max:80',
            'area_code' => 'required|max:50',
            'telephone' => 'required|max:20',
            'street_name' => 'required|max:20',
            'street_number' => 'required|max:20',
            'city' => 'required|max:20',
            'zip_code' => 'required|max:20',
        ];

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails())
    {
        return redirect('/checkout')->withErrors($validator)->withInput();
    }
            $items = [];
            foreach(Cart::content() as $row)
            {
                array_push($items, ["id" => $row->id, "title" => $row->name, "quantity" => $row->qty, "currency_id" => "ARS", "unit_price" => $row->price ]);
            }

            $order                      = New Order();
            $order->name                = Input::get('name');
            $order->surname             = Input::get('surname');
            $order->area_code           = Input::get('area_code');
            $order->telephone           = Input::get('telephone');
            $order->street_name         = Input::get('street_name');
            $order->street_number       = Input::get('street_number');
            $order->city                = Input::get('city');
            $order->state               = Input::get('state');
            $order->zip_code            = Input::get('zip_code');
            $order->user_id             = Auth::user()->id;
            $order->email               = Auth::user()->email;
            $order->order_description   = serialize($items);
            $order->payment_status      = Order::PENDING;
            $order->amount              = Cart::total();

            $order->save();



        //Aca hay qeu integrar TODOPAGO

        //enviar el id de orden y luego actuualizarla dependiendo del resultado.

        //El user debe poder ver sus ordenes y si es el estado es sin-pagar debe tener la posibilidad de pagar
        $request = Request::instance();

        $TP = new TodoPagoWrap;

        $TP->client_user_id    = Auth::user()->id;
        $TP->client_email      = Auth::user()->email;
        $TP->client_name       = Input::get('name');
        $TP->client_surname    = Input::get('surname');
        $TP->client_telephone  = Input::get('area_code').Input::get('telephone');
        $TP->client_ip         = $request->getClientIp();

        $TP->receiving_name      = Input::get('name');
        $TP->receiving_surname   = Input::get('surname');
        $TP->receiving_email     = Auth::user()->email;
        $TP->receiving_telephone = Input::get('area_code').Input::get('telephone');

        $TP->shipment_city     = Input::get('city');
        $TP->shipment_state    = Input::get('state');
        $TP->shipment_address  = [
          'street_name'   => Input::get('street_name'),
          'street_number' => Input::get('street_number'),
        ];
        $TP->shipment_zip_code = Input::get('zip_code');

        $TP->billing_city      = Input::get('city');
        $TP->billing_state     = Input::get('state');;
        $TP->billing_address   = [
          'street_name'   => Input::get('street_name'),
          'street_number' => Input::get('street_number'),
        ];
        $TP->billing_zip_code  = Input::get('zip_code');

        $TP->items             = $items;
        $TP->id_order          = $order->id;


        if ($TP->checkout())
        { // si pudimos hacer el ticket redirigimos
          return Redirect::to($TP->url_form_pago);
        } else
        { // como no pudimos crear el tiket debemos mostrar un mensaje, por ejemplo para sugerir reintentar
          return view('frontend_common.checkout_result')->with('message','Please retry again in a moment, there was a connection failure.');
        }
    }


    public function todo_pago_payment_success(Request $request)
    {
        $params   = $request::all();
        $id_order = strip_tags($params['operationid']);

        $TP             = new TodoPagoWrap;
        $TP->answer_key = strip_tags($params['Answer']);

        if ($TP->payment_success()) //comprobamos el estado del pago
        { // aca tenemos que hacer el procesamiento correspondiente a una orden pagada
          $order = Order::find($id_order)->payment_success();
          Cart::destroy();
          return view('frontend_common.checkout_result')->with('message','Congratulations!, we have already registered your purchase.');
        } else
        { // si llegamos aca es por que no se pudo comprobar el pago
          return redirect('/todo_pago/payment_error?operationid='.$id_order);
        }
    }

    public function todo_pago_payment_error(Request $request)
    {
        $params   = $request::all();
        $id_order = strip_tags($params['operationid']);

        $order = Order::find($id_order)->payment_rejected();
        return view('frontend_common.checkout_result')
                  ->with('message','El pago no se pudo procesar, reintente nuevamente');
    }




}
