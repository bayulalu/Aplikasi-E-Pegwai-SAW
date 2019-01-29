
@extends('layouts.master')
@section('title', 'Parameter')
@section('conten')
	<h2 align="center">Parameter Dalam Penentuan Pegawai Berperstasi</h2>
    <section class="content">
      <!-- Small boxes (Stat box) -->    

      <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Sasaran Kerja Pegawai</h3>

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
                    @php
                      $no = 1;
                    @endphp
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Parameter</th>
                    <th>Bobot</th>
                    
                    <th >Aksi</th>
                  </tr>
                  </thead>
                   
                  <tbody>
                @foreach ($parameters->where('katagori', 'Sasaran Kerja Pegawai') as $parameter)
                    <tr>
                  <td>{{$no}}</td>
                  @php
                    $no++;
                  @endphp
                  <td>{{$parameter->name}}</td>
                  <td><span class="badge bg-red">{{$parameter->bobot}} %</span></td>
                  <td><a href="" class="btn btn-warning">Ubah</a></td>
                    @endforeach
                    </tr>
                    <td></td>
                    <td>Total</td>
                    <td> <span class="badge bg-red">{{$parameters->where('katagori', 'Sasaran Kerja Pegawai')->count()}} %</span></td>
                  </tbody>
                </table>
              </div>
      </section>
	
  <section class="content">
      <!-- Small boxes (Stat box) -->    

      <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Perilaku Kerja</h3>

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
                    @php
                      $no = 1;
                    @endphp
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Parameter</th>
                    <th>Bobot</th>
                    
                    <th >Aksi</th>
                  </tr>
                  </thead>
                   
                  <tbody>
                @foreach ($parameters->where('katagori', 'Perilaku Kerja') as $parameter)
                    <tr>
                  <td>{{$no}}</td>
                  @php
                    $no++;
                  @endphp
                  <td>{{$parameter->name}}</td>
                  <td><span class="badge bg-red">{{$parameter->bobot}} %</span></td>
                  <td><a href="" class="btn btn-warning">Ubah</a></td>
                    @endforeach
                    </tr>
                  </tbody>
                </table>
              </div>
      </section>
  

@endsection
