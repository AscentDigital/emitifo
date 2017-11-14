 @if(session()->has('success'))
	 <div class="alert alert-success">
	 	<i class="fa fa-check-circle"></i> {{ session('success') }}
	 </div>
 @endif

 @if(count($errors))    
	 <div class="alert alert-danger">
	 	<ul>
	 		@foreach($errors->all() as $error)
	 		<li>{{ $error }}</li>
	 		@endforeach
	 	</ul>
	 </div>
 @endif