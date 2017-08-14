@extends('main')

@section('title')
Category
@endsection

@section('content')
<div class="row">

	<div class="col-md-8">
	<h1>Category- <strong>{{$categoryname->name}}</strong></h1>
	<hr>
	<div class="">
		@foreach ($posts2 as $post)

				<div class="post">
					<h1><b>{{ $post->title }}</b></h1>
					<h7>
						<i>
								<span class="glyphicon glyphicon-user"></span> Posted By <strong class="sub-title-group">{{ $post->admin->name }}</strong>

								<span class="glyphicon glyphicon-calendar"></span> <label class="sub-title-group font-light-weight">{{ date('M j, Y', strtotime($post->created_at)) }}</label>
							
								<span class="glyphicon glyphicon-book"></span> Filed in <a href="" class="btn-link">{{$post->category->name}}</a>
						</i>
					</h7>

					<hr>
					<p>{{ substr(strip_tags($post->body),0,300) }}{{ strlen(strip_tags($post->body))>300 ? "..." : "" }}</p>
					<a href="{{ route('blog.single',$post->slug) }}" class="btn btn-primary">Read More</a>
				</div>

		@endforeach
		</div>
	</div>
	@include('partials._sidebar')
</div>	<!-- end of row -->
@endsection