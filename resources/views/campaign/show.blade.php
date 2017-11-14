@extends('layouts.master')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item">Messages</li>  

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
			<div class="col-md-12"> 
				<div class="card message-card">
					<div class="card-header bg-primary">
						<i class="fa fa-envelope"></i> Campaigns
					</div>
					<div class="preview">
						<div class="row">
							<div class="col-xs-6 col-lg-8">
								<form action="/campaign" method="GET" class="form-horizontal">
									<div class="form-group row">
										<div class="col-md-12">
											<div class="input-group">
												<span class="input-group-btn">
													<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
												</span>
												<input type="text" id="search-messages" name="s" class="form-control" placeholder="Search campaigns..." value="{{ Request::query('s') }}">
											</div>
										</div>
									</div> 
								</form>
							</div>
							<div class="col-xs-6 col-lg-4"> 
								<a href="/campaign/create" class="btn btn-success btn-block hidden-xs-down text-uppercase lead">Create Campaign</a><br>
							</div>
						</div>
					</div>
					<table class="table table-striped message-table">
						<thead>
							<tr>
								<th>Title</b></th>
								<th width="50%">Description</th>
								<th>Created by</th>
								<th class="text-right">Date Created</th>
							</tr>
						</thead>
						<tbody>
							@foreach($campaigns as $campaign)
							<tr>
								<td>{{ $campaign->title }}</td>
								<td>{{ $campaign->description }}</td>
								<td>{{ $campaign->user->name }}</td>
								<td>{{ $campaign->created_at->diffForHumans() }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class="card-body">
						{{ $campaigns->appends(Request::except('page'))->links('vendor.pagination.bootstrap-4') }}
					</div>
				</div>
			</div>
		</div>


		<!--/.row-->





		<!--/.row-->
	</div>


</div>
@endsection