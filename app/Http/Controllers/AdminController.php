<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 1) {
                $data = [
                    'title' => "Halaman Admin",
                    'data' => DB::table('tb_user')->get(),
                ];
                return view('admin.index',$data);
            } else {
                return redirect('/login')->with('success','Anda Tidak Memiliki Akses');
            }
        } else {
            return redirect('/login')->with('success','Anda Tidak Memiliki Akses');
        }
    
    }
    public function delete($id){
        $cek = DB::table('tb_user')->where('id_user',$id)->count();
        if($cek == 0){
            return back()->with('danger','Data Tidak ditemukan');
        }
        DB::table('tb_user')->where('id_user',$id)->delete();
        return back()->with('success','Data Berhasil Dihapu');
    }

    public function add(){
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 1) {
                $data = [
                    'title' => "Tambah Data Admin",
                ];
                return view('admin.add',$data);
            } else {
                return redirect('/login')->with('success','Anda Tidak Memiliki Akses');
            }
        } else {
            return redirect('/login')->with('success','Anda Tidak Memiliki Akses');
        }

    }

    public function add_action(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:tb_user',
            'password' => 'required',
        ]);

        $user = new User([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => '1',
        ]);
        $user->save();

        return redirect('/admin')->with('success', 'Akun berhasil dibuat, Silahkan Login!');
    }

    public function edit($id){
        $data = [
            'title' => "Edit Data Admin",
            'data' => DB::table('tb_user')->where('id_user',$id)->first()
        ];
        if($data['data'] == NULL){
            return back()->with('danger','Data Tidak ditemukan');
        }
            return view('admin.edit',$data);
    }

    public function edit_action(Request $request){
        if($request->password == null){
            DB::table('tb_user')->where('id_user',$request->id)->update([
                'email' => $request->email,
            ]);
            return redirect('/admin')->with('success','Data Berhasil Diedit');
        }
        DB::table('tb_user')->where('user_ud',$request->id)->update([
            'email' => $request->email,
            'password' => hash::make($request->password),
        ]);
        return redirect('/admin')->with('success','Data Berhasil Diedit');
    }
}
