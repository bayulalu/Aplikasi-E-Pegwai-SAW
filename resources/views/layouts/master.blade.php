<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('asset/bootstrap/css/bootstrap.min.css') }}">
  
<link rel="stylesheet" href="{{ asset('asset/select2/dist/css/select2.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('asset/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('asset/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('asset/dist/css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  {{-- <link rel="stylesheet" href="{{ asset('asset/iCheck/square/blue.css') }}"> --}}


  <link rel="stylesheet" href="{{ asset('asset/dist/css/skins/_all-skins.min.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/costume.css') }}">

  <link rel="stylesheet" href="{{ asset('asset/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    {{-- <a href="{{route('ketua.beranda')}}" class="logo"> --}}
      <!-- mini logo for sidebar mini 50x50 pixels -->
     
      <!-- logo for regular state and mobile devices -->
      {{-- <span class="logo-lg"><b>Ketua</b>Divisi</span> --}}
    {{-- </a> --}}

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="btn">
              <i class="fa fa-bell-o"></i>
              @if (Auth::user()->notifications()->where('seen', '0')->count() != 0)
                <span class="label label-warning hapus">{{Auth::user()->notifications()->where('seen', '0')->count()}}</span>
              @endif
            </a>
            <ul class="dropdown-menu">

              <li class="header">Anda Memiliki  {{Auth::user()->notifications()->where('seen', '0')->count()}} Pemberitahuan</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  
                  @foreach (Auth::user()->notifications()->orderBy('id', 'desc')->limit(5)->get() as $notif)
                   
                  <li>
                    <a href="/rincian/{{$notif->job->slug}}">
                      <i class="fa fa-file-text-o text-aqua"></i>{{$notif->subject}}
                    </a>
                  </li>

                  @endforeach
                </ul>
              </li>
              <li class="footer">{{-- <a href="{{route('notifikasi')}}">Lihat Semua Pemberitauan</a> --}}</li>
            </ul>
          </li>
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img 
                {{-- @if (Auth::user()->foto == '') --}}
                  src="{{ asset('img/avatar5.png') }}" 
                {{-- @else --}}
                  {{-- src="{{asset('storage/fotoKetua/'.Auth::user()->foto)}}" --}}
                {{-- @endif --}}
                 class="user-image" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img 
                {{-- @if (Auth::user()->foto == '') --}}
                  src="{{ asset('img/avatar5.png') }}" 
                {{-- @else --}}
                  {{-- src="{{asset('storage/fotoKetua/'.Auth::user()->foto)}}" --}}
                {{-- @endif --}}
                 class="img-circle" alt="User Image">

                <p>
                  {{Auth::user()->user}}
                </p>
              </li>
              
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{-- {{ route('ketua.profile') }} --}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('logout')}}" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img 
                {{-- @if (Auth::user()->foto == '') --}}
                  src="{{ asset('img/avatar5.png') }}" 
                {{-- @else --}}
                  {{-- src="{{asset('storage/fotoKetua/'.Auth::user()->foto)}}" --}}
                {{-- @endif --}}
                 class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        {{-- <li class="header">MAIN NAVIGATION</li> --}}
          {{-- expr --}}
        
        <li>
        @if (Auth::user()->group1 != 'admin')
          <a href="{{route('beranda')}}">
            <i class="fa fa-dashboard"></i> <span>Beranda</span>
          </a>
          
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Tugas</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if (Auth::user()->eslon < 5 )
              {{-- expr --}}
            <li><a href="{{route('job')}}"><i class="fa  fa-archive"></i>Pemberian Tugas</a></li>
            @endif
            
            {{-- @if (Auth::user()->status != 3) --}}
            <li><a href="{{-- {{ route('listJobs') }} --}}"><i class="fa fa-book"></i>Daftar Tugas</a></li>
            {{-- @endif --}}

            <li><a href="{{ route('listJob') }}"><i class="fa fa-book"></i>Daftar Pemberian Tugas</a></li>
            
            <li><a href="{{-- {{route('history')}} --}}"><i class="fa fa-eyedropper"></i>Riwayat</a></li>
            
          </ul>
          @endif
        </li>
        {{-- auth --}}
        
        @if (Auth::user()->group1 == 'admin')
         <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Pegawai</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('daftar')}}"><i class="fa  fa-archive"></i>Masukan Pegawai</a></li>
            
            {{-- @if (Auth::user()->status != 3) --}}
            
            {{-- @endif --}}

            <li><a href="{{ route('alternatif') }}"><i class="fa fa-book"></i>Alternatif</a></li>

            <li><a href="{{ route('alternatif') }}"><i class="fa fa-book"></i>Daftar Nilai Alternatif</a></li>

            <li><a href="{{route('parameter')}}"><i class="fa fa-eyedropper"></i>Parameter </a></li>  
          </ul>
        </li>
        @endif
      
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Info</span>
            <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{-- {{ route('listJobs') }} --}}"><i class="fa fa-book"></i>Info Daftar Pegawai</a></li>
                        
            {{-- @if (Auth::user()->status != 3) --}}
            <li><a href="{{-- {{ route('listJobs') }} --}}"><i class="fa fa-book"></i>Info Pegawai Berperstasi</a></li>
            {{-- @endif --}}
            
          </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa  fa-cogs"></i>
            <span>Pengaturan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{-- {{ route('ketua.profile') }} --}}"><i class="fa fa-user"></i>Profile</a></li>
            <li><a href="{{-- {{ route('ketua.ubah') }} --}}"><i class="fa  fa-cog"></i>Ubah Profile</a></li>
            <li><a href="{{-- {{ route('ketua.ubahSandi') }} --}}"><i class="fa  fa-cog"></i>Ubah Kata Sandi</a></li>
            <li><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i>Keluar</a></li>
          </ul>
        </li>
                </li>
              </ul>
            </li>
           </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    

    <!-- Main content -->
    @yield('conten')
    <!-- /.content -->
  </div>


 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('asset/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('asset/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('asset/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('asset/dist/js/adminlte.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('asset/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('asset/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('asset/dist/js/demo.js') }}"></script>
<script src="{{ asset('asset/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('asset/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

<script>
$('document').ready(function(){

      $('#btn').click(function(){
      $.ajax({
        url : 'seen',
        method : 'GET',
      }).done(function(hasil){
        $('.hapus').remove();
      });
        
      });
    });
</script>

@yield('skereip')


</script>
</body>
</html>