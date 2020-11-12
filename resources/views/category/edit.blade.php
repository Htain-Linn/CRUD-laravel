@extends('layouts.app')
@section('title','Edit ')
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
									<form action="{{route('cat_update',$categories->id)}}" method="POST">
										@csrf
										{{-- start Title --}}
										<div class="form-group">
											<label for="Title">Category</label>
											<input type="text" name="category_name" class="form-control" value="{{$categories->name}}" placeholder="Enter Category">
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
@endsection