<div class="row">
            <div class="col-sm-4">
                <div class="card p-3">
                    <h4>Biodata</h4>
                    <div class="row">
                        <div class="col-sm-6">
                        <form action="/karyawan/edit" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Posisi</label>
                                <input type="hidden" name="id" value="{{$data->id_biodata}}">
                                <input type="text" name="posisi" class="form-control" value="{{$data->posisi}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{$data->nama}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">No Ktp</label>
                                <input type="number" name="no_ktp" class="form-control" value="{{$data->no_ktp}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Tempat, Tanggal Lahir</label>
                                <input type="text" name="ttl" class="form-control" value="{{$data->ttl}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Orang Terdekat</label>
                                <input type="text" name="orang_terdekat" class="form-control" value="{{$data->orang_terdekat}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Golongan Darah</label>
                                <input type="text" name="gol_darah" class="form-control" value="{{$data->gol_darah}}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <input type="text" name="jenkel" class="form-control" value="{{$data->jenkel}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Agama</label>
                                <input type="text" name="agama" class="form-control" value="{{$data->agama}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <input type="text" name="status" class="form-control" value="{{$data->status}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nomor Telepon</label>
                                <input type="number" name="no_telp" class="form-control" value="{{$data->no_telp}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Gaji</label>
                                <input type="number" name="gaji" class="form-control" value="{{$data->gaji}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">*Apakah Anda Siap Jika Ditempatkan Diluar Kota?</label>
                                <select name="penempatan" class="form-control" required>
                                    @if($data->penempatan == 1)
                                    <option selected value="1">Ya</option>
                                    <option value="2">Tidak</option>
                                    @else
                                    <option selected value="2">Tidak</option>
                                    <option value="1">Ya</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat KTP</label>
                        <textarea name="alamat_ktp" class="form-control" cols="30" rows="2" required>{{$data->alamat_ktp}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Sekarang</label>
                        <textarea name="alamat_tinggal" class="form-control" cols="10" rows="2" required>{{$data->alamat_tinggal}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Skill</label>
                        <textarea name="skill" class="form-control" cols="30" rows="2" required>{{$data->skill}}</textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card p-3">
                    <h4>Pendidikan Terakhir</h4>
                    <div>
                        <label for="">Jenjang Pendidikan</label>
                        <input type="text" name="jenjang" class="form-control" value="{{$data->jenjang_pendidikan}}" required>
                    </div>
                    <div>
                        <label for="">Nama Institusi</label>
                        <input type="text" name="institusi" class="form-control" value="{{$data->nama_institusi}}" required>
                    </div>
                    <div>
                        <label for="">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" value="{{$data->jurusan}}" required>
                    </div>
                    <div>
                        <label for="">Tahun Lulus</label>
                        <input type="number" name="tahun" class="form-control" value="{{$data->tahun_lulus}}" required>
                    </div>
                    <div>
                        <label for="">Ipk</label>
                        <input type="text" name="ipk" class="form-control" value="{{$data->ipk}}" required>
                    </div>
                </div>
                <div class="card p-3 mt-3">
                    <h4>Riwayat Pekerjaan</h4>
                    <table class="table table-bordered table-responsive" id="dynamicAddHapus">  
                        <tr>
                            <th>Posisi</th>
                            <th>Pendapatan</th>
                            <th>Tahun</th>
                            <th>Action</th>
                        </tr>
                        @php 
                            $pekerjaan = DB::table('riwayat_pekerjaan')->where('id_biodata',$data->id_biodata)->get();
                            $pelatihan = DB::table('riwayat_pelatihan')->where('id_biodata',$data->id_biodata)->get();
                        @endphp
                        @if(count($pekerjaan) == 0)
                        <tr>  
                            <td><input type="text" name="moreFields[0][posisi]" placeholder="Posisi" class="form-control"/></td>
                            <td><input type="number" name="moreFields[0][pendapatan]" placeholder="Pendapatan" class="form-control" required/></td>  
                            <td><input type="number" name="moreFields[0][tahun]" value="2019" class="form-control" required /></td>  
                            <td><button type="button" name="add" id="tambah" class="btn btn-success btn-sm">Tambah</button></td>  
                        </tr>  
                        @else
                        @foreach($pekerjaan as $key => $field)
                            <tr>
                                <td><input type="text" name="moreFields[{{ $key }}][posisi]" placeholder="Posisi" class="form-control" value="{{ $field->posisi }}" required /></td>
                                <td><input type="number" name="moreFields[{{ $key }}][pendapatan]" placeholder="Pendapatan" class="form-control" value="{{ $field->pendapatan }}" required /></td>
                                <td><input type="number" name="moreFields[{{ $key }}][tahun]" value="{{ $field->tahun }}" class="form-control" required /></td>
                                <td>
                                    @if($key === 0)
                                        <button type="button" name="add" id="tambah" class="btn btn-success btn-sm">Tambah</button>
                                    @else
                                        <button type="button" class="btn btn-sm btn-danger remove-tr">Hapus</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card p-3">
                    <h4>Riwayat Pelatihan</h4>
                <table class="table table-bordered table-responsive" id="dynamicAddRemove">  
                    <tr>
                        <th>Nama Kursus</th>
                        <th>Sertifikat</th>
                        <th>Tahun</th>
                        <th>Action</th>
                    </tr>
                    @if(count($pelatihan) == 0)
                        <tr>  
                            <td><input type="text" name="totalFields[0][kursus]" placeholder="Kursus" class="form-control"/></td>
                            <td><input type="number" name="totalFields[0][sertifikat]" placeholder="Sertifikat" class="form-control" required /></td>  
                            <td><input type="number" name="totalFields[0][tahun]" value="2019" class="form-control" required /></td>  
                            <td><button type="button" name="add" id="add-btn" class="btn btn-success btn-sm">Tambah</button></td>  
                        </tr> 
                    @else
                    @foreach($pelatihan as $key => $field)
                            <tr>
                                <td><input type="text" name="totalFields[{{ $key }}][kursus]" class="form-control" value="{{ $field->nama_kursus }}" required /></td>
                                <td><input type="text" name="totalFields[{{ $key }}][sertifikat]" class="form-control" value="{{ $field->sertifikat }}" required /></td>
                                <td><input type="number" name="totalFields[{{ $key }}][tahun]" value="{{ $field->tahun }}" class="form-control" required /></td>
                                <td>
                                    @if($key === 0)
                                        <button type="button" name="add" id="add-btn" class="btn btn-success btn-sm">Tambah</button>
                                    @else
                                        <button type="button" class="btn btn-sm btn-danger remove-tr">Hapus</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table> 
                <button class="btn btn-sm btn-success">Edit Data</button>
                </div>
            </div>
            </form>
        </div>


@if(count($pekerjaan) == 0)
<script type="text/javascript">
        var i = 0;
        $("#tambah").click(function(){
        ++i;
        $("#dynamicAddHapus").append('<tr><td><input type="text" name="moreFields['+i+'][posisi]" placeholder="Posisi" class="form-control"required/></td><td><input type="number" name="moreFields['+i+'][pendapatan]" placeholder="Pendapatan" class="form-control" required /></td><td><input type="number" value="2019" class="form-control" name="moreFields['+i+'][tahun]"></input</td><td><button type="button" class="btn btn-sm btn-danger remove-tr">Hapus</button></td></tr>');
        });
        $(document).on('click', '.remove-tr', function(){  
        $(this).parents('tr').remove();
        });  
</script>
@else
<script type="text/javascript">
    var i = {{ count($pekerjaan) }};
    
    $("#tambah").click(function(){
        ++i;
        $("#dynamicAddHapus").append('<tr><td><input type="text" name="moreFields['+i+'][posisi]" placeholder="Posisi" class="form-control" required/></td><td><input type="number" name="moreFields['+i+'][pendapatan]" placeholder="Pendapatan" class="form-control" required /></td><td><input type="number" value="2019" class="form-control" name="moreFields['+i+'][tahun]"></input></td><td><button type="button" class="btn btn-sm btn-danger remove-tr">Hapus</button></td></tr>');
    });

    $(document).on('click', '.remove-tr', function(){  
        $(this).parents('tr').remove();
    });  
</script>
@endif

@if(count($pelatihan) == 0)
<script type="text/javascript">
        var i = 0;
        $("#add-btn").click(function(){
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="totalFields['+i+'][kursus]" placeholder="Kursus" class="form-control"required/></td><td><input type="number" name="totalFields['+i+'][sertifikat]" placeholder="Sertifikat" class="form-control" required /></td><td><input type="number" value="2019" class="form-control" name="totalFields['+i+'][tahun]"></input</td><td><button type="button" class="btn btn-sm btn-danger remove-tr">Hapus</button></td></tr>');
        });
        $(document).on('click', '.remove-tr', function(){  
        $(this).parents('tr').remove();
        });  
    </script>
@else
<script type="text/javascript">
    var i = {{ count($pelatihan) }};
    
    $("#add-btn").click(function(){
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="totalFields['+i+'][kursus]" placeholder="Nama Tempat Kursus" class="form-control" required/></td><td><input type="number" name="totalFields['+i+'][sertifikat]" placeholder="Iya Atau Tidak" class="form-control" required /></td><td><input type="number" value="2019" class="form-control" name="totalFields['+i+'][tahun]"></input></td><td><button type="button" class="btn btn-sm btn-danger remove-tr">Hapus</button></td></tr>');
    });

    $(document).on('click', '.remove-tr', function(){  
        $(this).parents('tr').remove();
    });  
</script>
@endif