@extends('layouts.app')
@section('title','Category')
@section('content')
{{-- start container --}}

<div class="container">
	{{-- start row --}}
		<div class="row">
			{{-- start col-sm-8 --}}
				<div class="col-sm-8">
					{{-- start card --}}
						<div class="card">
							{{-- start card-body --}}
								<div class="card-body">
									<form action="{{route('cat_store')}}" method="POST">
										@csrf
										{{-- start Title --}}
										<div class="form-group">
											<label for="Title">Category</label>
											<input type="text" name="category_name" class="form-control" value="{{old('category_name')}}" placeholder="Enter Category">
											@error('category_name')
											    <div style="color: red;">{{ $message }}</div>
											@enderror
										</div>
										{{-- End Title --}}
										{{-- start submit --}}
											 <button type="submit" class="btn btn-primary">Create</button>
										{{-- end submit --}}

									</form>
								</div>
							{{-- end card-body --}}
						</div>
					{{-- end card --}}
				</div>
			{{-- end col-sm-8 --}}
		</div>
	{{-- end row --}}

{{-- start row --}}
		<div class="row" style="margin-top:100px;">
			{{-- start col-sm-8 --}}
				<div class="col-sm-8">
					{{-- start table --}}
						<table class="table table-hover">
							{{-- start thead --}}
								<thead>
									<tr>
										<th>No</th>
										<th>Name</th>
										<th>Created_at</th>
										<th>
											Action
										</th>
									</tr>
								</thead>
							{{-- end thead --}}

							{{-- start thead --}}
								<tbody>
									@foreach($categories as $key=>$category)
										<tr>
										<td>{{++$key}}</td>
										<td>{{$category->name}}</td>
										<td>{{Carbon\Carbon::parse($category->id)->format('d-M-Y')}}</td>
										<td>
											<a href="{{route('cat_edit',$category->id)}}">Edit</a>
											<a href="{{route('cat_delete',$category->id)}}" onclick="return confirm('Are you sure!');">Delete</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							{{-- end thead --}}
						</table>	
					{{-- end table --}}
				 
				</div>
			{{-- end col-sm-8 --}}
		</div>
	{{-- end row --}}

</div>
{{-- end container --}}

@endsection