@extends('layouts.master')

@section('title')
	Home page
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<h3>Action game</h3>
				<form action="{{ route('benice') }}" method="post">
					<div class="form-group">
						<label for="action">Greeting type</label>
						<select name="action" id="action" class="form-control">
							<option value="Greet">Greet</option>
							<option value="Kiss">Kiss</option>
							<option value="Hug">Hug</option>
						</select>
					</div>
					<div class="form-group">
						<label for="name">Your name</label>
						<input type="text" class="form-control" id="name" name="name">
					</div>
					<input type="hidden" name="_token" value="{{ Session::token() }}">
					<input type="submit" class="btn btn-primary" value="Submit">
				</form>
			</div>
			<div class="col-md-3">
				<h3>Login</h3>
				@if (count($errors) > 0)
					@foreach($errors->all() as $error)
						<div class="alert alert-danger" role="alert">
						  {{ $error }}
						</div>
					@endforeach
				@endif
				@if (isset($message))
					<div class="alert alert-success" role="alert">
						  <span class="sr-only">Message:</span>
						  {{ $message }}
						</div>
				@endif
				<form action="{{ route('login') }}" method="post">
					<div class="form-group">
						<label for="username">Username</label>
						<input class="form-control" type="text" name="username" id="username">
					</div>
					<div class="form-group">
						<label for="password">Password*</label>
						<input class="form-control" type="password" name="password" id="password">
					</div>
					<input type="hidden" name="_token" value="{{ Session::token() }}">
					<input type="submit" class="btn btn-primary" value="Submit">
				</form>
			</div>
		</div>
	</div>
@endsection
