@extends('main')

@section('title','View Post')

@section('jumbotron_writeup')
	<h1 class="w3-animate-opacity h1">Blog: {{ $post->title }}</h1>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $post->title }}</h1>
			<hr>
			<p class="lead">{{ $post->body }}</p>
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">	<!-- definition list (HTML5) -->
					<dt>Created At:</dt>	<!-- definition title (HTML5) -->
					<!--Using php date function syntax: date('$format', timestamp) in database timestamp is stored in string format, so use strtotime-->
					<dd>{{ date('M j, Y h:ia',strtotime($post->created_at)) }}</dd><!-- definiton description (HTML5) 																		-->
				</dl>
				<dl class="dl-horizontal">	<!-- definition list (HTML5) -->
					<dt>Last Updated At:</dt>	<!-- definition title (HTML5) -->
					<dd>{{ date('M j, Y h:ia',strtotime($post->updated_at)) }}</dd>	<!-- definiton description (																						HTML5) -->
				</dl>
				<hr>
				<div class="row">
					<div class="col-md-6">
						{!! Html::linkroute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-md-6">
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
						
						{{ Form::submit('Destroy', ['class' => 'btn btn-danger btn-block']) }}
						
						{!! Form::close() !!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{!! Html::linkroute('posts.index', '<< See All Posts', [], array('class' => 'btn btn-default btn-block btn-h1-spacing')) !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection