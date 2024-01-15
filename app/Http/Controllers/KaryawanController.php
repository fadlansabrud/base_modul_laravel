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
                    'title' => "Halaman Calon Karyawan",
                    'data' => DB::table('biodata')->join('tb_user','biodata.id_user','=','tb_user.id_user')->get(),
                ];
                return view('karyawan.index',$data);
            } else {
                $data = [
                    'title' => "Halaman Calon Karyawan",
                    'data' => DB::table('biodata')
                                ->join('pendidikan_terakhir','biodata.id_biodata','=','pendidikan_terakhir.id_biodata')
                                ->where('id_user',Auth::user()->id_user)
                                ->first(),
                ];
                return view('karyawan.karyawan',$data);
            }
        } else {
            return redirect('/login')->with('success','Anda Tidak Memiliki Akses');
        }
    }

    public function add(Request $req)
    {
        $id = DB::table('biodata')->insertGetId([
            'id_user'=>Auth::user()->id_user,
            'posisi' => $req->posisi,
            'nama' => $req->nama,
            'no_ktp' => $req->no_ktp,
            'ttl' => $req->ttl,
            'jenkel' => $req->jenkel,
            'agama' => $req->agama,
            'gol_darah' => $req->gol_darah,
            'status' => $req->status,
            'alamat_ktp' => $req->alamat_ktp,
            'alamat_tinggal' => $req->alamat_tinggal,
            'no_telp' => $req->no_telp,
            'orang_terdekat' => $req->orang_terdekat,
            'skill' => $req->skill,
            'penempatan' => $req->penempatan,
            'gaji' => $req->gaji,
        ]);

        DB::table('pendidikan_terakhir')->insert([
            'id_biodata' => $id,
            'jenjang_pendidikan'=>$req->jenjang,
            'nama_institusi'=>$req->institusi,
            'jurusan' => $req->jurusan,
            'tahun_lulus' => $req->tahun,
            'ipk' => $req->ipk
        ]);

        foreach($req->moreFields as $row){
            DB::table('riwayat_pekerjaan')->insert([
                'id_biodata' => $id,
                'posisi' => $row['posisi'],
                'pendapatan' => $row['pendapatan'],
                'tahun' => $row['tahun']
            ]);
        }

        foreach($req->totalFields as $item){
            DB::table('riwayat_pelatihan')->insert([
                'id_biodata' => $id,
                'nama_kursus' => $item['kursus'],
                'sertifikat' => $item['sertifikat'],    
                'tahun' => $item['tahun']
            ]);
        }
        return back()->with('success','Data Berhasil Di Tambahkan');
    }

    public function edit(Request $req)
    {
        DB::table('biodata')->where('id_biodata',$req->id)->update([
            'id_user'=>Auth::user()->id_user,
            'posisi' => $req->posisi,
            'nama' => $req->nama,
            'no_ktp' => $req->no_ktp,
            'ttl' => $req->ttl,
            'jenkel' => $req->jenkel,
            'agama' => $req->agama,
            'gol_darah' => $req->gol_darah,
            'status' => $req->status,
            'alamat_ktp' => $req->alamat_ktp,
            'alamat_tinggal' => $req->alamat_tinggal,
            'no_telp' => $req->no_telp,
            'orang_terdekat' => $req->orang_terdekat,
            'skill' => $req->skill,
            'penempatan' => $req->penempatan,
            'gaji' => $req->gaji,
        ]);

        DB::table('pendidikan_terakhir')->where('id_biodata',$req->id)->update([
            'jenjang_pendidikan'=>$req->jenjang,
            'nama_institusi'=>$req->institusi,
            'jurusan' => $req->jurusan,
            'tahun_lulus' => $req->tahun,
            'ipk' => $req->ipk
        ]);

        $cek_pekerjaan = DB::table('riwayat_pekerjaan')->where('id_biodata',$req->id)->count();
        $cek_pelatihan = DB::table('riwayat_pelatihan')->where('id_biodata',$req->id)->count();

        if($cek_pekerjaan  > 0){
            DB::table('riwayat_pekerjaan')->where('id_biodata',$req->id)->delete();
        }else{
            
        }
        foreach($req->moreFields as $row){
            DB::table('riwayat_pekerjaan')->insert([
                'id_biodata' => $req->id,
                'posisi' => $row['posisi'],
                'pendapatan' => $row['pendapatan'],
                'tahun' => $row['tahun']
            ]);
        }
        if($cek_pelatihan > 0){
            DB::table('riwayat_pelatihan')->where('id_biodata',$req->id)->delete();
        }else{

        }
        foreach($req->totalFields as $item){
            DB::table('riwayat_pelatihan')->insert([
                'id_biodata' => $req->id,
                'nama_kursus' => $item['kursus'],
                'sertifikat' => $item['sertifikat'],    
                'tahun' => $item['tahun']
            ]);
        }
        return back()->with('success','Data Berhasil Di Edit');
    }

    public function delete($id){
        $data = DB::table('biodata')->where('id_biodata',$id)->first();
        $cek_pekerjaan = DB::table('riwayat_pekerjaan')->where('id_biodata',$id)->count();
        $cek_pelatihan = DB::table('riwayat_pelatihan')->where('id_biodata',$id)->count();

        DB::table('tb_user')->where('id_user',$data->id_user)->delete();
        DB::table('biodata')->where('id_biodata',$id)->delete();
        DB::table('pendidikan_terakhir')->where('id_biodata',$id)->delete();

        if($cek_pekerjaan  > 0){
            DB::table('riwayat_pekerjaan')->where('id_biodata',$req->id)->delete();
        }
        if($cek_pelatihan > 0){
            DB::table('riwayat_pelatihan')->where('id_biodata',$req->id)->delete();
        }

        return back()->with('success','Data Berhasil Dihapus');
    }
    public function print($id){
        $data = DB::table('biodata')
                        ->join('pendidikan_terakhir','biodata.id_biodata','=','pendidikan_terakhir.id_biodata')
                        ->join('tb_user','biodata.id_user','=','tb_user.id_user')
                        ->where('biodata.id_biodata',$id)
                        ->first();  
        return view('karyawan.print',['data'=> $data]);
    }
}
