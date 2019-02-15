@extends('layouts.master')
@section('title', 'Masukan Data Pegawai Baru')
@section('conten')
<section class="content">

      <!-- SELECT2 EXAMPLE -->
{{-- <div class="col-md-6 col-md-offset-3"> --}}

  @if (session('msg'))
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Berhasil</h4>
    Data Berhasil Dimasukan
  </div>
  @endif
        <div class="row inputKariawan">
          <div class="col-md-6 col-md-offset-3">
      <div class="box box-default">
                
            <div class="box-header with-border">
              <h3 class="box-title">Input Pegawai Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
            <form role="form" action="{{route('daftar')}}" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nip</label>
                  <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Nip" name="nip">
                  @if ($errors->has('password'))
                  <span >
                      <p id="bintang">Tidak Boleh Kosong</p>
                  </span>
                 @endif
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama" name="name">
                  @if ($errors->has('name'))
                  <span >
                      <p id="bintang">{{$errors->has('name')}}</p>
                  </span>
                 @endif
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">User</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="User" name="user">
                  @if ($errors->has('user'))
                  <span >
                      <p id="bintang">Tidak Boleh Kosong</p>
                  </span>
                 @endif
                </div>

                 <div class="form-group">
                  <label>Bidang</label>
                  <select class="form-control" name="sector">
                    <option value="">Pilih</option>
                    <option value="Kepala Dinas">Kepala Dinas</option>
                    <option value="" disabled>============</option>
                    <option value="Sekertaris">Sekertaris</option>
                    <option value="Program">Program</option>
                    <option value="Keuangan">Keuangan</option>
                    <option value="Umum">Umum</option>
                    <option value="" disabled>============</option>
                    <option value="Informasi & Komuikasi Public">Informasi & Komuikasi Public</option>
                    <option value="Pengelolahan & Dokumentasi Informasi">Pengelolahan & Dokumentasi Informasi</option>
                    <option value="Publikasi">Publikasi</option>
                    <option value="Kelembagaan">Kelembagaan</option>
                    <option disabled>============</option>
                    <option value="Pengelolahan Teknologi & Komunikasi">Pengelolahan Teknologi & Komunikasi</option>
                    <option value="Aplikasi Teknologi & Komunikasi">Aplikasi Teknologi & Komunikasi</option>
                    <option value="Intastruktur Teknologi Informasi & Komunikasi">Intastruktur Teknologi Informasi & Komunikasi</option>
                    <option value="Tata Kelola Teknologi Informasi & Komunikasi">Tata Kelola Teknologi Informasi & Komunikasi</option>
                    <option disabled>============</option>
                    <option value="Persedian Dan LPSE">Persedian Dan LPSE</option>
                    <option value="Persedian Dan Keamanan Informasi">Persedian Dan Keamanan Informasi</option>
                    <option value="Layanan Pengadaan Secara Elektronik">Layanan Pengadaan Secara Elektronik</option>
                    <option value="Telekomunikasi Dan Pengendalian">Telekomunikasi Dan Pengendalian</option>
                    <option disabled>============</option>
                    <option value="Statistik">Statistik</option>
                    <option value="Statistik Sosial">Statistik Sosial</option>
                    <option value="Statistik Ekonomi">Statistik Ekonomi</option>
                    <option value="Statistik SDA Dan Infastruktur">Statistik SDA Dan Infastruktur</option>
                    <option disabled>============</option>
                    <option value="Balai Informasi Teknologi Edukasi">Balai Informasi Teknologi Edukasi</option>
                    <option value="Tata Usaha">Tata Usaha</option>
                    <option value="Pendataan Dan Jaringan">Pendataan Dan Jaringan</option>
                    <option value="Pelayanan Dan Kerja Sama">Pelayanan Dan Kerja Sama</option>

                  </select>
                  @if ($errors->has('sector'))
                  <span >
                      <p id="bintang">Tidak Boleh Kosong</p>
                  </span>
                 @endif
                </div>
                <div class="form-group">
                  <label>Eslon</label>
                 <select class="form-control" name="eslon">
                    <option value="">Pilih</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option> 
                </select>
                @if ($errors->has('eslon'))
                <span >
                    <p id="bintang">Tidak Boleh Kosong</p>
                </span>
               @endif
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                  @if ($errors->has('password'))
                <span >
                    <p id="bintang">Tidak Boleh Kosong</p>
                </span>
               @endif
                </div>
                 {{csrf_field()}}

              {{-- <div class="form-group"> --}}
                <button type="submit" class="btn btn-primary">Simpan</button>
                
              </div>
              {{-- </div> --}}
            </form>

            </div>
        </div>
</div>
</div>
</div>
</section>
  <div class="control-sidebar-bg"></div>
@endsection