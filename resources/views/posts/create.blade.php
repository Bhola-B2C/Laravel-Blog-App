@extends('main')

@section('title','Create New Post')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
    @include('partials._wysiwyg')
@endsection

@section('jumbotron_writeup')
	<h1 class="w3-animate-opacity h1">Add New Posts</h1>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<hr>
			{!! Form::open(['route' => ['posts.store',Auth::user()->id]]) !!}
				<div class="form-group"> 
    				{{ Form::label('title','Title: ') }}
    				{{ Form::text('title', null, array('class' => 'form-control', 'required'=>'', 'maxlength'=>'255', 'placeholder'=>'Post Title')) }}
    			</div>
    			<div class="form-group"> 
    				{{ Form::label('slug','Url Slug: ') }}
    				{{ Form::text('slug', null, array('class' => 'form-control', 'required'=>'', 'maxlength'=>'255', 'minlength' => '3', 'placeholder'=>'URL')) }}
    			</div>
    			<div class="form-group"> 
    				{{ Form::label('category_id','Category: ') }}
    				<select name="category_id" class="form-control">
    					@foreach($categories as $category)
    						<option value="{{ $category->id }}">{{ $category->name }}</option>
    					@endforeach
    				</select>
    			</div>
    			<div class="form-group">
    				Your Category is not listed ? <a href="{{route('categories.index')}}" class="btn-link">Want to create Category ?</a>
    			</div>
				<div class="form-group">
					{{ Form::label('body','Post Body: ') }}
    				{{ Form::textarea('body', null, array('class' => 'form-control', 'placeholder'=>'Post Body')) }}
				</div>
				<div class="form-group">
    				{{ Form::checkbox('published',1, null, array('class' => 'w3-check')) }}
    				{{ Form::label('published','Create as well as Publish') }}
				</div>
				{{ Form::submit('Create Post',array('class' => 'btn btn-success btn-lg')) }}
			{!! Form::close() !!}
		</div>
	</div>
@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection