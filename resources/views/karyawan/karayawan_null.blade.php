<div class="row">
            <div class="col-sm-4">
                <div class="card p-3">
                    <h4>Biodata</h4>
                    <div class="row">
                        <div class="col-sm-6">
                        <form action="/karyawan/add" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Posisi</label>
                                <input type="text" name="posisi" class="form-control" placeholder="Silahkan Isi Posisi Melamar Anda" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Silahkan Isi Nama Anda" required>
                            </div>
                            <div class="form-group">
                                <label for="">No Ktp</label>
                                <input type="number" name="no_ktp" class="form-control" placeholder="Silahkan Isi Nomor KTP" required>
                            </div>
                            <div class="form-group">
                                <label for="">Tempat, Tanggal Lahir</label>
                                <input type="text" name="ttl" class="form-control" placeholder="Silahkan Isi Tempat Tanggal Lahir Anda" required>
                            </div>
                            <div class="form-group">
                                <label for="">Orang Terdekat</label>
                                <input type="text" name="orang_terdekat" class="form-control" placeholder="Silahkan Isi Nomor telepon Anda" required>
                            </div>
                            <div class="form-group">
                                <label for="">Golongan Darah</label>
                                <input type="text" name="gol_darah" class="form-control" placeholder="Silahkan Isi Nomor telepon Anda" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <input type="text" name="jenkel" class="form-control" placeholder="Silahkan Isi Jenis Kelamin Anda" required>
                            </div>
                            <div class="form-group">
                                <label for="">Agama</label>
                                <input type="text" name="agama" class="form-control" placeholder="Silahkan Isi Agama Anda" required>
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <input type="text" name="status" class="form-control" placeholder="Silahkan Isi Status Anda" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nomor Telepon</label>
                                <input type="number" name="no_telp" class="form-control" placeholder="Silahkan Isi Nomor telepon Anda" required>
                            </div>
                            <div class="form-group">
                                <label for="">Gaji</label>
                                <input type="number" name="gaji" class="form-control" placeholder="Silahkan Isi Nomor telepon Anda" required>
                            </div>
                            <div class="form-group">
                                <label for="">*Apakah Anda Siap Jika Ditempatkan Diluar Kota?</label>
                                <select name="penempatan" class="form-control" required>
                                    <option value="">Silahkan Pilih</option>
                                    <option value="1">Ya</option>
                                    <option value="2">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat KTP</label>
                        <textarea name="alamat_ktp" class="form-control" cols="30" rows="2" placeholder="Silahkan Isi Alamat DiKTP Anda"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Sekarang</label>
                        <textarea name="alamat_tinggal" class="form-control" cols="10" rows="2" placeholder="Silahkan Isi Alamat Tinggal Anda"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Skill</label>
                        <textarea name="skill" class="form-control" cols="30" rows="2" placeholder="Silahkan Isi Kemampuan Anda"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card p-3">
                    <h4>Pendidikan Terakhir</h4>
                    <div>
                        <label for="">Jenjang Pendidikan</label>
                        <input type="text" name="jenjang" class="form-control" placeholder="Silahkan Masukan Jenjang Pendidikan" required>
                    </div>
                    <div>
                        <label for="">Nama Institusi</label>
                        <input type="text" name="institusi" class="form-control" placeholder="Nama Institusi" required>
                    </div>
                    <div>
                        <label for="">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" placeholder="Jurusan Yang Diambil" required>
                    </div>
                    <div>
                        <label for="">Tahun Lulus</label>
                        <input type="number" name="tahun" class="form-control" value="2019" required>
                    </div>
                    <div>
                        <label for="">Ipk</label>
                        <input type="text" name="ipk" class="form-control" placeholder="Silahkan Masukan Ipk Anda" required>
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
                    <tr>  
                        <td><input type="text" name="moreFields[0][posisi]" placeholder="Posisi" class="form-control"/></td>
                        <td><input type="number" name="moreFields[0][pendapatan]" placeholder="Pendapatan" class="form-control" required/></td>  
                        <td><input type="number" name="moreFields[0][tahun]" value="2019" class="form-control" required /></td>  
                        <td><button type="button" name="add" id="tambah" class="btn btn-success btn-sm">Tambah</button></td>  
                    </tr>  
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
                    <tr>  
                        <td><input type="text" name="totalFields[0][kursus]" placeholder="Kursus" class="form-control"/></td>
                        <td><input type="number" name="totalFields[0][sertifikat]" placeholder="Sertifikat" class="form-control" required /></td>  
                        <td><input type="number" name="totalFields[0][tahun]" value="2019" class="form-control" required /></td>  
                        <td><button type="button" name="add" id="add-btn" class="btn btn-success btn-sm">Tambah</button></td>  
                    </tr>  
                </table> 
                <button class="btn btn-sm btn-success">Tambah Data</button>
                </div>
            </div>
            </form>
        </div>
        </script>
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