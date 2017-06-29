@extends('main')

@section('title','All Posts')

@section('jumbotron_writeup')
	<h1 class="w3-animate-opacity h1">All Posts</h1>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-10">
			<h1>{{ Auth::user()->name }}'s Posts</h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn btn-lg btn-primary btn-block btn-h1-spacing">Create New Post</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div>	<!-- end of row -->

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th></th>
					<th>#</th>
					<th>Title</th>
					<th>Body</th>
					<th>Created At</th>
					<th></th>
				</thead>
				<tbody>
					@foreach ($posts as $post)
						@if ($post->user_id==Auth::user()->id)
							<tr>
								<th>
									@if($post->published==1)
										<img src="/images/check.png" alt="published" title="Published" height=20>
									@else
										<img src="/images/incomplete.svg" alt="not published" title="Not Published Yet" height=20>
									@endif
								</th>
								<th>{{ $post->id }}</th>
								<td>{{ $post->title }}</td>
								<td>{{ substr($post->body,0,50) }}{{  strlen($post->body)>50 ? "..." : "" }}</td>
								<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
								<td>
									<a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">View</a>
									<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">Edit</a>
								</td>
							</tr>
						@endif
					@endforeach
				</tbody>
			</table>
			<hr>
			<div class="text-center">
				{!! $posts->links() !!}
			</div>
		</div>
	</div>
@endsection