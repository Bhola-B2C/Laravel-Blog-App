@extends('main')

@section('title','Blogs')

@section('jumbotron_writeup')
<h1 class="w3-animate-opacity h1">All Blogs</h1>
@endsection

@section('content')

	<div class="row">
		<div class="col-md-8">
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
		<div class="col-md-8">
			<div class="text-center">{!! $posts->links() !!}</div>
		</div>
	</div>

@stop