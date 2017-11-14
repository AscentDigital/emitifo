@extends('layouts.master')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="/messages">Messages</a></li>  
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
	<form action="/messages/create" method="POST">
	{{ csrf_field() }}
		<div class="row">
			<div class="col-md-7"> 
			@include('layouts.partials.alerts')
				<div class="card message-card message-send">
					<div class="card-header bg-primary">
						<i class="fa fa-envelope"></i> Create Message
					</div>
					<div class="preview"> 
						<div class="form-group row">
							<label class="col-md-3 form-control-label lead" for="campaign-select"><b><i class="fa fa-flag"></i> Campaign</b></label>
							<div class="col-md-9">
								<select id="select" name="campaign_id" class="form-control">
									<option disabled selected value style="display:none">Please select a campaign</option>
									@foreach($campaigns as $campaign)
									<option value="{{ $campaign->id }}" @if($campaign->id == old('campaign_id')) selected @endif>{{ $campaign->title }}</option>
									@endforeach
								</select>
							</div>
						</div>  
					</div> 
					<div class="card-body"> 
						<div class="form-group">
							<div class="row">
								<div class="col-md-9">
									<label for="message" class="lead header-title"><i class="fa fa-commenting"></i> <b>PrEP Advisory:</b></label>  
									<input type="text" class="form-control header-input" id="name" placeholder="Enter Header" value="PrEP Advisory:" style="display: none;">
									<span class="text-muted header-notice" placeholder="PrEP Advisory:" style="display: none;">Your message header must clearly indicate <b>who is sending the message</b>. You may not use the message header for any other purpose.</span>
								</div>
								<div class="col-md-3 text-right">
									<button type="button" id="change-header" class="btn btn-xs btn-outline-primary" tabindex="1">Change Header</button> 
									<button type="button" id="apply-header" class="btn btn-xs btn-outline-success" tabindex="2" style="display: none;">Apply Changes</button> 
								</div>
							</div>  
							<textarea class="form-control" id="message" rows="4" style="resize: vertical;" placeholder="Type your message here">This is a sample message.</textarea>
							<small class="pull-left"><span class="counting-text">15</span>/160</small> 
						</div><br>

						<div class="form-group">
							<div class="row">
								<div class="col-md-9">
									<label for="message" class="lead"><i class="fa fa-users"></i> <b>Recipients</b></label>  
								</div>
								<div class="col-md-3 text-right">
									<div class="form-group"> 
										<select class="form-control border-primary" id="subscibers-type" style="display:none;">
											<option value="0">List</option>
											<option value="1">Subscribers</option> 
										</select>
									</div>
								</div>
							</div>  
							<ul class="nav nav-tabs d-none" id="sub-tab" role="tablist"> 
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#subscriber-list" role="tab" aria-controls="subscriber-list">Home</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#subscriber-individual" role="tab" aria-controls="subscriber-individual">Profile</a>
								</li> 
							</ul>
							<div class="tab-content" >
								<div class="tab-pane active list-subs" role="tabpanel" id="subscriber-list">
									<table class="table table-striped table-bordered message-table subscriber-list table-hover">
										<thead>
											<tr>    
												<th width="5%"></th>
												<th width="60%"><b>List Name</b></th>
												<th class="text-right">Subscribers</th> 
											</tr>
										</thead>
										<tbody>
											<tr data-trigger="sub-list-1">
												<td>
													<input type="checkbox" id="checkbox1" name="recipients[]" value="default" checked>  
												</td> 
												<td>Default</td> 
												<td>{{ $company->subscribers()->count() }}</td> 
											</tr>
										</table>
									</div>
									<!--  -->
									<div class="tab-pane" role="tabpanel" id="subscriber-individual">
										<table class="table table-striped table-bordered message-table subscriber-individual table-hover">
											<thead>
												<tr>    
													<th width="5%"></th>
													<th width="60%"><b>Subcriber Name</b></th>
													<th class="text-right">Mobile</th> 
													<th class="text-right">Joined</th> 
												</tr>
											</thead>
											<tbody>
												<tr>
													<td colspan="4">
														<div class="form-group row" style="margin-bottom: 0px;">
															<div class="col-md-12">
																<div class="input-group"> 
																	<input type="text" id="search-messages" name="search-messages" class="form-control" placeholder="Search subscribers...">
																	<span class="input-group-btn">
																		<button type="button" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
																	</span>
																</div>
															</div>
														</div> 
													</td> 
												</tr>
												<tr data-trigger="sub-ind-1">
													<td>
														<input type="checkbox" id="checkbox1" name="sub-ind-1" value="sub-ind-1">  
													</td> 
													<td>John Smith</td> 
													<td>102-3019-310</td> 
													<td>08/12/2016</td> 
												</tr>
												<tr data-trigger="sub-ind-2">
													<td>
														<input type="checkbox" id="checkbox1" name="sub-ind-2" value="sub-ind-2">  
													</td> 
													<td>John Smith</td> 
													<td>102-3019-310</td> 
													<td>08/12/2016</td>  
												</tr>
												<tr data-trigger="sub-ind-3">
													<td>
														<input type="checkbox" id="checkbox1" name="sub-ind-3" value="sub-ind-3">  
													</td> 
													<td>John Smith</td> 
													<td>102-3019-310</td> 
													<td>08/12/2016</td> 
												</tr>
												<tr data-trigger="sub-ind-4">
													<td>
														<input type="checkbox" id="checkbox1" name="sub-ind-4" value="sub-ind-4">  
													</td> 
													<td>John Smith</td> 
													<td>102-3019-310</td> 
													<td>08/12/2016</td> 
												</tr>
												<tr data-trigger="sub-ind-5">
													<td>
														<input type="checkbox" id="checkbox1" name="sub-ind-5" value="sub-ind-5">  
													</td> 
													<td>John Smith</td> 
													<td>102-3019-310</td> 
													<td>08/12/2016</td> 
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="preview"> 
								<div class="form-group row"> 
									<label class="col-md-3 form-control-label lead" for="campaign-select"><b><i class="fa fa-calendar"></i> Scheduling</b></label>
									<div class="col-md-9">
										<select id="select" name="scheduling" class="form-control">
											<option value="send_now">Send Immediately</option>
											<option value="send_later">Schedule for Later</option> 
										</select>
									</div>
								</div>  
							</div> 
							<div class="card-footer text-muted">
								This message will be sent to a total of <b>13,010</b> recipients.
							</div>
						</div>
					</div>
					<div class="col-md-5 col-lg-5">
						<div class="card">
							<div class="card-header">
								Preview
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6">
										<div class="card">
											<div class="card-body">
												<p class="lead text-preview"></p>
											</div>
											<textarea style="display:none;" name="message" id="hidden-message"></textarea>
										</div> 
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-12">
										<div class="input-group input-group-lg"> 
											<input type="text" id="input3-group2" name="input3-group2" class="form-control" placeholder="Click send message to confirm" disabled="">
											<span class="input-group-btn">
												<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#confirmSend"><i class="fa fa-send-o"></i> Send Message
												</button>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--  -->
						<!-- <div class="modal fade" id="confirmSend" tabindex="-1" role="dialog" aria-labelledby="confirmSendLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="confirmSendLabel">Modal title</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										...
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary">Save changes</button>
									</div>
								</div>
							</div>
						</div> -->
						<!--  -->
						<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
							Launch demo modal
						</button> -->


					</div>
				</div>
				</form>


				<!--/.row-->





				<!--/.row-->
			</div>


		</div>
		@endsection

