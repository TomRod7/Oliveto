<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index(){
      $products = Product::paginate(15);
      return view('admin.products.index')->with(compact('products'));
    }

    //Crea Producto
    public function create(){
      $categories = Category::orderBy('name')->get();

      return view('admin.products.create')->with(compact('categories'));
    }

    //Guarda Nuevo Producto
    public function store(Request $request){

      // Validar
      $rules = [
        'name' => 'required|min:3',
        'description' => 'required|max:50',
        'price' => 'required|numeric|min:0',
      ];

      $messages = [
            'name.required' => 'Ingresa el nombre del producto.',
            'description.required' => 'Ingresa la descripción corta.',
            'price.required' => 'Ingresa un precio para el producto.',
            'price.numeric' => 'Ingresa un precio válido.',
        ];

      $this->validate($request, $rules, $messages);

      $product = new Product();
      $product->name = $request->input('name');
      $product->description = $request->input('description');
      $product->price = $request->input('price');
      $product->category_id = $request->category_id;
      $product->save();

      return redirect('/admin/products');
    }

    //Edita Producto
    public function edit($id){
      $categories = Category::orderBy('name')->get();
      $product = Product::find($id);

      return view('admin.products.edit')->with(compact('product', 'categories'));
    }

    //Guarda Informacion Editada de Producto
    public function update(Request $request, $id){

      // Validar
      $rules = [
        'name' => 'required|min:3',
        'description' => 'required|max:200',
        'price' => 'required|numeric|min:0',
      ];

      $messages = [
            'name.required' => 'Ingresa el nombre del producto.',
            'description.required' => 'Ingresa la descripción corta.',
            'price.required' => 'Ingresa un precio para el producto.',
            'price.numeric' => 'Ingresa un precio númerico.',
            'price.min' => 'Ingresa un precio válido.',
        ];

      $this->validate($request, $rules, $messages);

      $product = Product::find($id);
      $product->name = $request->input('name');
      $product->description = $request->input('description');
      $product->price = $request->input('price');
      $product->long_description = $request->input('long_description');
      $product->category_id = $request->category_id;
      $product->save();

      return redirect('/admin/products');
    }

    //Borra Producto
    public function destroy($id){
      $product = Product::find($id);
      $product->delete();

      return back();
    }

}
