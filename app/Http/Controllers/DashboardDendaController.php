<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use Illuminate\Http\Request;

class DashboardDendaController extends Controller
{
    public function index() {
        return view('admin.denda.index',[
            'denda' => Denda::with('transaction')->latest()->get(),
        ]);
    }

    public function proccess($id) {
        $denda = Denda::find($id);
        $denda->status_denda = 'paid';
        $denda->save();

        return back()->with('success','Berhasil');
    }
}
