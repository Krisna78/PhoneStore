<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index() {
        $product = Product::all();
        return view('product.index',compact('product'));
    }
    public function create() {
        $product = Product::all();
        return view('product.create',compact("product"));
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => ["required","string"],
            'description' => ["required","string"],
            'price' => ["required","integer"],
            'merk_id' => ["required","exists:merks,id_merk"],
            'category_id' => ["required","exists:categories,id_category"],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $validator->validated();
        Product::create($request->all());
        return redirect()->route('product.index')->with('success',"Product berhasil ditambahkan");
    }
    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('product.edit',compact('product'));
    }
    public function update(Request $request, Product $product,$id) {
        $validator = Validator::make($request->all(),[
            'name' => ["required","string"],
            'description' => ["required","string"],
            'price' => ["required","integer"],
            'merk_id' => ["required","exists:merks,id_merk"],
            'category_id' => ["required","exists:categories,id_category"],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $product = Product::findOrFail($id);
        $product->update($validator);
        return redirect()->route('product.index')->with('success',"Produk berhasil diperbaharui");
    }
    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with("success","Product berhasil dihapus");
    }
}
