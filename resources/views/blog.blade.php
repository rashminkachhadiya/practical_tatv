@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header text-center">Blog</div>
				
				<div class="card-body">
					<div class="list-group">
					@foreach($blogs as $blog)
						<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
					    <div class="d-flex w-100 justify-content-between">
					    	<img class="blog-img" src="{{ asset($blog->image) }}">
					      <h5 class="mb-1">{{ $blog->title }}</h5>
					      @foreach($tags as $tag)
					      	@if(isset($tag) && $tag->blog_id == $blog->id)
					      		<small>{{ $tag->tag }}</small>
					      	@endif
					      @endforeach
					    </div>
					    <p class="mb-1">{{ $blog->description }}</p>
					  </a>
					@endforeach
					</div>			
				</div>
			</div>
		</div>
	</div>
</div>
@endsection