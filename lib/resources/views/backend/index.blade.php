@extends('backend.master')
@section('title','Admin')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
	<div class="row">
		<div class="col-lg-12">
			@auth
			<div class="alert alert-success" color="white">Xin chào:{{Auth::user()->name}}!!!</div>	
			@endauth
		</div>
	</div>
	@stop

	
