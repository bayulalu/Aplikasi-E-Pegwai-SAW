@extends('layouts.master')
@section('title', 'Masukan Data Pegawai Baru')
@section('conten')
<section class="content">

      <!-- SELECT2 EXAMPLE -->
{{-- <div class="col-md-6 col-md-offset-3"> --}}
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
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama" name="name">
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">User</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="User" name="user">
                </div>

                 <div class="form-group">
                  <label>Bidang</label>
                  <select class="form-control" name="sector">
                    <option>Pilih</option>
                    <option>Sekertaris</option>
                    <option>Program</option>
                    <option>Keuangan</option>
                    <option>Umum</option>
                    <option>============</option>
                    <option>Informasi & Komuikasi Public</option>
                    <option>Pengelolahan & Dokumentasi Informasi</option>
                    <option>Publikasi</option>
                    <option>Kelembagaan</option>
                    <option>============</option>
                    <option>Pengelolahan Teknologi & Komunikasi</option>
                    <option>Aplikasi Teknologi & Komunikasi</option>
                    <option>Intastruktur Teknologi Informasi & Komunikasi</option>
                    <option>Tata Kelola Teknologi Informasi & Komunikasi</option>
                    <option>============</option>
                    <option>Persedian Dan LPSE</option>
                    <option>Persedian Dan Keamanan Informasi</option>
                    <option>Layanan Pengadaan Secara Elektronik</option>
                    <option>Telekomunikasi Dan Pengendalian</option>
                    <option>============</option>
                    <option>Statistik</option>
                    <option>Statistik Sosial</option>
                    <option>Statistik Ekonomi</option>
                    <option>Statistik SDA Dan Infastruktur</option>
                    <option>============</option>
                    <option>Balai Informasi Teknologi Edukasi</option>
                    <option>Tata Usaha</option>
                    <option>Pendataan Dan Jaringan</option>
                    <option>Pelayanan Dan Kerja Sama</option>

                  </select>
                </div>
                <div class="form-group">
                  <label>Eslon</label>
                 <select class="form-control" name="eslon">
                    <option>Pilih</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option> 
                </select>
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
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