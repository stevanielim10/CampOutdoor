<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class DashboardPaymentMethodController extends Controller
{
    public function index() {
        return view('admin.payment-method.index',[
            'paymentmethod' => PaymentMethod::all(),
        ]);
    }

    public function create() {
        return view('admin.payment-method.create');
    }

    public function store(Request $request) {
        $request->validate([
            'method' => 'required',
        ]);

        $pm = new PaymentMethod();
        $pm->method = $request->method;
        $pm->save();

        return redirect(route('admin.payment.method'))->with('success','Berhasil');
    }

    public function edit($id) {
        return view('admin.payment-method.edit',[
            'paymentmethod' => PaymentMethod::find($id),
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'method' => 'required',
        ]);

        $pm = PaymentMethod::find($id);
        $pm->method = $request->method;
        $pm->save();

        return redirect(route('admin.payment.method'))->with('success','Berhasil');
    }

    public function destroy($id) {
        PaymentMethod::find($id)->delete();
        return redirect(route('admin.payment.method'))->with('success','Berhasil');
    }
}
