@extends('main')

@section('title')
Home
@endsection

@section('jumbotron_writeup')
<h1 class="w3-animate-opacity h1">Welcome to My Blog!!!</h1>

@endsection

@section('content')
<div class="row">
	<div class="jumbotron">
		<h1 class="h1">Welcome to My Blog!!!</h1>
		<p class="lead">Thank you so much for visiting my blog. Please read my popular post.</p>
		<p><a class="btn-primary btn-lg" role="button" href="#">Popular Post</a></p>
	</div>
</div>

<div class="row">

	<div class="col-md-8">
		@foreach ($posts as $post)
			<div class="post">
				<h3><b>{{ $post->title }}</b></h3>
				<p>{{ substr($post->body,0,300) }}{{ strlen($post->body)>300 ? "..." : "" }}</p>
				<a href="{{ route('blog.single',$post->slug) }}" class="btn btn-primary">Read More</a>
				<hr>
			</div>
		@endforeach
	</div>

	<div class="col-md-3 col-md-offset-1">
		<h2> Sidebar</h2>
	</div>

</div>	<!-- end of row -->
@endsection