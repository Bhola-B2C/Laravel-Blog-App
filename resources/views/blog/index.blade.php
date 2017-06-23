@extends('main')

@section('title','Blogs')

@section('jumbotron_writeup')
<h1 class="w3-animate-opacity h1">All Blogs</h1>
@endsection

@section('content')

	<div class="row">
		@foreach ($posts as $post)
			<div class="col-md-8">
				<h2><b>{{ $post->title }}</b></h2>
				<h6><i>Published At: {{ date('M j, Y', strtotime($post->created_at)) }}</i></h6>
				<p>{{ substr($post->body,0,300) }}{{ strlen($post->body)>300 ? "..." : "" }}</p>
				<a href="{{ route('blog.single',$post->slug) }}" class="btn btn-primary">Read More</a>
				<hr>
			</div>
		@endforeach
	</div>

@stop