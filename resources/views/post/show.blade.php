@extends('layouts.app')
@section('title','Show')
@section('content')
{{-- stard container --}}
<div class="container">
	{{-- start row --}}
		<div class="row">
			{{-- start col-sm-8 --}}
				<div class="col-sm-8">
				{{-- start card --}}
					<div class="card">
						{{-- start card-body --}}
							<div class="card-body">
								<h3 style="text-align:center;">{{$post->title}}</h3>
									<span><b>Name</b> : {{$post->user->name}}</span>
									<span class="float-right"><b>Categories</b> : {{$post->category->name}}</span>
									<hr>
									<p>{{$post->description}}</p>
									<div class="created">
										<p>Date : {{Carbon\Carbon::parse($post->crated_at)->format('d-M.Y')}}
										</p>

									</div>
									<a href="{{route('index')}}" class="btn btn-danger">Back</a>
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