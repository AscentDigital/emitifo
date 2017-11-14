@extends('layouts.master')

@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="/keyword">Keywords</a></li>  
	<li class="breadcrumb-item">Create Keyword</li>  

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
			<form action="/keyword/create" method="POST">
			{{ csrf_field() }}
				<div class="card message-card message-send">
					<div class="card-header bg-primary">
						<i class="fa fa-envelope"></i> Create Keyword
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
						<div class="form-group row">
							<label class="col-md-3 form-control-label lead" for="campaign-select"><b><i class="fa fa-barcode"></i> Keyword</b></label>
							<div class="col-md-9">
								<input type = "text" name = "keyword" class ="form-control" placeholder="Enter keyword here" value="{{ old('keyword') }}">
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-9">
									<label for="description" class="lead header-title"><i class="fa fa-bars"></i> <b>Description </b></label>
								</div>  
								<textarea class="form-control" id="description" rows="4" style="resize: vertical;" placeholder="Type description here" name="description">{{ old('description') }}</textarea>
							</div><br>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-9">
									<label for="message" class="lead header-title"><i class="fa fa-commenting"></i> <b>Reply </b></label>
								</div>  
								<textarea class="form-control" id="message" rows="4" style="resize: vertical;" placeholder="Type your message here" name="reply">{{ old('reply') }}</textarea>
								<small class="pull-left"><span class="counting-text">0</span>/160</small> 
							</div><br>
						</div>
					</div>
					<div class="preview"> 
						<div class="form-group">
							<button type = "submit" class = "btn btn-primary pull-right">Create Keyword</button>
						</div>
					</div>
				</div>
				</form>
			</div>


			<!--/.row-->





			<!--/.row-->
		</div>


	</div>
	</div>
	@endsection

@section('script')
	<script type="text/javascript">
		function countingText(){
            var body = $('#message').val();
            var total = body.length; 
            if(total > 160){
                $('.counting-text').addClass('text-danger');
            }else{
                $('.counting-text').removeClass('text-danger');
            }
            $('.counting-text').text(total);
        } 

        $(function(){
        	countingText();
        });

        $('.header-input, #message').on('keypress blur',function(){
                countingText();
            });
	</script>
@endsection

