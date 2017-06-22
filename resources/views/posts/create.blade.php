@extends('main')

@section('title','Create New Post')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection

@section('jumbotron_writeup')
	<h1 class="w3-animate-opacity h1">Add New Posts</h1>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<hr>
			{!! Form::open(['route' => 'posts.store']) !!}
				<div class="form-group"> 
    				{{ Form::label('title','Title: ') }}
    				{{ Form::text('title', null, array('class' => 'form-control', 'required'=>'', 'maxlength'=>'255', 'placeholder'=>'Post Title')) }}
    			</div>
				<div class="form-group">
					{{ Form::label('body','Post Body: ') }}
    				{{ Form::textarea('body', null, array('class' => 'form-control', 'required'=>'', 'placeholder'=>'Post Body')) }}
				</div>
				{{ Form::submit('Create Post',array('class' => 'btn btn-success btn-lg')) }}
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection