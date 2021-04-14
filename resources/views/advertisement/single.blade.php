@extends('layouts.app')

@section('title', 'Advertisements')

@push('styles')
    <link href="{{ asset('css/pages/post.css') }}" rel="stylesheet">
@endpush

@section('content_header')
    <h1>Advertisements</h1>
@endsection



@section('content')
	<div class="container">
		<div class="row">	
			@foreach ($advs as $adv)
			<div class="col-md-12 text-center">
				<div class="photos pb-3">
					@foreach ($adv->attachment as $photo)
						<img class="pb-1" src="{{ Storage::url($photo->path) }}">
					@endforeach
				</div>	
				<div class="info">
					<h4>{{ $adv->name }} <span>({{ $adv->age }})</span></h4>
					<h4>{{ $adv->title }}</h4>
					<p>{{ $adv->text }}</p>	
				</div>			
			</div>
			@endforeach
			
		</div>
	</div>
@endsection
