<?php

namespace App\Http\Controllers;

use App\Models\Beranda;
use App\Models\Denda;
use App\Models\Payment;
use App\Models\Post;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardTransactionController extends Controller
{
    public function index() {
        return view('admin.transaction.index',[
            'transaction' => Transaction::with(['post','user'])->latest()->get(),
        ]);
    }

    public function show($code) {
        $transaksi = Transaction::with(['post','user'])->where('code', $code)->first();
        $payment = Payment::with('PaymentMethod')->where('transaction_id', $transaksi->id)->first();
        $selisih = Carbon::parse($transaksi->tgl_pinjam)->diffInDays($transaksi->tgl_kembali);
        return view('admin.transaction.show',[
            'transaction' => $transaksi,
            'payment' => $payment,
            'total' => $transaksi->post->harga * $selisih,
            'status_transaksi' => ['sedang_dipinjam','sudah_dikembalikan','selesai'],
            'payment_status' => ['paid','unpaid'],
        ]);
    }

    public function process(Request $request, $code) {

        $tr = Transaction::where('code', $code)->first();

        $tgl_now = date('Y-m-d');
        $tgl_kembali = $tr->tgl_kembali;

        $selisih = strtotime($tgl_now) - strtotime($tgl_kembali);
        $selisih = $selisih / 86400;

        if($selisih > 0) {
            $produk = Beranda::find($tr->beranda_id);

            $jml_denda = $produk->harga * $selisih;

            $denda = new Denda();
            $denda->transaction_id = $tr->id;
            $denda->jml_denda = $jml_denda;
            $denda->status_denda = 'unpaid';
            $denda->save();

            $trans = Transaction::find($tr->id);
            $trans->status_transaksi = $request->status_transaksi;
            $trans->save();

            if($request->status_transaksi == 'sudah_dikembalikan') {
                $produk = Post::find($tr->beranda_id);
                $jml_stok = $produk->stok + 1;
                $prod = Post::find($tr->beranda_id);
                $prod->stok = $jml_stok;
                $prod->save();
            }

            $pay = Payment::find($request->payment_id);
            $pay->payment_status = $request->payment_status;
            $pay->save();

            return back()->with('success', 'Berhasil');
        } else {
            $trans = Transaction::find($tr->id);
            $trans->status_transaksi = $request->status_transaksi;
            $trans->save();

            if($request->status_transaksi == 'sudah_dikembalikan') {
                $produk = Post::find($tr->beranda_id);
                $jml_stok = $produk->stok + 1;

                $prod = Post::find($tr->beranda_id);
                $prod->stok = $jml_stok;
                $prod->save();


            }

            $pay = Payment::find($request->payment_id);
            $pay->payment_status = $request->payment_status;
            $pay->save();

            return back()->with('success', 'Berhasil');
        }


    }
}
