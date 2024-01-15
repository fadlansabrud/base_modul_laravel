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
        @if(session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if(session('danger'))
            <p class="alert alert-danger">{{ session('danger') }}</p>
        @endif
        @if($errors->any())
            @foreach($errors->all() as $err)
                <p class="alert alert-danger text-lg">{{ $err }}</p>
            @endforeach
        @endif
        <div class="card col-sm-3 p-3">
            <form action="/admin/edit_action" method="post">
                @csrf
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" name="email" id="Email" value="{{$data->email}}" Required>
                    <input type="hidden" name="id" value="{{$data->id_user}}">
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control"name="password" id="Password" placeholder="Silahkan Masukan Password">
                </div>
                <button class="btn btn-sm btn-success">Edit</button>
            </form>
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
