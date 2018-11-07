@extends('layout.master')
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
        <form  method="post" action="{{route('job')}}" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="row">
            
            <!-- /.col -->
            <div class="col-md-6">
              @if (Auth::user()->status == 3)
                <div class="form-group ">
                <label>Kabit </label>
               
                @if (old('user'))
                <select id="user" class="form-control select2" style="width: 100%;" name="user">
                  @foreach($users as $user)
                    <option value="{{$user->id}}"
                      @if (old('user') == $user->id)
                       selected @endif>{{$user->user}}</option>
                  @endforeach
                </select>

                @else

                  <select id="user" class="form-control select2" style="width: 100%;" name="user[]" multiple="multiple">
                    {{-- <option selected disabled>Pilih Kabit</option> --}}
                    <option value="" disabled>Pilih </option>
                    @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->user}}</option>
                    @endforeach
                  </select>
                @endif

                @if ($errors->has('user'))
                    <span >
                        <p id="bintang">{{ $errors->first('user') }}</p>
                    </span>
                  @endif
              </div>
              @endif

              @if (Auth::user()->status == 2 )
              <div class="form-group ">
                <label>Kasi </label>
                <select id="kasiStaf" class="form-control select2 kasiStaf2" style="width: 100%;" name="kasiStaf[]" multiple="multiple" >
                    @foreach($leaders->where('group', Auth::user()->group) as $leader)
                      <option value="{{$leader->id}}">{{$leader->user}}</option>
                    @endforeach
                </select>
                @if ($errors->has('kasiStaf'))
                    <span >
                        <p id="bintang">{{ $errors->first('kasiStaf') }}</p>
                    </span>
                  @endif
              </div>
              @endif

              @if (Auth::user()->status == 1)
                  <div class="form-group ">
                <label>Pilih Setaf </label>

                @if (old('stafKabit'))
                  <select id="stafKabit2" class="form-control select2" style="width: 100%;" name="stafKabit[]"  multiple="multiple">
                    @foreach($users as $user)

                      <option @foreach (old('stafKabit') as $oldStafKabit) value="{{$user->id}}" @if($oldStafKabit == $user->id)
                      selected  @endif  @endforeach >{{$user->user}}</option>
                    @endforeach
                  </select>

                @else
                <select id="stafKabit2" class="form-control select2" style="width: 100%;" name="stafKabit[]"  multiple="multiple">
                    @foreach($users as $user)
                      <option value="{{$user->id}} ">{{$user->user}}</option>
                    @endforeach
                  </select>
                @endif
                @if ($errors->has('stafKabit'))
                    <span >
                        <p id="bintang">{{ $errors->first('stafKabit') }}</p>
                    </span>
                  @endif
              </div>
              @endif

              @if (Auth::user()->status > 1)
                
              
              <label>Apakah Anda Ingin Meneruskan Tugas ini ? </label>
              <div class="form-group" id="radio">

                <div class="input-group">
                   <div class="radio">
                    <label>
                      <input type="radio" name="type" id="optionsRadios2" value="tidak" checked class="jabtan" {{old('type') == "tidak" ? 'checked='.'"'.'checked'.'"' : '' }}>Tidak 
                    </label><br>
                    @if (Auth::user()->status == 3  || Auth::user()->status == 2)
                    <label>
                      <input type="radio" name="type" id="optionsRadios2" value="stafKabit"  class="jabtan" {{old('type') == "stafKabit" ? 'checked='.'"'.'checked'.'"' : '' }}>Lanjutkan Ke Staf Kabit 
                    </label>
                    @endif

                  </div>
                  @if (Auth::user()->status == 3)
                  <div class="radio">
                    <label>
                      <input type="radio" name="type" id="optionsRadios2" value="kasi" class="jabtan" {{old('type') == "kasi" ? 'checked='.'"'.'checked'.'"' : '' }}>Teruskan Ke Kasi 
                    </label>
                  </div>
                  @endif

                  <div class="radio">
                    <label>
                      <input type="radio" name="type" id="optionsRadios2" value="setaf" class="jabtan" {{old('type') == "setaf" ? 'checked='.'"'.'checked'.'"' : '' }}>Setaf Kasi 
                    </label>
                  </div>

                  </div>
                  </div>
                @endif

                  {{-- setaf kabit --}}
                <div class="form-group" id="setafkabit">
                <label>Pilih Setaf Kabit</label>
                <small class="label label-danger tes loading"><i class="fa fa-clock-o"></i> Loading ...</small>
                <select class="form-control select2" name="setafkabit[]" id="stfkabit" multiple="multiple" data-placeholder="Nama"
                        style="width: 100%;">
                      @foreach($users as $user)
                        <option value="{{$user->id}} ">{{$user->user}}</option>
                      @endforeach
                </select>
                 @if ($errors->has('setafkabit'))
                    <span >
                        <p id="bintang">{{ $errors->first('setafkabit') }}</p>
                    </span>
                  @endif

              </div>

                  {{-- kasi --}}
              <div class="form-group" id="kekasi">
                <label>Pilih Kasi</label>
                <small class="label label-danger loading tes"><i class="fa fa-clock-o"></i> Loading ...</small>
                <select class="form-control select2" name="kekasi[]" id="kekasi2" multiple="multiple" data-placeholder="Nama"
                        style="width: 100%;">
                        <option disabled>Pilih</option>
                @foreach($leaders->where('group', Auth::user()->group) as $leader)
                    <option value="{{$leader->id}}">{{$leader->user}}</option>
                @endforeach
                </select>
                 @if ($errors->has('kekasi'))
                    <span >
                        <p id="bintang">{{ $errors->first('kekasi') }}</p>
                    </span>
                  @endif

              </div>
           
                  {{-- BUAT TANPILAN SETAF --}}
              <div id="kestaf">
                @if (Auth::user()->status == 3)
               <div class="form-group ">
                <label>Kasi </label>
                <select id="kasiStaf" class="form-control select2" style="width: 100%;" name="kasiStaf[]" multiple="multiple" >
                    @foreach($leaders->where('group', Auth::user()->group) as $leader)
                      <option value="{{$leader->id}}">{{$leader->user}}</option>
                    @endforeach
                </select>
                @if ($errors->has('kasiStaf'))
                    <span >
                        <p id="bintang">{{ $errors->first('kasiStaf') }}</p>
                    </span>
                  @endif
              </div>
                @endif

              <div class="form-group ">
                <label>Pilih Setaf</label>
                <small class="label label-danger tes loading "><i class="fa fa-clock-o"></i> Loading ...</small>
                <select   class="form-control select2" name="staf[]" id="stafKasi" multiple="multiple" data-placeholder="Nama"
                        style="width: 100%;">
                        <option >Pilih </option>
                </select>
                 @if ($errors->has('staf'))
                    <span >
                        <p id="bintang">{{ $errors->first('staf') }}</p>
                    </span>
                  @endif

              </div>
              </div>            
              <!-- /.form-group -->
            
              <!-- /.form-group -->
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
                <div class="form-group">
                  <label>Jenis Tugas</label>
                  <input type="text" class="form-control" name="jenisTugas" placeholder="Jenis Tugas" value="{{old('jenisTugas')}}">
                  @if ($errors->has('jenisTugas'))
                    <span >
                        <p id="bintang">{{ $errors->first('jenisTugas') }}</p>
                    </span>
                  @endif
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
                  <input type="text" class="form-control" placeholder="Judul" name="judul" value="{{old('judul')}}">
                  @if ($errors->has('judul'))
                    <span >
                        <p id="bintang">{{ $errors->first('judul') }}</p>
                    </span>
                  @endif
                </div>
              </div>
              <br>
              <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="ket" class="form-control" rows="3" placeholder="Ket" id="tinytextarea">{{old('ket')}}</textarea>
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

