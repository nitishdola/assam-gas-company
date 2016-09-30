@section('pageCss')
<style>
span.step {
  background: #6B6D72;
  border-radius: 0.8em;
  -moz-border-radius: 0.8em;
  -webkit-border-radius: 0.8em;
  color: #ffffff;
  display: inline-block;
  font-weight: bold;
  line-height: 1.6em;
  margin-right: 5px;
  text-align: center;
  width: 1.6em;
  font-size: 2.3em;
}
.item-list {
  background: #f8f8f8;
}
</style>
@stop
@section('pageTitle') View Purchase Indent Details @stop
<style>
  .item-field{
    padding: 6px 0;
    background: #f6f6f6;
    margin-bottom: 4px;
  }
  h5 {
    text-align: center;
    padding: 15px 0;
    text-decoration: underline;
  }
  hr.style13 {
    height: 5px;
    border: 0;
    box-shadow: 0 10px 10px -10px #8c8b8b inset;
  }
</style>

<div class="box box-primary">

  <div class="box-body item-view">
    <h3>Purchase Indent Details</h3>
    <hr class="style13">
    <div class="row">
      <div class="col-md-6">
        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Purchase Indent Number</b> </div>
          <div class="col-md-6"> {{$info->purchase_indent_number}}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Purchase Indent Date</b> </div>
          <div class="col-md-6"> {{ date('d-m-Y', strtotime($info->purchase_indent_date)) }}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i> <b>Reference Number </b></div>
          <div class="col-md-6">{{$info->reference_number}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b>Reference Date</b> </div>
          <div class="col-md-6">{{ date('d-m-Y', strtotime($info->reference_date)) }} </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Budget Head</b> </div>
          <div class="col-md-6 no-padding">{{$info->budget_head['name']}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Store Control No</b> </div>
          <div class="col-md-6 no-padding">{{$info->store_control_number }} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Prepared By </b></div>
          <div class="col-md-6 no-padding">{{$info->creator['name']}} </div>
        </div>

        @if($info->checker['name'])
        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Checked By </b></div>
          <div class="col-md-6 no-padding">{{$info->checker['name']}} </div>
        </div>
        @endif

        @if($info->approved_by['name'])
        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Approved By HOD </b></div>
          <div class="col-md-6 no-padding">{{$info->approved_by['name']}} </div>
        </div>
        @endif

      </div>

      <div class="col-xs-12">
        <strong> Justification for Purchase</strong>
        <p>
          {{ $info->justification_of_the_purchase }}
        </p>
      </div>

      @if($info->remarks)
      <div class="col-xs-12">
        <strong> Remarks</strong>
        <p>
          {{ $info->remarks }}
        </p>
      </div>
      @endif

      <div class="col-xs-4 col-md-offset-4">
          @if($info->approval_hod_id == NULL && $info->approval_hod_date == NULL)
            @if($info->checked_by != NULL && $info->checked_on != NULL)
              <a href="{{ route('purchase_indent.approve', Crypt::encrypt($info->id)) }}" onclick="return confirm('Are you sure you want to Approve this indent ?');" class="btn btn-danger">Verify by HOD</a>
            @else if($info->checked_by == NULL && $info->checked_on == NULL)
              <a href="{{ route('purchase_indent.check', Crypt::encrypt($info->id)) }}"  onclick="return confirm('Are you sure you want to Check this indent ?');" class="btn btn-danger">Check</a>
            @endif
          @else
            <!-- INDENT READY FOR NIT -->
          @endif
        </div>

    </div>
  </div>

  <div class="box-body item-view">
    <h3>Requisition Details</h3>
    <hr class="style13">
    <div class="row">
      <div class="col-md-6">
        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Requisition Number</b> </div>
          <div class="col-md-6"> {{$info->requisition['requisition_number']}}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Department</b> </div>
          <div class="col-md-6"> {{$info->requisition->department['name']}}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i> <b>Job Number </b></div>
          <div class="col-md-6">{{$info->requisition['job_number']}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b>Nature of Work</b> </div>
          <div class="col-md-6">{{$info->requisition['nature_of_work']}} </div>
        </div>


      </div>

      <div class="col-md-6">


        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Financial Year </b></div>
          <div class="col-md-6 no-padding">{{$info->requisition['financial_year']}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Raised By </b></div>
          <div class="col-md-6 no-padding">{{$info->requisition->department_user['name']}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Issued By </b></div>
          <div class="col-md-6 no-padding">{{$info->requisition->department_user_hod['name']}} </div>
        </div>

      </div>
    </div>
  </div>

  <div class="box-body item-view">
    <h3>Material Item(s) Details</h3>
    @foreach($purchase_indent_items as $k => $v)
    <hr class="style13">
    <div class="row item-list">
      <div class="col-md-1"><span class="step"> {{ $k+1 }}</span></div>
      <div class="col-md-6">
        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Store Description</b> </div>
          <div class="col-md-6"> {{$v->requisition_item['store_description']}}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Quantity Demanded</b> </div>
          <div class="col-md-6"> {{$v->requisition_item['quantity_demanded']}}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Item Measurement</b> </div>
          <div class="col-md-6"> {{ $v->requisition_item->item_measurement['item_name'] }}</div>
        </div>

        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-9">
          <h4>Stock Position : {{$v->requisition_item->item_measurement['stock_in_hand']}} </h4>
        </div>
      </div>

      <div class="col-md-5">
        <div class="col-md-12 item-field">
            <div class="col-md-6 no-padding"><i class="fa fa-gg"></i>
              <b> Measurement Unit</b>
            </div>
            <div class="col-md-6 no-padding"> {{$v->requisition_item->measurement_unit['name']}} </div>
        </div>
        <div class="col-md-12 item-field">
            <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Approx Rate</b> </div>
            <div class="col-md-6 no-padding"> {{$v->requisition_item['rate']}} </div>
        </div>
        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Remarks </b></div>
            <div class="col-md-6 no-padding">@if($v->requisition_item['remarks'] != '') {{$v->requisition_item['remarks']}} @else -- @endif</div>
        </div>
      </div>

      <div class="col-md-8">
        <a href="{{ route('quotation_values.create', Crypt::encrypt($v->id)) }}" class="btn btn-info"><b>Add Quotation Values <i class="fa fa-plus-square" aria-hidden="true"></i> </b></a>
      </div>

    </div>
  </div>
  @endforeach


</div>
