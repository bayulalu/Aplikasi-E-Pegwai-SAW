@extends('layout.master')
@section('title', 'Riwayat')
@section('conten')
 <section class="content">


{{-- Riwaayat Tugas yang di selesaikan   --}}
@if ($leaders->status != 3)

<div class="box box-success">
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
                    <th>Pemberi Tugas</th>
                    <th>Untuk</th>
                    <th>Judul</th>
                    <th>Waktu Pemberian Tugas</th>
                    <th>Batas Waktu</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                  @foreach ($leaders->jobs as $job)
                  @if ($job->status == 'Acc')                  
                  <tr>
                    <td>{{$no}}</td>
                    @php
                      $no++;
                    @endphp
                    <td>{{$job->leader->user}}</td>
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
                    <td>{{$job->title}}</td>
                    <td>
                      <div class="sparkbar"  data-height="20">
                      {{$job->time}}
                    </div>
                    </td>

                    <td>
                      <div class="sparkbar"  data-height="20">
                        {{$job->deadLine}}
                      </div>
                    </td>
                   
                   
                    <td><span class="label label-success">{{$job->status}}</span></td>
                        
                  </tr>
                  @endif
                  @endforeach
                  
                  </tbody>
                </table>
              </div>
            </div></div>
@endif
              <div class="jarak"></div>
            {{-- rRiwayat TUgas yang di berikan dan selesai  --}}
       	<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Riwayat Tugas Selesai Yang di Berikan</h3>

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
                    <th>Judul</th>
                    <th>Waktu Pemberian Tugas</th>
                    <th>Batas Waktu</th>
                    <th>Status</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                    @foreach ($jobs as $job)
                    
                    @if ($job->status == 'Acc')
                     @if ($job->isOwner())
                  <tr>
                    <td>{{$no}}</td>
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
                    <td>{{$job->title}}</td>
                    <td>
                      <div class="sparkbar"  data-height="20">{{$job->time}}</div>
                    </td>

                    <td>
                      <div class="sparkbar"  data-height="20">{{$job->deadLine}}</div>
                    </td>
                    <td><span class="label label-success">{{$job->status}}</span></td>                    
                  </tr>
                     @endif
                     @endif
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

 </section>
@endsection