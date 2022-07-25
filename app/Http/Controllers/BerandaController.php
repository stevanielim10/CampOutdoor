<?php

namespace App\Http\Controllers;


use App\Models\Beranda;
use App\Models\Category;
use App\Models\Denda;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Post;
use App\Models\Transaction;
use App\Models\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class BerandaController extends Controller
{
    public function index()
    {
        $title ='';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        return view('beranda', [
            "title" => "Home" . $title,
            "active" => "home",
            "beranda" => Beranda::latest()->filter(request(['search', 'category']))->paginate(7)->withQueryString()
        ]);
    }


    public function show(Beranda $home) //route model binding
    {
        return view('home', [
            "title" => "single post",
            "active" => "home",
            "beranda" => $home,
            "paymentmethod" => PaymentMethod::all(),
        ]);
    }

    public function pinjam(Request $request) {

        $validate = Validator::make($request->all(),[
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            // 'payment_method ' => 'required',
        ]);

        if($validate->fails()) {
            return back()
                    ->withInput()
                    ->with('pinjam_error', 'error')
                    ->withErrors($validate->errors());
                    // ->with('errors', $validate->errors());
        } else {

            $produk = Post::find($request->beranda_id);

            $jml_stok = $produk->stok - 1;

            if($jml_stok < 0) {
                return back()->with('error', 'Stok tidak ada');
            } else {
                $ber = Post::find($request->beranda_id);
                $ber->stok = $jml_stok;
                $ber->save();

                $trans = new Transaction();
                $trans->code = 'AO-'.time();
                $trans->beranda_id = $request->beranda_id;
                $trans->tgl_pinjam = $request->tgl_pinjam;
                $trans->tgl_kembali = $request->tgl_kembali;
                $trans->user_id = session()->get('id_user');
                $trans->status_transaksi = 'sedang_dipinjam';
                $trans->save();

                $pay = new Payment();
                $pay->transaction_id = $trans->id;
                $pay->payment_method_id = $request->payment_method;
                $pay->payment_status = 'unpaid';
                $pay->save();

                return redirect(route('transaksi.show',['code' => $trans->code]))->with('success', 'Berhasil dipinjam');
            }

        }
    }

    public function transaksi() {
        return view('transaction',[
            "title" => "Transaksi",
            "active" => "home",
            'transaction' => Transaction::with('post')->where('user_id', session()->get('id_user'))->latest()->get(),
        ]);
    }

    public function transaksi_show($code) {
        $trans = Transaction::with(['user','post'])->where('code', $code)->first();
        $payment = Payment::with('paymentmethod')->where('transaction_id', $trans->id)->first();

        // dd($trans->tgl_pinjam);
        // $start_date = Carbon::parse($trans->tgl_pinjam)->format('d-m-Y');
        // $end_date = Carbon::parse($trans->tgl_kembali)->format('d-m-Y');

        // $selisih = 3

        $selisih = Carbon::parse($trans->tgl_pinjam)->diffInDays($trans->tgl_kembali);

        return view('transaction_show',[
            "title" => "Transaksi",
            "active" => "home",
            'transaction' => $trans,
            "total" => $trans->post->harga * $selisih,
            'payment' => $payment,
        ]);
    }

    public function transaksi_pay(Request $request) {
        $request->validate([
            'image' => 'required|image|file|mimes:jpg,png,jpeg|max:4096',
        ]);

        if($request->file('image')){
            $bukti = $request->file('image')->store('bukti');

            $pay = Payment::find($request->payment_id);
            $pay->bukti_transaksi = $bukti;
            $pay->save();

            return back()->with('success','Berhasil');

        } else {
            return back()->with('error', 'Gagal');
        }
    }

    public function denda() {
        return view('denda', [
            "title" => "Denda",
            "active" => "home",
            'denda' => Denda::with('transaction')->latest()->get(),
        ]);
    }

    public function profile() {
        return view('profile',[
            "title" => "Profile",
            "active" => "home",
            'user' => User::find(session()->get('id_user')),

        ]);
    }

    public function profile_update(Request $request) {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users,email,'.session()->get('id_user').',id',
            'alamat' => 'required',
            'image' =>'image|file|mimes:jpg,png,jpeg|max:4096',
        ]);

        $user = User::find(session()->get('id_user'));
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        if($request->file('image')){
            if($user->image){
                Storage::delete($user->image);

            }

            $user->image = $request->file('image')->store('user-images');
        }
        $user->save();

        return redirect(route('profile'))->with('success','Berhasil Edit Profile');
    }

    public function profile_pass(Request $request) {
        $request->validate([
            'password' => 'required|same:password_confirm',
            'password_confirm' => 'required|same:password',
        ]);
        $user = User::find(session()->get('id_user'));
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route('profile'))->with('success','Berhasil Ganti Password');
    }
}
