@extends('layouts.admin')

@section('title', 'Categories')

@section('content')

<div class="container table-responsive">	
	<table class="table text-center" id="bannerTable">
		<thead>
		<tr>
		  <th scope="col">ID</th>
		  <th scope="col">Link</th>
		  <th scope="col">Title</th>
		  <th scope="col">Position</th>
          <th scope="col">Image</th>
		  <th scope="col">Action</th>
		</tr>
		</thead>
		<tbody>
			@foreach($data as $banner)
		<tr>
		  <td class="align-middle">{{ $banner->id }}</td>
		  <td class="align-middle">{{ $banner->link }}</td>
		  <td class="align-middle">{{ $banner->title }}</td>
		  <td class="align-middle">{{ $banner->position }}</td>
          <td class="align-middle"><img style="width: 25px;" src="{{ Storage::url($banner->path) }}"></td>
		  <td class="align-middle">
	      	<form method="POST" action="{{ route('bannerDelete',['id'=>$banner->id]) }}">
	      		@csrf
				@method('DELETE')
	      		<button type="submit" class="btn btn-danger">Delete</button>
			</form>
		  </td>	
		</tr>
		@endforeach
		</tbody>
	</table>
	<button class="btn btn-success" id="bannerAddButton">Add New</button>
	<form enctype="multipart/form-data" method="POST" id="bannerAddForm" action="{{ route('bannerSubmit') }}" class="d-none">
        @csrf
    	<div class="form-group row">
            <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('Link') }}</label>

            <div class="col-md-6">
                <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link') }}" required autocomplete="link" autofocus>

                @error('link')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

            <div class="col-md-6">
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div> 

        <div class="form-group row">
            <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>

            <div class="col-md-6">
                <select id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" required autofocus>
                    <option value="left">{{ __('Left') }}</option>
                    <option value="right">{{ __('Right') }}</option>
                </select>
                
                @error('position')
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
    <script src="{{ asset('js/pages/banners.js') }}" defer></script>
@endpush