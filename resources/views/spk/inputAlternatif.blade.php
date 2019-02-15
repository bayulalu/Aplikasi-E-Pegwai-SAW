@extends('layouts.master')
@section('title', 'Form Pengisian Nilai Alternatif')
@section('conten')


 <section class="content">


      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Form Pengisian Nilai Alternatif</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <form method="post" action="/masukan-nilai-alternatif/{{$user->id}}">
           {{csrf_field()}}
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control " name="name" value="{{$user->name}}" disabled>
          </div>

          <div class="form-group">
            <label >Orientasi pelayanan</label>
            <input type="hidden" value="4" name="op">
           <select class="form-control input-sm" name="op2">
             <option value="">Pilih</option>
              <option value="95">Sangat Baik</option>
              <option value="85">Baik</option>
              <option value="73">Cukup </option>
              <option value="60">Buruk</option>
              <option value="40">Sangan Buruk</option>
            </select>
            @if ($errors->has('op2'))
            <span >
                <p id="bintang">Tidak Boleh Kosong</p>
            </span>
           @endif
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Integrasi</label>
            <input type="hidden" value="5" name="integrasi">
           <select class="form-control input-sm" name="integrasi2">
              <option value="">Pilih</option>
              <option value="95">Sangat Baik</option>
              <option value="85">Baik</option>
              <option value="73">Cukup </option>
              <option value="60">Buruk</option>
              <option value="40">Sangan Buruk</option>
            </select>
            @if ($errors->has('integrasi2'))
            <span >
                <p id="bintang">Tidak Boleh Kosong</p>
            </span>
           @endif
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Komitmen</label>
            <input type="hidden" value="6" name="komitmen">
           <select class="form-control input-sm" name="komitmen2">
              <option value="">Pilih</option>
              <option value="95">Sangat Baik</option>
              <option value="85">Baik</option>
              <option value="73">Cukup </option>
              <option value="60">Buruk</option>
              <option value="40">Sangan Buruk</option>
            </select>
            @if ($errors->has('komitmen2'))
            <span >
                <p id="bintang">Tidak Boleh Kosong</p>
            </span>
           @endif
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Disiplin</label>
            <input type="hidden" value="7" name="disiplin">
           <select class="form-control input-sm" name="disiplin2">
              <option value="">Pilih</option>
              <option value="95">Sangat Baik</option>
              <option value="85">Baik</option>
              <option value="73">Cukup </option>
              <option value="60">Buruk</option>
              <option value="40">Sangan Buruk</option>
            </select>
            @if ($errors->has('disiplin2'))
            <span >
                <p id="bintang">Tidak Boleh Kosong</p>
            </span>
           @endif
          </div>

         <div class="form-group">
            <label for="exampleInputPassword1">Kerja sama</label>
            <input type="hidden" value="8" name="ks">
           <select class="form-control input-sm" name="ks2">
              <option value="">Pilih</option>
             <option value="95">Sangat Baik</option>
              <option value="85">Baik</option>
              <option value="73">Cukup </option>
              <option value="60">Buruk</option>
              <option value="40">Sangan Buruk</option>
            </select>
            @if ($errors->has('ks2'))
            <span >
                <p id="bintang">Tidak Boleh Kosong</p>
            </span>
           @endif
          </div>

           <div class="form-group">
            <label for="exampleInputPassword1">Kepemimpinan</label>
            <input type="hidden" value="9" name="kepemimpinan">
           <select class="form-control input-sm" name="kepemimpinan2">
              <option value="">Pilih</option>
              <option value="95">Sangat Baik</option>
              <option value="85">Baik</option>
              <option value="73">Cukup </option>
              <option value="60">Buruk</option>
              <option value="40">Sangan Buruk</option>
            </select>
            @if ($errors->has('kepemimpinan2'))
            <span >
                <p id="bintang">Tidak Boleh Kosong</p>
            </span>
           @endif
          </div>

          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
      <!-- /.box -->

    </section>
@endsection

@section('skereip')

<script src="{{ asset('asset/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('asset/select2/dist/js/select2.full.min.js') }}"></script>


<script src="{{ asset('asset/dist/js/adminlte.min.js') }}"></script>

@endsection
