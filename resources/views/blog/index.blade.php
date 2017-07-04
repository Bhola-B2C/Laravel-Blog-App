@extends('main')

@section('title','Blogs')

@section('jumbotron_writeup')
<h1 class="w3-animate-opacity h1">All Blogs</h1>
@endsection

@section('content')

	<div class="row">
		<div class="col-md-8">
			@foreach ($posts as $post)
				@if($post->published==1)

					<div class="post">
						<h2><b>{{ $post->title }}</b></h2>
						<h7>
							<i>
								<span class="glyphicon glyphicon-user"></span> Posted By <strong class="sub-title-group">{{ $post->admin->name }}</strong>

								<span class="glyphicon glyphicon-calendar"></span> <label class="sub-title-group  font-light-weight">{{ date('M j, Y', strtotime($post->created_at)) }}</label>
							
								<span class="glyphicon glyphicon-book"></span> Filed in <a href="" class="btn-link">{{$post->category->name}}</a>
							</i>
						</h7>
						<hr>
						<p>{{ substr($post->body,0,300) }}{{ strlen($post->body)>300 ? "..." : "" }}</p>
						<a href="{{ route('blog.single',$post->slug) }}" class="btn btn-primary">Read More</a>
					</div>
					
				@endif		
			@endforeach
		 </div>
		 @include('partials._sidebar')
		<div class="col-md-8">
			<div class="text-center">{!! $posts->links() !!}</div>
		</div>
	</div>

@stop