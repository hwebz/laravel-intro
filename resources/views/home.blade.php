@extends('layouts.master')

@section('title')
	Home page
@endsection

@section('content')
	<div class="container">
		<div class="row">
		<div class="col-md-3">
				<h3>Add action</h3>
				@if (count($errors->actionErrors) > 0)
					@foreach($errors->actionErrors->all() as $error)
						<div class="alert alert-danger" role="alert">
						  {{ $error }}
						</div>
					@endforeach
				@endif
				@if (isset($action_message))
					<div class="alert alert-success" role="alert">
						  <span class="sr-only">Message:</span>
						  {{ $action_message }}
						</div>
				@endif
				<form action="{{ route('addaction') }}" method="post">
					<div class="form-group">
						<label for="actionname">Action name</label>
						<input type="text" class="form-control" id="actionname" name="actionname">
					</div>
					<div class="form-group">
						<label for="niceness">Niceness</label>
						<input type="text" class="form-control" id="niceness" name="niceness">
					</div>
					<input type="hidden" name="_token" value="{{ Session::token() }}">
					<input type="submit" class="btn btn-primary" value="Submit">
				</form>
			</div>
			<div class="col-md-3">
				<h3>Action game</h3>
				<form action="{{ route('benice') }}" method="post">
					<div class="form-group">
						<label for="action">Greeting type</label>
						<select name="action" id="action" class="form-control">
							@foreach($actions as $action)
								<option value="{{ $action->name }}">{{ $action->name }}</option>
							@endforeach
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
				@if (count($errors->userErrors) > 0)
					@foreach($errors->userErrors->all() as $error)
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
			<div class="col-md-3">
				@foreach($logged_actions as $logged_action)
					<li>
						{{ $logged_action->nice_action->name }}
						<ul>
							@foreach($logged_action->nice_action->categories as $category)
								<li>{{ $category->name }}</li>
							@endforeach
						</ul>
					</li>
				@endforeach
			</div>
		</div>
	</div>
@endsection
