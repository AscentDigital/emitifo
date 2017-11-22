@extends('layouts.master')

@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="/admin/companies/">Companies</a></li>  
  <li class="breadcrumb-item">Create Company</li>  
</ol>

<form method="POST" action="/admin/companies/create" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="container-fluid"> 
    <div class="animated fadeIn">
     <div class="row">
       <div class="col-md-12"> 
         <div class="card message-card">
          <div class="card-header bg-primary">
            <i class="fa fa-bank"></i> Company
          </div>
          <div class="card-body">
            @include('layouts.partials.alerts')
            <div class="row">
              <div class="col-md-12">
                <div class="card text-white bg-default bg-card" id ="backdrop" style="background-image:url('/img/bg/bg1.jpg')">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="dash-logo profile-image" id = "profile" style="background-image:url('/logos/default.png');vertical-align:middle;">
                        <label class="btn btn-primary btn-sm pull-left btn-block" id = "change-prof" style ="margin-top:70px;display:none;">
                         <i class="hidden-xs-down fa fa-camera"></i> Add Photo <input type="file" name = "logo" id = "imgProf" style="display: none;">
                       </label>
                     </div>
                   </div>
                   <div class="col-md-9 profile-text">
                    <h1 class="profile-hd">Company Title</h1>
                    <h5 class="profile-shd">Company Description/Quote </h5>
                  </div>
                  <div class="col-md-12">
                    <label class="btn btn-success animated fadeIn pull-right" style="display: none;"  id="change-cover">
                     <i class="hidden-xs-down fa fa-camera"></i> Change Cover Photo <input type="file" name = "backdrop" id = "imgBack" style="display: none;">
                   </label>
                 </div>
               </div>
             </div>
           </div>
           <div class="col-md-6">
            <h4 class="text-muted">Company Details</h4>
            <hr>
            <div class="form-group">
              <label for="exampleFormControlInput1">Company Name</label>
              <input type="text" class="form-control" id="title" placeholder="Emitifo" name="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput2">Company Description</label>
              <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput3">Email address</label>
              <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="name@example.com" name="company_email" value="{{ old('company_email') }}">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput4">Contact</label>
              <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="+180399999" name="contact" value="{{ old('contact') }}">
            </div>

          </div>
          <div class="col-md-6">
            <h4 class="text-muted">Admin Account Settings</h4>
            <hr>
            <div class="input-group mb-3">
              <span class="input-group-addon"><i class="icon-user"></i>
              </span>
              <input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}">
            </div>

            <div class="input-group mb-3">
              <span class="input-group-addon"><i class="icon-lock"></i>
              </span>
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>

            <div class="input-group mb-4">
              <span class="input-group-addon"><i class="icon-lock"></i>
              </span>
              <input type="password" class="form-control" placeholder="Repeat password" name="password_confirmation">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-addon"><i class="icon-user"></i>
              </span>
              <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{ old('email') }}">
            </div>
            <h4 class="text-muted">Twillio Account Settings</h4>
            <hr>
            <div class="form-group">
              <label for="exampleFormControlInput5">Code</label>
              <input type="text" class="form-control" id="exampleFormControlInput5" name="code" value="{{ old('code') }}">
            </div>
          </div>  
          <div class="col-md-12">
            <button type = "submit" class = "btn btn-primary btn-block btn-lg">Create Company</button>
          </div>
          <!--  -->
        </div>
      </div>
    </div>
  </div>
</div>


<!--/.row-->





<!--/.row-->
</div>


</div>
</form>
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function() {
    $(document).on({
      mouseenter: function() {
        $('#change-cover').show();
      },
      mouseleave: function() {
        $('#change-cover').hide();
      }
    }, '#backdrop');
    $(document).on({
      mouseenter: function() {
        $('#change-prof').show();
      },
      mouseleave: function() {
        $('#change-prof').hide();
      }
    }, '#profile');

  });

  function readURL2(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#profile').css('background-image', 'url(' + e.target.result + ')');
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgProf").change(function(){
    var imgProfVal = $(this).val();
    switch(imgProfVal.substring(imgProfVal.lastIndexOf('.') + 1).toLowerCase()){
      case 'gif': case 'jpg': case 'png':
        readURL2(this);
        break;
      default:
        $(this).val('');
        // error message here
        alert("Please select image type of File");
        break;
    }
  });

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#backdrop').css('background-image', 'url(' + e.target.result + ')');
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgBack").change(function(){
    var imgBackVal = $(this).val();
    switch(imgBackVal.substring(imgBackVal.lastIndexOf('.') + 1).toLowerCase()){
      case 'gif': case 'jpg': case 'png':
        readURL(this);
        break;
      default:
        $(this).val('');
        // error message here
        alert("Please select image type of File");
        break;
    }
  });

  var defaultTitle = $('.profile-hd').text();
  $('#title').on('keyup blur', function(){
    var value = $(this).val();
    if(value == ''){
      value = defaultTitle;
    }
    $('.profile-hd').text(value);
  });

  var defaultDescription = $('.profile-shd').text();
  $('#description').on('keyup blur', function(){
    var value = $(this).val();
    if(value == ''){
      value = defaultDescription;
    }
    $('.profile-shd').text(value);
  });

</script>
      @endsection