$("#user").change(function() {
    $('.tes').removeClass('loading');
    var terpilih =  $('#user').val();
   
     $.ajax({
        url : '/ketuaDevisi/kasi/',
        method : "POST",
        data : {
          "_token": "{{ csrf_token() }}",
          "terpilih" : terpilih
        }
      }).done(function(hasil){
        $('#kekasi2').html(hasil);
        $('#kasiStaf').html(hasil);
         $('.tes').addClass('loading');
        // console.log(hasil);
      });


      $.ajax({
        url : '/ketuaDevisi/setafkabit/',
        method : "POST",
        data : {
          "_token": "{{ csrf_token() }}",
          "terpilih" : terpilih
        }
      }).done(function(hasil){
        $('#stfkabit').html(hasil);
         $('.tes').addClass('loading');
      });

    
  });


// setaf yang paling bawah 
$("#kasiStaf").change(function() {
  
   var terpilih =  $('#kasiStaf').val();
   // console.log(terpilih);
    $.ajax({
        url : '/ketuaDevisi/stfKasi/',
        method : "POST",
        data : {
          "_token": "{{ csrf_token() }}",
          "terpilih" : terpilih
        }
      }).done(function(hasil){
        $('#stafKasi').html(hasil);
      });
  

});

// cekckbox
// cek = 'tidak';
var cek = $("input[name='type']:checked").val();



  $('.jabtan').change(function() {
    var tes = $("input[name='type']:checked").val();
    cek = tes;
   
    if (cek == "tidak") { 
        $('#stafKabit2').removeAttr('disabled');
        $('#setafkabit, #kekasi, #kestaf').slideUp('fast');
        $('#stfkabit, #kekasi2, #stafKasi').val(null).trigger('change');
       
    } else if(cek == "kasi") {

        $('#stfkabit,#stafKabit2, #kekasi2, #kasiStaf, #stafKasi').val(null).trigger('change');
        $('#stafKabit2').attr('disabled', 'disabled');
        $('#setafkabit, #kestaf').slideUp('fast');
        $("#kekasi").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
    
    }else if(cek == 'stafKabit'){
        $('#stfkabit, #kekasi2, #kasiStaf, #stafKasi').val(null).trigger('change');
        $('#stafKabit2, #kasiStaf').attr('disabled', 'disabled');
        $('#setafkabit').slideDown('fast');
        $("#kekasi, #kestaf").slideUp("fast");
    
    }else{
        $('#stfkabit, #kekasi2, #stafKasi').val(null).trigger('change');
        $('#stafKabit2').attr('disabled', 'disabled');
        $("#kekasi").slideUp("fast"); 
        $("#kestaf").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
    }
  });

if (typeof(cek) == 'undefined') {
  cek = 'tidak';
}

   if (cek == "tidak") { 
        $('#setafkabit, #kekasi, #kestaf').slideUp('fast');
        $('#stfkabit, #kekasi2, #kasiStaf, #stafKasi').val(null).trigger('change');
       
    } else if(cek == "kasi") {
        $('#stfkabit, #kekasi2, #kasiStaf, #stafKasi').val(null).trigger('change');
        $('#stafKabit2').attr('disabled', 'disabled');
        $('#setafkabit, #kestaf').slideUp('fast');
        $("#kekasi").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
    
    }else if(cek == 'stafKabit'){
        $('#stfkabit, #kekasi2, #kasiStaf, #stafKasi').val(null).trigger('change');
        $('#stafKabit2').attr('disabled', 'disabled');
        $('#setafkabit').slideDown('fast');
        $("#kekasi, #kestaf").slideUp("fast");
    
    }else{
        $('#stfkabit, #kekasi2, #kasiStaf, #stafKasi').val(null).trigger('change');
        $('#stafKabit2').attr('disabled', 'disabled');
        $("#kekasi, #setafkabit").slideUp("fast"); 
        $("#kestaf").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
    }
  })
	</script>
@endsection