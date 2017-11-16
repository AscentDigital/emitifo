@extends('layouts.master')

@section('content')
<!-- Main content -->
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Companies</li>  

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
                                    <i class="fa fa-envelope"></i> Companies
                                </div>
                                <div class="preview">
                                    <div class="row">
                                        <div class="col-xs-6 col-lg-8">
                                            <form action="" method="post" class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                                    </span>
                                                    <input type="text" id="search-company" name="search-company" class="form-control" placeholder="Search company...">
                                                </div>
                                            </div>
                                        </div> 
                                        </form>
                                        </div>
                                        <div class="col-xs-6 col-lg-4"> 
                                            <a href = "/admin/companies/create" class ="btn btn-primary pull-right">Add Company</a>
                                        </div>
                                    </div>
                                 </div>
                                 <table class="table table-striped message-table">
                                        <thead>
                                            <tr>
                                                <th><b>Company Name</b></th>
                                                <th width="40%">Description</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                                <th>Date Added</th> 
                                                <th class ="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>PrEP Advisory</td>
                                                <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua.</td>
                                                <td>+100-3018-203</td>
                                                <td>PrEP@advisory</td>
                                                <td>08/22/2017 11:30AM</td> 
                                                <td><a href ="/admin/companies/edit" class ="btn btn-primary" title ="Edit"><i class="fa fa-pencil"></i></a> <a href ="#" class ="btn btn-danger" data-toggle="modal" data-target="#removeModal" title ="Remove"><i class="fa fa-remove"></i></a></td> 
                                            </tr>
                                        </tbody>
                                    </table>
                                <div class="card-body">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Prev</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">4</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                         </div>
                     </div>

                    
                    <!--/.row-->

                      
                  

                   
                    <!--/.row-->
                </div>


            </div>
            <!-- /.conainer-fluid -->
<!-- Remove Modal -->
<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Yes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<!-- End Remove Modal -->

<!-- End Main -->
@endsection