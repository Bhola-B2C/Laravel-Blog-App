@extends('main')

@section('title','Category View')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<div class="table-responsive">
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
							<th class="col-md-1">{{ $category->id }}</th>
							<td class="col-md-12">{{ $category->name }}</td>
							<td>

								<img src="/images/edit2.svg" alt="edit" height="15" style="cursor: pointer;" title="Edit">

							</td>
							<td>
								{!! Form::open(['route'=>['categories.destroy',$category->id], 'method'=>'delete', 'onsubmit'=>"return confirm('Do you really want to delete the category ?')"]) !!}
								<input type="image" src="/images/DeleteRed.png" alt="Delete" height="15" title="Delete">
								{!! Form::close() !!}
							</td>
						</tr>
						@endforeach
						<tr>
							{!! Form::open(['route'=>'categories.store']) !!}
							<td><span class="glyphicon glyphicon-plus-sign" onclick="change()" title="Add New Category" style="cursor: pointer;"></span></td>
							<td>{{  Form::text('name',null,['class'=>'form-control hid','required'=>'', 'maxlength'=>'255', 'placeholder'=>'Category'])}}</td>
							<td><input type="image" src="/images/go.png" alt="Create" height="35" title="Create" class="hid"></td>
							<td></td>
							{!! Form::close() !!}
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@stop