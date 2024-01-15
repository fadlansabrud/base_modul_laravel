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
            <li>
                <a href="{{'/karyawan'}}"><i class="fa fa-file"></i>Calon Karyawan</a>
            </li>
            <li class="active">
                <a href="{{'/admin'}}"><i class="fa fa-users"></i>Data Admin</a>
            </li>
            @else
            <li>
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
        <button type="button" class="btn btn-sm btn-primary mt-3 mb-3" data-toggle="modal" data-target="#exampleModal">
            Tambah Data Admin <i class="fa fa-plus"></i>
        </button>
        @if(session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if(session('danger'))
            <p class="alert alert-danger">{{ session('danger') }}</p>
        @endif
        <div class="card">
            <table class="table table-striped" width="100%">
                <thead>
                    <tr>
                        <th>Email Pengguna</th>
                        <th>Jenis User</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{$item->email}}</td>
                            <td>
                                @if($item->role == 1)
                                    Admin
                                @else
                                    Calon Karyawan
                                @endif
                            </td>
                            <td>
                            <button class="btn btn-sm btn-success" title="Edit Data" data-toggle="modal" data-target="#edit{{$item->id_user}}"><i class="fa fa-edit"></i></button>
                                <a href="{{'/admin/delete/'.$item->id_user}}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data Pengguna?');" title="Hapus Data"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/add_action" method="post">
                @csrf
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" name="email" id="Email" placeholder="Silahkan Masukan Email" Required>
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control"name="password" id="Password" placeholder="Silahkan Masukan Password" Required>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button class="btn btn-primary">Kirim</button>
      </div>
      </form>
    </div>
  </div>
</div>

@foreach($data as $row)
<div class="modal fade" id="edit{{$row->id_user}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/admin/edit_action" method="post">
                @csrf
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" name="email" id="Email" value="{{$row->email}}" Required>
                    <input type="hidden" name="id" value="{{$row->id_user}}">
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control"name="password" id="Password" placeholder="Silahkan Masukan Password">
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button class="btn btn-primary">Edit</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach
  
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

<script>
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
</body>
</html>
