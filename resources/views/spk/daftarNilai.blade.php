
@extends('layouts.master')
@section('title', 'Parameter')
@section('conten')
  <section class="content-header">
      <h1>Nilai Alternatif</h1>    
    </section>
    <section class="content">
      <!-- Small boxes (Stat box) -->    

      <!-- TABLE: LATEST ORDERS -->
      
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Nilai Alternatif</h3>

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
                    <th>Kualitas</th>
                    <th>Kuantitas</th>
                    <th>waktu</th>
                    <th>Orientasi pelayanan</th>
                    <th>Integrasi</th>
                    <th>Komitmen</th>
                    <th>Disiplin</th>
                    <th>Kerja sama</th>
                    <th>kepemimpinan</th>
                  </tr>
                  </thead>
                    @php
                      $no = 1;
                    @endphp
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <td>{{$no}}</td>
                      @php
                        $no++
                      @endphp
                      {{-- {{dd($user->jobss)}} --}}
                      <td>{{$user->name}}</td>
                      <td>{{collect($user->jobss)->sum('kualitas')}}</td>
                     
                      <td>{{$user->jobss()->count()}}</td>
                      <td>{{collect($user->jobss)->sum('nwaktu')}}</td>
                      @foreach ($user->parameters as $prm)
                          <td>{{$prm->pivot->nilai}}</td>
                      @endforeach
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
      </section>
@endsection
