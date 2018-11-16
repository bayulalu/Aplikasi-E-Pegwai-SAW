
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
                    <th >Aksi</th>
                  </tr>
                  </thead>
                    @php
                      $no = 1;
                    @endphp
                  <tbody>
  
                     @foreach ($jobs as $job)
                     @foreach ($job->users as $user)
                       @if ($user->id == Auth::user()->id)
                              
                  <tr>
                    <td><a >{{$no}}</a></td>
                    @php
                      $no++;
                    @endphp
                    <td>
                      @foreach ($job->users as $user)
                        {{$user->name}},
                      @endforeach
                      
                    </td>
                    <td>{{$job->title}}</td>
                    <td>{{$job->time}}</td>
                    <td>{{$job->deadLine}}</td>
                    
                    <td>
                      @if ($job->status == 'belum')
                        Belum Selesai
                      @endif
                    </td>
                    <td>{{$job->level}}</td>
                    
                    <td><a href="/rincian/{{$job->slug}}" class="btn btn-info"">Lihat</a></td>
                    @endif
                     @endforeach
                    @endforeach

                  </tbody>
                </table>
              </div>
      </section>
@endsection
