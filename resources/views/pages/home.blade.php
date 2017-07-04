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
	<div class="">
		@foreach ($posts as $post)

				<div class="post">
					<h2><b>{{ $post->title }}</b></h2>
					<h7>
						<i>
								<span class="glyphicon glyphicon-user"></span> Posted By <strong class="sub-title-group">{{ $post->admin->name }}</strong>

								<span class="glyphicon glyphicon-calendar"></span> <label class="sub-title-group font-light-weight">{{ date('M j, Y', strtotime($post->created_at)) }}</label>
							
								<span class="glyphicon glyphicon-book"></span> Filed in <a href="" class="btn-link">{{$post->category->name}}</a>
						</i>
					</h7>

					<hr>
					<p>{{ substr($post->body,0,300) }}{{ strlen($post->body)>300 ? "..." : "" }}</p>
					<a href="{{ route('blog.single',$post->slug) }}" class="btn btn-primary">Read More</a>
				</div>

		@endforeach
		</div>
	</div>
	@include('partials._sidebar')
</div>	<!-- end of row -->
@endsection