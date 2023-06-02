@include('admin.template.head')
@include('admin.template.navbar')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data {{$post['title']}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$post['title']}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
          Tambah Data Admin
          <i class="fa fa-plus"></i>
      </button>
      @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
      <br><br>
        <!-- isi Konten -->
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          @foreach($post['data'] as $isi)
            <tr>
                <td>{{$isi->name}}</td>
                <td>{{$isi->username}}</td>
                <td>{{$isi->role}}</td>
                <td>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$isi->id}}">
                    <i class="fa fa-trash"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal{{$isi->id}}">
                    <i class="fa fa-edit"></i>
                  </button>
                </td>
            </tr>
          @endforeach
        </tbody>
    </table>
        <!-- penutup Konten -->
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Content Sebelah Kiri -->
          <section class="col-lg-7 connectedSortable">

          </section>
          <!-- Content Sebelah Kanan -->
          <section class="col-lg-5 connectedSortable">

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/pengguna/register" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                  <label for="exampleInputEmail1">Nama Admin</label>
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Admin" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Username</label>
                  <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Konfirmasi Password</label>
                  <input type="password" name="password_confirm" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>
                <label for="">Posisi</label>
                <select class="custom-select my-1 mr-sm-2" name="role" id="inlineFormCustomSelectPref">
                <div class="form-group">
                  <option value="">== Pilih Posisi Pengguna ==</option>
                  <option value="1">Owner</option>
                  <option value="2">Admin Penjualan</option>
                  <option value="3">Development</option>
                </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                  <button  class="btn btn-primary btn-sm">Simpan</button>
                </div>
              </form>
          </div>
        </div>
      </div>
      <!-- Close Modal -->
      @foreach($post['data'] as $isi)
          <!-- Modal Edit -->
          <div class="modal fade" id="myModal{{$isi->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="/pengguna/update" method="post">
              {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$isi->id}}" id="">
              <div class="form-group">
                  <label for="exampleInputEmail1">Nama Admin</label>
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$isi->name}}" placeholder="Nama Admin" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Username</label>
                  <input type="text" name="username" class="form-control" id="exampleInputPassword1" value="{{$isi->username}}" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1"  placeholder="Password">
                </div>
                <label for="">Posisi</label>
                <select class="custom-select my-1 mr-sm-2" name="role" id="inlineFormCustomSelectPref">
                <div class="form-group">
                  <option value="{{$isi->role}}">{{$isi->role}}</option>
                  <option value="1">Owner</option>
                  <option value="2">Admin Penjualan</option>
                  <option value="3">Development</option>
                </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                  <button  class="btn btn-primary btn-sm">Simpan</button>
                </div>
              </form>
          </div>
        </div>
      </div>
      <!-- Close Modal -->
      @endforeach
      
      @foreach($post['data'] as $isi)
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter{{$isi->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Peringatan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Apakah yakin Untuk Menghapus {{$isi->name}} dari data pengguna
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger">Hapus</button>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    <!-- /.content -->
  </div>
  <script>
  $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })
  </script>
  @include('admin.template.footer')