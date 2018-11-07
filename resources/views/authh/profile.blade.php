@extends('layout.master')
@section('title', 'Profile')
@section('conten')
{{-- <section class="content"> --}}
	 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
       {{-- <h3 class="text-center">Profile</h3> --}}
    <section class="content">

      <div class="row">
        <!-- /.col -->
        <div class="col-md-9 profile" >
        	{{-- <div class="row"> --}}
        		<div class="col-md-4">
        			<img class="img-responsiv img-thumbnail"
               @if (Auth::user()->foto == '')
                  src="{{ asset('img/avatar5.png') }}" 
                @else
                  src="{{asset('storage/fotoKetua/'.Auth::user()->foto)}}"
                @endif >
        		</div>
        		<div class="col-md-6">
              <p>Nip : {{$user->nip}}</p>
        			<p>Nama : {{$user->user}}</p>
        			<p>Bagian : {{$user->bagian}}</p>
        		</div>
        	{{-- </div> --}}
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
    </section>
        </div>
      
     
@endsection