@extends('layouts.master')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item">Dashboard</li>  

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
				<div class="card text-white bg-default bg-card" style="background-image:url('img/bg/bg1.jpg')">
					<div class="row">
						<div class="col-md-3">
							<div class="dash-logo" style="background-image:url('img/tlogo.png')">
							</div>
						</div>
						<div class="col-md-8 profile-text">
							<h1 class="profile-hd">Prep SMS</h1>
							<h5 class="profile-shd">Lorem ipsum dolor sit amet, </h5>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-12 col-sm-12">
				<div class="card text-white bg-primary" style="height: 300px;">
					<div class="card-body pb-0">
						<div class="btn-group float-right">
							<button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-settings"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</div>
						<h4 class="mb-0">823 <i class="fa fa-caret-up text-success"></i></h4>
						<p>Subscribers since Last Week</p>
					</div>
					<div class="chart-wrapper px-3" style="height:200px;">
						<canvas id="card-chart1" class="chart" height="70"></canvas>
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-md-12">
				<div class="row">
					<div class="col-lg-4 col-sm-6">
						<div class="card text-white bg-info" style="height: 300px;">
							<div class="card-body pb-0">
								<div class="btn-group float-right">
									<button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="icon-settings"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
								<h4 class="mb-0">35,020 <i class="fa fa-caret-down text-danger"></i> </h4>
								<p>SMS Sent to Subscribers since Last Week</p>
							</div>
							<div class="chart-wrapper px-3" style="height:200px;">
								<canvas id="card-chart2" class="chart" height="70"></canvas>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6">
						<div class="card text-white bg-warning" style="height: 300px;">
							<div class="card-body pb-0">
								<div class="btn-group float-right">
									<button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="icon-settings"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
								<h4 class="mb-0">1,230 <small>(clicks) </small><i class="fa fa-caret-up text-success"></i></h4>
								<p>Social Interactions</p>
							</div>
							<div class="chart-wrapper px-3" style="height:200px;">
								<canvas id="card-chart3" class="chart" height="70"></canvas>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6">
						<div class="card text-white bg-secondary" style="height: 300px;">
							<div class="card-body pb-0">
								<div class="btn-group float-right">
									<button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="icon-settings"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
								<h4 class="mb-0">1,823 <i class="fa fa-caret-down text-danger"></i></h4>
								<p>SMS Received (2-way SMS Replies)</p>
							</div>
							<div class="chart-wrapper px-3" style="height:200px;">
								<canvas id="card-chart4" class="chart" height="70"></canvas>
							</div>
						</div>
					</div>
					<!--/.social-box
					<div class="col-sm-6 col-lg-3">
						<div class="social-box facebook">
							<i class="fa fa-facebook"></i>
							<div class="chart-wrapper">
								<canvas id="social-box-chart-1" height="90"></canvas>
							</div>
							<ul>
								<li>
									<strong>1,021 </strong>
									<span>Total Shares</span>
								</li>
								<li>
									<strong>2,031 </strong>
									<span>Total Likes</span>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="social-box twitter">
							<i class="fa fa-twitter"></i>
							<div class="chart-wrapper">
								<canvas id="social-box-chart-2" height="90"></canvas>
							</div>
							<ul>
								<li>
									<strong>973</strong>
									<span>Total Retweets</span>
								</li>
								<li>
									<strong>1.792</strong>
									<span>Likes</span>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="social-box linkedin">
							<i class="fa fa-linkedin"></i>
							<div class="chart-wrapper">
								<canvas id="social-box-chart-3" height="90"></canvas>
							</div>
							<ul>
								<li>
									<strong>500+</strong>
									<span>contacts</span>
								</li>
								<li>
									<strong>292</strong>
									<span>feeds</span>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="social-box google-plus">
							<i class="fa fa-google-plus"></i>
							<div class="chart-wrapper">
								<canvas id="social-box-chart-4" height="90"></canvas>
							</div>
							<ul>
								<li>
									<strong>894</strong>
									<span>followers</span>
								</li>
								<li>
									<strong>92</strong>
									<span>circles</span>
								</li>
							</ul>
						</div>
					</div>-->
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-6">
				<div class="card message-card">
					<div class="card-header">
						<i class="fa fa-envelope"></i> Messages
					</div>
					<div class="preview">
						<div class="row">
							<div class="col-xs-6 col-lg-6">
								<dl class="row">
									<dt class="col-sm-6">Average Success Rate</dt>
									<dd class="col-sm-4"><b class="text-success">99.6%</b></dd>
									<dt class="col-sm-6">Average opt-out Rate</dt>
									<dd class="col-sm-4"><b class="text-danger">3.4%</b></dd>  
								</dl>
							</div>
							<div class="col-xs-6 col-lg-6">
								<a href="/messages/create" role="button" class="btn btn-block btn-lg btn-primary">Create Message</a>
							</div>
						</div>
					</div>
					<table class="table table-striped">
						<thead>
							<tr>
								<th width="70%"><b>Messages</b></th>
								<th>Recipients</th>
								<th class="text-right"><i class="fa fa-calendar"></i></th> 
							</tr>
						</thead>
						<tbody>
							@foreach($messages as $message)
							<tr>
								<td>{{ $message->message }}</td>
								<td>
									@if($message->number == null)
									<a href="/messages/{{ $message->id }}/logs"> {{ $message->getTotalLogs() }} </a>
									@else
									{{ $message->getRecipient() }}
									@endif
								</td>
								<td>{{ $message->created_at->diffForHumans() }}</td> 
							</tr>
							@endforeach
							@if($messages->count() == 0)
							<tr>
								<td colspan="5" class="text-left">No messages found.</td>
							</tr>
							@endif
						</tbody>
					</table>
					<div class="card-body">
						<a href ="/messages/" class="btn btn-block btn-primary">View All Mesages</a>
					</div>
					<div class="card-footer text-muted">
						You have sent a total of 5 messages to 450,00 recipients for this month.
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card">
					<div class="card-header">
						<b>Opt-ins / Opt-outs</b>
					</div>
					<div class="card-body">
						<div class="chart-wrapper" >
							<canvas id="canvas-1"></canvas>
						</div>
					</div>
				</div>   

				<div class="row">
					<div class="col-lg-6 col-md-12">
						<div class="card">
							<div class="card-header">
								<b>Opt-in Sources</b>
							</div>
							<div class="card-body">
								<div class="chart-wrapper" >
									<canvas id="canvas-3"></canvas>
								</div>
							</div>
						</div>  
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="card">
							<div class="card-header">
								<b>Opt-ins / Opt-outs</b>
							</div>
							<div class="card-body">
								<div class="chart-wrapper" >
									<canvas id="canvas-5"></canvas>
								</div>
							</div>
						</div>  
					</div>
				</div>
			</div>
			<!--/.col-->

		</div>
		<!--/.row-->





		<!--/.row-->
	</div>


</div>
@endsection

@section('import')
<script src="/js/views/main.js"></script>
<script src="/js/views/dashboard-charts.js"></script>
@endsection