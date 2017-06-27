@extends('main')

@section('title','Category View')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Category Name</th>
					<th></th>
					<th></th>
				</thead>
				<tbody>
					@foreach($categories as $category)
						<tr>
							<th>{{ $category->id }}</th>
							<td>{{ $category->name }}</td>
							<td><img src="/images/edit2.svg" alt="edit" height="15" style="cursor: pointer;"></td>
							<td><img src="/images/DeleteRed.png" alt="delete" height="15" style="cursor: pointer;"></td>
						</tr>
					@endforeach
					<tr>
						{!! Form::open(['route'=>'categories.store']) !!}
						<td><img src="images/add.png" alt="add" height="20" onclick="change()" style="cursor: pointer;"></td>
						<td>{{  Form::text('name',null,['class'=>'form-control hid','required'=>'', 'maxlength'=>'255', 'placeholder'=>'Category'])}}</td>
						<td></td>
						<td>{{ Form::submit('>>',['class'=>'btn btn-success btn-block hid']) }}</td>
						{!! Form::close() !!}
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@stop