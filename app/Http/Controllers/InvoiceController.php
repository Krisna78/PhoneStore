<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index() {
        $invoice = Invoice::all();
        return view('invoice.index',compact("invoice"));
    }
    public function create() {
        $invoice = Invoice::all();
        return view('invoice.create',compact("invoice"));
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'invoice_date' => ['required','date'],
            'status' => ['required','string'],
            'total_amount' => ['required','integer'],
            'user_id' => ['required','exists:users,id_user'],
            'payment_id' => ['required','exists:payments,id_payments'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $validator->validated();
        Invoice::create($request->all());
        return redirect()->route('invoice.index')->with('success','Invoice berhasl ditambahkan');
    }
    public function edit($id) {
        $invoice = Invoice::findOrFail($id);
        return view('invoice.edit',compact("invoice"));
    }
    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(),[
            'invoice_date' => ['required','date'],
            'status' => ['required','string'],
            'total_amount' => ['required','integer'],
            'user_id' => ['required','exists:users,id_user'],
            'payment_id' => ['required','exists:payments,id_payments'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $invoice = Invoice::findOrFail($id);
        $invoice->update($validator);
        return redirect()->route('invoice.index')->with('success','Invoice Berhasil diperbaharui');
    }
    public function destroy($id) {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('invoice.index')->with('success','Invoice berhasil dihapus');
    }
}
