<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {   
        $post = array(
            "title" => "Pengguna",
            "data" => DB::table('tb_user')->get(),
    );
    return view('admin.pengguna', ['post' => $post]);
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:tb_user',
            'password' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
            'role' => 'required',
        ]);

        DB::table('tb_user')->insert([
            "name" => $request->name,
            "username" => $request->username,
            "password" => Hash::make($request->password),
            "role" => $request->role
        ]);
            // echo"hallo";
        return redirect('pengguna');
    }
    public function update(Request $request)
    {
    
        if($request->password == null){
            DB::table('tb_user')->where('id',$request->id)->update([
                'name' => $request->name,
                'username' => $request->username,
                'role' => $request->role
            ]);
            return redirect('/pengguna');
        }
    
	// update data pengguna dengan password
	DB::table('tb_user')->where('id',$request->id)->update([
		'name' => $request->name,
		'username' => $request->username,
		'password' => hash::make($request->password),
		'role' => $request->role
	]);
	// alihkan halaman ke halaman pegawai
	return redirect('/pengguna');
    }

    public function delete(Request $request)
    {
        DB::table('tb_user')->delete('id',$request->id);
    }
}
