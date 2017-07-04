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
				<h7>
					<i>
						<span class="glyphicon glyphicon-user"></span> Posted By <strong class="sub-title-group">{{ $post->admin->name }}</strong>

						<span class="glyphicon glyphicon-calendar"></span> <label class="sub-title-group  font-light-weight">{{ date('M j, Y', strtotime($post->created_at)) }}</label>
							
						<span class="glyphicon glyphicon-book"></span> Filed in <a href="" class="btn-link">{{$post->category->name}}</a>
					</i>
				</h7>
			<hr>
			<p>{{ $post->body }}</p>
			<hr>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3><span class="glyphicon glyphicon-comment"></span><p>Comments</p></h3>
				</div>
			</div>
		</div>
		@include('partials._sidebar')
	</div>

@else
	<h1>This post has not been published yet !!!</h1>
	<hr>
	<h2>Sorry for the incovenience</h2>
@endif
@stop