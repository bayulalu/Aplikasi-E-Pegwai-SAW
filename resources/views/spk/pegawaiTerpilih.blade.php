
@extends('layouts.master')
@section('title', 'Parameter')
@section('conten')
  <section class="content-header">
      <h1>Informasi Pegawai Berperstasi</h1>    
    </section>
    <br>
  <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
        <div class="alert alert-info alert-dismissible">
            {{-- <h4><i class="icon fa fa-check"></i> Berhasil</h4> --}}
            @foreach ($nilais as $key => $value)
                @if ($value == max($nilais))
                <p class="text-center" style="font-weight: bold; text-transform: uppercase; ">SELAMAT {{$key}} MENJADI PEGAWAI TERBAIK</p>
                @endif
            @endforeach
           </div>
    </div>
   
  </div>
    <section class="content">
      <!-- Small boxes (Stat box) -->    

      <!-- TABLE: LATEST ORDERS -->
      
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Informasi Pegawai Berperstasi</h3>

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
                    <th>Nilai</th>
                  
                  </tr>
                  </thead>
                    @php
                      $no = 1;
                    @endphp
                  <tbody>
                    
                        @foreach ($nilais as $key => $value)
                            <tr>
                              <td>{{$no}}</td>
                              @php
                                  $no++;
                              @endphp
                        <td>{{$key}}</td>
                            <td>{{$value}}</td>
                    </tr>
                        @endforeach
                    {{-- </tr>  --}}
                    
                  </tbody>
                </table>
              </div>
      </section>
@endsection
