
@extends('layout.master')
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
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                    @foreach ($jobs as $job)
                    @if ($job->isOwner())
                    @if ($job->status != 'Acc')
                  <tr>
                    <td><a href="#">{{$no}}</a></td>
                    
                    <td>
                      
                      @if ($job->leader->status == 3)

                        @if (!empty($job->users))
                          @foreach ($job->users as $user)
                            <span class="label label-success">{{$user->user}}</span>
                          @endforeach
                          @endif

                          @if (!empty($job->leaders))
                           
                               @foreach ($job->leaders as $leader)
                                <span class="label label-success">{{$leader->user}}</span>
                              @endforeach


                      @endif
                      {{-- buat status 2 --}}
                       @elseif($job->leader->status == 2)
                        @if (!empty($job->users))
                            @foreach ($job->users as $user)
                              <span class="label label-success">{{$user->user}}</span>
                            @endforeach
                        @endif

                        @if (!empty($job->leaders))
                            @if ($job->leaders->count() > 1)
                                @foreach ($job->leaders as $leader)
                                   @if ($leader->status != 2)
                                     <span class="label label-success">{{$leader->user}}</span>, 
                                   @endif
                                @endforeach

                            @endif
                        @endif
                        {{-- buat 3 --}}
                        @elseif($job->leader->status == 1)
                          {{-- @if (!empty($job->users)) --}}
                            @foreach ($job->users as $user)
                              <span class="label label-success">{{$user->user}}</span>
                            @endforeach
                        {{-- @endif --}}
                      @endif
                    </td>
                    <td>{{$job->title}}</td>
                    <td>
                      <div class="sparkbar"  data-height="20">{{$job->time}}</div>
                    </td>

                    <td>
                      <div class="sparkbar"  data-height="20">{{$job->deadLine}}</div>
                    </td>

                     <td>{{$job->status}}</td>

                    <td><a href="delete/{{$job->id}}" onclick="return confirm('Apakah Anda Yakin Ingin Mengapus Kerjaan ini ?')" class="btn btn-danger">Hapus</a> || <a href="edit/{{$job->id}}" class="btn btn-primary">Ubah</a></td>
                  </tr>
                    @php
                      $no++;
                    @endphp
                    @endif
                    @endif
                    @endforeach
                  
                  </tbody>
                </table>
              </div>
	</section>
@endsection