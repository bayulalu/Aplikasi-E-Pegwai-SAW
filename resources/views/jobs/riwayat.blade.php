@extends('layouts.master')
@section('title', 'Riwayat')
@section('conten')
 <section class="content">

  @if (Auth::user()->eslon != 2)
  <section class="content-header">
    {{-- <h1>Beranda</h1>     --}}
  </section>
  <section class="content">
    <!-- Small boxes (Stat box) -->    

    <!-- TABLE: LATEST ORDERS -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Tugas yang terselesaikan</h3>

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
                  {{-- <th>No</th> --}}
                  <th>Tugas Untuk</th>
                  <th>Judul</th>
                  {{-- <th>Waktu Pemberian Tugas</th>
                  <th>Batas Waktu</th>
                  <th>Status</th> --}}
                  <th>Jenis Tugas</th> 
                  <th >Aksi</th>
                </tr>
                </thead>
                  {{-- @php
                    $no = 1;
                  @endphp --}}
                <tbody>

                   @foreach ($jobs2 as $job)
                   @if ($job->status == 'Acc')
                   @foreach ($job->users as $user)
                     @if ($user->id == Auth::user()->id)
                            
                <tr>
                  {{-- <td><a >{{$no}}</a></td>
                  @php
                    $no++;
                  @endphp --}}
                  <td>
                    @foreach ($job->users as $user)
                      {{$user->name}},
                    @endforeach
                    
                  </td>
                  <td>{{$job->title}}</td>
                  {{-- <td>{{$job->time}}</td>
                  <td>{{$job->deadLine}}</td> --}}
                  
                  {{-- <td>
                    @if ($job->status == 'belum')
                      Belum Selesai
                    @endif
                  </td> --}}
                  <td>
                    @if ($job->kualitas == 100)
                    sulit
                @elseif($job->kualitas == 75)
                    sedang
                @else
                    mudah
                @endif
                  </td>
                  
                  <td><a href="/rincian/{{$job->slug}}" class="btn btn-info"">Lihat</a></td>
                  @endif
                   @endforeach
                   @endif
                  @endforeach
                  {!! $jobs2->links() !!} 
                </tbody>
              </table>
            </div>
    </section>
  @endif

  @if (Auth::user()->eslon != 5)
{{-- Riwaayat Tugas yang di selesaikan   --}}
       {{-- <div class="jarak"></div> --}}
       <section class="content">
          {{-- <h1 class="text-center">Riwayat Tugas Selesai Yang di Berikan</h1> --}}
          <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Riwayat Tugas Selesai Yang di Berikan</h3>
                  </div>
                  <!-- /.box-header -->
                   <div class="box-body">
                    <div class="table-responsive">
                      <table class="table  no-margin">
                        <thead>
      
                        <tr>
                          {{-- <th>No</th> --}}
                          <th>Tugas Untuk</th>
                          <th>Judul</th>
                          {{-- <th>Waktu Pemberian Tugas</th> --}}
                          {{-- <th>Batas Waktu</th> --}}
                          {{-- <th>Status</th> --}}
                          <th>Jenis Tugas</th>
                          <th >Aksi</th>
                        </tr>
                        </thead>
                       
                        <tbody>
                          @foreach ($jobs as $job)
                        @if ($job->status == 'Acc')
                           
                        <tr>
                    
                          <td>
                            @foreach ($job->users as $user)
                              {{$user->name}},
                            @endforeach
                            
                          </td>
                          <td>{{$job->title}}</td>
                          {{-- <td>{{$job->time}}</td> --}}
                          {{-- <td>{{$job->deadLine}}</td> --}}
           
                          
                          <td>
                            @if ($job->kualitas == 100)
                                sulit
                            @elseif($job->kualitas == 75)
                                sedang
                            @else
                                mudah
                            @endif
                          </td>
                          
                         <td> <a href="/rincian/{{$job->slug}}" class="btn btn-info"">Lihat</a></td>
                          </tr>
                           @endif
                          @endforeach  
                          
                        </tbody>
                         
                      </table>
                      {!! $jobs->links() !!}  
                    </div>
        </section>
          
 </section>

 @endif
@endsection