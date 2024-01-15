<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class KaryawanController extends Controller
{
    public function index(){
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role == 1) {
                $data = [
                    'title' => "Halaman Admin",
                    'data' => DB::table('biodata')->get(),
                ];
                return view('karyawan.index',$data);
            } else {
                $data = [
                    'title' => "Halaman Admin",
                    'data' => DB::table('biodata')->where('id_user',Auth::user()->id_user)->get(),
                ];
                return view('karyawan.karyawan',$data);
            }
        } else {
            return redirect('/login')->with('success','Anda Tidak Memiliki Akses');
        }
    }
}
