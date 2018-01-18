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
use \Todopago;

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


        return view('frontend_common.new_order');
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

            $order                      = New Order();
            $order->name                = Input::get('name');
            $order->surname             = Input::get('surname');
            $order->area_code           = Input::get('area_code');
            $order->telephone           = Input::get('telephone');
            $order->street_name         = Input::get('street_name');    
            $order->street_number       = Input::get('street_number');   
            $order->city                = Input::get('city');       
            $order->zip_code            = Input::get('zip_code');
            $order->user_id             = Auth::user()->id;
            $order->email               = Auth::user()->email;
            $order->order_description   = "descripcion de la compra";
            $order->amount              =  120;

            $items = [];
            foreach(Cart::content() as $row)
            {
                array_push($items, ["id" => $row->id, "title" => $row->name, "quantity" => $row->qty, "currency_id" => "ARS", "unit_price" => $row->price ]);
            }

            $order->save();

        //común a todas los métodos
        $http_header = array(
            'Authorization'=>'TODOPAGO 36f1447d7fc64213b5f3fa6411cf0b07',
            'user_agent' => 'PHPSoapClient'
            );
         
        //creo instancia de la clase TodoPago
        $connector = new Todopago($http_header, "test");
        $operationid = $order->id ; //rand(1,10000000); 
         
        //opciones para el método sendAuthorizeRequest
        $optionsSAR_comercio = array (
            'Security'=>'36f1447d7fc64213b5f3fa6411cf0b07',
            'EncodingMethod'=>'XML',
            'Merchant'=>55492,
            'URL_OK'=>"http://localhost:8000/payment_success/$operationid",
            'URL_ERROR'=>"http://localhost:8000/payment_error/$operationid"
        );

        $optionsSAR_operacion = array (
            'MERCHANT'=> "2658",
            'OPERATIONID'=>"50",
            'CURRENCYCODE'=> 032,
            'AMOUNT'=>"54",

            //Datos ejemplos CS
            'CSBTCITY'=> "Villa General Belgrano",
            'CSSTCITY'=> "Villa General Belgrano",
            
            'CSBTCOUNTRY'=> "AR",
            'CSSTCOUNTRY'=> "AR",
            
            'CSBTEMAIL'=> "todopago@hotmail.com",
            'CSSTEMAIL'=> "todopago@hotmail.com",
            
            'CSBTFIRSTNAME'=> "Juan",
            'CSSTFIRSTNAME'=> "LAURA",      
            
            'CSBTLASTNAME'=> "Perez",
            'CSSTLASTNAME'=> "GONZALEZ",
            
            'CSBTPHONENUMBER'=> "541160913988",     
            'CSSTPHONENUMBER'=> "541160913988",     
            
            'CSBTPOSTALCODE'=> " 1010",
            'CSSTPOSTALCODE'=> " 1010",
            
            'CSBTSTATE'=> "B",
            'CSSTSTATE'=> "B",
            
            'CSBTSTREET1'=> "Cerrito 740",
            'CSSTSTREET1'=> "Cerrito 740",
            
            'CSBTCUSTOMERID'=> "453458",
            'CSBTIPADDRESS'=> "192.0.0.4",       
            'CSPTCURRENCY'=> "ARS",
            'CSPTGRANDTOTALAMOUNT'=> "125.38",
            'CSMDD7'=> "",     
            'CSMDD8'=> "Y",       
            'CSMDD9'=> "",       
            'CSMDD10'=> "",      
            'CSMDD11'=> "",
            'CSMDD12'=> "",     
            'CSMDD13'=> "",
            'CSMDD14'=> "",
            'CSMDD15'=> "",        
            'CSMDD16'=> "",
            'CSITPRODUCTCODE'=> "electronic_good#chocho",
            'CSITPRODUCTDESCRIPTION'=> "NOTEBOOK L845 SP4304LA DF TOSHIBA#chocho",     
            'CSITPRODUCTNAME'=> "NOTEBOOK L845 SP4304LA DF TOSHIBA#chocho",  
            'CSITPRODUCTSKU'=> "LEVJNSL36GN#chocho",
            'CSITTOTALAMOUNT'=> "1254.40#10.00",
            'CSITQUANTITY'=> "1#1",
            'CSITUNITPRICE'=> "1254.40#15.00",
            );



            
        //opciones para el método getAuthorizeAnswer
        // $optionsGAA = array(    
        //     'Security' => '8A891C0676A25FBF052D1C2FFBC82DEE', 
        //     'Merchant' => "41702",
        //     'RequestKey' => '83765ffb-39c8-2cce-b0bf-a9b50f405ee3',
        //     'AnswerKey' => '9c2ddf78-1088-b3ac-ae5a-ddd45976f77d'
        //     );
            
        //opciones para el método getAllPaymentMethods
        // $optionsGAMP = array("MERCHANT"=>35);
            
        // //opciones para el método getStatus 
        // $optionsGS = array('MERCHANT'=>'35', 'OPERATIONID'=>'02');
        // $date1 = date("Y-m-d", time()-60*60*24*30);
        // $date2 = date("Y-m-d", time());
        // $optionsRDT = array('MERCHANT'=>2658, "STARTDATE" => $date1, "ENDDATE" => $date2, "PAGENUMBER" => 1);
        // $devol = array(
        //     "Security" => "108fc2b7c8a640f2bdd3ed505817ffde",
        //     "Merchant" => "2669",
        //     "RequestKey" => "0d801e1c-e6b1-672c-b717-5ddbe5ab97d6",
        //     "AMOUNT" => 1.00
        // );
        // $anul = array(
        //     "Security" => "108fc2b7c8a640f2bdd3ed505817ffde",
        //     "Merchant" => "2669",
        //     "RequestKey" => "0d801e1c-e6b1-672c-b717-5ddbe5ab97d6",
        // );

        //ejecuto los métodos
        $rta = $connector->sendAuthorizeRequest($optionsSAR_comercio, $optionsSAR_operacion);
        // $rta2 = $connector->getAuthorizeAnswer($optionsGAA);
        // $rta3 = $connector->getStatus($optionsGS);
        // $rta4 = $connector->getAllPaymentMethods($optionsGAMP);
        // $rta5 = $connector->getByRangeDateTime($optionsRDT);
        // $rta6 = $connector->returnRequest($devol);
        // $rta7 = $connector->voidRequest($anul);


    }


    public function payment_success($id_order)
    {
        echo $id_order;
    }

    public function payment_error($id_order)
    {
        echo $id_order;
    }


    
    
}
