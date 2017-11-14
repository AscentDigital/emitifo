@extends('layouts.sessions')

@section('content')
<div class="col-md-6">
	<div class="card mx-4">
		<div class="card-body p-4">
			<h1>Register</h1>
			<p class="text-muted">Create your account</p>
			<div class="input-group mb-3">
				<span class="input-group-addon"><i class="icon-user"></i>
				</span>
				<input type="text" class="form-control" placeholder="Username">
			</div>

			<div class="input-group mb-3">
				<span class="input-group-addon">@</span>
				<input type="text" class="form-control" placeholder="Email">
			</div>

			<div class="input-group mb-3">
				<span class="input-group-addon"><i class="icon-lock"></i>
				</span>
				<input type="password" class="form-control" placeholder="Password">
			</div>

			<div class="input-group mb-4">
				<span class="input-group-addon"><i class="icon-lock"></i>
				</span>
				<input type="password" class="form-control" placeholder="Repeat password">
			</div>

			<div class="row">
				<div class="col-3">  
				<a href="/" class="btn btn-block btn-dark px-4" role="button">
						Back
					</a>
				</div>
				<div class="col-9">  
					<button type="button" class="btn btn-block btn-primary">Create Account</button>
				</div>
			</div>  
		</div> 
	</div>
</div>
@endsection