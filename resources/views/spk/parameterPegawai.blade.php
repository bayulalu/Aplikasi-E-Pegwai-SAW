@extends('layouts.master')
@section('title', 'Parameter')
@section('conten')
	
	<section class="content-header">
     
    </section>
    <section class="content">
      <!-- Small boxes (Stat box) -->    

      <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Parameter Dalam Penentuan Pegawai Berperstasi</h3>

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
                    <th>Nama Parameter</th>
                    <th>Bobot</th>
                    
                    <th >Aksi</th>
                  </tr>
                  </thead>
                   
                  <tbody>
            
                  <td>1</td>
                  <td>Tes</td>
                  <td><span class="badge bg-red">34</span></td>
                  <td><a href="" class="btn btn-warning">Ubah</a></td>
                    
                  </tbody>
                </table>
              </div>
      </section>
	
@endsection