@section('script')
	<script type="text/javascript">
        function countingText(){
            var body = $('#message').val();
            var head = $('.header-input').val();
            var total = head.length + body.length; 
            var stringTxt = head + ' ' + body;
            if(total > 160){
                $('.counting-text').addClass('text-danger');
            }else{
                $('.counting-text').removeClass('text-danger');
            }
            $('#hidden-message').val(stringTxt);
            $('.text-preview').text(stringTxt);
            $('.counting-text').text(total);
        } 
        $(function(){
            countingText();
            $('.subscriber-list tbody tr, .subscriber-individual tbody tr').on('click', function(){ 
                var d = $(this).data('trigger');
                $('[name="'+d+'"]').trigger('click');
            });
            $('#subscibers-type').on('change', function (e) {
                $('.subscriber-individual [type="checkbox"], .subscriber-list [type="checkbox"]').prop('checked', false);
                $('#sub-tab li a').eq($(this).val()).tab('show'); 
            });
            $('#change-header').on('click', function(){
                $(this).hide();
                var title = $('.header-title b').text();
                $('#apply-header').show();
                $('.header-title').hide();
                $('.header-input').show().val(title);
                $('.header-notice').show(); 
            });
            $('#apply-header').on('click', function(){
                countingText();
                $(this).hide();
                var title = $('.header-input').val();
                $('#change-header').show();
                $('.header-title').show();
                $('.header-input').hide();
                $('.header-title b').show().text(title);
                $('.header-notice').hide(); 
            });
            $('.header-input, #message').on('keyup blur',function(){
                countingText();
            });
        });



    </script>
@endsection
