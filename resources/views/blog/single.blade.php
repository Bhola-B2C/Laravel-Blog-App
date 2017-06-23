@extends('main')

@section('title','$post->title')

@section('jumbotron_writeup')
	<h1 class="w3-animate-opacity h1">{{ $post->title}}</h1>
@stop

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $post->title }}</h1>
			<hr>
			<p>{{ $post->body }}</p>
		</div>
	</div>

@stop