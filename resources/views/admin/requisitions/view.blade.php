
@extends('layouts.admin')

@section('pageTitle') View Requisition Details @stop
<style>
  .item-field{padding: 6px 0;background: #f6f6f6;margin-bottom: 4px;}
  h5 {text-align: center;padding: 15px 0;text-decoration: underline;}
  hr.style13 {
  height: 5px;
  border: 0;
  box-shadow: 0 10px 10px -10px #8c8b8b inset;
}
</style>

@section('content')
<div class="row">
  <div class="col-md-12">
  <a class="btn btn-info" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
  <a class="btn btn-danger" href="{{ route('admin.requisition.index', Crypt::encrypt($info->id) ) }}"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a>
  <div class="box box-primary">
        <div class="box-body item-view">
          <h5><b>Requisitions Details</b></h5>
           <div class="row">

              <div class="col-md-6" style="padding-left:5px; padding-right:0px;">
                 <div class="col-md-12 item-field">
                   <div class="col-md-6"><i class="fa fa-gg"></i><b> Requisition Number</b> </div>
                   <div class="col-md-6">{{$info->requisition_number}}</div>
                 </div>

                 <div class="col-md-12 item-field">
                   <div class="col-md-6"><i class="fa fa-gg"></i><b> Department</b> </div>
                   <div class="col-md-6">{{$info->department['name']}}</div>
                 </div>

                 <div class="col-md-12 item-field">
                   <div class="col-md-6"><i class="fa fa-gg"></i> <b>Job Number </b></div>
                   <div class="col-md-6">{{$info->job_number}} </div>
                 </div>

                 <div class="col-md-12 item-field">
                   <div class="col-md-6"><i class="fa fa-gg"></i><b>Nature of Work</b> </div>
                   <div class="col-md-6">{{$info->nature_of_work}} </div>
                 </div>

              </div>

              <div class="col-md-6" style="padding-left:5px; padding-right:5px;">
                <div class="col-md-12 item-field">
                  <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Chargeable Account</b> </div>
                  <div class="col-md-6 no-padding">{{$info->chargeable_account['name']}} </div>
                </div>

                <div class="col-md-12 item-field">
                  <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Financial Year </b></div>
                  <div class="col-md-6 no-padding">{{$info->financial_year}} </div>
                </div>
              </div>
            <div class="col-md-10 col-md-offset-1">
            </div>
            <hr>
          </div>
        </div>
<hr class="style13">
<br>


     
    <div class="box-body item-view">
      <h5><b>Approval Status</b> </h5>
         <div class="row">
            <div class="col-md-6" style="padding-left:5px; padding-right:0px;">
                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i><b> Requisition Approved Date(HOD)</b> </div>
                  <div class="col-md-6">{{$info->hod_approve_date}}</div>
                </div>
                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i><b> Requisition Approved by</b> </div>
                  <div class="col-md-6">{{$info->department_user_hod['name']}} </div>
                </div>
                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i><b> Received Date(Good Condition)</b> </div>
                  <div class="col-md-6"></div>
                </div>
                <div class="col-md-12 item-field">
                  <div class="col-md-6"><i class="fa fa-gg"></i><b> Received by</b> </div>
                  <div class="col-md-6"></div>
                </div>
            </div>

            <div class="col-md-6" style="padding-left:5px; padding-right:5px;">
              <div class="col-md-12 item-field">
                 <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Requisition Issued Date </b>
                 </div>
                 <div class="col-md-6 no-padding">{{$info->issued_date}} </div>
               </div>

              <div class="col-md-12 item-field">
                <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Requisition Issued By  </b>
                </div>
                <div class="col-md-6 no-padding"> {{$info->department_user['name']}}</div>
               </div>

               <div class="col-md-12 item-field">
                <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Posted Date(kardex)  </b>
                </div>
                <div class="col-md-6 no-padding">{{$info->posted_in_kardex_date}} </div>
                </div>
                <div class="col-md-12 item-field">
                <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Posted(kardex) by </b>
               </div>
                  <div class="col-md-6 no-padding"></div>
                </div>
              </div>
               
              <div class="col-md-10 col-md-offset-1">
              </div>
            <hr>
        </div>
       
</div>
@stop
