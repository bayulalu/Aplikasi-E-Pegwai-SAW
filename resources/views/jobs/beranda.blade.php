@extends('layouts.master')
@section('title', 'Beranda')
@section('conten')
  <section class="content-header">
      <h1>Beranda</h1>    
    </section>
    <section class="content">
      <!-- Small boxes (Stat box) -->    

      <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Tugas</h3>

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
                    <th>Tugas Untuk</th>
                    <th>Judul</th>
                    <th>Waktu Pemberian Tugas</th>
                    <th>Batas Waktu</th>
                    <th>Status</th>
                    <th>Jenis Tugas</th>
                    {{-- <th >Aksi</th> --}}
                  </tr>
                  </thead>
                  <tbody>
                    <th>1</th>
                    <th>Alex</th>
                    <th>Rapat</th>
                    <th>12/2/2018</th>
                    <th>20/2/2018</th>
                    <th>Belum selesai</th>
                    <th>RIngan</th>
                  </tbody>
                </table>
              </div>
      </section>
@endsection
