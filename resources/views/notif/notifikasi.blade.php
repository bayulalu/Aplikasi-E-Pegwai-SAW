
@extends('layout.master')
@section('title', 'Beranda')
@section('conten')
<section class="content-header">
	<!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Notifikasi</h3>

              <div class="box-tools pull-right">
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
              	@foreach ($notifs as $notif)
                <li class="item">
                  <div class="product-info">
                    <a href="/ketuaDevisi/job/{{$notif->job->slug}}"><span class="product-description">
                         {{$notif->subject}}
                     </span></a>
                  </div>
                </li>
              	@endforeach
                
            <!-- /.box-body -->
            
          </div>
</section>

@endsection