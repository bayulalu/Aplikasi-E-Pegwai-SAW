@extends('layouts.master')
@section('title', 'Form Pemberian Tugas')
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

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Form Pemberian Tugas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <form  method="post" action="/pemberian-tugas/{{$job->id}}" enctype="multipart/form-data">
          {{csrf_field()}}
          <input type="hidden" name="_method" value="PUT">
          
          <div class="row">
            
            <!-- /.col -->
            <div class="col-md-6">
             <label>Apakah Anda Ingin Meneruskan Tugas ini ? </label>
              <div class="form-group" id="radio">

                <div class="input-group">

                   <div class="radio">
                    @if($usr->eslon == 2)
                      <label>
                        <input type="radio" name="type" id="optionsRadios2" value="kabit"  class="jabtan" {{old('type') == "kabit" ? 'checked='.'"'.'checked'.'"' : '' }}>Kabit 
                      </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @endif

                    @if($usr->eslon <= 3)
                     <label>
                      <input type="radio" name="type" id="optionsRadios2" value="kasi" class="jabtan" {{old('type') == "kasi" ? 'checked='.'"'.'checked'.'"' : '' }}>Kasi
                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @endif
                    
                    <label>
                      <input type="radio" checked name="type" id="optionsRadios2" value="staf"  class="jabtan" {{old('type') == "staf" ? 'checked='.'"'.'checked'.'"' : '' }}>Setaf 
                    </label>
                    
                  {{-- </div> --}}
                  {{-- <div class="radio"> --}}
                   
                  </div>

                  </div>

                  {{-- input dinamis --}}

                <div class="form-group" id="kabit">
                <label>Pilih Kabit</label>
                <small class="label label-danger loading tes"><i class="fa fa-clock-o"></i> Loading ...</small>
                <select class="form-control select2" name="sectors[]" id="kabit" multiple="multiple" data-placeholder="Nama"
                        style="width: 100%;">
                        <option disabled>Pilih</option>
                @foreach($users->where('eslon', 3) as $user)
                    <option value="{{$user->id}}">{{$user->name. ' - '. $user->sector}}</option>
                @endforeach
                </select>
                 @if ($errors->has('sectors'))
                    <span >
                        <p id="bintang">{{ $errors->first('sectors') }}</p>
                    </span>
                  @endif

              </div>
              {{-- kedua --}}
                  
                <div class="form-group " id="kasi">
                <label>Pilih Kasi </label>
                <select id="kasi" class="form-control select2" style="width: 100%;" name="sectors[]" multiple="multiple" data-placeholder="Nama" >
                    @foreach($users->where('eslon', 4) as $user)
                      <option value="{{$user->id}}">{{$user->name. ' - '. $user->sector}}</option>
                    @endforeach
                </select>
                @if ($errors->has('sectors'))
                    <span >
                        <p id="bintang">{{ $errors->first('sectors') }}</p>
                    </span>
                  @endif
              </div>

              {{-- tiga --}}
               <div class="form-group" id="staf">
                <label>Pilih Setaf</label>
                <small class="label label-danger tes loading "><i class="fa fa-clock-o"></i> Loading ...</small>
                <select   class="form-control select2" name="sectors[]" id="staf" multiple="multiple" data-placeholder="Nama"
                        style="width: 100%;">
                      @foreach ($users->where('eslon', 5) as $user)
                           <option value="{{$user->id}}">{{$user->name. ' - '. $user->sector}}</option>
                      @endforeach
                </select>
                 @if ($errors->has('sectors'))
                    <span >
                        <p id="bintang">{{ $errors->first('sectors') }}</p>
                    </span>
                  @endif

              </div>

              </div>

              {{--  --}}
                
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Waktu Pemberian Tugas</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker2" value="{{$date}}" name="waktuSekarang">

                </div>
              </div>

               <div class="form-group">
                <label>Batas Waktu:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="batasWaktu" value="{{old('batasWaktu')}}">
                  @if ($errors->has('batasWaktu'))
                    <span >
                        <p id="bintang">{{ $errors->first('batasWaktu') }}</p>
                    </span>
                  @endif
                </div>
              </div>

                <div class="form-group">
                  <label>Jenis Tugas</label>
                  <select class="form-control level" name="level">
                    <option checked id="levelPilih">Pilih</option>
                    <option >Ringan</option>
                    <option>Sedang</option>
                    <option>Sulit</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

           <div class="form-group">
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" class="form-control" placeholder="Judul" name="title" value="{{old('title') ? old('title') : $job->title}}">
                  @if ($errors->has('title'))
                    <span >
                        <p id="bintang">{{ $errors->first('title') }}</p>
                    </span>
                  @endif
                </div>
              </div>
              <br>
              <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="ket" class="form-control" rows="3" placeholder="Ket" id="tinytextarea">{{old('ket') ? old('ket') : $job->ket}}</textarea>
                  @if ($errors->has('ket'))
                    <span >
                        <p id="bintang">{{ $errors->first('ket') }}</p>
                    </span>
                  @endif
                </div>

                <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-info pull-right">Simpan</button>
                {{-- <button type="submit" class="btn btn-default">Cancel</button> --}}
              </div>
               
          {{--  --}}
        </div>
          </form>
      </div>
      <!-- /.box -->

    </section>
