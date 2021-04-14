@extends('layouts.admin')

@section('title', 'Categories')

@section('content')

<div class="container table-responsive">	
	<table class="table text-center" id="catTable">
		<thead>
		<tr>
		  <th scope="col">ID</th>
          <th scope="col">Price</th>
		  <th scope="col">Name</th>
		  <th scope="col">Description</th>
		  <th scope="col">Advertisements</th>
          <th scope="col">Image</th>
		  <th scope="col">Action</th>
		</tr>
		</thead>
		<tbody>
			@foreach($data as $cat)
		<tr>
		  <td class="align-middle">{{ $cat->id }}</td>
          <td class="align-middle">{{ $cat->price }}</td>
		  <td class="align-middle">{{ $cat->name }}</td>
		  <td class="align-middle">{{ $cat->description }}</td>
		  <td class="align-middle">{{ $cat->advertisement_count }}</td>
          <td class="align-middle"><img style="width: 25px;" src="{{ Storage::url($cat->path) }}"></td>
		  <td class="align-middle">
		  	@if ($cat->advertisement_count == 0)
	      	<form method="POST" action="{{ route('categoryDelete',['id'=>$cat->id]) }}">
	      		@csrf
				@method('DELETE')
	      		<button type="submit" class="btn btn-danger">Delete</button>
			</form>
			@endif
		  </td>	
		</tr>
		@endforeach
		</tbody>
	</table>
	<button class="btn btn-success" id="catAddButton">Add New</button>
	<form enctype="multipart/form-data" method="POST" id="catAddForm" action="{{ route('categorySubmit') }}" class="d-none">
        @csrf
    	<div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

            <div class="col-md-6">
                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>  
        <div class="form-group row">
            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

            <div class="col-md-6">
                <input id="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" autocomplete="price" autofocus>

                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>   
        <div class="form-group row">
            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
            <div class="col-md-6">
                <input id="image" type="file" class="form-control border-0 pl-0 @error('image') is-invalid @enderror" name="image" required autocomplete="image" autofocus>
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Add') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/pages/categories.js') }}" defer></script>
@endpush