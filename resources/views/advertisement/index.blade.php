@extends('layouts.admin')

@section('title', 'Advertisements')

@section('content')

<div class="container table-responsive">	
	<table class="table text-center" id="advTable">
		<thead>
		<tr>
		  <th scope="col">ID</th>
		  <th scope="col">Order id</th>
		  <th scope="col">Active</th>
		  <th scope="col">Title</th>
		  <th scope="col">Description</th>
		  <th scope="col">Name</th>
		  <th scope="col">Age</th>
		  <th scope="col">Email</th>
		  <th scope="col">Category</th>
		  <th scope="col">Created at</th>
		  <th scope="col">Activate</th>
		</tr>
		</thead>
		<tbody>
			@foreach($data as $adv)
		<tr>
		  <td>{{ $adv->id }}</td>
		  <td>{{ $adv->order_id }}</td>
		  <td>
		  	@if ($adv->active == 0)
		  		Pending
		  	@else
		  		Approved
		  	@endif
		  </td>
		  <td>{{ $adv->title }}</td>
		  <td>{{ $adv->text }}</td>
		  <td>{{ $adv->name }}</td>
		  <td>{{ $adv->age }}</td>
		  <td>{{ $adv->email }}</td>
		  <td>{{ $adv->category->name }}</td>
		  <td>{{ $adv->created_at }}</td> 
		  <td>
		  	@if ($adv->active == 0)
		      	<form method="POST" action="{{ route('advertisementActivate',['id'=>$adv->id]) }}">
		      		@csrf
					@method('PUT')
		      		<button type="submit" class="btn btn-success">Activate</button>
				</form>
			@else
				<form method="POST" action="{{ route('advertisementDeactivate',['id'=>$adv->id]) }}">
		      		@csrf
					@method('PUT')
		      		<button type="submit" class="btn btn-danger">Deactivate</button>
				</form>
			@endif
		  </td>
		  	
		</tr>
		@endforeach
		</tbody>
	</table>
</div>
@endsection

@push('scripts')
	<script src="{{ asset('js/pages/posts.js') }}" defer></script>
@endpush
