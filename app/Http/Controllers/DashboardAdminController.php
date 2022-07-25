<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Denda;
use App\Models\PaymentMethod;
use App\Models\Post;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    public function admin(){
        return view('admin.admin',[
            'jml_post' => Post::all()->count(),
            'jml_category' => Category::all()->count(),
            'jml_payment_method' => PaymentMethod::all()->count(),
            'jml_transaction' => Transaction::all()->count(),
            'jml_denda' => Denda::all()->count(),
            'jml_user' => User::all()->count(),
        ]);
    }
}
