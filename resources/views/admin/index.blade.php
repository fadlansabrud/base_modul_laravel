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
        <a href="{{'/admin/add'}}" class="btn btn-sm btn-primary mb-3">Tambah Data Admin <i class="fa fa-plus"></i></a>
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
                            <a href="{{'/admin/edit/'.$item->id_user}}" class="btn btn-sm btn-success" title="Edit Data"><i class="fa fa-edit"></i></a>
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
