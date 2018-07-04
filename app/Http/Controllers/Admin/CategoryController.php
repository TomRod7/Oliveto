<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use File;

class CategoryController extends Controller
{
  public function index(){
    $categories = Category::paginate(10);
    return view('admin.categories.index')->with(compact('categories'));
  }

  //Crea Producto
  public function create(){

    return view('admin.categories.create');
  }

  //Guarda Nuevo Producto
  public function store(Request $request){

    // Validar
    $rules = [
      'name' => 'required|min:3'
    ];

    $messages = [
          'name.required' => 'Ingresa el nombre de la categoría.'
      ];

    $this->validate($request, $rules, $messages);

    $category = Category::create($request->only('name', 'description'));

    if($request->hasFile('image')){
      $file = $request->file('image');
      $path = public_path() . '/images/categories';
      $fileName = uniqid() . '-' . $file->getClientOriginalName();
      $moved = $file->move($path, $fileName);

      if($moved) {
        $category->image = $fileName;
        $category->save();
      }
    }

    return redirect('/admin/categories');
  }

  //Edita Producto
  public function edit($id){
    $category = Category::find($id);

    return view('admin.categories.edit')->with(compact('category'));
  }

  //Guarda Informacion Editada de Producto
  public function update(Request $request, $id){

    // Validar
    $rules = [
      'name' => 'required|min:3'
    ];

    $messages = [
          'name.required' => 'Ingresa el nombre de la categoría.'
      ];

    $this->validate($request, $rules, $messages);

    $category = Category::find($id);
    $category->name = $request->input('name');    
    $category->save();

    if($request->hasFile('image')){
      $file = $request->file('image');
      $path = public_path() . '/images/categories';
      $fileName = uniqid() . '-' . $file->getClientOriginalName();
      $moved = $file->move($path, $fileName);

      if($moved) {
        $previousPath = $path . '/' . $category->image;

        $category->image = $fileName;
        $saved = $category->save();

        if($saved)
          File::delete($previousPath);
      }
    }

    return redirect('/admin/categories');
  }

  //Borra Producto
  public function destroy($id){
    $category = Category::find($id);
    $category->delete();

    return back();
  }
}
