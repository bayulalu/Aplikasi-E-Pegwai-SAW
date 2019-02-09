
@extends('layouts.master')
@section('title', 'Parameter')
@section('conten')
  <section class="content-header">
      <h1>Alternatif Yang Belemu Terisi</h1>    
    </section>
    <section class="content">
      <!-- Small boxes (Stat box) -->    

      <!-- TABLE: LATEST ORDERS -->
      <form>
      <select>
        <option>1</option>
        <option>2</option>
        <option>3</option>
      </select>
      <button class="btn btn-primary">Tampilkan</button>
      </form>
      
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
                    <th>Aksi</th>
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
                      <td>{{$user->name}}</td>
                       <td>
                         <a href="/masukan-nilai-alternatif/{{$user->id}}" class="btn btn-primary">Masukan Nilai </a>
                       </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
      </section>
@endsection
