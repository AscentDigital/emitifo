@extends('layouts.master')

@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">Profile</li>  
</ol>


<div class="container-fluid"> 
    <div class="animated fadeIn">
     <div class="row">
         <div class="col-md-12"> 
             <div class="card message-card">
                <div class="card-header bg-primary">
                    <i class="fa fa-user"></i> Profile Settings
                </div>
                <div class="card-body">
                 <div class="row">
                 <div class="col-md-4">
                    <div class="card">
                      <div class="dash-logo profile-image" id = "profile" style="background-image:url('');vertical-align:middle;">
                      </div>
                      <div class="card-body">
                        <label class="btn btn-primary btn-sm pull-left btn-block" id = "change-prof">
                           <i class="hidden-xs-down fa fa-camera"></i> Change Photo <input type="file" name = "imgProf" id = "imgProf" style="display: none;">
                       </label>
                      </div>
                    </div>

                </div>
                <div class="col-md-6">

                    <h4 class="text-muted">Personal Info</h4>
                    <hr>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">First Name</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Last Name</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput3">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput3">Position</label>
                        <input type="email" class="form-control" id="exampleFormControlInput3">
                    </div>

                    <button type = "submit" class = "btn btn-primary pull-right btn-lg">Save Settings</button>
                    <br><br>

                    <h4 class="text-muted">Account Settings</h4>
                    <hr>
                    <div class="input-group mb-3">
                        <span class="input-group-addon"><i class="icon-lock"></i>
                        </span>
                        <input type="password" class="form-control" placeholder="Password">
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-addon"><i class="icon-lock"></i>
                        </span>
                        <input type="password" class="form-control" placeholder="Confirm password">
                    </div>

                    <div class="input-group mb-4">
                        <span class="input-group-addon"><i class="icon-lock"></i>
                        </span>
                        <input type="password" class="form-control" placeholder="Old password">
                    </div>


                    <button type = "submit" class = "btn btn-primary pull-right btn-lg">Reset Password</button>
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
@endsection

@section('script')
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
@endsection