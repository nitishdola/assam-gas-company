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
    <h3>NIT Details</h3>
    <hr class="style13">
    <div class="row">
      <div class="col-md-6">
        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> NIT Number</b> </div>
          <div class="col-md-6"> {{$info->nit_number}}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Subject</b> </div>
          <div class="col-md-6"> {{ $info->subject }}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i> <b>Description </b></div>
          <div class="col-md-6">{{$info->description}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b>NIT Date</b> </div>
          <div class="col-md-6">{{ date('d-m-Y', strtotime($info->nit_date)) }} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Sale Period From</b> </div>
          <div class="col-md-6 no-padding">{{ date('d-m-Y h:i:s A', strtotime($info->sale_period_from)) }}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Sale Period To</b> </div>
          <div class="col-md-6 no-padding">{{ date('d-m-Y h:i:s A', strtotime($info->sale_period_to)) }}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b>NIT Opening Date</b> </div>
          <div class="col-md-6">{{ date('d-m-Y', strtotime($info->nit_opening_date)) }} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b>NIT Closing Date</b> </div>
          <div class="col-md-6">{{ date('d-m-Y', strtotime($info->nit_closing_date)) }} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b>NIT Date</b> </div>
          <div class="col-md-6">{{ date('d-m-Y', strtotime($info->nit_pre_bid_date)) }} </div>
        </div>

      </div>

      <div class="col-md-6">

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i> <b>Estimate Cost </b></div>
          <div class="col-md-6">{{$info->estimate_cost}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i> <b>Tender Cost </b></div>
          <div class="col-md-6">{{$info->tender_cost}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i> <b>EMD Cost </b></div>
          <div class="col-md-6">{{$info->emd_cost}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i> <b>Currency </b></div>
          <div class="col-md-6">{{$info->currency}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i> <b>Tender Details </b></div>
          <div class="col-md-6">{{$info->tender_details}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i> <b>Tender Type </b></div>
          <div class="col-md-6">{{$info->tender_type}} </div>
        </div>

        <div class="col-xs-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i> <b>Created By </b></div>
          <div class="col-md-6">
            {{ $info->creator['name'] }}
          </div>
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



      @if($info->remarks)
      <div class="col-xs-12">
        <strong> Remarks</strong>
        <p>
          {{ $info->remarks }}
        </p>
      </div>
      @endif

    </div>
  </div>

  <div class="box-body item-view">
    <h3>Purchase Indent Details</h3>
    <hr class="style13">
    <div class="row">
      <div class="col-md-6">
        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Purchase Indent Number</b> </div>
          <div class="col-md-6"> {{$info->purchase_indent['purchase_indent_number']}}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Purchase Indent Date</b> </div>
          <div class="col-md-6"> {{ date('d-m-Y', strtotime($info->purchase_indent['purchase_indent_date'])) }}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i> <b>Reference Number </b></div>
          <div class="col-md-6">{{$info->purchase_indent['reference_number']}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b>Reference Date</b> </div>
          <div class="col-md-6">{{ date('d-m-Y', strtotime($info->purchase_indent['reference_date'])) }} </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Budget Head</b> </div>
          <div class="col-md-6 no-padding">{{$info->purchase_indent->budget_head['name']}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Store Control No</b> </div>
          <div class="col-md-6 no-padding">{{$info->purchase_indent['store_control_number'] }} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Prepared By </b></div>
          <div class="col-md-6 no-padding">{{$info->purchase_indent->creator['name']}} </div>
        </div>

        @if($info->purchase_indent->checker['name'])
        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Checked By </b></div>
          <div class="col-md-6 no-padding">{{$info->purchase_indent->checker['name']}} </div>
        </div>
        @endif

        @if($info->purchase_indent->approved_by['name'])
        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Approved By HOD </b></div>
          <div class="col-md-6 no-padding">{{$info->purchase_indent->approved_by['name']}} </div>
        </div>
        @endif

      </div>

      <div class="col-xs-12">
        <strong> Justification for Purchase</strong>
        <p>
          {{ $info->purchase_indent['justification_of_the_purchase'] }}
        </p>
      </div>

      @if($info->purchase_indent['remarks'])
      <div class="col-xs-12">
        <strong> Remarks</strong>
        <p>
          {{ $info->purchase_indent['remarks'] }}
        </p>
      </div>
      @endif
    </div>
  </div>

  <div class="box-body item-view">
    <h3>Requisition Details</h3>
    <hr class="style13">
    <div class="row">
      <div class="col-md-6">
        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Requisition Number</b> </div>
          <div class="col-md-6"> {{$info->purchase_indent->requisition['requisition_number']}}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b> Department</b> </div>
          <div class="col-md-6"> {{$info->purchase_indent->requisition->department['name']}}</div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i> <b>Job Number </b></div>
          <div class="col-md-6">{{$info->purchase_indent->requisition['job_number']}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6"><i class="fa fa-gg"></i><b>Nature of Work</b> </div>
          <div class="col-md-6">{{$info->purchase_indent->requisition['nature_of_work']}} </div>
        </div>


      </div>

      <div class="col-md-6">


        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Financial Year </b></div>
          <div class="col-md-6 no-padding">{{$info->purchase_indent->requisition['financial_year']}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Raised By </b></div>
          <div class="col-md-6 no-padding">{{$info->purchase_indent->requisition->department_user['name']}} </div>
        </div>

        <div class="col-md-12 item-field">
          <div class="col-md-6 no-padding"><i class="fa fa-gg"></i><b> Issued By </b></div>
          <div class="col-md-6 no-padding">{{$info->purchase_indent->requisition->department_user_hod['name']}} </div>
        </div>

      </div>
    </div>
  </div>

  <div class="box-body item-view">
    <h3>Material(s) Details</h3>
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
    </div>
  </div>
  @endforeach


</div>
