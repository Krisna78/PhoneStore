<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request) {
        $category = Category::all();
        return view('category.index',compact('category'));
    }
    public function create() {
        $category = Category::all();
        return view('user.create',compact('kelas'));
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'category_name' => ['required','string'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $validator->validated();
        Category::create($request->all());
        return redirect()->route('user.index')->with('success', 'Kategori berhasil ditambahkan');
    }
    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('category.edit',compact("category"));
    }
    public function update(Request $request,$id) {
        $validator = Validator::make($request->all(),[
            'category_name' => ['required','string'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $category = Category::findOrFail($id);
        $category->update($validator);
        return redirect()->route('invoice.index')->with('success','Invoice Berhasil diperbaharui');
    }
    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route("category.index")->with("success","Kategori Berhasil di hapus");
    }
}
