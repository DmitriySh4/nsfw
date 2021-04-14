@extends('layouts.app')

@section('content')
	<div class="container">
		<h4>Advertisement was correctly sent.<h4>
		<h5>Advertisement will be posted after paying {{ $data->category->price }} euro to bank account {{ env('USER_BANKACCOUNT') }}. Use {{ $data->order_id }} as payment purpose.</h5>
	</div>
@endsection