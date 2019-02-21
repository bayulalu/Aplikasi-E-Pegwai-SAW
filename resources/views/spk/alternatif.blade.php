
@extends('layouts.master')
@section('title', 'Parameter')
@section('conten')
<section class="content">
@if (session('msg'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-check"></i> Berhasil</h4>
  Data Berhasil Dimasukan
</div>
@endif
  <section class="content-header">
      <h1>Alternatif Yang Belemu Terisi</h1>    
    </section>
    <section class="content">
      <!-- Small boxes (Stat box) -->    

      <!-- TABLE: LATEST ORDERS -->
      <form method="GET" action="alternatif">
      <select name="search">
        <option value="">Pilih</option>
        <option value="Sekertaris">Kesekrateriatan</option>
        <option value="Informasi & Komuikasi Public">Bidang Informasi Dan Komunikasi Publik</option>
        <option value="Pengelolahan Teknologi & Komunikasi">Bidang Pengelolaan Teknologi Informasi Dan Komunikasi</option>
        <option value="Persedian Dan LPSE">Bidang Persandian Dan LPSE</option>
        <option value="Balai Informasi Teknologi Edukasi">Balai ITE</option>
        <option value="Statistik">Statisitk</option>
      </select>
      <button class="btn btn-primary">Tampilkan</button>
      </form>
      <br>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Nilai Alternatif</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table  no-margin">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>bidang</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                    @php
                      $no = 1;
                    @endphp
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <td>{{$no}}</td>
                      @php
                        $no++
                      @endphp
                      <td>{{$user->name}}</td>
                      <td>{{$user->sector}}</td> 
                      <td>
                         <a href="/masukan-nilai-alternatif/{{$user->id}}" class="btn btn-primary">Masukan Nilai </a>
                       </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
      </section>
@endsection
