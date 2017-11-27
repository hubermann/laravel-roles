<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Category;
use App\Subcategory;

class CategoriesController extends Controller
{


   public function index()
	{
		$categories = Category::all();
		return View('backend.categories.all', ['categories' => $categories]);
	}
    
  public function newcategory()
  {
  	return View('backend.categories.new');
  }

  public function create()
  {
  	$rules = [
      'name' => 'required|unique:categories|max:255',
  	];

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails())
    {
        return redirect('/backend/categories/new')->withErrors($validator)->withInput();
    }

    	$category           = New category();
      $category->name    	= Input::get('name');

      $category->save();

      return Redirect::to('/backend/categories')->withInput()->with('success', 'category added');
  }
}