<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Category;
use App\Product;

class ProductsController extends Controller
{
    public function index()
	{
		$products = Product::all();
		return View('backend.products.all', ['products' => $products]);
	}
    
    public function newProduct()
    {
    	$data['categories'] = Category::all();
    	return View('backend.products.new', $data);
    }

    public function create()
    {
    	$rules = [
        'category_id' => 'required',
        'title' => 'required|unique:products|max:255',
        'description' => 'required',
    	];

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails())
	    {
	        return redirect('/backend/products/new')->withErrors($validator)->withInput();
	    }

	    $dinamic = [];
	    $propiedades = Input::get('prod_propiedad');
	    $propiedades_valores = Input::get('prod_valor');
	    $count =0;
	    foreach ($propiedades as $propiedad) {
	    	 if(!empty($propiedad)){
	    	 	$dinamic[] = [ "propiedad" => $propiedad,  "valor" => $propiedades_valores[$count] ];
	    	 	$count++;
	    	}
	    }




    	$Product           = New Product();
      $Product->title    = Input::get('title');
      $Product->category_id    = Input::get('category_id');
      $Product->subcategory_id   = Input::get('subcategory_id');
      $Product->description     = Input::get('description');
      $Product->dinamic_fields     = json_encode($dinamic);

      $Product->save();

      return Redirect::to('/backend/products')->withInput()->with('success', 'Product added');
    }

    public function destroy()
    {
    	return Redirect::to('/backend/products')->with('success', 'Producto eliminado '.Input::get('id'));
 
    }
}
