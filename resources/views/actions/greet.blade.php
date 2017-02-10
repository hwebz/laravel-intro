@extends('layouts.master')

@section('title')
	Greeting
@endsection

@section('content')
	<div class="container">
		<h3>Welcome {{ $name }} to our webpage</h3>
	</div>
@endsection