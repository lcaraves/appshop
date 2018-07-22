<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller; 

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::orderBy('id', 'asc')->paginate(10);
        return view('admin.products.index')->with(compact('products'));
    }

    public function create()
    {
    	return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required'  =>  'El campo Nombre es obligatorio.',
            'name.min'  =>  'Debe ingresar como mínimo 3 caracteres.',
            'description.required'  =>  'El campo descripción corta es obligatorio.',
            'description.min'  =>  'Debe ingresar por lo menos 50 caracteres.',
            'price.required'  =>  'El campo Price es obligatorio.',
            'price.min'  =>  'Debe ingresar valores positivos para el precios.',

        ];

        $rules = [
            'name'  =>  'required|min:3',
            'description'  =>  'required|min:50',
            'price'  =>  'required|numeric|min:0',
        ];
        $this->validate($request, $rules, $messages);

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');
        $product->price = $request->input('price');
        $product->save();

        return redirect('/admin/products');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'name.required'  =>  'El campo Nombre es obligatorio.',
            'name.min'  =>  'Debe ingresar como mínimo 3 caracteres.',
            'description.required'  =>  'El campo descripción corta es obligatorio.',
            'description.min'  =>  'Debe ingresar por lo menos 50 caracteres.',
            'price.required'  =>  'El campo Price es obligatorio.',
            'price.min'  =>  'Debe ingresar valores positivos para el precios.',

        ];

        $rules = [
            'name'  =>  'required|min:3',
            'description'  =>  'required|min:50',
            'price'  =>  'required|numeric|min:0',
        ];
        $this->validate($request, $rules, $messages);
        
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->long_description = $request->input('long_description');
        $product->price = $request->input('price');
        $product->save();
        
        return redirect('/admin/products');

    }

     public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        
        return redirect('/admin/products');

    }
}
