@extends('layouts.master')
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
            <!-- /.box-body -->
           {{--  <div class="box-footer box-comments">
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
            </div> --}}
                      <!-- /.box-footer -->
            <div class="box-footer">
              {{-- <form action="/ketuaDevisi/comment/{{$job->id}}" method="POST">
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

        
                
              </form> --}}
              <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tanggapan
                {{-- <small>Simple and fast</small> --}}
              </h3>
             
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form>
                <textarea class="textarea" 
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    // CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    // $('.textarea').wysihtml5()

    $('.textarea').wysihtml5({
      "font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
      "emphasis": false, //Italics, bold, etc. Default true
      "lists": false, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
      "html": false, //Button which allows you to edit the generated HTML. Default false
      "link": false, //Button to insert a link. Default true
      "image": false, //Button to insert an image. Default true,
      "color": false //Button to change color of font  
    });
  })
</script>
@endsection