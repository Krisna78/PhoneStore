<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MerkController extends Controller
{
    public function index() {
        $merk = Merk::all();
        return view('merk.index',compact('merk'));
    }
    public function create() {
        $merk = Merk::all();
        return view('merk.create',compact('merk'));
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            "merk_name" => ["required","string"],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $validator->validated();
        Merk::create($request->all());
        return redirect()->route('merk.index')->with("success","Merk berhasil ditambahkan");
    }
    public function edit($id) {
        $merk = Merk::findOrFail($id);
        return view('merk.edit',compact("merk"));
    }
    public function update(Request $request,$id) {
        $validator = Validator::make($request->all(),[
            "merk_name" => ["required","string"],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $invoice = Merk::findOrFail($id);
        $invoice->update($validator);
        return redirect()->route('merk.index')->with('success','Merk berhasil diperbaharui');
    }
    public function destroy($id) {
        $merk = Merk::findOrFail($id);
        $merk->delete();

        return redirect()->route('merk.index')->with('success','Merk berhasil dihapus');
    }
}
