<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Category;
use App\Subcategory;

class SubcategoriesController extends Controller
{
  public function index()
	{
		$subcategories = Subcategory::all();
		return View('backend.subcategories.all', ['subcategories' => $subcategories]);
	}
    
  public function newsubcategory()
  {
    $categories = Category::all();
  	return View('backend.subcategories.new', ['categories' => $categories]);
  }

  public function create()
  {
  	$rules = [
      'name' => 'required|unique:subcategories|max:255',
  	];

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails())
    {
        return redirect('/backend/subcategories/new')->withErrors($validator)->withInput();
    }

    	$subcategory                   = New Subcategory();
      $subcategory->category_id      = Input::get('category_id');
      $subcategory->name    	       = Input::get('name');
      
      $subcategory->save();

      return Redirect::to('/backend/subcategories')->withInput()->with('success', 'subcategory added');
  }

  public function ajax()
  {
    $category_id = Input::get('category_id');
    $subcategories = Subcategory::where('category_id','=',$category_id)->get();
    return $subcategories;
  }
}
