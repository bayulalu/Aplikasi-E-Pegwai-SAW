@extends('layout.master')
@section('title', 'Tugas')
@section('conten')

<section class="content">
<div class="row">
	<div class="jarak"></div>
<div class="col-sm-7 col-sm-offset-2">
		{{-- <div class="col-md-6"> --}}
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img 
                @if (Auth::user()->foto == '')
                  src="{{ asset('img/avatar5.png') }}" 
                @else
                  src="{{asset('storage/fotoKetua/'.Auth::user()->foto)}}"
                @endif
                 class="img-circle" alt="User Image">
                <span class="username"><a href="#">{{$job->leader->user}}</a></span>
                <span class="description">{{$job->time}}</span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->
              <div id="kont">
              <p>Dari : {{$job->leader->user}}</p>
              <p>Untuk :@if ($job->leader->status == 3)

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
              <p>Judul : {{$job->title}}</p>
              <p>Tanggal Pemberian Tugas : {{$job->time}}</p>
              <p>Batas : {{$job->deadLine}}</p>

              <span>Keterangan : 
                @php
                  echo $job->ket
                @endphp </span>
              </div>
             
              <!-- Social sharing buttons -->
              
            </div>
            <!-- /.box-body -->
            <div class="box-footer box-comments">
              @foreach ($job->comments as $jobb)
              <div class="box-comment">
               
                <div class="comment-text">
                   <b>{{$jobb->name}}</b><br>
                     {{$jobb->conten}}
                      
                </div>
                <!-- /.comment-text -->
              </div>
                  @endforeach
              <!-- /.box-comment -->
           
              <!-- /.box-comment -->
            </div>
                      <!-- /.box-footer -->
            <div class="box-footer">
              <form action="/ketuaDevisi/comment/{{$job->id}}" method="POST">
                {{csrf_field()}}
                <div class="input-group">
                  <input type="text" name="tanggapan" placeholder="Tanggapi" class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-flat">kirim</button>
                      </span>
                </div>

                @if ($errors->has('tanggapan'))
                  <span class="invalid-feedback" id="bintang">{{ $errors->first('tanggapan') }}</span>
                @endif

        
                
              </form>
            </div>
          <!-- /.box -->
        </div>
</div></div>
</section>

@endsection