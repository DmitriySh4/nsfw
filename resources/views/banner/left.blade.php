<div class="p-0 w-100">
	@foreach ($banners as $banner)
		@if ($banner->position === 'left')
			<a href="{{ $banner->link }}"><img class="w-100" src="{{ Storage::url($banner->path) }}"></a>
		@endif 
	@endforeach
</div>			
