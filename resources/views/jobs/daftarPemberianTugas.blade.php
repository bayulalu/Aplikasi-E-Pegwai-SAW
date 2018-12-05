@extends('layouts.master')
@section('title', 'Daftar Pemberian Tugas')
@section('conten')
	<section class="content">
		<h1 class="text-center">Daftar Pemberian Tugas</h1>
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Pemberian Tugas</h3>
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
                    
                    <td><a href="/rincian/{{$job->slug}}" class="btn btn-success"">Acc</a>
                    <a href="/pemberian-tugas/{{$job->id}}/edit" class="btn btn-warning">Edit</a>
                    <a href="/hapus-tugas/{{$job->id}}" class="btn btn-danger"">Hapus</a>
                    <a href="/rincian/{{$job->slug}}" class="btn btn-info"">Lihat</a></td>
                    
                    @endforeach      
                  </tbody>
                </table>
              </div>
	</section>
@endsection

