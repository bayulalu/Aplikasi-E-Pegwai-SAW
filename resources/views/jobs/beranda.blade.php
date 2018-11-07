@extends('layout.master')
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
              <h3 class="box-title">Memonitoring Pekerjaan</h3>

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
                    <th >Aksi</th>
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
                    <td><a >{{$no}}</a></td>
                    @php
                      $no++;
                    @endphp
                    <td>
                      @if ($job->leader->status == 3)

                    

                     
                      @if (!empty($job->leaders))
                               @foreach ($job->leaders as $leader)
                                <span class="label label-success">{{$leader->user}}</span>
                              @endforeach
                      @endif
                    
                      @if (!empty($job->users))
                          @foreach ($job->users as $user)
                            <span class="label label-success">{{$user->user}}</span>
                          @endforeach
                      @endif
                           

                      {{-- buat tampilan sekertatis --}}
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
                    <td><a href="job/{{$job->slug}}" style="color:black">{{$job->title}}</a></td>
                    <td>
                      <div class="sparkbar"  data-height="20">{{$job->time}}</div>
                    </td>

                    <td>
                      <div class="sparkbar"  data-height="20">{{$job->deadLine}}</div>
                    </td>
                    @php
                     date_default_timezone_set('Asia/Makassar');
                      $date = date('Y-m-d');
                    @endphp

                    @if ($job->deadLine > $date)
                        <td><span class="label label-info">Belum brakhir</span></td>
                        @elseif($job->deadLine == $date)
                        <td><span class="label label-warning">Dead Line</span></td>
                        @else
                        <td><span class="label label-danger">Sudah Lewat</span></td>
                    @endif

                    <td>
                      <a href="acc/{{$job->id}}" onclick="return confirm('Apakah Anda Yakin Kerjaan Ini sudah Berhasil ?')" class="btn btn-primary">Acc</a>
                      <a href="job/{{$job->slug}}" class="btn btn-info">Baca</a>
                    </td>
                  </tr>
                     @endif
                    @endif
                  @endforeach
                  </tbody>
                </table>
              </div>
      </section>
@endsection
