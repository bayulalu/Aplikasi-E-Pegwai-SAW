
@extends('layouts.master')
@section('title', '403')
@section('conten')

<section class="content">
    <div class="error-page">
      <h2 class="headline text-yellow"> 403</h2>

      <div class="error-content">
        <h5  ><i class="fa fa-warning text-yellow"></i> <span style="margin-top:20px;">Anda Tidak Boleh Mengakses Halaman InI</span> </h5>

        <p>
        Kemali kehalaman <a href="{{route('beranda')}}">beranda</a> </p>

   
      </div>
      <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
  </section>
  @endsection