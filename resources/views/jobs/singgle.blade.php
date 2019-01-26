@extends('layouts.master')
@section('title', 'Tugas')
 
 
@section('conten')
<script src="{{ asset('asset/tinymce/js/tinymce/tinymce.min.js') }}
"></script>
<script type="text/javascript">
    tinymce.init({
      selector : '#tinytextarea',
      menubar : false,
      plugins : 'codesample,image,jbimages',
      toolbar  : 'bold, italic, underline, strikethrough, alignleft, aligncenter, alignright, alignjustify, fontselect, fontsizeselect, bullist'
    });
 </script>
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
                <span class="username"><a href="#">{{$job->user->name}}</a></span>
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
              <p>Dari : {{$job->user->name}}</p>
              <p>Untuk :
                        @foreach ($job->users as $user)
                          {{$user->name}},
                        @endforeach

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
            
            <div class="box-footer">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tanggapan
                
              </h3>
             
              <!-- /. tools -->
            </div>

            <div class="box-footer box-comments">
              @foreach ($job->comments as $jobb)
             
              <div class="box-comment">
               
                <div class="comment-text">
                   <b>{{$jobb->user->name}}</b><br>
                   {{-- <b>Bayu</b> --}}
                   @php
                     echo $jobb->conten
                   @endphp
                     
                     
                </div>
                <!-- /.comment-text -->
              </div>
                  @endforeach
              <!-- /.box-comment -->
           
              <!-- /.box-comment -->
            </div>


            <!-- /.box-header -->
            <div class="box-body pad">
              <form action="/tanggapan-tugas/{{$job->id}}" method="POST">
               <div class="form-group">
                {{csrf_field()}}
                  <label>Tanggapi</label>
                  <textarea name="tanggapan" class="form-control" rows="3" placeholder="Ket" id="tinytextarea">{{old('tanggapan')}}</textarea>
                  @if ($errors->has('tanggapan'))
                    <span >
                        <p id="bintang">{{ $errors->first('tanggapan') }}</p>
                    </span>
                  @endif
                </div>
                <div class="row">
                  <div class="col-sm-3 col-sm-offset-9">
                    
                <div class="form-group">
                  <button type="submit" class="btn btn-block btn-primary btn-sm">Kirim</button>
                  
                </div>
                  </div>
                </div>
                </form>
            </div>
          </div>
              {{--  --}}
            </div>
          <!-- /.box -->
        </div>
</div></div>
</section>

@endsection

@section('skereip')
  <script>
  $(function () {
    tinymce.init({
      selector : '#tinytextarea',
      menubar : false,
      plugins : 'codesample,image,jbimages',
      toolbar  : 'bold, italic, underline, strikethrough, alignleft, aligncenter, alignright, alignjustify, fontselect, fontsizeselect, bullist'
    });
  })
</script>
@endsection