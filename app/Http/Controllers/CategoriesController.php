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

  public function edit($id)
  {
    $category = Category::findOrFail($id);
    return View('backend.categories.edit', ['category' => $category]);
  }

  public function update()
  {
    
    $rules = [
      'name' => 'required|unique:categories|max:255',
    ];

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails())
    {
        return redirect('/backend/categories/edit/'.Input::get('id'))->withErrors($validator)->withInput();
    }

      $category           = Category::findOrFail(Input::get('id'));
      $category->name     = Input::get('name');

      $category->save();

      return Redirect::to('/backend/categories')->withInput()->with('success', 'Categoria actualizada.');
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
  
  public function destroy($id)
  {


    $category       = Category::findOrfail($id);
    $subcategories  = $category->subcategories;
    
    foreach ($subcategories as $subcategory) {
      # code...
      echo "<p><strong>SUB: ".$subcategory->name."</strong></p>";

      $productos = $subcategory->products;

      foreach ($productos as $producto) {
        echo "<p>PROD:".$producto->title.'</p>';
      }
    }
    #$category->delete();
    #return Redirect::to('/backend/categories')->with('success', 'Categoria eliminada.');

  }
}
