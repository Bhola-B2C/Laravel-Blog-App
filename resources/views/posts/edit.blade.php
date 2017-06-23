@extends('main')

@section('title','Edit the Post')

@section('jumbotron_writeup')

	<h1 class="w3-animate-opacity h1">Edit: {{ $post->title}}</h1>

@stop

<!--@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection-->

@section('content')
	<div class="row">
		{!! Form::model($post,['route'=>['posts.update',$post->id], 'method'=>'PUT']) !!}   <!-- Form Binding is used to have text in the input field-->
		<div class="col-md-8">

			<div class="form-group">
				{{ Form::label('title', 'Title: ', ['class'=>'lead']) }}
				<h1>{{ Form::text('title', null, ['class'=>'form-control input-lg', 'required'=>'', 'maxlength'=>'255']) }}</h1>
			</div>
			<div class="form-group">
				{{ Form::label('slug', 'Url Slug: ', ['class'=>'lead']) }}
				<h1>{{ Form::text('slug', null, ['class'=>'form-control', 'required'=>'', 'minlength'=>'3', 'maxlength'=>'255']) }}</h1>
			</div>
			<div class="form-group">
				{{ Form::label('body', 'Body: ', ['class'=>'lead']) }}
				<p class="lead">{{ Form::textarea('body', null, ['class'=>'form-control', 'required'=>'']) }}</p>
			</div>
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
						{!! Html::linkroute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-md-6">
						{{ Form::submit('Save Changes', ['class'=>'btn btn-success btn-block']) }}
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
@stop

<!--@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection