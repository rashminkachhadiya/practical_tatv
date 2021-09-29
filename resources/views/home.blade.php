@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ url('/create-blog') }}" class="btn btn-primary">Create Blog</a>
            
        </div>
    </div>
</div>
@endsection
