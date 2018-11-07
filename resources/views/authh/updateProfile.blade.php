@extends('layout.master')
@section('title', 'Ubah Profile')
@section('conten')
<section class="content">
<div class="content-wrapper">
    
    <section class="content">
      <br><br>
      <div class="row" >
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="/ketuaDevisi/ubahProfile/{{$user->id}}" enctype="multipart/form-data">
              @csrf
              <div class="box-body">

                <div class="form-group"> 
                  <label>Nip</label><br>
                  <input type="text" name="nip" value="{{old('nip') ? old('nip')  :$user->nip}}">
                  @if ($errors->has('nip'))
                    <p class="help-block" id="bintang">
                       {{ $errors->first('nip') }}
                    </p>
                  @endif
                </div>

                <div class="form-group">
                  <label>User</label><br>
                  <input type="text" name="user" value="{{old('user') ? old('user')  :$user->user}}">
                  @if ($errors->has('user'))
                    <p class="help-block" id="bintang">
                       {{ $errors->first('user') }}
                    </p>
                  @endif
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Upload Foto<b id="bintang"></b></label>
                  <input type="file" id="exampleInputFile" name="foto">
                  @if ($errors->has('foto'))
                    <p class="help-block" id="bintang">
                       {{ $errors->first('foto') }}
                    </p>
                  @endif
                </div>

              </div>
              
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
          <!-- /.box -->

          
        
</section>
@endsection