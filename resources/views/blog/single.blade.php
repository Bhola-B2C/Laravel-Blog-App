@extends('main')

@section('title',$post->title)

@section('jumbotron_writeup')
	<h1 class="w3-animate-opacity h1">{{ $post->title}}</h1>
@stop

@section('content')
@if($post->published==1)	
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $post->title }}</h1>
			<h7><i><img src="/images/posted.png" height="16" class="image-bottom-spacing"> Posted By <strong>{{ $post->user->name }}</strong> on {{ date('M j, Y', strtotime($post->created_at)) }} <img src="/images/category.png" height="16" class="image-bottom-spacing"> Filed in <a href="" class="btn-link">{{$post->category->name}}</a></i></h7>
			<hr>
			<p>{{ $post->body }}</p>
		</div>
		@include('partials._sidebar')
	</div>

@else
	<h1>This post has not been published yet !!!</h1>
	<hr>
	<h2>Sorry for the incovenience</h2>
@endif
@stop