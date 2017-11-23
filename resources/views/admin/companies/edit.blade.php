@extends('layouts.master')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/companies/">Companies</a></li>  
    <li class="breadcrumb-item">Edit {{ $company->title }}</li>  

    <!-- Breadcrumb Menu-->
    <li class="breadcrumb-menu d-md-down-none">
        <div class="btn-group" role="group" aria-label="Button group">
            <!-- <a class="btn" href="#"><i class="icon-speech"></i></a> -->
            <!-- <a class="btn" href="./"><i class="icon-graph"></i> &nbsp;Dashboard</a> -->
            <!-- <a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a> -->
        </div>
    </li>
</ol>

<form action="/admin/companies/{{ $company->slug }}/edit" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="PATCH">
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
                            <div class="card text-white bg-default bg-card" id ="backdrop" style="background-image:url({{ $company->getBackdrop()  }})">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="dash-logo profile-image" id = "profile" style="background-image:url({{ $company->getLogo()  }});vertical-align:middle;">
                                          <label class="btn btn-primary btn-sm pull-left btn-block" id = "change-prof" style ="margin-top:70px;display:none;">
                                             <i class="hidden-xs-down fa fa-camera"></i> Add Photo <input type="file" name = "logo" id = "imgProf" style="display: none;">
                                         </label>
                                     </div>
                                 </div>
                                 <div class="col-md-9 profile-text">
                                    <h1 class="profile-hd">{{ $company->title }}</h1>
                                    <h5 class="profile-shd">{{ $company->description }}</h5>
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
                        <input type="profile-texttext" class="form-control" id="title" placeholder="Emitifo" name="title" value="{{ $company->title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Company Description</label>
                        <textarea class="form-control" id="description" name="description">{{ $company->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="name@example.com" name="company_email" value="{{ $company->email }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput4">Contact</label>
                        <input type="text" class="form-control" id="exampleFormControlInput4" placeholder="+180399999" name="contact" value="{{ $company->contact }}">
                    </div>

                </div>
                <div class="col-md-6">
                    <h4 class="text-muted">Gateway Account Settings</h4>
                    <hr>
                    <div class="form-group">
                      <label for="gateway">Gateway</label>
                      <select class="form-control" name="gateway" id="gateway">
                        <option value="twilio" @if($company->gateway == 'twilio') selected @endif>Twilio</option>
                        <option value="nexmo" @if($company->gateway == 'nexmo') selected @endif>Nexmo</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput5">Code</label>
                        <input type="text" class="form-control" id="exampleFormControlInput5" name="code" value="{{ $company->code }}">
                    </div>  
                    <hr>
                    <label for="exampleFormControlInput8">API - Key</label>
                    <div class="input-group">
                      <input type="password" class="form-control" id="apikey" name="" value="92AS-2302-2392" disabled>
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="button" id="show-key">Show</button>
                      </span>
                    </div>
                    <hr>
                    <label for="exampleFormControlInput8">API - Secret</label>
                    <div class="input-group">
                      <input type="password" class="form-control" id="apisecret" name="" value="92AS-2302-2392" disabled>
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="button" id="show-secret">Show</button>
                      </span>
                    </div>
                    <br>
                </div>  
                <div class="col-md-12">
                    <button type = "submit" class = "btn btn-primary btn-block btn-lg">Update Company</button>
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
$('#show-key').on('click', function () {
   if($('#apikey').attr('type') == 'password'){
     $('#apikey').attr('type', 'text'); 
     $(this).html('Hide');
   }else{
     $('#apikey').attr('type', 'password'); 
     $(this).html('Show');
   }
});
$('#show-secret').on('click', function () {
   if($('#apisecret').attr('type') == 'password'){
     $('#apisecret').attr('type', 'text'); 
     $(this).html('Hide');
   }else{
     $('#apisecret').attr('type', 'password'); 
     $(this).html('Show');
   }
});
</script>
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
  </script>
<script type="text/javascript">
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
</script>
<script type="text/javascript">
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