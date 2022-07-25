<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\Denda;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index',[
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create',[
            'role' => DB::table('role')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|same:password_confirm',
            'password_confirm' => 'required|same:password',
            'image' =>'required|image|file|mimes:jpg,png,jpeg|max:4096',
            'role' => 'required',
            'alamat' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role;
        $user->alamat = $request->alamat;
        if($request->file('image')){
            $user->image = $request->file('image')->store('user-images');
        }
        $user->save();

        return redirect(route('users.index'))->with('success','Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function show(AdminUser $adminUser)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
            'role' => DB::table('role')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users,email,'.$user->id.',id',
            'role' => 'required',
            'alamat' => 'required',
            'image' =>'image|file|mimes:jpg,png,jpeg|max:4096',
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->alamat = $request->alamat;
        if($request->file('image')){
            if($user->image){
                Storage::delete($user->image);

            }

            $user->image = $request->file('image')->store('user-images');
        }
        $user->save();

        return redirect(route('users.index'))->with('success','Berhasil');
    }

    public function pass(User $user) {
        return view('admin.users.pass',[
            'user' => $user,
        ]);
    }

    public function pass_update(Request $request, User $user) {
        $request->validate([
            'password' => 'required|same:password_confirm',
            'password_confirm' => 'required|same:password',
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route('users.index'))->with('success','Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $transaksi = Transaction::where('user_id', $user->id)->first();

        if($transaksi) {
            $denda = Denda::where('transaction_id', $transaksi->id)->first();
            if($denda) {
                Denda::where('transaction_id', $transaksi->id)->delete();
                Transaction::where('user_id', $user->id)->delete();
            } else {
                Transaction::where('user_id', $user->id)->delete();
            }
        }

        User::destroy($user->id);

        return redirect('/admin/users')->with('success', 'User Telah Dihapus');
    }
}
