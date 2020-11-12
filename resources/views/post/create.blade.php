@extends('layouts.app')
@section('title','Create Page')
@section('content')
{{-- start container --}}

<div class="container">
	{{-- start row --}}
		<div class="row justify-content-center">
			{{-- start col-sm-8 --}}
				<div class="col-sm-8">
					{{-- start card --}}
						<div class="card">
							{{-- start card-body --}}
								<div class="card-body">
									<form action="{{route('post_store')}}" method="POST" enctype="multipart/form-data">
										@csrf
										{{-- start Title --}}
											<div class="form-group">
												<label for="Title">Title</label>
												<input type="text" name="title" class="form-control" placeholder="Enter Title">
											</div>
											  @error('title')
						    				<small style="color:red;">{{$message}}</small>
						   				 @enderror
										{{-- End Title --}}

										{{-- start Title --}}
											<div class="form-group">
												<label for="Category">Category</label>
												<select class="form-control" name="category_name" id="">
													<option value="">. . . . </option>
													@foreach($categories as $category)
														<option value="{{$category->id}}" {{$category->
															id==old('category_name')?'selected':null}}>
															{{$category->name}}
														</option>
													@endforeach
												</select>
											</div>
											  @error('category')
						    				<small style="color:red;">{{$message}}</small>
						   				 @enderror
										{{-- End Title --}}

									{{-- start image --}}
											
                            <div class="form-group">
                                <label for="title">Image</label>
                                <input type="file" name="image[]" class="form-control-file" multiple>
                               @error('image[]')
						    				<small style="color:red;">{{$message}}</small>
						   				 @enderror
                            </div>
									{{-- end image --}}

										{{-- start Description --}}
											<div class="form-group">
												<label for="Description">Description</label>
												<textarea class="form-control" name="description" placeholder="Enter Description" id="" cols="30" rows="10"></textarea>
											</div>
											  @error('description')
						    				<small style="color:red;">{{$message}}</small>
						   				 @enderror
										{{-- End Description --}}

										{{-- start submit --}}
											 <button type="submit" class="btn btn-primary">Post</button>
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

	
</div>
{{-- end container --}}
@endsection