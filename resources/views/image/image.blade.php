@extends('layouts.app')
@section('title','Image Page')
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
									<form action="" method="" enctype="multipart/form-data">
										@csrf 
										<div class="form-group">
						    			<label for="exampleInputEmail1">Post Image</label>
						  			 	 <input type="file" multiple class="form-control" name="image" >
						  			 	 @error('image')
						    				<small style="color:red;">{{$message}}</small>
						   				 @enderror
						 			 </div>
						 			 <button type="submit" class="btn btn-success">Post</button>
									</form>
								</div>		
							{{-- end card-b --}}
						</div>
					{{-- end card --}}
				</div>
			{{-- end col-sm-8 --}}
		</div>
	{{-- end row --}}
</div>

{{-- end container --}}
@endsection