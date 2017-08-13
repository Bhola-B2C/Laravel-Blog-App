	<div class="col-md-4">
		<div class="well sidebar">
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
			<img src="/images/gplus.png" height="50" style="margin-left: 20px"><img src="/images/fb.png" height="50" style="margin-left: 20px"><img src="/images/github.png" height="50" style="margin-left: 20px">
		</div>
	</div>