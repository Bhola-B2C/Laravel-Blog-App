@extends('main')

@section('title',$post->title)

@section('jumbotron_writeup')
	<h1 class="w3-animate-opacity h1">{{ $post->title}}</h1>
@stop

@section('content')
@if($post->published==1)	
	<div class="row">
		<div class="col-md-8">
			<div class="post">
				<h1>{{ $post->title }}</h1>
					<h7>
						<i>
							<span class="glyphicon glyphicon-user"></span> Posted By <strong class="sub-title-group">{{ $post->admin->name }}</strong>

							<span class="glyphicon glyphicon-calendar"></span> <label class="sub-title-group  font-light-weight">{{ date('M j, Y', strtotime($post->created_at)) }}</label>
							
							<span class="glyphicon glyphicon-book"></span> Filed in <a href="" class="btn-link">{{$post->category->name}}</a>
						</i>
					</h7>
				<hr>
				<p>{{ $post->body }}</p>
				<hr>
			</div>
			<div class="panel">
				<div class="panel-heading">
					<h3><span class="glyphicon glyphicon-comment gly-comment"></span><p class=" comment-heading"> <strong>{{$post->comments()->count()}} Comments</strong></p></h3>
				</div>
				<div class="row">
					<div class="col-md-12">
						@foreach($post->comments as $comment)
							<div class="comment">
								<div class="author-info">
									<img src="{{"https://s.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=identicon"}}" alt="" class="author-image">
									<div class="author-name">
										<h4><strong>{{$comment->name}}</strong></h4>
										<p class="author-time">
											{{date('F d, Y | h:i a',strtotime($comment->created_at))}}
										</p>
									</div>
								</div>
								<div class="comment-content">
									{{$comment->comment}}
								</div>
								<hr>
							</div>
						@endforeach
					</div>
				</div>
				{!! Form::open(['route'=>['comments.store',$post->id],'class'=>'btn-h1-spacing']) !!}
					<div class="row">
						<div class="form-group col-md-5 col-md-offset-0">
							{{ Form::text('name',null,['class'=>'form-control','required'=>'', 'maxlength'=>'255', 'placeholder'=>'Name']) }}	
						</div>	
						<div class="form-group col-md-5">
							{{ Form::text('email',null,['class'=>'form-control','required'=>'', 'maxlength'=>'255', 'placeholder'=>'Email']) }}	
						</div>
					</div>
					<div class="row">
						<div class="col-md-10 col-md-offset-0">
						{{ Form::textarea('comment', null, array('class' => 'form-control', 'required'=>'', 'placeholder'=>'Comment')) }}
						</div>
					</div>
					<div class="row">
						<div class="col-md-10 col-md-offset-0">
						{{ Form::submit('Comment',array('class' => 'btn btn-success btn-lg btn-h1-spacing')) }}
						</div>
					</div>
					<hr>
				{!! Form::close() !!}
			</div>
		</div>
		@include('partials._sidebar')
	</div>

@else
	<h1>This post has not been published yet !!!</h1>
	<hr>
	<h2>Sorry for the incovenience</h2>
@endif
@stop