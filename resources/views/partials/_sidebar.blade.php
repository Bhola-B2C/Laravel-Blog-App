	<div class="col-md-4">
		<div class="well sidebar">
			<div class="input-group">
				<input type="text" class="form-control" name="q"
				placeholder="Search posts"> 
				<span class="input-group-btn">
					<button type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
    		</div>
			<hr>
			<div class="sidebar-heading"><h5><strong>Recent Posts</strong></h5></div>
			@foreach ($posts as $post)
			<li><a href="{{ route('blog.single',$post->slug) }}" class="btn-link">{{ substr($post->title,0,40) }}{{ strlen($post->title)>40 ? "..." : "" }}</a></li>
			@endforeach
			<hr>
			<h5><strong>Categories</strong></h5>
			@foreach ($categories as $category)
			<li><a href="{{route('categories.show',$category->id)}}" class="btn-link">{{ $category->name }}</a> (
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