@extends('layouts.master')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="./messages.html">Messages</a></li>  
	<li class="breadcrumb-item">Create Message</li>  

	<!-- Breadcrumb Menu-->
	<li class="breadcrumb-menu d-md-down-none">
		<div class="btn-group" role="group" aria-label="Button group">
			<!-- <a class="btn" href="#"><i class="icon-speech"></i></a> -->
			<!-- <a class="btn" href="./"><i class="icon-graph"></i> &nbsp;Dashboard</a> -->
			<a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
		</div>
	</li>
</ol>


<div class="container-fluid"> 
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-md-8"> 
			@include('layouts.partials.alerts')
				<div class="card message-card message-send">
					<div class="card-header bg-primary">
						<i class="fa fa-envelope"></i> Create Campaign
							</div>
							<form method = "post" action = "/campaign/create">
							{{ csrf_field() }}
							<div class="card-body"> 
								<div class="form-group row">
									<label class="col-md-3 form-control-label lead" for="campaign-select"><b><i class="fa fa-flag"></i> Title</b></label>
									<div class="col-md-9">
										<input name ="title" type = "text" class ="form-control">
									</div>
								</div>  
								<div class="form-group">
									<label class="form-control-label lead" for="campaign-select"><b><i class="fa fa-bars"></i> Description</b></label>
										<textarea name = "description" class ="form-control"></textarea>
								</div>  
							</div>
							<div class="preview"> 
								<div class="form-group">
									<button type = "submit" class = "btn btn-primary">Create Campaign</button>
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>


				<!--/.row-->





				<!--/.row-->
			</div>


		</div>
		@endsection

