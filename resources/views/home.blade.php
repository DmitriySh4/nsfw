@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/pages/home.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row allCategories">
        @foreach ($data as $cat)
            <div class="col-md-4 mb-2">
                <div class="card category p-0">
                    <img src="{{ Storage::url($cat->path) }}">
                <div class="card-body text-center">
                    <h4>{{ $cat->name }}</h4>
                    <a href="{{ route('categorySingle', $cat->id) }}" class="btn btn-primary stretched-link">Show more</a>
                </div>
                </div>
            </div>            
        @endforeach
    </div>
</div>
@endsection
