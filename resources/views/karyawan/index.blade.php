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
                        <th>Nama</th>
                        <th>Tempat & Tanggal Lahir</th>
                        <th>Posisi Yang Dilamar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->ttl}}</td>
                            <td>{{$item->posisi}}</td>
                            <td>
                                <a href="{{'/karyawan/delete/'.$item->id_biodata}}" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data Calon Karyawan?');" title="Hapus Data Calon Karyawan"><i class="fa fa-trash"></i></a>
                                <a href="{{'/karyawan/print/'.$item->id_biodata}}" class="btn btn-sm btn-success" onclick="return confirm('Print Data Calon Karyawan?');"><i class="fa fa-print"></i></a>
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
