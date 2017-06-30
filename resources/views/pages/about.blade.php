@extends('main')

@section('title')
	About Me
@endsection

@section('jumbotron_writeup')
	<h1 class="w3-animate-opacity h1">Want to Know About Me ?</h1>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8">About Page</div>
		@include('partials._sidebar')
	</div>
@endsection