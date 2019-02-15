@extends('layouts.master')
@section('title', 'Daftar Pemberian Tugas')
@section('conten')
<style type="text/css">
  .tess{
    position: fixed ;
    width: 100%;
    z-index: 1;
    background-color:rgba(91, 183, 71, 0.7) !important;
  }
</style>
<div class="row">
  @if (session('msg'))
    {{-- expr --}}
      <div class="col-sm-9"></div>  
      <div class="col-sm-3">
        <div class="alert alert-success alert-dismissible tess">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i> Berhasil</h4>
          Data Berhasil Diubah
        </div>
      </div>  
  @endif
    </div>
	<section class="content">
    
		<h1 class="text-center">Daftar Pemberian Tugas</h1>
		<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Pemberian Tugas</h3>
            </div>
            <!-- /.box-header -->
             <div class="box-body">
              <div class="table-responsive">
                <table class="table  no-margin">
                  <thead>

                  <tr>
                    <th>No</th>
                    <th>Tugas Untuk</th>
                    <th>Judul</th>
                    <th>Waktu Pemberian Tugas</th>
                    <th>Batas Waktu</th>
                    <th>Status</th>
                    <th>Jenis Tugas</th>
                    <th >Aksi</th>
                  </tr>
                  </thead>
                   @php
                      $no = 1;
                    @endphp
                  <tbody>
                    @foreach ($jobs as $job)
                  @if ($job->status == 'belum')
                     
                  <tr>
                    <td><a >{{$no}}</a></td>
                    @php
                      $no++;
                    @endphp
                    <td>
                      @foreach ($job->users as $user)
                        {{$user->name}},
                      @endforeach
                      
                    </td>
                    <td>{{$job->title}}</td>
                    <td>{{$job->time}}</td>
                    <td>{{$job->deadLine}}</td>
                    
                      
                    <td>Belum Selesai </td>               
                    
                    <td>
                      @if ($job->kualitas == 100)
                          sulit
                      @elseif($job->kualitas == 75)
                          sedang
                      @else
                          mudah
                      @endif
                    </td>
                    
                    <td><a href="/acc/{{$job->id}}" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin Tugas Ini Sudah ACC ?')">Acc</a>
                    <a href="/pemberian-tugas/{{$job->id}}/edit" class="btn btn-warning">Edit</a>
                    <a href="/hapus-tugas/{{$job->id}}" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Tugas Ini ?')">Hapus</a>
                    <a href="/rincian/{{$job->slug}}" class="btn btn-info"">Lihat</a></td>
                    </tr>
                     @endif
                    @endforeach      
                  </tbody>
                </table>
              </div>
	</section>
  {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
  <script src="{{asset('asset/shite-alert/switalert.js')}}"></script>
  <script type="text/javascript">
  // swal({
  //   title: "Apakah Anda Yakin?",
  //   text: "jika anda menghapus data ini tidak akan bisa di kembalikan lagi",
  //   icon: "warning",
  //   dangerMode: true,
  //    buttons: ["Ya", "Batal"],
  // })
  // .then((willDelete) => {
  //   if (!willDelete) {
  //     $('document').ready(function(){

  //       // $('#btn').click(function(){
  //       // $.ajax({
  //       //   url : 'seen',
  //       //   method : 'GET',
  //       // }).done(function(hasil){
  //       //   $('.hapus').remove();
  //       // });
          
  //       // });
  //     });
  //     swal("Poof! Your imaginary file has been deleted!", {
  //       icon: "success",
  //     });
  //   }
  // });    



  </script>
@endsection

