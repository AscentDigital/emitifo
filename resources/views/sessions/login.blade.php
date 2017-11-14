@extends('layouts.sessions')

@section('content')
<div class="col-md-8">
	<div class="card-group mb-0 animated fadeInDown">
		<div class="card p-4">
			<form action="/" method="POST">
			{{  csrf_field() }}
				<div class="card-body">
					<h1>Login</h1>
					<p class="text-muted">Sign In to your account</p>
					@if(count($errors) > 0)
					<div class="alert alert-danger" role="alert">
						Invalid username/password.
					</div>
					@endif
					<div class="input-group mb-3">
						<span class="input-group-addon"><i class="icon-user"></i>
						</span>
						<input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}">
					</div>
					<div class="input-group mb-4">
						<span class="input-group-addon"><i class="icon-lock"></i>
						</span>
						<input type="password" class="form-control" placeholder="Password" name="password">
					</div>
					<div class="row">
						<div class="col-6">
							<button type="submit" class="btn btn-primary px-4">Login</button>
						</div>
						<div class="col-6 text-right">
							<button type="button" class="btn btn-link px-0">Forgot password?</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
			<div class="card-body text-center">
				<div>
					<h1 style ="font-weight:900;margin-left:10px;">emitifo</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
					<a href="#" role="button" class="btn btn-light active mt-3">Contact Us!</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection