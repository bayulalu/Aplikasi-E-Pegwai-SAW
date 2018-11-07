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
              <h3 class="box-title">Ubah Kata Sandi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="/ketuaDevisi/ubahSandi/{{$user->id}}/edit" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="_method" value="put">
              <div class="box-body">

                <div class="form-group">
                  <label>Kata Sandi</label><br>
                  <input type="password" name="kataSandi" class="form-control">
                  @if ($errors->has('kataSandi'))
                    <p class="help-block" id="bintang">
                       {{ $errors->first('kataSandi') }}
                    </p>
                    @elseif(session('pass'))
                      <p class="help-block" id="bintang">
                       {{session('pass')}}
                    </p>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Kata Sandi Baru</label><br>
                  <input type="password" name="password" class="form-control">
                  @if ($errors->has('password'))
                    <p class="help-block" id="bintang">
                       {{ $errors->first('password') }}
                    </p>
                  @endif
                </div>

                 <div class="form-group">
                  <label>Konfirmasi</label><br>
                  <input type="password" name="password_confirmation" class="form-control">
                 
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