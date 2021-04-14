@extends('layouts.app')

@section('title', 'Advertisements')

@push('styles')
	<link href="{{ asset('css/pages/category.css') }}" rel="stylesheet">
@endpush

@section('content_header')
    <h1>Advertisements</h1>
@endsection

@section('content')
	<div class="container">
		<div class="row">
		@foreach ($advs as $adv)
			@if ($adv->active == 1)
				<div class="col-md-4 mb-2 text-center">
					<div class="card">
					  <img src="{{ Storage::url($adv->attachment[0]->path) }}" class="card-img-top">
					  <div class="card-body">
					    <h5 class="card-title">{{ $adv->name }} <span>({{ $adv->age }})</span></h5>
					    <p class="card-text">{{ $adv->title }}</p>
					    <a href="{{ route('advertisementSingle', $adv->id) }}" class="btn btn-primary stretched-link">Show more</a>
					  </div>
					</div>
				</div>
			@endif
		@endforeach
		</div>
	</div>
@endsection