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
					<h7><i><img src="images/posted.png" height="16" class="image-bottom-spacing"> Posted By <strong>{{ $post->user->name }}</strong> on {{ date('M j, Y', strtotime($post->created_at)) }} <img src="images/category.png" height="16" class="image-bottom-spacing"> Filed in <a href="" class="btn-link">{{$post->category->name}}</a></i></h7>
					<hr>
					<p>{{ substr($post->body,0,300) }}{{ strlen($post->body)>300 ? "..." : "" }}</p>
					<a href="{{ route('blog.single',$post->slug) }}" class="btn btn-primary">Read More</a>
				</div>

		@endforeach
		</div>
	</div>

	<div class="col-md-4 col-md-offset-0">
		<div class="well">
			<input type="text" class="form-control" placeholder="Search">
			<hr>
			<h5><strong>Recent Posts</strong></h5>
			@foreach ($posts as $post)
			<li><a href="{{ route('blog.single',$post->slug) }}" class="btn-link">{{ $post->title }}</a></li>
			@endforeach
			<hr>
			<h5><strong>Categories</strong></h5>
			@foreach ($categories as $category)
			<li><a href="" class="btn-link">{{ $category->name }}</a> (
				@if(isset($catcnt[$category->id]))
					{{$catcnt[$category->id]}}
				@else
					{{0}}
				@endif
				 )</li>
			@endforeach
			<hr>
			<h5><strong>Recent Comments</strong></h5>
			<hr>
			<h5><strong>Recent Pictures</strong></h5>
			<hr>
			<h5><strong>Archives</strong></h5>
			<hr>
			<h5><strong>Find me in: </strong></h5>
			<img src="/images/gplus.jpg" height="50" style="margin-left: 20px"><img src="/images/fb.png" height="50" style="margin-left: 20px"><img src="/images/github.png" height="50" style="margin-left: 20px">
		</div>
	</div>

</div>	<!-- end of row -->
@endsection