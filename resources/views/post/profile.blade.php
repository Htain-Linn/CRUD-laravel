@extends('layouts.app')
@section('title','Profile')
@section('content')
<div class="container">
	

{{-- start container --}}
<div class="container">
	<a href="{{route('post_create')}}" class="btn btn-success">Create</a>
	{{-- start row --}}
		<div class="row justify-content-center">
			{{-- start col-sm-8 --}}
				<div class="col-sm-8">
					@foreach($posts as $post)
						{{-- start card --}}
						<div class="card">
							{{-- start card-body --}}
								<div class="card-body">
									<h3 style="text-align:center;">{{$post->title}}</h3>
									<span><b>Name</b> : {{$post->user->name}}</span>
									<span class="float-right"><b>Categories</b> : {{$post->category->name}}</span>
									<hr>
									<p>{{str_limit($post->description,$limit=500, $end=".  .  .")}}
										
									</p>
									<div class="created">
										<p>Date : {{Carbon\Carbon::parse($post->crated_at)->format('d-M.Y')}}
										</p>

									</div>
									<div class="editanddelete">
										<a href="" class="btn btn-primary">Edit</a>
										<a href="" class="btn btn-danger">Delete</a>
									</div>
								</div>
							{{-- end card-body --}}
						</div>
					{{-- end card --}}
					@endforeach
				</div>
			{{-- end col-sm-8 --}}
		</div>
	{{-- end row --}}
</div>	
{{-- end container --}}

	
</div>
@endsection