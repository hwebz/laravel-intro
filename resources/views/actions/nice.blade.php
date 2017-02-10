@extends('layouts.master')

@section('title')
	Nice
@endsection

@section('content')
	<div class="container">
		<h3>{{ $action }} {{ $name }}</h3>
	</div>
@endsection