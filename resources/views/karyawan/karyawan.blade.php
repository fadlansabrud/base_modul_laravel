@include('template.header')
<body>

  <div id="wrapper">
    <div id="" class="sidebar">
        <div class="logo">
            <img src="{{asset('assets/image/download.png')}}" alt="">
        </div>
        <div class="nama-pt">
            <h2>PT EDII</h2>
        </div>
        <ul class="list-unstyled">
            @if(Auth::user()->role == 1)
            <li class="active">
                <a href="{{'/karyawan'}}"><i class="fa fa-file"></i>Calon Karyawan</a>
            </li>
            <li>
                <a href="{{'/admin'}}"><i class="fa fa-users"></i>Data Admin</a>
            </li>
            @else
            <li class="active">
                <a href="{{'/karyawan'}}"><i class="fa fa-file"></i>Calon Karyawan</a>
            </li>
            @endif
        </ul>
        <div class="d-md-none d-sm-block">
            <ul>
                <li class="list-footer">
                    <button onclick='toggleBar(event)'><span class="fa fa-navicon"></span></button>
                </li>
            </ul>
        </div>
    </div>

    <div id="content">
        <div id="header">
            <button onclick='toggleBar(event)'><span class="fa fa-navicon"></span></button>
            <a href="{{'/logout'}}" class="pull-right font-dark"><span class="fa fa-sign-out">Log-out</span></a>
        </div>
      <div class="isi">
        <h2>{{$title}}</h2>
        @if(session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if(session('danger'))
            <p class="alert alert-danger">{{ session('danger') }}</p>
        @endif
        <div class="row">
            <div class="col-sm-4">
                <div class="card p-3">
                    <h4>Biodata</h4>
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
                        <label for="">Orang Terdekat</label>
                        <input type="text" name="orang_terdekat" class="form-control" placeholder="Silahkan Isi Nomor telepon Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="">*Apakah Anda Siap Jika Ditempatkan Diluar Kota?</label>
                        <select name="penempatan" class="form-control" required>
                            <option value="">Silahkan Pilih</option>
                            <option value="1">Ya</option>
                            <option value="2">Tidak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat KTP</label>
                        <textarea name="alamat_ktp" class="form-control" cols="30" rows="10" placeholder="Silahkan Isi Alamat DiKTP Anda"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Sekarang</label>
                        <textarea name="alamat_tinggal" class="form-control" cols="30" rows="10" placeholder="Silahkan Isi Alamat Tinggal Anda"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Skill</label>
                        <textarea name="skill" class="form-control" cols="30" rows="10" placeholder="Silahkan Isi Kemampuan Anda"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card p-3">
                    <h4>Pendidikan Terakhir</h4>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card p-3">
                    <h4>Riwayat Pekerjaan</h4>
                </div>
            </div>
            <div class="col-sm-4 mt-3">
                <div class="card p-3">
                    <h4>Riwayat Pekerjaan</h4>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
  
<script>
    var isSidebarHidden = false;    
    function toggleBar(e){
      e.preventDefault();
      var sidebar = document.querySelector(".sidebar");

      if (isSidebarHidden) {
        sidebar.classList.remove("sidebar-close");
        sidebar.classList.add("show");
      } else {
        sidebar.classList.remove("show");
        sidebar.classList.add("sidebar-close");
      }

      isSidebarHidden = !isSidebarHidden;
    }
</script>
</body>
</html>