@endsection

@section('skereip')

<script src="{{ asset('asset/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('asset/select2/dist/js/select2.full.min.js') }}"></script>


<script src="{{ asset('asset/dist/js/adminlte.min.js') }}"></script>
<script type="text/javascript">
		$(function () {
    //Initialize Select2 Elements
    $('.selectKabit').select2();
    $('.select2').select2()


    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
      startDate: '-1d'
    });

    $('#datepicker2').datepicker({
       autoclose: true,
      format: 'yyyy-mm-dd',
      // startDate: '-3d'
    });

// cekckbox
// cek = 'tidak';

var cek = $("input[name='type']:checked").val();

  $('.jabtan').change(function() {
    var jabtan = $("input[name='type']:checked").val();
    cek = jabtan;

    if (cek == "kabit") { 
        $('#kasi, #staf').removeAttr('disabled');
        $('#kasi, #staf').val(null).trigger('change');

        $('#kasi, #staf').slideUp('fast');
        $('#kabit').slideDown('fast');
       
    } else if(cek == "kasi") {
        $('#kabit, #staf').removeAttr('disabled');
        $('#kabit, #staf').val(null).trigger('change');

        $('#kabit, #staf').slideUp('fast');
        $("#kasi").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
    
    }else if(cek == 'staf'){
        $('#kasi, #kabit').removeAttr('disabled');
        $('#kasi, #kabit').val(null).trigger('change');

        $('#kasi, #kabit').slideUp('fast');
        $("#staf").slideDown("fast");
    
    }

  });

if (typeof(cek) == 'undefined') {
  cek = 'kabit';
}

    if (cek == "kabit") { 
        $('#kasi, #staf').removeAttr('disabled');
        $('#kasi, #staf').val(null).trigger('change');
        $('#kasi, #staf').slideUp('fast');
        $('#kabit').slideDown('fast');
       
    } else if(cek == "kasi") {

        $('#kabit, #staf').removeAttr('disabled');
        $('#kabit, #staf').val(null).trigger('change');
        $('#kabit, #staf').slideUp('fast');
        $("#kasi").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
    
    }else if(cek == 'staf'){
        $('#kasi, #kabit').removeAttr('disabled');
        $('#kasi, #kabit').val(null).trigger('change');

        $('#kasi, #kabit').slideUp('fast');
        $("#staf").slideDown("fast");
    
    }

    $('.level').change(function() {
      $('#levelPilih').remove();
    });

  })
	</script>
@endsection