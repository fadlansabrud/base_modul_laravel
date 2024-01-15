<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Print Formulir</title>
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    @php 
        $pekerjaan = DB::table('riwayat_pekerjaan')->where('id_biodata',$data->id_biodata)->get();
        $pelatihan = DB::table('riwayat_pelatihan')->where('id_biodata',$data->id_biodata)->get();
    @endphp
    <div class="container">
        <h2 class="text-center text-uppercase mb-4">Data Pribadi Pelamar</h2>

            <div class="row">
                <div class="col-sm-4">
                    <p>1. Posisi Yang Dilamar</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-5 border-bottom">
                    <p>{{$data->posisi}}</p>
                </div>
                
                <div class="col-sm-4">
                    <p>2. Nama</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-5 border-bottom">
                    <p>{{$data->nama}}</p>
                </div>
                
                <div class="col-sm-4">
                    <p>3. No. KTP</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-5 border-bottom">
                    <p>{{$data->no_ktp}}</p>
                </div>

                <div class="col-sm-4">
                    <p>4. Tempat, Tanggal Lahir</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-5 border-bottom">
                    <p>5. {{$data->ttl}}</p>
                </div>

                <div class="col-sm-4">
                    <p>6. Agama</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-5 border-bottom">
                    <p>{{$data->agama}}</p>
                </div>

                <div class="col-sm-4">
                    <p>7. Golongan Darah</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-5 border-bottom">
                    <p>{{$data->gol_darah}}</p>
                </div>

                <div class="col-sm-4">
                    <p>8. Status</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-5 border-bottom">
                    <p>{{$data->status}}</p>
                </div>

                <div class="col-sm-4">
                    <p>9. Alamat KTP</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-5 border-bottom">
                    <p>{{$data->alamat_ktp}}</p>
                </div>

                <div class="col-sm-4">
                    <p>10. Alamat Tinggal</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-5 border-bottom">
                    <p>{{$data->alamat_tinggal}}</p>
                </div>

                <div class="col-sm-4">
                    <p>11. email</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-5 border-bottom">
                    <p>{{$data->email}}</p>
                </div>

                <div class="col-sm-4">
                    <p>12. No Telp</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-5 border-bottom">
                    <p>{{$data->no_telp}}</p>
                </div>

                <div class="col-sm-4">
                    <p>13. Orang Terderkat Yan Dapat Dihubungi</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-5 border-bottom">
                    <p>{{$data->orang_terdekat}}</p>
                </div>

                <div class="col-sm-4">
                    <p>14. Pendidikan Terakhir</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-5">
                </div>

                <div class="col-sm-12">
                    <table class="table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>Jenjang Pedidikan Terakhir</th>
                                <th>Nama Institusi Akademik</th>
                                <th>Jurusan</th>
                                <th>Tahun Lulus</th>
                                <th>IPK</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{$data->jenjang_pendidikan}}</td>
                                    <td>{{$data->nama_institusi}}</td>
                                    <td>{{$data->jurusan}}</td>
                                    <td>{{$data->tahun_lulus}}</td>
                                    <td>{{$data->ipk}}</td>
                                </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-4">
                    <p>15. Riwayat Pelatihan</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-5">
                </div>

                <div class="col-sm-12">
                    <table class="table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>Nama Kursus</th>
                                <th>Sertifikat Ada/Tidak</th>
                                <th>Tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($pelatihan) == 0)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @else
                            @foreach($pelatihan as $row)
                                <tr>
                                    <td>{{$row->nama_kursus}}</td>
                                    <td>
                                        @if($row->sertifikat == 1)
                                            Ya
                                        @else
                                            Tidak
                                        @endif
                                    </td>
                                    <td>{{$row->tahun}}</td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-4 mt-4">
                    <p>16. Riwayat Pekerjaan</p>
                </div>
                <div class="col-sm-2">
                    <p>:</p>
                </div>
                <div class="col-sm-5">
                </div>

                <div class="col-sm-12 mb-5">
                    <table class="table table-striped" width="100%">
                        <thead>
                            <tr>
                                <th>Posisi terakhir</th>
                                <th>Pendapatan Terakhir</th>
                                <th>Tahun</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($pekerjaan) == 0)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @else
                            @foreach($pekerjaan as $item)
                                <tr>
                                    <td>{{$item->posisi}}</td>
                                    <td>{{"Rp". number_format($item->pendapatan,'0','.','.')}}</td>
                                    <td>{{$item->tahun}}</td>
                                </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-4">
                    <p>17. Skill</p>
                </div>
                <div class="col-sm-7">
                    <p>: Tuliskan keahlian & keterampilan yang saat ini anda miliki</p>
                </div>

                <div class="col-sm-4">
                </div>
                <div class="col-sm-7 border-bottom">
                    <p>{{$data->skill}}</p>
                </div>

                <div class="col-sm-7">
                    <p>18. Bersedia ditempatkan di Seluruh kantor perusahaan</p>
                </div>
                <div class="col-sm-4">
                    <p>: 
                        @if($data->penempatan == 1)
                        Ya
                        @else
                        Tidak
                        @endif
                    </p>
                </div>

                <div class="col-sm-6">
                    <p>19. Penghasilan yang diharapkan :</p>
                </div>
                <div class="col-sm-3 border-bottom">
                    <p>{{"Rp". number_format($data->gaji,'0','.','.')}} </p>
                </div>
                <div class="col-sm-3">
                    <p>/Bulan </p>
                </div>

            </div>
    </div>
</body>

<script>
    window.print();
</script>

</html>
